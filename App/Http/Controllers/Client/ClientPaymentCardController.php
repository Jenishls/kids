<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;

class ClientPaymentCardController extends Controller
{
    

    /**
     * Get filtered/Payment Card Data with pagination
     * @param - Request Object,Client Model (RMB)
     * @return - Meta data with Data
     */
    public function list(Request $request, Client $client)
    {
       
        $page = $request->pagination['page'] ?: 1;
        $perPage = $request->pagination['perpage'] ?: 20;
        $offset = ($page - 1) * $perPage;
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        }else {
            $sort = '';
            $field = '';
        }
        $query = $client->paymentProfiles();;
        $query->when($request->sort, function ($q, $sort) use ($request) {
            return $q->orderBy($sort['field'], $sort['sort']);
        });
        $total = $query->count();
        $paginatedBuilder =  $query->limit($perPage)->offset($offset);
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
}
