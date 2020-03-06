<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Member;
use App\Model\Address;
use App\Model\File;
use App\Model\Membership;
use App\Model\Role;
use App\Model\UserEmail;
use App\Model\Lookup\Lookup;
use App\Model\Lookup\SectionLookup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;


class UserProfileEditController extends Controller
{
    protected $profile_menu_path = "support.pages.userControl.inc";
    /**
     * Return updated value
     * @param Request $request, String $personalDetail, int $id
     * @return edit modal
     */
    public function edit_personal_detail(Request $request, string $personalDetail, int $id)
    {
        switch ($personalDetail) {
            case 'imageTitle':
                return $this->edit_image_title_modal($request, $id);
            case 'personal':
                return $this->edit_personal_detail_modal($id);
            case 'address':
                return $this->edit_address_detail_modal($id);
            case 'contact':
                return $this->edit_contact_detail_modal($id);
            case 'membership':
                return $this->edit_membership_detail_modal($id);
            case 'email':
                return $this->edit_email_detail_modal($id);
            default:
                return 'Error';
        }
    }

    // edit user modal
    public function edit_image_title_modal(Request $request, int $id)
    {
        $user = User::find($id);
        // $file = File::where('user_id', $user->id)->where('is_deleted', 0)->first();
        // dd($file);
        $roles = Role::where('is_deleted', 0)->get();
        return view(default_template() . '.pages.modal.editModal.edit_image_title_details', compact('user', 'roles'));
    }
    public function edit_personal_detail_modal($id)
    {

        $user = User::find($id);
        return view(default_template() . '.pages.modal.editModal.edit_personal_details', compact('user'));
    }
    public function edit_email_detail_modal($id)
    {
        $user = User::find($id);
        return view(default_template() . '.pages.modal.editModal.edit_email_details', compact('user'));
    }
    public function edit_address_detail_modal($id)
    {
        $address = Address::find($id);

        return view(default_template() . '.pages.modal.editModal.edit_address_detail', compact('address'));
    }
    public function edit_contact_detail_modal($id)
    {
        $user = User::find($id);
        return view(default_template() . '.pages.modal.editModal.edit_contact_detail', compact('user'));
    }
    public function edit_membership_detail_modal($id)
    {
        $membership = Membership::find($id);
        $card = SectionLookup::where('section', '=', 'id_card_type')->where('is_deleted', 0)->first();
        $card_types = Lookup::where('section_id', $card->id)->where('is_deleted', 0)->get();
        $user = User::find($id);
        // dd($membership);

        // dd($user);
        return view(default_template() . '.pages.modal.editModal.edit_membership_detail', compact('user', 'card_types', 'membership'));
    }


    /**
     * Return edit updated value modal
     * @param Request $request, String $personalInformation, int $id
     * @return update value
     */
    public function update_personal_info(Request $request, String $personalInformation, int $id)
    {
        switch ($personalInformation) {
            case 'personalDetail':
                $user = User::find($id);
                $member = Member::where('user_id', $user->id)->where('is_deleted', 0)->first();
                $member->date_of_birth = $request->date_of_birth;
                $member->place_of_birth = $request->place_of_birth;
                $member->marital_status = $request->marital_status;
                $member->ann_date = $request->ann_date;
                $member->sex = $request->gender;
                $member->religion = $request->religion;
                $member->race = $request->race;
                $member->nationality = $request->nationality;
                $member->updated_at = date('Y-m-d H:i:s');
                $member->useru_id = auth()->check() ? auth()->id() : NULL;
                $member->save();


                return response()->json(["message" => 'Updated successfully.']);
            case 'contactDetail':
                // dd($request->all());
                $user = User::find($id);
                $member = Member::where('user_id', $user->id)->where('is_deleted', 0)->first();
                $member->mobile_no = $request->mobile_no;
                $member->home_phone_no = $request->home_phone_no;
                $member->office_phone_no = $request->office_phone_no;
                $member->personal_email = $request->personal_email;
                $member->office_email = $request->office_email;
                $member->other_email = $request->other_email;
                $member->save();
                return response()->json(["message" => 'Updated successfully.']);

            case 'addressDetail':
                $address = Address::find($id);
                // dd($address);
                $address->add1 = $request->add1;
                $address->add2 = $request->add2;
                $address->city = $request->city;
                $address->state = $request->state;
                $address->zip = $request->zip;
                $address->county = $request->county;
                $address->address_type = $request->address_type;
                $address->country = $request->country;
                $address->save();
                return response()->json(["message" => 'Updated successfully.']);

            case 'membershipDetail':
                
                $rules = validation_value('edit_membership_form');
                $this->validate($request, $rules);
                $membership = Membership::find($id);
                $membership->id_card_type = $request->id_card_type;
                $membership->id_card_no = $request->id_card_no;
                $membership->issued_place = $request->issued_place;
                $membership->issued_date = $request->issued_date;
                $membership->exp_date = $request->exp_date;
                $membership->issue_authority = $request->issue_authority;
                $membership->save();
                return response()->json(["message" => 'Updated successfully']);
            
            case 'emailDetail':
                return $this->update_email_detail($request, $id);

            case 'userImageTitle':
                $rules = validation_value('edit_personal_profile_form');
                $this->validate($request, $rules);
                $user = User::find($id);
                $member = Member::where('user_id', $user->id)->where('is_deleted', 0)->first();
                // dd($member);
                $member->first_name = $request->first_name;
                $member->middle_name = $request->middle_name;
                $member->last_name = $request->last_name;
                $user->email = $request->email;
                $member->mobile_no = $request->mobile_no;
                $user->roles()->sync($request->role);
                $user->save();
                $member->save();

                return redirect()->route('user.profile', ['id' => $user->id]);
        }
    }
    
    public function update_email_detail(Request $request, $id)
    {
        \DB::beginTransaction();
            try{
                $mail = UserEmail::where('user_id', $id)->first();
                if($mail){
                    $mail->email = $request->email?:$mail->email;
                    $mail->email_from = $request->email_from?:$mail->email_from;
                    $mail->server = $request->mail_server?:$mail->server;
                    $mail->password = Crypt::encryptString($request->password);
                    $mail->mail_type = $request->mail_type?:$mail->mail_type;
                    $mail->auth = $request->auth?(int)$request->auth:$mail->auth;
                    $mail->is_ssl = $request->is_ssl?(int)$request->is_ssl:$mail->is_ssl;
                    $mail->is_tls = $request->is_tls?(int)$request->is_tls:$mail->is_tls;
                    $mail->update();
                    $message = "Mail Setting Updated Sucessfully";
                }
                else {
                    $mail = new UserEmail;
                    $mail->email = $request->email;
                    $mail->user_id = $id;
                    $mail->email_from = $request->email_from;
                    $mail->server = $request->mail_server;
                    $mail->password = Crypt::encryptString($request->password);
                    $mail->mail_type = $request->mail_type;
                    $mail->auth = (int)$request->auth;
                    $mail->is_ssl = (int)$request->is_ssl;
                    $mail->is_tls = (int)$request->is_tls;
                    $mail->save();
                    $message = "Mail Setting Created Sucessfully";
                }
            \DB::commit();
            return response()->json([
                "message" => $message,
                "data" => $id
            ]);     
        } 
        catch (\Exception $e) 
        {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }
}
