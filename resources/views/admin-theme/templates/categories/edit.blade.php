@extends('admin-theme.layout')

@section('content')
<div class="container col-12">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header stincky">
                    <div class="d-flex justify-content-between">
                        <div>
                            Редагування категорії
                        </div>
                        <div class="d-flex">
                            <a href="{{route('admin.categories.index')}}" class="btn btn-block btn-outline-dark" title="Повернутись до списку категорій"><i class="fas fa-undo"></i></a>
                        </div>
                    </div> 
                </div>

                <div class="card-body">
                    <form action="{{route('admin.categories.update',$category)}}" method="POST" enctype="multipart/form-data" id="category">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Зображення категорії</span>
                          </div>
                          <div class="input-group-append">
                                @if(!empty($category->image_path))
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
                                <div class="col-6"><img src="{{$category->image_path}}"></div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Назва</span>
                          </div>
                          <input type="text" class="form-control" name="title" value="{!! old('title',$category->title) !!}">
                        </div>

                        <div class="form-group">
                            <label>Описание</label>
                            <textarea class="form-control" name="description">{!! old('description',$category->description)!!}</textarea>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Оновити</button>
                        </div>
                    </form>

                    <form action="{{ route('admin.categories.image.destroy',$category->id)}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;" id="delete-image">
                        {!! csrf_field() !!}
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
@endsection
