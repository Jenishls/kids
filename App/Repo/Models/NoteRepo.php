<?php

namespace App\Repo\Models;

use App\Model\Note;
use App\Repo\BaseRepo;

class NoteRepo extends BaseRepo
{
    protected $eloquent;

    public function __construct(Note $note)
    {
        $this->eloquent = $note;
    }
   
}