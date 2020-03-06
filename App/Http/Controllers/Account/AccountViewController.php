<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Account;
use App\Model\Company;

class AccountViewController extends Controller
{

	protected $path= 'supportNew.pages.account.';
  protected $modalPath = 'supportNew.pages.account.modal.';
  protected $incPath = 'supportNew.pages.account.inc.';

   public function index(Request $request,Company $company)
   {
      return view($this->path.'view',compact('company'));
   }
   /**
   * Edit Modal 
   * @param - type and Company Id
   * @return - Modal view 
   */
   public function editModal($type, Company $company)
   {
    switch ($type)
    {
      case 'general':
        return view($this->modalPath.$type, compact('company','type'));
      break;
      case 'branches':
        return view($this->modalPath.$type, compact('company','type'));
      break;
      default:
        return view($this->modalPath.'general', compact('company','type'));
    }
   }
   /**
   * Render Template 
   * @param - type and Company Id
   * @return - Modal view 
   */
   public function template($type, Company $company)
   {
    switch ($type)
    {
      case 'general':
        return view($this->incPath.'companyGeneralInfo', compact('company'));
      break;
      case 'branches':
        return view($this->incPath.'BranchDetails', compact('company'));
      break;
      default:
        return view($this->incPath.'companyGeneralInfo', compact('company'));
    }
   }

   public function detachBranch(Request $request, Company $company,int $branch)
   {
      return view($this->modalPath.'.detachBranch',compact('company','branch'));
   }
   public function detachMember(Request $request, Company $company,int $member)
   {
      return view($this->modalPath.'.detachMember',compact('company','member'));
   }

   /**
   * Industry Lookup data 
   * @param - Request Instance
   * @return - Data
   */
   public function industries(Request $request)
   {
      return Company::select('id','industry')
                ->where('is_deleted',0)
                ->where('industry','<>',NULL)
                ->get()->unique(function ($item) {
                    return ucwords($item['industry']);
            });
   }

      /**
   * Industry Lookup data 
   * @param - Request Instance
   * @return - Data
   */
  public function lookupSelectData(Request $request, $name)
  {
    $data= sectionNameToLookups($name);
    return $data;
  }

   public function profileImage($file) {
       if (file_exists(storage_path('company/profile/'.$file))){
          return response()->file(storage_path('company/profile/'.$file));
       }
   }
   public function editThumb(Company $company) {
    return view($this->path.'modal.thumbModal',compact('company'));
   }

   public function selectData()
   {
      return Company::with('image','contact','address')->where('is_deleted',0)->get();
   }
}
