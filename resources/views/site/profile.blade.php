@extends('site.layouts.site')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{auth()->user()->name}}'s profile</h4>
                </div>
                <div class="card-body">
                    <div class="d-block mx-auto w-100 text-center mb-4">
                        <img src="https://picsum.photos/200" alt="" class="img-fluid img-rounded">
                    </div>
                    <ul class="list-group">
                       <li class="list-group-item">
                           <i class="fa fa-user"> {{auth()->user()->name}}</i>
                       </li>
                        <li class="list-group-item">
                            <i class="fa fa-envelope"></i> {{auth()->user()->email}}
                        </li>
                        <a href="{{route('post.list')}}" class="list-group-item">
                            <i class="fa fa-list"></i> Post List
                        </a>
                    </ul>
                </div>
            </div>
        </div>
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
            <form action="{{route('post.create')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title*</label>
                    <input type="text" name="title" placeholder="Enter Title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle*</label>
                    <input type="text" name="subtitle" placeholder="Enter subtitle" class="form-control" value="{{old('subtitle')}}">
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" class="form-control" placeholder="Enter post details.">{{old('details')}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Create!</button>
                </div>
            </form>
        </div>
    </div>
@stop
