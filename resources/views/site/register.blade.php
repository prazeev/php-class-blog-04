@extends('site.layouts.site')
@section('title','Register ZooM')
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3>Register to Zoom</h3>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('user.register')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Enter name" class="form-control" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Email" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="password">Reenter Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Enter re password">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-md" type="submit">Login!</button>
                </div>
            </form>
        </div>
    </div>
@endsection
