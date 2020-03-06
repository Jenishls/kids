<?php

namespace App\Http\Controllers\PreferredTime;

use App\Model\PreferredTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PreferredTimeAddController extends PreferredTimeController
{
    /**
     * modal
     * @return - modal view
     */
    public function addTimeModal()
    {
        return view(default_template() . '.pages.preferredTime.modal.addTimeModal');
    }

    public function addTypeModal()
    {

        return view(default_template() . '.pages.preferredTime.modal.addTypeModal');
    }

    /**
     * Adds new Type
     *
     * @param Request $request
     * @param PreferredTime $type
     * @return index
     */
    public function storeType(Request $request, PreferredTime $type)
    {
        $request->validate([
            'type' => 'required',

            // 'seq' => 'unique:extra_options'

        ]);
        $arr = [
            'userc_id' => auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $add = array_merge($req, $arr);
        $type->insert($add);
        return $this->index();
    }

    /**
     * Store new Time
     *
     * @param Request $request
     * @return index
     */
    public function storeTime(Request $request)
    {
        $request->validate([
            'from.*' => 'required',
            'to.*' => 'required',
            'time_flag.*' => 'required'

            // 'seq' => 'unique:extra_options'

        ]);
        foreach ($request->from as $key => $value) {
            $latest = PreferredTime::orderBy('seq', 'DESC')->first();

            $pref_time = new PreferredTime;
            $pref_time->type = $request->type[$key];
            $pref_time->from = $value;
            if ($latest) {
                $pref_time->seq = ((int) $latest->seq) + 1;
            } else {
                $pref_time->seq = 1;
            }
            $pref_time->to = $request->to[$key];
            $pref_time->time_flag = $request->time_flag[$key];
            $pref_time->created_at = date('Y-m-d H:i:s');
            $pref_time->userc_id = Auth::id();
            $pref_time->save();
        }

        return response()->json([
            "message" => "Time added Successfully."
        ]);
    }
}
