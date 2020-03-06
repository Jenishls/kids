<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Content;
use App\Lib\Filter\ContentFilter;
use Validator;


class ContentController extends Controller
{
    protected $path='supportNew.pages.content.';
    protected $storeFields=['title','category_id','content', 'section'];
    /**
    * Content Controller operates in the content table(Model)
    */
    /**
    * Index function returns the main View(table view)
    * @param - NULL
    * @return - index page rendered view.
    */
    public function index()
    {
    	return view($this->path.'index');
    }
    /**
    * Main datatable list view
    * @param - Request Object
    * @return - json Main datatable list view
    */
    public function outer(Request $request)
    {
       // dd($request->all());
       $page = $request->pagination['page'] ?: 1;
       $perPage = $request->pagination['perpage'] ?: 50;
       $offset = ($page - 1) * $perPage;
       if ($request->sort) {
           $sort = $request->sort['sort'];
           $field = $request->sort['field'];
       }else {
           $sort = '';
           $field = '';
       }
       $query = Content::select('title','section','table','table_id','id')->where("is_deleted", 0);
       $query->when($request->sort, function ($q, $sort) use ($request) {
           return $q->orderBy($sort['field'], $sort['sort']);
       });
       $queryFilter = new ContentFilter($request);
       $queryBuilder = $queryFilter->getQuery($query);
       $total = $queryBuilder->count();
       $paginatedBuilder =  $queryBuilder->limit($perPage)
           ->offset($offset);
       $data['meta'] = [
           "page" => $request->pagination["page"],
           "pages" => ceil($total / $perPage),
           "perpage" => $perPage,
           "total" => $total,
           "sort" => $sort,
           "field" => $field,
       ];
       $data['data'] = $paginatedBuilder->get()->unique('table');
       return response()->json($data);
    }
     /**
    * Add function returns content add form
    * @param - NULL
    * @return - Content add view.
    */
    public function add()
    {
        return view($this->path.'modal.add');
    }
     /**
    * Add function returns new content category add form
    * @param - NULL
    * @return - Content add view.
    */
    public function categoryAdd()
    {
        return view($this->path.'modal.categoryAdd');
    }

     /**
    * Store function add mew content to datebase
    * @param - NULL
    * @return - Response about the save operation
    */
    public function store(Request $request)
    {
        $rules = validation_value('add_content_form');
        $this->validate($request, $rules);
        Content::create($request->only($this->storeFields));
    }
}
