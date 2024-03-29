@extends('admin-theme.layout')

@section('content')
<div class="container col-12">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header stincky">
                    <div class="d-flex justify-content-between">
                        <div>
                            Категорії
                        </div>
                        <div class="d-flex">
                            <a href="{{route('admin.categories.create')}}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Створити</a>
                        </div>
                    </div> 
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 73px;"><h5>#</h5></th>
                                <th scope="col"><h5>Назва</h5></th>
                                <th scope="col"><h5>Зображення</h5></th>
                                <th scope="col" style="width: 73px;"></th>
                                <th scope="col" style="width: 73px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->title}}</td>

                                <td>
                                    @if($category->image_path) 
                                        <img height="45px" width="45px" src="{{$category->image_path}}"> 
                                    @endif 
                                </td>

                                <td class="options-td">
                                    <div class="d-flex flex-right options-wrapper">

                                        <div class="pl-2 pr-2 options-btn-wrapper">
                                            <a href="{{route('admin.categories.edit',$category->id)}}" class="btn custom-btn-tool custom-default" title="Редагувати">
                                                <span><i class="fas fa-edit"></i></span>
                                            </a>
                                        </div>

                                    </div>
                                </td>

                                <td class="options-td">
                                    <div class="d-flex flex-right options-wrapper">

                                        <div class="pl-2 pr-2 options-btn-wrapper">
                                            <form action="{{ route('admin.categories.destroy',$category)}}" method="POST" onsubmit="return confirm('Видалити?') ? true : false;">
                                                {!! csrf_field() !!}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn custom-btn-tool custom-danger">
                                                    <span><i class="fas fa-trash-alt" title="Видалити"></i></span>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="col-12 mt-4">
                        <div class="row flex-right">
                            <a href="{{route('admin.categories.create')}}" class="btn btn-primary">
                                <i class="fa fa-fw fa-plus"></i>
                                Створити
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection