<?php

namespace App\Repo;

use App\Model\audit as Audit;
use Illuminate\Support\Facades\DB;

class BaseRepo implements BaseRepoInterface
{
    protected $eloquent;
    protected $builder;

    public function __construct($eloquent = null)
    {
        if (is_null($eloquent)) {
            if (method_exists($this, 'entity')) {
                $class = $this->entity();
            } else {
                $class = "\\App\\Model\\" . rtrim(basename(get_called_class()), 'Repo');
            }
            $eloquent = app($class);
        } elseif (is_string($eloquent)) {
            $class = "\\App\\Model\\" . $eloquent;
            $eloquent = app($class);
        }
        $this->eloquent = $eloquent;
    }

    public function find($id)
    {
        if (isset($this->eloquent->id) && $this->eloquent->id === (int) $id) {
            return $this->eloquent;
        }
        return $this->eloquent = $this->eloquent->find($id);
    }

    /**
     * change the builder
     *
     * @param \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder $query
     * @return static
     */
    public function setQuery($query)
    {
        $this->builder = $query;
        return $this;
    }

    public function execute($callback, ...$args)
    {
        $this->builder = $this->eloquent->newQuery();
        $callback($this->builder, ...$args);
        return $this;
    }

    protected static function toSql($builder)
    {
        $query = $builder->toSql();
        $params = $builder->getBindings();
        for ($i = 0, $len = count($params); $i < $len; $i++) {
            $value = $params[$i];
            if (!is_numeric($value)) {
                $value = "'$value'";
            }
            $query = preg_replace('/\?/', $value, $query, 1);
        }
        return $query;
    }

    protected static function count($query)
    {
        $data = static::toSql($query);
        return DB::select("SELECT COUNT(*) AS aggregate FROM ({$data}) AS BASETABLE")[0]->aggregate;
    }

    public function paginate()
    {
        $request = request();
        $per_page = (int) $request->input('pagination.perpage', 0);
        $page = (int) $request->input('pagination.page', 1);
        $offset = ($page - 1) * $per_page;
        $field = $request->input('sort.field');

        $totalResult = $this->count($this->builder);

        if ($sort = $request->input('sort.sort')) {
            if ($field) {
                $this->builder->orderBy($field, $sort);
            }
        }

        if ($per_page) {
            $this->builder->limit($per_page)->offset($offset);
        }

        $result = $this->builder->get();

        return [
            'meta' => [
                'page' => $page,
                'pages' => $per_page ? ceil($totalResult / $per_page) : 1,
                'perpage' => $per_page,
                'total' => $totalResult,
                'sort' => $sort,
                'field' => $field,
            ],
            'data' => $result,
        ];
    }

    public function save(array $data = [])
    {
        $activity = $this->eloquent->exists ? 'update' : 'add';
        $old_data = "$this->eloquent";
        $this->setAttributes($data);
        if (!$this->eloquent->exists):
            $this->eloquent->userc_id = auth()->id();
        endif;
        $this->eloquent->save();
        $new_data = "$this->eloquent";
        $this->audit($old_data, $activity, $this->eloquent->id, $new_data);
        return $this->eloquent;
    }

    public function saveUpdate(array $data)
    {
        return $this->save($data);
    }

    public function update(int $id, array $data = [])
    {
        $activity = 'update';
        $new = $this->eloquent->find($id);
        $old_data = $this->eloquent->find($id);
        foreach ($data as $key => $value) {
            $new->$key = $value;
        }
        $new->useru_id = auth()->id();
        $new->updated_at = date('Y-m-d H:i:s');
        $new->save();
        $this->audit($old_data, $activity, $id);
        return $new;
    }
    public function softDelete(int $id)
    {
        $activity = 'delete';
        $this->find($id);
        $old_data = "$this->eloquent";
        $new = $this->eloquent;
        $new->is_deleted = 1;
        $new->userd_id = auth()->id();
        $new->deleted_at = date('Y-m-d H:i:s');
        $new->save();
        $this->audit($old_data, $activity, $id);
        return $new;
    }
    private function setAttributes($data)
    {
        foreach ($data as $key => $value) {
            $this->eloquent->$key = $value;
        }
    }
    public function audit($old_data, $activity, $id = null, $new_data = null)
    {
        Audit::create(array(
            'table_name' => $this->eloquent->getTable(),
            'table_id' => $id ?: 0,
            'new_data' => json_encode($new_data ? $new_data : $this->eloquent),
            'old_data' => json_encode($old_data),
            'activity' => $activity,
            'userc_id' => auth()->id(),
            'userc_date' => date('Y-m-d H:i:s'),
            'userc_time' => now()->format('h:i:s'),
        ));
    }
}
