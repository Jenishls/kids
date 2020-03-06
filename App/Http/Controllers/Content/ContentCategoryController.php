<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lookup\Lookup;
use App\Model\Lookup\SectionLookup;

class ContentCategoryController extends Controller
{
    protected $path= 'supportNew.pages.content.';
    protected $sectionName = 'content_categories';
    protected $sectionDesc = 'lookup for content category';
    protected $storeCategoryFields=['category'];
    /**
    * 	Pass away Content Category to json Format
    *	@param - Request object
    * 	@return - Response category lookups as JSON
    */
    public function list(Request $request)
    {	
    	$section = SectionLookup::with('lookups')->where('section', $this->sectionName)->first();
    	if($section)
    	{
    		return $section->lookups->unique('value');
    	}
    	return [];
    }

    /**
    * 	Store new Content Category
    *	@param - Request Object 
    * 	@return - Response about the save operation
    */
    public function store(Request $request)
    {
    	$section = SectionLookup::where('section', $this->sectionName)->first();
    	if(!$section){
    		$section = SectionLookup::create([
    			'section' => $this->sectionName,
    			'description' => $this->sectionDesc
    		]);
    	}
    	$exists= Lookup::where('section_id', $section->id)
    		->where('value', $request->category)
    		->first();
    	if(!$exists){
    		$lookup= Lookup::create([
    			'code' => $this->sectionName,
    			'section_id' => $section->id,
    			'value' => $request->category
    		]);
    		if($lookup)
	    	{
	    		return response(['success' => 'Added new Category'], 200);
	    	}	
    	}
    	return response(['errors'=>['category' => 'Category Already Exists!']],402);
    }

}
