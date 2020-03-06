<?php

namespace App\Http\Controllers\Enquiry;

use App\Http\Controllers\Client\ClientAddController;
use App\Model\Enq;
use App\Model\Contact;
use Illuminate\Http\Request;
use App\Lib\Filter\ContactFilter;
use App\Http\Controllers\Controller;
use App\Model\Client;

class EnquiryController extends Controller
{
    public function index()
    {
        return view(default_template() . ".pages.enquiry.index");
    }

    public function viewEnqModal(int $id)
    {   
        $enq = Enq::find($id);
        return view(default_template() . '.pages.enquiry.modal.contact_detail_view_modal', compact('enq'));
    }

    public function add()
    {   
        return view(default_template() . '.pages.enquiry.modal.add-enquiry');
    }

    public function store(Request $request){
        $this->validate($request, [
            'reason' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'desc' => 'required'
        ]);
        return Enq::create(array_merge(["userc_id" => auth()->id()], $request->all()));
    }

    public function enquiries(Request $request)
    {
        $page = $request->pagination['page'] ?: 1;
        $perPage = $request->pagination['perpage'] ?: 50;
        $offset = ($page - 1) * $perPage;
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        } else {
            $sort = '';
            $field = '';
        }
        $query = Enq::where("is_deleted", 0)->whereNotNull('type')->orderByDesc('created_at');
        $query->when($request->sort, function ($q, $sort) use ($request) {
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $queryFilter = new ContactFilter($request);
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

    public function convertToClient(Enq $enquiry){
        $client = [
            "fname" => $enquiry->fname,
            "lname" => $enquiry->lname,
            "email" => $enquiry->email,
            "phone_no" => $enquiry->phone,
            ""
        ];
        
        dd($client);
    }

    public function client(array $client){
        return Client::create($client);
    }
    
}
