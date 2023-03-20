@extends('admin-theme.layout')

@section('content')
<div class="container col-12">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header stincky">
                    <div class="d-flex justify-content-between">
                        <div>
                            Редагування посту
                        </div>
                        <div class="d-flex">
                            <a href="{{route('admin.posts.index')}}" class="btn btn-block btn-outline-dark" title="Повернутись до списку категорій"><i class="fas fa-undo"></i></a>
                        </div>
                    </div> 
                </div>

                <div class="card-body">
                    <form action="{{route('admin.posts.update',$post)}}" method="POST" enctype="multipart/form-data" id="post">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Зображення посту</span>
                          </div>
                          <div class="input-group-append">
                                @if(!empty($post->image_path))
                                    <div class="btn btn-outline-secondary" data-toggle="collapse" data-target="#image" aria-expanded="false" aria-controls="image">Переглянути</div>
                                    <button class="btn  btn-outline-secondary btn-delete button-delete-image" title="Удалить" data-field="image">Видалити</button>
                                @endif
                            </div>
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Оберіть файл</label>
                          </div>
                        </div>

                        <div class="collapse mb-3" id="image">
                            <div class="card card-body">
                                <div class="col-6"><img src="{{$post->image_path}}"></div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Заголовок</span>
                          </div>
                          <input type="text" class="form-control" name="title" value="{!! old('title',$post->title) !!}">
                        </div>

                        <div class="form-group">
                            <label>Опис</label>
                            <textarea class="form-control" name="description">{!! old('description',$post->description)!!}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Текст</label>
                            <div id="editor">
                                <!-- Tips: Editor.md can auto append a `<textarea>` tag -->
                                <textarea style="display:none;" name="text">{!! old('text',$post->text)!!}</textarea>
                            </div>
                        </div>
 
                        <fieldset>
                            <legend>Категорії</legend>

                            @foreach($categories as $category)
                                <input type="checkbox" id="id{{$category->id}}" name="categories_ids[]" value="{{$category->id}}" @if(in_array($category->id, old('categories_ids', $post->categories->pluck('id')->toArray()))) checked="true" @endif >
                                <label for="id{{$category->id}}">{{$category->title}}</label><br>
                            @endforeach
                        </fieldset>  

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Оновити</button>
                        </div>
                    </form>

                    <form action="{{ route('admin.posts.image.destroy',$post->id)}}" method="POST" onsubmit="return confirm('Видалити?') ? true : false;" id="delete-image">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="image" value="" id="image-field">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
    <script>
        $('.button-delete-image').click(function(e){
            e.preventDefault();
            $('#image-field').val($(this).attr('data-field'));
            $('#delete-image').submit();
        });
    </script>

    <script type="text/javascript">
    $(function() {
        var editor = editormd("editor", {
            // width: "100%",
            height: 500,
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
            lang: {
            name : "en",
            description : "Open source online Markdown editor.",
            tocTitle    : "Table of Contents",
            toolbar : {
                undo             : "Undo(Ctrl+Z)",
                redo             : "Redo(Ctrl+Y)",
                bold             : "Bold",
                del              : "Strikethrough",
                italic           : "Italic",
                quote            : "Block quote",
                ucwords          : "Words first letter convert to uppercase",
                uppercase        : "Selection text convert to uppercase",
                lowercase        : "Selection text convert to lowercase",
                h1               : "Heading 1",
                h2               : "Heading 2",
                h3               : "Heading 3",
                h4               : "Heading 4",
                h5               : "Heading 5",
                h6               : "Heading 6",
                "list-ul"        : "Unordered list",
                "list-ol"        : "Ordered list",
                hr               : "Horizontal rule",
                link             : "Link",
                "reference-link" : "Reference link",
                image            : "Image",
                code             : "Code inline",
                "preformatted-text" : "Preformatted text / Code block (Tab indent)",
                "code-block"     : "Code block (Multi-languages)",
                table            : "Tables",
                datetime         : "Datetime",
                emoji            : "Emoji",
                "html-entities"  : "HTML Entities",
                pagebreak        : "Page break",
                watch            : "Unwatch",
                unwatch          : "Watch",
                preview          : "HTML Preview (Press Shift + ESC exit)",
                fullscreen       : "Fullscreen (Press ESC exit)",
                clear            : "Clear",
                search           : "Search",
                help             : "Help",
                info             : "About "
            },
            buttons : {
                enter  : "Enter",
                cancel : "Cancel",
                close  : "Close"
            },
            dialog : {
                link : {
                    title    : "Link",
                    url      : "Address",
                    urlTitle : "Title",
                    urlEmpty : "Error: Please fill in the link address."
                },
                referenceLink : {
                    title    : "Reference link",
                    name     : "Name",
                    url      : "Address",
                    urlId    : "ID",
                    urlTitle : "Title",
                    nameEmpty: "Error: Reference name can't be empty.",
                    idEmpty  : "Error: Please fill in reference link id.",
                    urlEmpty : "Error: Please fill in reference link url address."
                },
                image : {
                    title    : "Image",
                    url      : "Address",
                    link     : "Link",
                    alt      : "Title",
                    uploadButton     : "Upload",
                    imageURLEmpty    : "Error: picture url address can't be empty.",
                    uploadFileEmpty  : "Error: upload pictures cannot be empty!",
                    formatNotAllowed : "Error: only allows to upload pictures file, upload allowed image file format:"
                },
                preformattedText : {
                    title             : "Preformatted text / Codes", 
                    emptyAlert        : "Error: Please fill in the Preformatted text or content of the codes."
                },
                codeBlock : {
                    title             : "Code block",         
                    selectLabel       : "Languages: ",
                    selectDefaultText : "select a code language...",
                    otherLanguage     : "Other languages",
                    unselectedLanguageAlert : "Error: Please select the code language.",
                    codeEmptyAlert    : "Error: Please fill in the code content."
                },
                htmlEntities : {
                    title : "HTML Entities"
                },
                help : {
                    title : "Help"
                }
            }
        }
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
