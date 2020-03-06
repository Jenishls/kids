<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;
use App\Model\EmailLog;
use App\Lib\Filter\EmailLogFilter;
use App\User;
use Illuminate\Support\Facades\File;
use Response;

class MailViewController extends Controller
{
    public function compose($id){
		$setting = User::find(auth()->id())->emailSetting;
    	return view('supportNew.pages.mail.modal.compose', compact('id', 'setting'));
    }
    
    public function viewMail(EmailLog $mail){
		$setting = User::find(auth()->id())->emailSetting;
    	return view('supportNew.pages.mail.modal.viewmail', compact('mail', 'setting'));
    }

    public function mailData(Request $request, $table, $id){
    	$page = $request->pagination['page'] ?: 1;
    	$perPage = $request->pagination['perpage'] ?: 50;
    	$offset = ($page - 1) * $perPage;
    	if ($request->sort) {
    	    $sort = $request->sort['sort'];
    	    $field = $request->sort['field'];
    	}else {
    	    $sort = '';
    	    $field = '';
        }
		$query = EmailLog::select('*')->where("table_id", $id)->where("table", $table)->where("is_deleted", 0);
    	$query->when($request->sort, function ($q, $sort) use ($request) {
			if ($sort['field'] === "customer_name") {
                return $q->join('clients as c', 'c.id', 'invoice_heads.client_id')->orderBy('c.fname', $sort['sort']);
			}
			// elseif($sort['field'] === "client.contact.phone_no"){
            //     return $q->join('clients as c', 'c.id', 'orders.client_id')->orderBy('phone_no', $sort['sort']);
			// }
			// elseif($sort['field'] === "package.package_name"){
            //     return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('package_name', $sort['sort']);
			// }
			// elseif($sort['field'] === "package.price"){
            //     return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('price', $sort['sort']);
			// }
    	    return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	$queryFilter = new EmailLogFilter($request);
    	$queryBuilder = $queryFilter->getQuery($query);
    	$total = $queryBuilder->count();
    	$paginatedBuilder =  $queryBuilder->limit($perPage)
    	    ->offset($offset);
    	$data['meta'] = [
    	    "page" => $request->pagination["page"],
    	    "pages" => ceil($total / $perPage),
    	    "perpage" => $perPage,
    	    "total" => $total,
    	    "sort" => $sort,
    	    "field" => $field,
    	];
    	$data['data'] = $paginatedBuilder->get();
    	return response()->json($data);
    }

    public function allUserMails(){
        $mails = Client::where('is_deleted', 0)
        ->select('email')
        ->get();
		$arr = [];
        foreach($mails as $mail){
			if(!is_null($mail->email)){
				array_push($arr, $mail->email);
			}
        }
        return json_encode($arr);
	}

	// view attachment file
	public function attachment($file)
    {
        $path = storage_path('mail/' . $file);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
