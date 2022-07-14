<!Doctype html>
<html>
<head>
    <title>@yield('page-title', 'Welcome to My Blog')</title>

{{--    <link rel="stylesheet" href="{{ secure_asset('vendor/css/style.css') }}/">--}}

    <link rel="stylesheet" href="./css/main.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
              integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
              crossorigin="anonymous"/>
</head>

<body>
<main class="container">

    <div class="navbar">
        <div>
            <a href=" {{route('home')}} " class="brand_name"> Sports Daily</a>
        </div>

        <div>
            <ul class="nav-links">
{{--                @can('create', \App\Models\Post::class)--}}
{{--                    <li>--}}
{{--                        <a href="{{route('create')}}" class="addpost"> Add-post</a>--}}
{{--                    </li>--}}
{{--                @endcan--}}

                @if(auth()->user()->is_admin)

                        <li>
                            <a href="{{route('create')}}" class="addpost"> Add-post</a>
                        </li>

                    @endif

                <li>
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <button class="logout">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

{{--    <div class="cell cell-2">--}}
{{--     <h2>Most Recent Posts</h2>--}}
{{--        @foreach($recentPosts as $recentPost)--}}
{{--            <p class="recent-post"> {{ $recentPost->title }} </p>--}}
{{--        @endforeach--}}
{{--    </div>--}}

    <div class="content">
        @foreach($posts as $post)
            @can('view-any', $post)
                <a href="{{ route('show', $post->id) }}" class="post-title">
                    <h4>{{ $post->title }}</h4>

                    <p class="post-content">
                        {{ substr(strip_tags($post->content), 0,300) }}{{ strlen(strip_tags($post->content)) > 300 ? "..." : "" }}
                        <span class="more">read more..</span>
                    </p>
                </a>
            @endcan
        @endforeach
    </div>

{{--    <div class="cell cell-4">--}}
{{--        <h2>Most Popular Posts</h2>--}}
{{--        @foreach($popularPosts as $popularPost)--}}
{{--            <p class="recent-post">{{ $popularPost->title }} </p>--}}

{{--        @endforeach--}}
{{--    </div>--}}
{{--    <div class="cell cell-5">--}}
{{--        <div>--}}
{{--            <a href="#"><i class="fab fa-facebook-f"></i></a>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <a href="https://twitter.com/Mo_jallo" target="_blank"><i class="fab fa-twitter"></i></a>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <a href="#"><i class="fab fa-instagram"></i></a>--}}

{{--        </div>--}}
{{--    </div>--}}
</main>
</body>




