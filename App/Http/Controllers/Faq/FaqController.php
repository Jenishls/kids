<?php

namespace App\Http\Controllers\Faq;

use Carbon\Carbon;
use App\Model\Faq;
use App\Model\FaqReply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        
        return view(default_template() . ".pages.faq.index");
    }

    public function addFaqModal()
    {
        $latest = Faq::orderBy('seq', 'DESC')->first();
        $seq = 1;
        if ($latest) {
            $seq = $latest->seq + 1;
        }
        
        return view(default_template() . '.pages.faq.modals.addFaqModal', compact('seq'));
    }

    public function editFaqModal(int $id)
    {
        $faq = Faq::find($id);
        return view(default_template() . '.pages.faq.modals.editFaqModal', compact('faq'));
    }

    /**
     * Faq table search sort pagination
     * @param Request $request
     * @return search and sort
     */
    public function faqList(Request $request)
    {
        $model = Faq::where('is_deleted', 0);
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
        $page = $model
            ->when($request->sort, function ($q, $sort) {
                return $q->orderBy($sort['field'], $sort['sort']);
            })
            ->when($request->query, function ($s_query) use ($find) {
                if (count($find) > 0)
                    return $s_query->where($find['row'], 'like', '%' . $find['value'] . '%');
            })
            ->get();
        return $page;
    }

    public function storeFaq(Request $request)
    {
        // dd($request->all());
        $rules = validation_value('faqs_form');
        $this->validate($request, $rules);
        $faq = Faq::create([
            'question' => $request->question,
            'seq' => $request->sequence,
            'created_at' => date('Y-m-d H:i:s'),
            'userc_id' => auth()->id(),
            'is_faq' => 1,
            'is_active' => 1
        ]);

        $faq_reply = FaqReply::create([
            'faq_id' =>$faq->id,
            'answer' => $request->answer,
            'created_at' => date('Y-m-d H:i:s'),
            'userc_id' => auth()->id()
        ]);
    }


    public function updateFaq(Request $request, int $id)
    {
        $faq = Faq::find($id);
        $rules = validation_value('update_faqs_form');
        $this->validate($request, $rules);
        $faq->update([
            'question' => $request->question,
            'seq' => $request->sequence,
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id()
        ]);

        $faq->faqAnswer->update([
            'answer' => $request->answer,
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id()
        ]);
    }

    public function deleteFaq($id)
    {

        $faq = Faq::find($id);
        $faq->update([
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id() ?: 0
        ]);
    }
}
