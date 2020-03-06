<?php
namespace App\Traits;
use App\Model\audit;


trait StoreAudit
{
	public static function bootStoreAudit()
	{
	    foreach(static::getModelEvents() as $event)
	    {
	    	static::$event(function($model)use($event){
	    	    $model->storeAudit($event);
	    	});
	    }
	}

	protected function getActivityName($model, $action)
	{
		//created
		//created_post
		$name = strtolower((new \ReflectionClass($model))->getShortName());
		if($model->isDirty('is_deleted')){
			if($model->is_deleted){
				$action = 'deleted';
			}
			else{
				$action = 'Recovered';
			}
		}
		return "{$action}_{$name}";
	}

	protected static function getModelEvents()
	{
		if(isset(static::$recordEvents))
		{
			return static::$recordEvents;
			//insert static::$recordEvents=[events] into the model to override.

		}
		return ['created','updated'];
	}

	protected function storeAudit($event)
	{
		$this->audits()->create([
		    'table_name' => $this->table?:'',
		    'table_id' => $this->fresh()->id,
		    'new_data' => json_encode($this->fresh()),
		    'old_data' => json_encode($this->getOriginal()),
		    'created_at' => now(),
		    'updated_at' =>now(),
		    'activity' => $this->getActivityName($this, $event),
		    'userc_id' => $this->fresh()->id,
		    'userc_date' => now(),
		    'userc_time' => now()->format('H:i:s')
		]);
	}

	public function audits()
    {
        return $this->morphMany(audit::class ,'table','table_name', 'table_id', 'id');
    }
}