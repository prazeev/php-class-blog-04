@extends('adminlte::page')

@section('title', 'Edit Categories')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Edit category
                    </h3>
                </div>
                <div class="box-body">
                    <form action="{{route('category.update',[$category->id])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">
                                Title*
                            </label>
                        <input type="text" class="form-control" placeholder="Enter title." name="title" required="required" id="title" value="{{$category->title}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description*</label>
                            <textarea name="description" id="description" class="form-control summernote" id="description" placeholder="Enter description." required="required">{{$category->description}}</textarea>
                        </div>
                        <div class="checkbox">
                            <strong>Status</strong><br>
                            <input type="radio" name="status" value="1"{{$category->status ? " checked='checked'" : null}}> Active
                            <input type="radio" name="status" value="0"{{!$category->status ? " checked='checked'" : null}}> InActive
                        </div>
                        <div class="form-group">
                            <label for="slug">
                                Slug*
                            </label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter slug.." value="{{$category->slug}}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md pull-right">Edit!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

