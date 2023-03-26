<?php

namespace App\Http\Controllers\PublicBackend;

use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        return view('public-theme.templates.pages.homepage.homepage');
    }
}
