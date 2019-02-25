@extends('site.layouts.site')
@section('content')
<!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h3>{{$post->title}}</h3>
          {!! $post->details !!}
        </div>
      </div>
    </div>
  </article>
  <hr>
    <div class="container">
        <div class="row">
            <div class="col-mg-8 col-md-10 mx-auto">
                <p class="post-meta">Posted by: {{$post->user->name}} on {{date('F j, Y', strtotime($post->created_at))}}</p>
            </div>
        </div>
    </div>
@endsection
