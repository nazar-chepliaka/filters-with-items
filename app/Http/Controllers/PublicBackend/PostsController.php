<?php

namespace App\Http\Controllers\PublicBackend;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        return view('public-theme.templates.pages.post.post', compact('post'));
    }
}
