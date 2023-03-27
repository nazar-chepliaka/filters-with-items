<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        @yield('meta')
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <script src="{{ asset('/assets/common/js/manifest.js') }}"></script>
        <script src="{{ asset('/assets/common/js/app.js') }}"></script>

        @yield('homepage-page-head-part')
        @yield('category-page-head-part')
        @yield('post-page-head-part')
    </head>

    <body>
        @include('public-theme.templates.widgets.pages-header.index')

        
        {{-- <div data-group="breadcrumbs" data-role="wrapper" class="content_wrapper flex valign_center">
            <a href="{{route('homepage')}}">
                @include('svg.home') 
            </a> 
            <span data-role="divider">/</span> 
            <span>
                {{$post->title}}
            </span>
        </div> --}}
        
        @yield('breadcrumbs')

        <div class="content_wrapper">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div data-group="sidebar_content" data-role="wrapper">
                        <strong>Категорії сайту:</strong>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="{{route('categories.show',$category->id)}}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    
                    @yield('body')

                </div>
            </div>
        </div>
       

    </body>
</html>