@extends('public-theme.layout')
@section('meta')
    <title>Головна</title>
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
            <div data-group="categories_list" data-role="item" class="col-xs-12 col-sm-6 col-md-3 col-lg-3 border_is_width">
                Налаштування середовища
            </div>
        </div>
    </div>

</body>
@endsection