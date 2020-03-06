<?php

namespace App\Http\Controllers\AccountHead;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccountHead;
use App\Model\AccountSubHead;
use App\Model\AccountSubHeadItem;

class AddController extends AccountHeadController
{
    public function addAccountHeadModal()
    {
        return view(default_template() . ".pages.accounthead.add.add-acc-head");
    }

    public function addSubheadModal()
    {
        $acc_heads = AccountHead::where('is_deleted', 0)->get();
        return view(default_template() . ".pages.accounthead.add.add-acc-subhead", compact('acc_heads'));
    }

    public function addSubheadItemsModal()
    {
        $acc_heads = AccountHead::where('is_deleted', 0)->get();
        return view(default_template() . ".pages.accounthead.add.add-acc-subhead-item", compact('acc_heads'));
    }

    /**
     * Create New Account Head Entry
     *
     * @param Request $request
     * @return void
     */
    public function createAccHead(Request $request)
    {
        $data = $request->except(['_token', 'type']);
        $arr = [
            'created_at' => date('Y-m-d H:i:s'),
            'userc_id' => auth()->id() ?: 0,
            'type' => strtoupper($request->type),
        ];
        $add = array_merge($data, $arr);
        $acc_head = AccountHead::insert($add);
        if (!$acc_head) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Added Successfully']);
    }

    /**
     * Create new account subhead entry
     *
     * @param Request $request
     * @return void
     */
    public function createSubHead(Request $request)
    {
        $data = $request->except(['_token']);
        $arr = [
            'userc_id' => auth()->id() ?: 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $add = array_merge($data, $arr);
        $subhead = AccountSubHead::insert($add);
        if (!$subhead) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Added Successfully']);
    }

    /**
     * Create New Account Subhead Item
     *
     * @param Request $request
     * @return void
     */
    public function createSubheadItem(Request $request)
    {
        $data = $request->except(['_token']);
        $arr = [
            'userc_id' => auth()->id() ?: 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $add = array_merge($data, $arr);
        $subheaditem = AccountSubHeadItem::insert($add);
        if (!$subheaditem) {
            return response(['message' => 'Sorry. Something went wrong'], 500);
        }
        return response(['message' => 'Added Successfully']);
    }
}
