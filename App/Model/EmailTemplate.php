<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    public function getTempHtmlAttribute()
    {
        return html_entity_decode($this->attributes['temp_html']);
    }
}
