<?php

namespace App\Http\Controllers\AdminBackend;

use Illuminate\Http\Request;

use Str;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;

class CategoriesController extends Controller
{

    protected $uploads_path = '/uploads/category/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin-theme.templates.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-theme.templates.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $image = ['image_path' => null];

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $filename = time() . Str::slug($file->getClientOriginalName(), '-');
            $file->move(public_path() . $this->uploads_path, $filename);

            $image['image_path'] = $this->uploads_path . $filename;
        }

        $category = Category::create(array_merge($image, $request->only(Category::getTableColumnsNames())));

        return redirect()->route('admin.categories.index')->with('success', 'Запис успішно збережено');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin-theme.templates.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, string $id)
    {
        $category = Category::find($id);

        $category->update($request->only(array_keys($category->getAttributes())));

        return redirect()->route('admin.categories.edit', $id)->with('success', 'Запис успішно збережено');
    }

    /**
     * Delete image of the specified resource.
     */
    public function destroyImage(Request $request, string $id)
    {
        return redirect()->route('admin.categories.edit', $id)->with('success', 'Зображення успішно видалено');
    }
}
