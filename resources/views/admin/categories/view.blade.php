@extends('adminlte::page')

@section('title', 'View Category')

@section('content_header')
    <h1>{{$category->title}}</h1>
@stop

@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$category->title}}</h3>
                    <a href="{{route('category.edit',[$category->id])}}" class="btn btn-sm btn-primary pull-right">Edit</a>
                </div>
                <div class="box-body">
                    <p>
                        {!! $category->description !!}
                    </p>
                    <table class="table-primary table table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>{{$category->title}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{$category->status ? 'Active': 'In Active'}}</td>
                            </tr>
                            <tr>
                                <td>Slug</td>
                                <td>{{$category->slug}}</td>
                            </tr>
                            <tr>
                                <td>Created at</td>
                                <td>{{date('M d, Y', strtotime($category->created_at))}}</td>
                            </tr>
                            <tr>
                                <td>Updated at</td>
                                <td>{{date('M d, Y', strtotime($category->updated_at))}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
