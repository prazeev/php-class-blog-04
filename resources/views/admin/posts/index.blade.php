@extends('adminlte::page')

@section('title', 'Create Categories')

@section('content_header')
    <h1>Category List</h1>
@stop

@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Categories List</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-primary table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-flat">Action</button>
                                            <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{route('category.show',[$category->id])}}">View</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('category.edit', [$category->id])}}">Edit</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="{{route('category.destroy', [$category->id])}}" class="bg-red">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
