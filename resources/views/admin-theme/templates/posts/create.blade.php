@extends('admin-theme.layout')

@section('content')
<div class="container col-12">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header stincky">
                    <div class="d-flex justify-content-between">
                        <div>
                            Створення посту
                        </div>
                        <div class="d-flex">
                            <a href="{{route('admin.posts.index')}}" class="btn btn-block btn-outline-dark" title="Повернутись до списку постів">
                                <i class="fas fa-undo"></i>
                            </a>
                        </div>
                    </div> 
                </div>

                <div class="card-body">
                    <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data" id="category">
                        {!! csrf_field() !!}

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Зображення посту</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile02" value="{{ old('image') }}">
                            <label class="custom-file-label" for="inputGroupFile02">Оберіть файл</label>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Заголовок</span>
                          </div>
                          <input type="text" class="form-control translit"  name="title" value="{!! old('title') !!}">
                        </div>

                        <div class="form-group">
                            <label>Текст</label>
                            <textarea class="form-control" name="text">{!! old('text') !!}</textarea>
                        </div>
 
                        <fieldset>
                            <legend>Категорії</legend>

                            @foreach($categories as $category)
                                <input type="checkbox" id="id{{$category->id}}" name="categories_ids[]" value="{{$category->id}}" @if(in_array($category->id, old('categories_ids', []))) checked="true" @endif >
                                <label for="id{{$category->id}}">{{$category->title}}</label><br>
                            @endforeach
                        </fieldset>                      

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Створити</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection