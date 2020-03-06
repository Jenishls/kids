<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MembershipFormRequest;
use App\User;
use App\Model\Member;
use App\Model\Address;
use App\Model\Lookup\Lookup;
use App\Model\Lookup\SectionLookup;
use App\Model\Membership;

class UserProfileAddController extends Controller
{
    protected $membership_modal_path = "support.pages.modal.addModal";

    /**
     * Get a View of Add Membership Modal for user
     * @param int $id
     * @return modal
     */
    public function add_membership_modal(int $id)
    {
        $card = SectionLookup::where('section', '=', 'id_card_type')->where('is_deleted', 0)->first();
        $card_types = NULL;
        if ($card) {

            $card_types = Lookup::where('section_id', $card->id)->where('is_deleted', 0)->get();
        }
        $user = User::find($id);
        return view(default_template() . '.pages.modal.addModal.add_membership_modal', compact('card', 'user', 'card_types'));
    }
    /**
     * Get a View of Address Modal for user
     * @param int $id
     * @param int $user
     * @return add-address-modal view
     */
    public function add_address_details(int $id, int $user)
    {
        return view(default_template() . '.pages.modal.addModal.add-address-modal', [
            "user_id" => $user,
            "member" => $id,
        ]);
    }
    public function add_new_address(Address $address, Request $request)
    {
        $data = $request->except(['_token']);
        $arr = [
            'userc_id' => auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $new = array_merge($data, $arr);
        $address->insert($new);
        if (!$address)
            return response()->json(['message' => 'Sorry. Something went wrong.']);
        return response()->json(['message' => 'Added successfully.']);
    }

    /**
     * Return user id
     * @param int $uid
     * @return JSON
     */
    public function membershipDatatable(Request $request, $uid)
    {

        $model = Membership::where('user_id', (int) $uid)
            ->where('is_deleted', 0);
        $sort = '';
        $field = '';
        $find = [];
        $pages = $request->pagination['page'];
        if ($request->input('query')) {
            $search = $request->input('query');
            foreach ($search as $key => $value) {
                $find['row'] = $key;
                $find['value'] = $value;
            }
        }
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        }
        $data = $model
            ->when($request->sort, function ($q, $sort) {
                return $q->orderBy($sort['field'], $sort['sort']);
            })
            ->get();

        return response()->json($data);
    }

    /**
     * Return Memebership data for given user
     * @param int Request $request
     * @return JSON
     */
    public function add_membership(MembershipFormRequest $request)
    {
        // $rules = validation_value('add_membership_form');
        // // dd($rules);
        // $this->validate($request, $rules);
        $count = count($request->id_card_type);
        if ($count >= 1) {
            foreach ($request->id_card_type as $key => $value) {
                $mem = new Membership();
                $mem->user_id = (int) $request->this_user_id;
                $mem->id_card_type = $request->id_card_type[$key];
                $mem->id_card_no = $request->id_card_no[$key];
                $mem->issued_place = $request->issued_place[$key];
                $mem->issued_date = $request->issued_date[$key];
                $currentDate = date('Y-m-d');
                $mem->exp_date = $request->exp_date[$key];
                $mem->issue_authority = $request->issue_authority[$key];
                $mem->save();
            }
        }
        // $user = User::find($id);
        return response()->json(["message" => 'Added successfully.']);
    }

    public function section_look_up()
    {
        // $data = SectionLookup::where('section', '=', 'id_card_type')->with('lookups')->get();
        // return dd($data);
        $data = SectionLookup::leftJoin('lookups', 'section_lookups.id', 'lookups.section_id')
            ->select('lookups.value', 'lookups.section_id')
            ->where('section_lookups.section', 'id_card_type')
            ->get();

        // $id_card_type = Membership::select('id_card_type')
        //     ->where('id_card_type', '<>', NULL)
        //     ->distinct()->get();
        return response()->json($data);
    }

    /**
     * Get the view of Look Up Modal
     * @param Request $request, String $personalInformation, int $id
     * @return Modal
     */

    public function add_modal(String $addModal, int $id)
    {
        switch ($addModal) {

            case 'id_card_look_up':
                return $this->id_card_look_up($id);
            case 'add_new_card_type':
                return $this->add_new_card_type($id);
            default:
                return 'Error';
        }
    }

    /**
     * Get a View of Add Look up Modal for user
     * Return user id
     * @param int $id
     * @return add new card type modal
     */
    public function id_card_look_up(int $id)
    {
        $card = SectionLookup::select('id')->where('section', '=', 'id_card_type')->where('is_deleted', 0)->first();
        return view(default_template() . '.pages.modal.addModal.id_card_look_up', compact('id', 'card'));
    }
    public function add_new_card_type(int $id)
    {
        $membership = Membership::find($id);
        return view(default_template() . '.pages.modal.addModal.add_new_card_type', compact('membership', 'id'));
    }
    public function store_new_card_type(Request $request, Lookup $lookup)
    {
        $card = SectionLookup::where('section', '=', 'id_card_type')->where('is_deleted', 0)->first();
        $request->validate([
            'value' => 'required'
        ]);
        $data = $request->all();
        $array = [
            'created_at' => date('Y-m-d H:i:s'),
            'userc_id' => auth()->id(),
            'code' => 'id_card_type',
            'section_id' => $card->id,
        ];
        $add = array_merge($data, $array);
        $lookup->insert($add);
        if (!$lookup) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Added Successfully!']);
    }
}
