@extends('site.layouts.site')
@section('title','Login ZooM')
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3>Login to Zoom</h3>
        </div>
        <div class="panel-body">
            <form action="{{route('user.login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-md" type="submit">Login!</button>
                </div>
            </form>
        </div>
    </div>
@endsection
