@extends('public-theme.layout')
@section('meta')
    <title>Каталог</title>
@endsection
@section('homepage-page-head-part')
    <link href="{{ asset('/assets/pages/homepage/_style.css') }}" rel="stylesheet">
@endsection

@section('body')
<body>
    @include('public-theme.templates.widgets.pages-header.index')

    <div data-group="page_content" data-role="wrapper" class="content_wrapper">
        <h1>Каталог</h1>

        <div class="row">
            @foreach($categories as $category)
                <div data-group="categories_list" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{route('categories.show',$category->id)}}" data-role="item" class="border_is_width flex column text_center">
                        <div data-role="item_image" class="text_center flex_centered_item">
                            @if(!empty($category->image_path))
                                <img src="{{$category->image_path}}">
                            @else
                                <img src="/assets/common/images/folder-information-outline.svg">
                            @endif
                        </div>
                        <div data-role="title" class="flex_centered_item">
                            <span>{{$category->title}}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</body>
@endsection