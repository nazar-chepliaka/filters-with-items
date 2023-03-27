@extends('public-theme.layout')
@section('meta')
    <title>{{$post->title}}</title>
@endsection
@section('post-page-head-part')
    <link href="{{ asset('/assets/pages/post/_style.css') }}" rel="stylesheet">
    <link href="{{ asset('editor/editormd.min.css') }}" rel="stylesheet">
@endsection

@section('body')
    <div data-group="page_content" data-role="wrapper">
        <h1>{{$post->title}}</h1>

        <div id="editor">
            @if(!empty($post->image_path))
                <img src="{{$post->image_path}}" data-role="main_image">
            @endif
            <textarea style="display:none;" name="text">{!! $post->text !!}</textarea>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {

            var testView = editormd.markdownToHTML("editor", {
                tex              : true,
                tocm             : true,
                emoji            : true,
                taskList         : true,
                codeFold         : true,
                searchReplace    : true,
                htmlDecode       : "style,script,iframe",
                flowChart        : true,
                sequenceDiagram  : true,
                path : "/editor/lib/",
            });

        });
    </script>

    <script src="{{ asset('editor/editormd.min.js') }}"></script>
    <script src="{{ asset('editor/lib/codemirror/codemirror.min.js') }}"></script>
    <script src="{{ asset('editor/lib/flowchart.min.js') }}"></script>
    <script src="{{ asset('editor/lib/jquery.flowchart.min.js') }}"></script>
    <script src="{{ asset('editor/lib/raphael.min.js') }}"></script>
    <script src="{{ asset('editor/lib/underscore.min.js') }}"></script>
    <script src="{{ asset('editor/lib/marked.min.js') }}"></script>
    <script src="{{ asset('editor/lib/prettify.min.js') }}"></script>
    <script src="{{ asset('editor/lib/sequence-diagram.min.js') }}"></script>
@endsection