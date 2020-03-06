<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Member;
use App\Model\Address;
use App\Model\Membership;

class userProfileController extends Controller
{
    protected $profile_menu_path = "support.pages.userControl.inc";
    //profile view

    public function personalInfo(int $id)
    {
        $user = User::find($id);
        $addresses = Address::where('member_id', $user->member->id)->where('is_deleted', 0)->get();
        return view(default_template() . '.pages.userControl.inc.personal-info', compact('user', 'addresses'));
    }
    public function changePassword(int $id)
    {
        $user = User::find($id);
        return view(default_template() . '.pages.userControl.inc.change-password', compact('user'));
    }
    public function membership(int $id)
    {
        $user = User::find($id);
        return view(default_template() . '.pages.userControl.inc.membership', compact('user'));
    }
    
    public function userEmail(int $id)
    {
        $user = User::find($id);
        return view(default_template() . '.pages.userControl.inc.emailSetting', compact('user'));
    }

    // sidebar menu tab of user profile
    public function user_profile_sidebar(string $profile_sidebar, int $id)
    {
        switch ($profile_sidebar) {
            case 'userPersonalInfo':
                return $this->personalInfo($id);
            case 'userPasswordInfo':
                return $this->changePassword($id);
            case 'userMembershipInfo':
                return $this->membership($id);
            case 'userEmailInfo':
                return $this->userEmail($id);
            default:
                return Error;
        }
    }

    //delete address detail modal
    public function delete_address_modal(int $id)
    {
        $address = Address::find($id);
        return view(default_template() . '.pages.modal.deleteModal.delete_address_detail', compact('address'));
    }
    public function delete_address($id)
    {
        $address = Address::find($id);
        $address->is_deleted = 1;
        $address->userd_id = auth()->id();
        $address->deleted_at = date('Y-m-d H:i:s');
        $address->save();
    }
    /**
     * Delete Membership data
     * @param int $id
     * @return membership
     */
    public function deleteMembership(int $id)
    {
        $membership = Membership::find($id);
        $membership->is_deleted = 1;
        $membership->userd_id = auth()->id();
        $membership->deleted_at = date('Y-m-d H:i:s');
        $membership->save();
    }
}
