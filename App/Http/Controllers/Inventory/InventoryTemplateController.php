<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Color;
use App\Model\Size;
use App\Model\Company;
use App\Model\Product;

class InventoryTemplateController extends Controller
{
	protected $path= 'supportNew.pages.inventory.includes.';
    /**
    * Create new Inventory Template
    * @param - Current Request Instance from request object
    * @return - response or view (depending on the validation)
    */
    public function create(Request $request)
    {
    	//validate upcoming data
		$rules = validation_value('create_inventory_template');
        $this->validate($request, $rules);
        $data['product'] = Product::where('id', $request->product_id)->where('is_deleted',0)->first();
        $data['color'] = Color::where('id', $request->color_id)->where('is_deleted',0)->first();
        $data['size'] = Size::where('id', $request->size_id)->where('is_deleted',0)->first();
        $data['company'] = Company::where('id', $request->company_id)->where('is_deleted',0)->first();
        $data['price'] = $request->price;
        $data['quantity'] = $request->quantity;
        $data['name'] = $request->name;
        $data['uniqId'] = str_replace(' ', '', $data['name']).uniqid();
        return view($this->path.'inventoryDisplayTemplate', compact('data'));
    }
}
