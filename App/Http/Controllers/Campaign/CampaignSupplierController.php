<?php

namespace App\Http\Controllers\Campaign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Campaign\Campaign;

class CampaignSupplierController extends Controller
{
    protected $viewPath= 'supportNew.pages.campaign.suppliers.';
    
    /**
     * add Model route
     */
    public function add(Campaign $campaign)
    {
        return view($this->viewPath.'modal.add1',compact('campaign'));
        
    }
    /**
     * Store Supplier for adv modal
     * CRUD TYpe : store
     * param - request object and campaign model binded using RMB
     */
    public function store(Request $request,Campaign $campaign)
    {
        if(is_array($request->supplier_id))
        {
            foreach($request->supplier_id as $key => $supplier)
            {
                if(!$supplier)
                {
                    $campaign->suppliers()->create([
                       'company_id' =>(int)$request->company_id[$key],
                       'type_of_service' => $request->type_of_service[$key],
                       'cost' => (float)preg_replace("/[^0-9.]/", "", $request->cost[$key]),
                       'status' => $request->status[$key],
                       'userc_id' => auth()->check()?auth()->user()->id:0
                    ]);
                }
                else{
                    $cSupplier= CampaignSupplier::find($activity);
                    if($cSupplier)
                    {
                        $cSupplier->update([
                            'company_id' =>(int)$request->company_id[$key],
                            'type_of_service' => $request->type_of_service[$key],
                            'cost' => (float)preg_replace("/[^0-9.]/", "", $request->cost[$key]),
                            'status' => $request->status[$key],
                            'useru_id' => auth()->check()?auth()->user()->id:0
                        ]);
                    }
                }
            }
        }
    }
}
