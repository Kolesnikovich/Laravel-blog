<div class="sidebar">
    @if(!Request::is('/'))
        <div class="widget">
            <div class="newsletter-widget text-center align-self-center">
                <h3 style="color: #fafafa">@if(!Auth::check())
                        Register / Login
                    @elseif(Auth::check())
                        Logout
                    @endif
                </h3>
                <p style="color: #fafafa">Click the button below to continue.</p>
                <a href="@if(!Auth::check()) {{ route('login') }} @elseif(Auth::check()) {{ route('logout') }} @endif"
                   class="btn btn-default btn-block">Go</a>
            </div><!-- end newsletter -->
        </div>
    @endif
    <div class="widget">
        <h2 class="widget-title">Popular Posts</h2>
        <div class="blog-list-widget">
            <div class="list-group">
                @foreach($popular_posts as $post)
                    <a href="{{ route('posts.single', $post->slug) }}"
                       class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{ $post->getImage() }}" alt="post" class="img-fluid float-left">
                            <h5 class="mb-1">{{ $post->title }}</h5>
                            <small>{{ $post->getDate() }}</small>
                            <small><i class="fa fa-eye"></i>{{ $post->views }}</small>
                        </div>
                    </a>
                @endforeach
            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Categories</h2>
        <div class="link-widget">
            <ul>
                @foreach($categories_side as $category)
                    <li><a href="{{ route('categories.single', $category->slug) }}">{{ $category->title }} <span>({{ $category->posts_count }})</span></a>
                    </li>
                @endforeach
            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div><!-- end sidebar -->
