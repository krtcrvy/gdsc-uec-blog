<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     */
    public function index(): View
    {
        return view('home.index');
    }

    public function about(): View
    {
        return view('home.about');
    }
}
