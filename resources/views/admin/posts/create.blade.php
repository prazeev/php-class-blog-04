@extends('adminlte::page')

@section('title', 'Create Post')

@section('content_header')
    <h1>Create Post</h1>
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
                        Create a new post
                    </h3>
                </div>
                <div class="box-body">
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">
                                Title*
                            </label>
                        <input type="text" class="form-control" placeholder="Enter title." name="title" required="required" id="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description*</label>
                        <textarea name="description" id="description" class="form-control summernote" id="description" placeholder="Enter description." required="required">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="slug">
                                Slug*
                            </label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter slug.." value="{{old('slug')}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md pull-right">Create!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

