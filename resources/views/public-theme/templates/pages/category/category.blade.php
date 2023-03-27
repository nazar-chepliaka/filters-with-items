@extends('public-theme.layout')
@section('meta')
    <title>Категорія: «{{$category->title}}»</title>
@endsection
@section('category-page-head-part')
    <link href="{{ asset('/assets/pages/category/_style.css') }}" rel="stylesheet">
@endsection

@section('body')

    <div data-group="page_content" data-role="wrapper">
        <h1>Категорія: «{{$category->title}}»</h1>

        <div data-group="posts_list">
            @foreach($category->posts as $post)
                <div data-role="item" class="border_is_width flex">
                    {{-- <div data-role="item_image" class="text_center">
                        <a href="{{route('posts.show',$post->id)}}">
                            @if(!empty($post->image_path))
                                <img src="{{$post->image_path}}">
                            @else
                                <img src="/assets/common/images/folder-information-outline.svg">
                            @endif
                        </a>
                    </div> --}}
                    <div class="basis_0 grow">
                        <a href="{{route('posts.show',$post->id)}}" data-role="title">
                            {{$post->title}}
                        </a><br>
                        <p>{{$post->description}}</p>
                        <div class="text_right">
                            <a href="{{route('posts.show',$post->id)}}">
                                Переглянути >
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection