<!Doctype html>
<html>
<head>
    <title></title>
{{--    <link rel="stylesheet" href={{ secure_asset('vendor/bootstrap/css/bootstrap.cs') }}>--}}
    <link rel="stylesheet" href="/css/show.css">
</head>
<body class="container">
<header class="navbar">
    <div>
        <a href=" {{route('home')}} " class="brand_name"> Sports Daily</a>
    </div>

    <div>
        <ul class="nav-links">
{{--            @can('create', \App\Models\Post::class)--}}
{{--                <li>--}}
{{--                    <a href="{{route('create')}}"> Add-post</a>--}}
{{--                </li>--}}
{{--            @endcan--}}



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
</header>
<main class="main-content">
    <section class="post-content">
        <p>{!! $post->content !!}</p>
    </section>

        <p class="timeline">Added {{ $post->created_at->diffForHumans() }}

        </p>

    <section class="edit-delete">
{{--        @can('update',$post)--}}
{{--            <a href="{{route('edit', $post->id )}}" class="edit-button">--}}
{{--                edit--}}
{{--            </a>--}}
{{--        @endcan--}}
{{--        --}}

        @if(auth()->user()->is_admin)

                <a href="{{route('edit', $post)}}" class="edit-button">
                    edit
                </a>
        @endif


        @if(auth()->user()->is_admin)

            <form method="post" action="{{route('delete', $post->id)}}">
                @csrf
                @method('DELETE')
                <input type="submit" value="delete" class="delete-button    ">
            </form>
        @endif


{{--        @can('delete',$post)--}}
{{--            <form method="post" action="{{route('delete', $post->id)}}">--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                <input type="submit" value="delete" class="delete-button    ">--}}
{{--            </form>--}}
{{--        @endcan--}}
    </section>


<section class="comments">
        @include('comments._form')


        <h4 class="comments-header">Comments</h4>
        @foreach($post->comments as $comment)
            <div class="comment-content">
                <div class="commenter">  {{auth()->user()->name}}:</div>

                {{ $comment->content }}</div>
    @endforeach
</section>
</main>


</body>

</html>


