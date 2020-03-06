<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function updateComment($comment){
        return $this->update([
            'comment' => $comment
        ]);
    }
}
