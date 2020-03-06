<?php

namespace App\Http\Controllers\Client;

use App\Model\File;
use App\Model\Note;
use App\Model\Client;
use App\Model\Address;
use App\Model\Company;
use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CompanyClient;
use Carbon\Carbon;
class ClientAddController extends ClientController
{
    public function addClientModal()
    {
        return view(default_template() . '.pages.client.modal.add_client_modal', compact('companies'));
    }

    /**
     * Store client
     * @param Request $request
     * @return void
     */
    public function storeClient(Request $request)
    {
        $request->validate([
            'email' => 'unique:clients'
        ]);
        $rules = validation_value('add_client_form');
        $this->validate($request, $rules);
        \DB::beginTransaction();
        try{
        $client = new Client();
        $client->salutation = $request->salutation;
        $client->fname = $request->fname;
        $client->mname = $request->mname;
        $client->lname = $request->lname;
        $client->status = 'active';
        $client->is_active = '1';
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
        $client->created_at = date('Y-m-d H:i:s');
        $client->userc_id = auth()->id() ?: 0;
        $client->save();

        $contact = $this->addNewContact($client, $request);
        $address = $this->addNewAddress($client, $request);
        /**
         * next step
         * Add Client-Company pivot
        
         */
        if ($request->company_id) {
            $client->companies()->sync($request->company_id);
        }
        /**
         * Add Client-communicationPreference pivot
         */
        $this->commPreferences($client,$request->comm_pref_id);

        /**
         * For profile picture of clients
         */
        if ($request->has('client_profile_pic')) {
            $f = $request->file('client_profile_pic');
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

        $this->storeAttachment($request,$client);
        \DB::commit();
            return response(['success' => 'Client Created Successfully!',
                            'data' => $client->load('image','address','contact')],200);
        } 
        catch (\Exception $e) 
        {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    public function storeAttachment(Request $request,Client $client)
    {
        /**
         * For attachments/Other files
         */
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


    public function getAddress(string $name)
    {
        $company = Company::where('c_name', $name)->first();
        $address =  $company->hOAddress;
        $address->company_name = $company->c_name;
        $address->company_code = $company->reg_no;
        return $address;
    }


    public function noteModal(int $id)
    {
        return view(default_template() . '.pages.client.modal.client_note_add', compact('id'));
    }


    public function storeClientNote(Request $request, int $id)
    {
        Note::create([
            'title' => $request->title?:'',
            'description' => $request->description,
            'table' => 'clients',
            'table_id' => $id,
            'userc_id' => auth()->user()->id
        ]);
        $client = Client::find($id);
         return view(default_template() . '.pages.client.note.notes_data_template', compact('client'));
    }

     /**
     * Associate client with Communication Preferences
     *
     * @param [type=Client] $client
     * @param [type=Request] $request
     * @return void
     */
    public function commPreferences(Client $client,$preferenceIds)
    {
        if(!empty($preferenceIds))
        {
            return $client->comm_preferences()->sync($preferenceIds);
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
        $contact->ssn = $request->ssn;
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
        $address->is_default = 1;
        $address->is_present = 1;
        $address->created_at = date('Y-m-d H:i:s');
        $address->userc_id = auth()->id() ?: 0;
        $address->save();
        return $address;
    }


    public function filesModal(int $id)
    {
        return view(default_template() . '.pages.client.modal.add_files_modal', compact('id'));
    }


    public function uploadExtraFiles(Request $request, int $id)
    {
        dd($request->all(), $id);
    }
    


}
