<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\File;

class AccountFileController extends Controller
{
	protected $path = 'supportNew.pages.account.file.';
    /**
    * Add Modal for multiple files
    * @param - Request Instance and account model binded using route
    * @return - modal View for add screen
    */
    public function add(Request $request,Company $company)
    {
    	return view($this->path.'add', compact('company'));
    }
    /**
    * Store new attachments/Other files
    * @param - Request Instance and account model binded using route
    * @return - modal View for add screen
    */
    public function store(Request $request, Company $company)
    {
        if ($request->attachment) {
            foreach ($request->attachment as  $file) {
                File::create([
                    'type' => 'attachment',
                    'table_name' => 'companies',
                    'table_id' => $company->id,
                    'file_name' => $file,
                ]);
            }
        }
        return view($this->path.'fileTemplater', compact('company'));
    }
    /**
    *  Soft Delete old attachments/Other files
    * @param - Request Instance and account model binded using route
    * @return - modal View for add screen
    */
    public function sdelete(Request $request, File $file)
    {
        $file->update([
            'is_deleted' => 1,
            'deleted_at' => now()
        ]);
        $company = Company::where('id', $file->table_id)->first();
        return view($this->path.'fileTemplater', compact('company'));
    }
    /**
    * Process The upcoming file
    * @param - Request Instance
    * @return - file name and original file name
    */
    public function process(Request $request)
    {
        $path = storage_path('company/attachments');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('attachment');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
