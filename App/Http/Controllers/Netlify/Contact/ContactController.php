<?php

namespace App\Http\Controllers\Netlify\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ComponentsTrait;

class ContactController extends Controller
{
    use ComponentsTrait;
    public function index()
    {
        $components = $this->components('Contact');
        $meta  = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($meta);
        return view('frontend.netlify.pages.contact.index', compact('components'));
    }
}
