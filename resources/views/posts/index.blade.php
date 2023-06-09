@extends('layouts.layout')

@section('title', 'Laravel Blog | Main')

@section('header')
    <section id="cta" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 align-self-center">
                    <h2>A digital marketing blog</h2>
                    <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis.
                        Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus
                        rhoncus rutrum. Integer et ornare mauris.</p>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="newsletter-widget text-center align-self-center">
                        <h3 style="color: #fafafa">@if(!Auth::check()) Register / Login @elseif(Auth::check()) Logout @endif
                        </h3>
                        <p style="color: #fafafa">Click the button below to continue.</p>
                        <a href="@if(!Auth::check()) {{ route('login') }} @elseif(Auth::check()) {{ route('logout') }} @endif" class="btn btn-default btn-block">Go</a>
                    </div><!-- end newsletter -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="blog-custom-build">
            @foreach($posts as $post)
                <div class="blog-box wow fadeIn">
                    <div class="post-media">
                        <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">
                            <img src="{{ $post->getImage() }}" alt="post" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div>
                            <!-- end hover -->
                        </a>
                    </div>
                    <!-- end media -->
                    <div class="blog-meta big-meta text-center">
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                            class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                            class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div><!-- end post-sharing -->
                        <h4><a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">{{ $post->title }}</a></h4>
                        <p>{!! $post->description !!}</p>
                        <small><a href="{{ route('categories.single', $post->category->slug) }}" title="">{{ $post->category->title }}</a></small>
                        <small>{{ $post->getDate() }}</small>
                        <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->

                <hr class="invis">
            @endforeach
        </div>
    </div>

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                {{ $posts->links() }}
{{--                <ul class="pagination justify-content-center">--}}
{{--                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="#">Next</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
