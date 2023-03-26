<?php

namespace App\Http\Controllers\AdminBackend;

use Illuminate\Http\Request;

use Str;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminBackend\PostFormRequest;
use App\Models\Post;
use App\Models\Category;
use App\Traits\deleteFile;

class PostsController extends Controller
{
    use deleteFile;

    protected $uploads_path = '/uploads/posts/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin-theme.templates.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin-theme.templates.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        $image = ['image_path' => null];

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $filename = time() . Str::slug($file->getClientOriginalName(), '-') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . $this->uploads_path, $filename);

            $image['image_path'] = $this->uploads_path . $filename;
        }

        $post = Post::create(array_merge($image, $request->only(Post::getTableColumnsNames())));

        if ($request->filled('categories_ids')) {
            $post->categories()->sync($request->categories_ids);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Запис успішно збережено');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin-theme.templates.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, string $id)
    {
        $post = Post::find($id);

        $image = ['image_path' => $post->image_path];

        if (request()->hasFile('image')) {
            $this->deleteFile($post->image_path);

            $file = request()->file('image');
            $filename = time() . Str::slug($file->getClientOriginalName(), '-') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . $this->uploads_path, $filename);

            $image['image_path'] = $this->uploads_path . $filename;
        }

        $post->update(array_merge($image, $request->only(array_keys($post->getAttributes()))));

        $post->categories()->sync([]);

        if ($request->filled('categories_ids')) {
            $post->categories()->sync($request->categories_ids);
        }

        return redirect()->route('admin.posts.edit', $id)->with('success', 'Запис успішно збережено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $this->deleteFile($post->image_path);
        $post->categories()->sync([]);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Запис успішно вилучено');
    }

    /**
     * Delete image of the specified resource.
     */
    public function destroyImage(Request $request, string $id)
    {
        $post = Post::find($id);
        $this->deleteFile($post->image_path);

        $post->image_path = null;
        $post->save();

        return redirect()->route('admin.posts.edit', $id)->with('success', 'Зображення успішно видалено');
    }
}
