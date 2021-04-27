<!Doctype html>
<html>
<head>
    <title>@yield('page-title', 'Welcome to My Blog')</title>

    <link rel="stylesheet" href={{ asset('vendor/bootstrap/css/bootstrap.css') }}>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
          integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
          crossorigin="anonymous"/>
</head>

<body>
<header class="header">
    <div>
        <a href=" {{route('home')}} " class="brand_name"> Sports daily</a>
    </div>

    <ul class="nav_links">
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
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>



<script src="https://cdn.tiny.cloud/1/hubqjd1imap7ms04s2aztlyqat95zf11c8g8489g083o2zc4/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#tinymce',
        width: 1000,
        height: 300,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullpage | ' +
            'forecolor backcolor emoticons | help',
        menu: {
            favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help',
        content_css: 'css/content.css'
    });
</script>
</body>
</html>
