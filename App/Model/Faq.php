<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $guarded = [];
    protected $with = ['faqAnswer'];
    
    public function faqReplies()
    {
        return $this->hasMany(FaqReply::class, 'faq_id', 'id');
    }

    public function faqAnswer(){
        return $this->hasOne(FaqReply::class, 'faq_id', 'id');
    }

    public function scopeIsFaq($query){
        return $query->where('is_faq', 1);
    }

}
