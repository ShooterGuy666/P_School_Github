@extends('user/app')

@section('bg-img',asset('user/img/post-bg.jpg'))

@section('head')

<!--PrismJS Stylesheet-->
<link rel="stylesheet" href="{{ asset('user/css/prism.css') }}">

@endsection

@section('title', $post->title)

@section('sub-heading', $post->subtitle)

@section('main-content')

<!-- Post Content -->

<!-- Facebook Plugin -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v6.0"></script>

<article>
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto">
              <!-- Article Header-->
                <small class="float-left">Created at {{$post->created_at->diffForHumans() }}</small>
                  @foreach ($post->categories as $category)
                    <small class="float-right" style="margin-right: 20px;">

                    <a href="">{{ $category->name }}</a>

                    </small>
                  @endforeach
                <!-- Body -->
                {!! htmlspecialchars_decode($post->body) !!}


                <!-- Tag Clouds-->
                <h3>Tag Clouds</h3>
                @foreach ($post->tags as $tag)
                    <small class="float-left" style="margin-right: 20px;border-radius: 5px; border: 1px solid gray;
                    padding: 5px;">

                   <a href="">{{ $tag->name }}</a>

                    </small>
                  @endforeach
                
            </div>
              <!-- Facebook Comments-->
              <div class="fb-comments" data-href="{{ Request:: url() }}" data-width="" data-numposts="5"></div>
        </div>
    </div>
</article>

<hr>

@section('footer')

<!--PrismJS-->
<script src="{{ asset('user/js/prism.js') }}"></script>

@endsection

@endsection
