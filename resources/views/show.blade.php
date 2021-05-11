<!Doctype html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href={{ asset('vendor/bootstrap/css/bootstrap.css') }}>
    <link rel="stylesheet" href="{{ asset('vendor/css/show.css') }}">
</head>
<body>
<header class="nav-bar">
    <div>
        <a href=" {{route('home')}} " class="brand_name"> Sports Daily</a>
    </div>

    <div>
        <ul class="nav-links">
            @can('create', \App\Models\Post::class)
                <li>
                    <a href="{{route('create')}}"> Add-post</a>
                </li>
            @endcan

            <li>
                <form method="post" action="{{route('logout')}}">
                    @csrf
                    <button class="logout">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</header>
<main class="container">
    <section class="post-content">
        <p>{!! $post->content !!}</p>
    </section>

        <p>Added {{ $post->created_at->diffForHumans() }}

        </p>

    <section class="edit-delete">
        @can('update',$post)
            <a href="{{route('edit', $post->id )}}" class="edit-button">
                edit
            </a>
        @endcan

        @can('delete',$post)
            <form method="post" action="{{route('delete', $post->id)}}">
                @csrf
                @method('DELETE')
                <input type="submit" value="delete" class="delete-button    ">
            </form>
        @endcan
    </section>


<section class="comments">
        @include('comments._form')

        <h4>Comments</h4>
        @foreach($post->comments as $comment)
            <div class="comment-content">{{ $comment->content }}</div>
    @endforeach
</section>
</main>


</body>

</html>


