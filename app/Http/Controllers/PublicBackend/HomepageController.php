<?php

namespace App\Http\Controllers\PublicBackend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('public-theme.templates.pages.homepage.homepage', compact('categories'));
    }
}
