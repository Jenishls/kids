<?php

namespace App\Http\Controllers\AccountHead;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccountHead;
use App\Model\AccountSubHead;
use App\Model\AccountSubHeadItem;

class EditController extends AccountHeadController
{
    public function editAccHeadModal(int $id)
    {
        $acc_head = AccountHead::find($id);
        return view(default_template() . ".pages.accounthead.edit.edit-acc-head", compact('acc_head'));
    }

    /**
     * Update Account Head
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function updateAccHead(Request $request, int $id)
    {
        $acc_head = AccountHead::find($id);
        $data = $request->except(['_token', 'type']);
        $arr = [
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
            'type' => strtoupper($request->type),
        ];
        $update = array_merge($data, $arr);
        $acc_head->update($update);
        if (!$acc_head) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Updated Successfully']);
    }

    public function deleteAccHead(int $id)
    {
        $acc_head = AccountHead::find($id);
        $acc_head->update([
            'is_deleted' => 1,
            'userd_id' => auth()->id() ?: 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);
        if (!$acc_head) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Deleted Successfully']);
    }


    // Subhead

    public function editSubHeadModal(int $id)
    {
        $acc_heads = AccountHead::where('is_deleted', 0)->get();
        $subhead =  AccountSubHead::find($id);
        return view(default_template() . ".pages.accounthead.edit.edit-acc-subhead", compact('subhead', 'acc_heads'));
    }

    /**
     * Update Account Sub Head
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function updateSubhead(Request $request, int $id)
    {
        $subhead = AccountSubHead::find($id);
        $data = $request->except(['_token']);
        $arr = [
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
        ];
        $update = array_merge($data, $arr);
        $subhead->update($update);
        if (!$subhead) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Updated Successfully']);
    }

    public function deleteSubhead(int $id)
    {
        $subhead = AccountSubHead::find($id);
        $subhead->update([
            'is_deleted' => 1,
            'userd_id' => auth()->id() ?: 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);
    }


    // Subhead Items
    public function editSubheadItemModal(int $id)
    {
        $subhead_item = AccountSubHeadItem::find($id);
        return view(default_template() . ".pages.accounthead.edit.edit-acc-subhead-item", compact('subhead_item'));
    }

    /**
     * Update Account Sub Head Item
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function updateSubHeadItem(Request $request, int $id)
    {
        $sub_item = AccountSubHeadItem::find($id);
        $data = $request->except(['_token']);
        $arr = [
            'useru_id' => auth()->id() ?: 0,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $update = array_merge($data, $arr);
        $sub_item->update($update);
        if (!$sub_item) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Updated Successfully']);
    }

    public function deleteSubHeadItem(int $id)
    {
        $sub_item = AccountSubHeadItem::find($id);
        $sub_item->update([
            'is_deleted' => 1,
            'userd_id' => auth()->id() ?: 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
