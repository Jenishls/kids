<?php

namespace App\Http\Controllers\Audit;

use App\User;
use App\Model\Audit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuditController extends Controller
{
  public function auditlist()
  {
    // dd(request()->route()->action);
    return view(default_template() . '.pages.audit.index');
  }

  public function auditdata(Request $request)
  {

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
    $audit = Audit::when($request->sort, function ($q, $sort) {
      if ($sort['field'] !== 'user_name') {
        return $q->orderBy($sort['field'], $sort['sort']);
      } else {
        return $q;
      }
    })
      ->when($request->query, function ($s_query) use ($find) {
        if (count($find) > 0 && $find['value'] != '')
          return $s_query->where($find['row'], 'like', '%' . $find['value'] . '%');
      })
      ->get();
    foreach ($audit as $ad) {
      $user = User::where('id', $ad->userc_id)->first();
      $ad->user_name = $user->name;
    }
    if ($request->sort['field'] === 'user_name') {
      if ($request->sort['sort'] === 'asc') {
        array_sort($audit->toArray());
      } else {
        array_reverse($audit->toArray());
      }
    }
    return $audit;
  }



  public function globalAuditView(string $table_name, string $new_data)
  {
    $audit_details = Audit::where('table_name', $table_name)->where('new_data', 'like', $new_data . '%')->get();
    foreach ($audit_details as $ad) {
      $user = User::where('id', $ad->userc_id)->first();
      $ad->user_name = $user->name;
    }
    return view(default_template() . '.pages.audit.modal.global_audit_view', compact('audit_details'));
  }
}
