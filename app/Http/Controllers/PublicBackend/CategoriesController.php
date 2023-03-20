<?php

namespace App\Http\Controllers\PublicBackend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        return view('public-theme.templates.pages.category.category', compact('category'));
    }
}
