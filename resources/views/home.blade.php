<!Doctype html>
<html>
<head>
    <title>@yield('page-title', 'Welcome to My Blog')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{asset("css/main.css")}}"/>
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

</main>
</body>




