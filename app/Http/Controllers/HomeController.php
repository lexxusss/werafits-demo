<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('debug')) {
            dd($request->all());
        }
        return view('frontend.pages.index');
    }
}
