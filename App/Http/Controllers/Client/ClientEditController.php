<?php

namespace App\Http\Controllers\Client;

use App\Model\File;
use App\Model\Note;
use App\Model\Client;
use App\Model\Address;
use App\Model\Company;
use App\Model\Contact;
use App\Model\CompanyClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ClientEditController extends ClientController
{
    // edit client modal
    public function editClientModal(int $id)
    {
        $client = Client::find($id);
        $profile_pic = File::where(['table_name' => 'clients', 'table_id' => $client->id, 'type' => 'profile'])->first();
        return view(default_template() . '.pages.client.modal.edit_client_modal', compact('client','profile_pic'));
    }

    /**
     * Update client info
     *
     * @param Request $request
     * @return void
     */
    public function updateClient(Request $request, int $id)
    {
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
        * Update Client-Company assoiciate(pivot- clientCompanies Model)
        */
        if($request->has('company_id')){
            $client->companies()->sync([$request->company_id]);
        }
        else{
            $client->companies()->sync([]);
        }
        /**
         * Update Client-Communication assoiciate(pivot- clientCommunicationPreference Model)
         */
        if(!empty($request->comm_pref_id))
        {
            $this->commPreferences($client,$request->comm_pref_id);
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
       return response(['success' => 'Updated Client Successfully!'],200);
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
    public function statusModal(Request $request, int $client)
    {
        $status= $request->status;
        return view(default_template(). '.pages.client.modal.edit_status_modal', compact('client','status'));
    }

    public function updateStatus(Request $request, Client $client){
        \DB::beginTransaction();
        try{
            if($request->status == "active"){
                $client->update([
                    'status' => $request->status,
                    'useru_id'=>auth()->id(),
                ]);
            }
            elseif($request->status == "inactive"){
                $client->update([
                    'status' => $request->status,
                    'useru_id'=>auth()->id(),
                ]);
            }
            
        \DB::commit();
        return response()->json([
            "message" => "Client Status Updated Successfully.",
            "data" => $client,
        ]);     
    } 
    catch (\Exception $e) 
    {
        \DB::rollBack();
        return response(["message" => $e->getMessage()], 500);
    }
}
    /**
     * Remove selected client
     *
     * @param [type] $id
     * @return void
     */
    public function deleteClient($id)
    {
        $client = Client::find($id);
        $client->update([
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id() ?: 0
        ]);
    }

    public function updateCompany(Request $request, Client $client)
    {
        if($request->has('company_id')){
            $client->companies()->sync([$request->company_id]);
        }
        else{
            $client->companies()->sync([]);
        }

        if($client->companies()->count())
            return $client->companies()->with(['address','contact'])->first();
        return response(['success'=>'Updated Company Associates',
                        'status' => '0'
                        ], 200);
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

     /**
     * Update client Communication Preferences
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
        
    public function editContactModal(Client $client)
    {
        $profile_pic = File::where(['table_name' => 'clients', 'table_id' => $client->id, 'type' => 'profile'])->first();
        return view(default_template() . '.pages.client.modal.edit_address_and_contact', compact('client','profile_pic'));
    }

   

    public function noteEditModal(int $id)
    {
        $note = Note::find($id);
        return view(default_template() . '.pages.client.modal.client_note_edit', compact('note'));
    }

    /**
     * Update CLient notes
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function updateNote(Request $request, int $id)
    {
        $note = Note::find($id);
        $note->update([
            'description' => $request->description,
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
        ]);
        $client= Client::find($note->table_id);
         return view(default_template() . '.pages.client.note.notes_data_template', compact('client'));
    }

    public function deleteNote(int $id)
    {
        $note = Note::find($id);
        $client_id= $note->table_id;
        $note->update([
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id() ?: 0,
        ]);
        $client= Client::find($client_id);
        return view(default_template() . '.pages.client.note.notes_data_template', compact('client'));
    }
    /**
     * Update only profile picture of client
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function updateProfileImage(Request $request, int $id)
    {
        $f = $request->file('client_profile_pic');
        $fileExtension = $f->getClientOriginalExtension();
        $fileName = md5(time() . rand());
        $fileName .= "." . $fileExtension;
        if (!file_exists(storage_path("client/profile"))) {
            mkdir(storage_path("client/profile"), 0777, true);
        }
        $f->move(storage_path("client/profile") . DIRECTORY_SEPARATOR, $fileName);
        $client = Client::find($id);
        if ($client->image) {
            $client->image->update([
                'updated_at' => date('Y-m-d H:i:s'),
                'useru_id' => auth()->id() ?: 0,
                'file_name' => $fileName,
            ]);
        } else {
            File::create([
                'type' => 'profile',
                'table_name' => 'clients',
                'table_id' => $client->id,
                'file_name' => $fileName,
            ]);
        }
        return $this->clientProfile($id);
    }
    /**
     * Update only profile picture of client
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function updatePImage(Request $request, Client $client)
    {
        $f = $request->file('client_profile_pic');
        $fileExtension = $f->getClientOriginalExtension();
        $fileName = md5(time() . rand());
        $fileName .= "." . $fileExtension;
        if (!file_exists(storage_path("client/profile"))) {
            mkdir(storage_path("client/profile"), 0777, true);
        }
        $f->move(storage_path("client/profile") . DIRECTORY_SEPARATOR, $fileName);
        if ($client->image) {
            $client->image->update([
                'updated_at' => date('Y-m-d H:i:s'),
                'useru_id' => auth()->id() ?: 0,
                'file_name' => $fileName,
            ]);
        } else {
            File::create([
                'type' => 'profile',
                'table_name' => 'clients',
                'table_id' => $client->id,
                'file_name' => $fileName,
            ]);
        }
        return response(['image' => $client->image?$client->image->file_name:NULL]);
    }

    public function attachmentTitleChange(int $id, string $title)
    {
        $file = File::find($id);
        $file->update([
            'title' => $title,
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0
        ]);
        return $file;
    }


    // public function downloadAttachment(string $filename)
    // {
    //     dd($filename);
    // }


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


    public function updateFromView(Request $request, Client $client)
    {
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
         * For profile picture of clients
         */
        // Check if file exists first
        if ($request->has('client_profile_pic')) {
            $f = $request->file('client_profile_pic');
            $fileExtension = $f->getClientOriginalExtension();
            $fileName = md5(time() . rand());
            $fileName .= "." . $fileExtension;
            //checking
            $profile_pic = File::where(['table_name' => 'clients', 'table_id' => $client->id, 'type' => 'profile'])->first();
            //if found
            if ($profile_pic) {
                $f->move(storage_path("client/profile") . DIRECTORY_SEPARATOR, $fileName);
                $profile_pic->update([
                    'file_name' => $fileName,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'useru_id' => auth()->id() ?: 0
                ]);
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
            }
            $contact->update(['profile_pic' => $fileName]);
        }
        return $client->load('address','contact','comm_preferences','image');
    }
}
