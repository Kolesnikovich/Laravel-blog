@extends('layouts.layout')

@section('title', "$post->title | Laravel Blog")

@section('content')
    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="/">Main</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('categories.single', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                </li>
                <li class="breadcrumb-item active">{{ $post->title }}</li>
            </ol>

            <span class="color-yellow"><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}"
                                          title="">{{$post->category->title}}</a></span>

            <h3>{{ $post->title }}</h3>

            <div class="blog-meta big-meta">
                <small><a href="{{ route('categories.single', $post->category->slug) }}"
                          title="">{{ $post->category->title }}</a></small>
                <small>{{ $post->getDate() }}</small>
                <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
            </div><!-- end meta -->

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                class="down-mobile">Share on Facebook</span></a></li>
                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                class="down-mobile">Tweet on Twitter</span></a></li>
                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->

        <div class="single-post-media">
            <img src="{{ $post->getImage() }}" alt="thumbnail" class="img-fluid">
        </div><!-- end media -->

        <div class="blog-content" style="max-width: max-content">
            {!! $post->content !!}
        </div><!-- end content -->

        <div class="blog-title-area">
            @if($post->tags->count())
                <div class="tag-cloud-single">
                    <span>Tags</span>
                    @foreach($post->tags as $tag)
                        <small><a href="{{ route('tags.single', ['slug' => $tag->slug]) }}"
                                  title="">{{ $tag->title }}</a></small>
                    @endforeach
                </div><!-- end meta -->
            @else
                <div class="tag-cloud-single">
                    <span>No tags for this title</span>
                </div><!-- end meta -->
            @endif
        </div><!-- end title -->

    </div><!-- end page-wrapper -->
@endsection
