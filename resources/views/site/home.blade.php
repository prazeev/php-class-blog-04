@extends('site.layouts.site')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @if(count($posts) == 0)
                <h3>Nothing to show</h3>
            @endif
            @foreach($posts as $post)
            <div class="post-preview">
                <a href="{{route('single.page',[$post->category->slug, $post->slug])}}">
                    <h2 class="post-title">
                        {{$post->title}}
                    </h2>
                    <h3 class="post-subtitle">
                        {{str_limit($post->details, 50, '...')}}
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">{{$post->user->name}}</a>
                    {{date('F j, Y', strtotime($post->created_at))}}</p>
            </div>
            <hr>
            <!-- Pager -->
            @endforeach
            <div class="clearfix">
               {{$posts->links()}}
            </div>
        </div>
    </div>
@stop
