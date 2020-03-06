<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExtrasStreetLevel extends Model
{
    protected $table = "extra_options";
    protected $guarded = [];
    protected $with = ['extraOption'];
    protected $appends = ['question_label'];

    public function getQuestionLabelAttribute(){
        return $this->question->label ?: $this->question->question;
    }

    public function extraOption()
    {
        return $this->belongsTo(ExtraQuestion::class, 'question_id');
    }

    /**
     * Appropriate name used
     *
     * @return void
     */
    public function question(){
        return $this->belongsTo(ExtraQuestion::class, 'question_id');
    }
    
}
