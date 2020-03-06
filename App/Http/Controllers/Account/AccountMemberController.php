<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Client;
use App\Model\File;
use App\Model\Address;
use App\Model\Contact;
use App\Model\Company;
use Validator;
use Carbon\Carbon;
use App\Lib\Filter\ClientFilter;


class AccountMemberController extends Controller
{
    protected $path ='supportNew.pages.account.';
    /**
    *  list data using request filter into datatable
    *   @param - Request object and company Model binded using route
    *   @return - meta data and requested data.
    */
    public function list(Request $request,Company $company)
    {   
        $page = $request->pagination['page'] ?: 1;
        $perPage = $request->pagination['perpage'] ?: 20;
        $offset = ($page - 1) * $perPage;
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        }else {
            $sort = '';
            $field = '';
        }
        $query = $company->clients();

        $query->when($request->sort, function ($q, $sort) use ($request) {
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new ClientFilter($request);
        $queryBuilder = $queryFilter->getQuery($query);
        $total = $queryBuilder->count();
        // $paginatedBuilder =  $queryBuilder->skip($offset)->take($perPage);
        $paginatedBuilder =  $queryBuilder->limit($perPage)->offset($offset);
        $data['meta'] = [
            "page" => $request->pagination["page"],
            "pages" => ceil($total / $perPage),
            "perpage" => $perPage,
            "total" => $total,
            "sort" => $sort,
            "field" => $field,
        ];
        $data['data'] = $paginatedBuilder->get();
        return response()->json($data);
    }
    /**
    *  
    *
    */
    public function data(Request $request, Company $company)
    {   
       return Client::where('is_deleted',0)->get();
    }
     /**
    *  Member Add Modal
    *  @param - Request Object
    * @return - rendered Add modal View
    */
    public function add(Request $request)
    {
    	return view($this->path.'modal.add_member_modal');
    }
    /**
    *  Member Add advanced(multi) Modal
    *  @param - Request Object
    * @return - rendered Add modal View
    */
    public function addAdv(Request $request, Company $company)
    {
        return view($this->path.'modal.add_member_adv_modal',compact('company'));
    }
    /**
     *  Member Edit Modal
     *  @param - Request Object and Member modal binded using route
     * @return - rendered Edit modal View
    */
    public function edit(Client $client){
        return view($this->path.'modal.edit_member_modal', compact('client'));
    }
     /**
    *  
    *
    */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:clients'
        ]);
        $rules = validation_value('add_member_form');
        $this->validate($request, $rules);
        $client = Client::create([
            'salutation' => $request->salutation,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'dob' => Carbon::createFromTimestamp($request->dob)->toDateTimeString(),
            'sex' => $request->sex,
            'phone_no' => $request->phone_no_1,
            'email' => $request->personal_email,
        ]);
        $address = $this->addNewAddress($client, $request);
        $contact = $this->addNewContact($client, $request);
         /**
         * For profile picture of clients
         */
        if ($request->has('profile_pic')) {
            $f = $request->file('profile_pic');
            $fileExtension = $f->getClientOriginalExtension();
            $fileName = md5(time() . rand());
            $fileName .= "." . $fileExtension;
            if (!file_exists(storage_path("client/profile"))) {
                mkdir(storage_path("client/profile"), 0777, true);
            }
            $f->move(storage_path("client/profile") . DIRECTORY_SEPARATOR, $fileName);
            File::create([
                'type' => 'profile',
                'table_name' => 'clients',
                'table_id' => $client->id,
                'file_name' => $fileName,
            ]);
            $contact->update(['profile_pic' => $fileName]);
        }
        return view($this->path.'inc.memberDisplayTemplate',compact('client'));
    }


    /**
    *  Update Member Information
    *   @param - request instance and member Object
    */
    public function update(Request $request,Client $client)
    {
        $rules = validation_value('add_member_form');
        $this->validate($request, $rules);
        $client = Client::find($id);
        $client->salutation = $request->salutation;
        $client->fname = $request->fname;
        $client->mname = $request->mname;
        $client->lname = $request->lname;
        $client->email = $request->email ?: $request->email_sec;
        $client->phone_no = $request->phone_no_1 ?: $request->phone_no_2;
        if ($request->salutation === 'Mr') {
            $client->sex = 'Male';
        } elseif ($request->salutation === 'Ms' || $request->salutation === 'Mrs') {
            $client->sex = 'Female';
        } else {
            $client->sex = 'Others';
        }
        $client->dob = $request->dob?Carbon::parse($request->dob)->format('Y-m-d H:i:s'):NULL;
        $client->updated_at = date('Y-m-d H:i:s');
        $client->useru_id = auth()->id() ?: 0;
        $client->update();
        /**
         * Update Contact details(Contacts table)
         */
        $contact = $this->updateContact($client, $request);
        /**
         * * Update Address details(Addresses table)
         */
        $address =  $this->updateAddress($client, $request);
        /**
         * Update Client-Communication assoiciate(pivot- clientCommunicationPreference Model)
         */
        if(!empty($request->comm_pref_id))
        {
            $this->commPreferences($client,$request->comm_pref_id);
        }
         /**
        * Update Client-Company assoiciate(pivot- clientCompanies Model)
        */
        if($request->has('company_id')){
            $client->companies()->sync([$request->company_id]);
        }
        else{
            $client->companies()->sync([]);
        }
/**
         * For profile picture of clients
         */
        // Check if file exists first
        if ($request->has('client_profile_pic')) {
            $f = $request->file('client_profile_pic');
            $fileExtension = $f->getClientOriginalExtension();
            $fileName = md5(time() . rand());
            $fileName .= "." . $fileExtension;
            $profile_pic = File::where(['table_name' => 'clients', 'table_id' => $client->id, 'type' => 'profile'])->first();
            if ($profile_pic) {
                $f->move(storage_path("client/profile") . DIRECTORY_SEPARATOR, $fileName);
                $profile_pic->update([
                    'file_name' => $fileName,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'useru_id' => auth()->id() ?: 0
                ]);
                $contact->update(['profile_pic' => $fileName]);
            } else {
                if (!file_exists(storage_path("client/profile"))) {
                    mkdir(storage_path("client/profile"), 0777, true);
                }
                $f->move(storage_path("client/profile") . DIRECTORY_SEPARATOR, $fileName);
                File::create([
                    'type' => 'profile',
                    'table_name' => 'clients',
                    'table_id' => $client->id,
                    'file_name' => $fileName,
                ]);
                $contact->update(['profile_pic' => $fileName]);
            }
        }
        $this->storeAttachment($request,$client);
        return view($this->path.'inc.memberDisplayTemplate',compact('client'));
        return response(['success' => 'Update Member Information']);
    }
    /**
     * For attachments/Other files
     */
    public function storeAttachment(Request $request,Client $client)
    {
        
        if ($request->attachment) {
            foreach ($request->attachment as  $file) {
                File::create([
                    'type' => 'attachment',
                    'table_name' => 'clients',
                    'table_id' => $client->id,
                    'file_name' => $file,
                ]);
            }
        }
    }
    /**
     * Add new contact info for client
     *
     * @param [type] $client
     * @param [type] $request
     * @return void
     */
     public function addNewContact($client, $request)
    {
        $contact = new Contact();
        $contact->fname = $request->fname;
        $contact->mname = $request->mname;
        $contact->lname = $request->lname;
        $contact->dob = $request->dob?Carbon::parse($request->dob)->format('Y-m-d H:i:s'):NULL;
        $contact->phone_no = $request->phone_no_1;
        $contact->mobile_no = $request->phone_no_2;
        $contact->email = $request->email;
        $contact->other_email = $request->email_sec;
        $contact->table = 'clients';
        $contact->table_id = $client->id;
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->userc_id = auth()->id() ?: 0;
        $contact->save();
        return $contact;
    }
    public function addNewAddress($client, $request)
    {
        $address = new Address();
        $address->table = 'clients';
        $address->table_id = $client->id;
        $address->add1 = $request->add1;
        $address->add2 = $request->add2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip = $request->zip;
        $address->county = $request->county;
        $address->created_at = date('Y-m-d H:i:s');
        $address->userc_id = auth()->id() ?: 0;
        $address->save();
        return $address;
    }
    public function updateContact($client, $request, $oldcontact = NULL)
    {
        if ($oldcontact) {
            $contact = $oldcontact;
        } else {
            $contact = Contact::where('table', 'clients')->where('table_id', $client->id)->first();
        }
        if ($contact) {
            $contact->fname = $request->fname;
            $contact->mname = $request->mname;
            $contact->lname = $request->lname;
            $contact->dob = $request->dob?Carbon::parse($request->dob)->format('Y-m-d H:i:s'):NULL;
            $contact->ssn = $request->ssn;
            $contact->email= $request->email;
            $contact->other_email= $request->email_sec;
            $contact->phone_no= $request->phone_no_1;
            $contact->mobile_no= $request->phone_no_2;
            $contact->updated_at = date('Y-m-d H:i:s');
            $contact->useru_id = auth()->id() ?: 0;
            $contact->update();
        } else {
            $contact = Contact::create([
                'table' => 'clients',
                'table_id' => $client->id,
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'dob' => $request->dob,
                'ssn' => $request->ssn,
                'email'=> $request->email,
                'other_email'=> $request->email_sec,
                'phone_no'=> $request->phone_no_1,
                'mobile_no'=> $request->phone_no_2,
                'created_at' => date('Y-m-d H:i:s'),
                'userc_id' => auth()->id() ?: 0
            ]);
        }
        return $contact;
    }

    public function updateAddress($client, $request, $oldaddress = NULL)
    {
        if ($oldaddress) {
            $address = $oldaddress;
        } else {
            $address = Address::where(['table' => 'clients', 'table_id' => $client->id])->first();
        }
        if ($address) {
            $address->add1 = $request->add1;
            $address->add2 = $request->add2;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->zip = $request->zip;
            $address->county = $request->county;
            $address->is_default = 1;
            $address->is_present = 1;
            $address->updated_at = date('Y-m-d H:i:s');
            $address->useru_id = auth()->id() ?: 0;
            $address->update();
        } else {
            $address = Address::create([
                'table' => 'clients',
                'table_id' => $client->id,
                'add1' => $request->add1,
                'add2' => $request->add2,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'county' => $request->county,
                'is_default' => 1,
                'is_present' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'userc_id' => auth()->id() ?: 0,
            ]);
        }
        return $address;
    }
     /**
     * Update client Communication Preferences
     * @param [type=Request] $request
     * @param [type=Client] $client
     * @return void
     */
    public function updateCommPref(Request $request, Client $client)
    {
        $this->commPreferences($client, $request->comm_pref_id);
        return view('supportNew.pages.client.inc.communication_template',compact('client'));
    }

    public function image($file) {
     // dd(storage_path('account/images/'.$file));
        if (file_exists(storage_path('client/profile/'.$file))){
           return response()->file(storage_path('client/profile/'.$file));
         // return Image::make(storage_path('account/images/'.$file))->response();
        }
    }
}
