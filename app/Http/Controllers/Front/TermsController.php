<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class TermsController extends Controller
{

    public function index() {

        // $page_data = Page::where('id', 1)->first();
        $page_data = Page::all();
        return view('front.terms', compact('page_data'));

    }

}
