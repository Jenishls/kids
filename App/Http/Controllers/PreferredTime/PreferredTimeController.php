<?php

namespace App\Http\Controllers\PreferredTime;

use App\Model\PreferredTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PreferredTimeController extends Controller
{
    protected $path = 'supportNew.pages.preferredTime.';

    /**
     * Content Controller operates in the content table(Model)
     */
    /**
     * Index function returns the main View(table view)
     * @param - NULL
     * @return - index page rendered view.
     */
    public function index()
    {
        $time_types = PreferredTime::select('type', 'id')->groupBy('type')->where('is_deleted', 0)->get();
        return view($this->path . 'index', compact('time_types'));
    }

    /**
     * list function returns the data to dateTable(JSON)
     * @param - Request object
     * @return - JSON Data(for Datatable)
     */
    public function list(Request $request, string $type)
    {
        $model = PreferredTime::where(['is_deleted' => 0, 'type' => $type])->get();
        return $model;
    }

    public function editTimeModal(int $id)
    {
        $location = PreferredTime::find($id);
        return view(default_template() . '.pages.preferredTime.modal.editTimeModal', compact('location'));
    }

    public function editTypeModal(int $id)
    {
        $type = PreferredTime::find($id);
        return view(default_template() . '.pages.preferredTime.modal.editTypeModal', compact('type'));
    }



    /**
     * Update Time data
     * @param int $id
     * @return preferred time
     */
    public function updateTime(Request $request, int $id)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'seq' => 'required',
            'time_flag' => 'required'
        ]);
        $location = PreferredTime::find($id);
        $arr = [
            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $update = array_merge($req, $arr);
        $location->update($update);
        if (!$location) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }

    /**
     * Delete Time data
     * @param int $id
     * @return delete 
     */
    public function deleteMenu(int $id)
    {

        $time = PreferredTime::find($id);
        $time->update([
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id() ?: 0
        ]);
    }
}
