<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq()
    {
       $faq = Faq::all();
       return view('guest.faq',compact('faq'));
    }
}
