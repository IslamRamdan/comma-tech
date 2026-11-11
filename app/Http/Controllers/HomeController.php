<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the homepage.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the "About Us" page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the services page.
     */
    public function services()
    {
        return view('services');
    }
}
