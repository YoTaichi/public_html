<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="/css/navbar.css">
    <!-- Summernote CSS - CDN Link -->
    <link rel="stylesheet" href="/css/summernote-lite.css">

    <!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
    <!-- //Summernote CSS - CDN Link -->
    <!-- icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <!-- live2D -->
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/live2dDemo-master/Samples/TypeScript/Demo/live2d/assets/waifu.css" />

    @yield('head')
</head>

<body style="background-image:url(/img/background.png) ; background-size:auto; background-repeat:round;">
    @include('nav/navbar')
    @yield('content')



    <!-- 懸浮裘依 -->
    <div class=" btn-group dropstart d-none d-sm-block">
        <!-- 本體 -->
        <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false" style="
            position: fixed;
            bottom: -25.0rem;right: -4rem;box-shadow:none;">
            <!-- <img src="/img/ball2.png" class="img-fluid" alt="..."> -->
            <div class="waifu">
                <div class="waifu-tips"></div>
                <canvas id="live2d" width="400" height="900" class="live2d"></canvas>
            </div>
        </button>


        <ul class="dropdown-menu list-group-flush">
            <!-- 簽到 -->
            <li><a class="dropdown-item" id="test">早安</a></li>
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">修改資料</a></li>
            <li>
                <a class="dropdown-item" id="gg" aria-current="page" data-bs-target="#sign_in" data-bs-toggle="modal">123</a>
            </li>
            <!-- 瑟瑟選擇 -->
            @if($data['sex_set'] === 0)
            <li><a class="dropdown-item" href="{{ route('articles.sex_all') }}">全部</a></li>
            <li><a class="dropdown-item" href="{{ route('articles.sex_only')}}">我要瑟瑟</a></li>
            <li><a class="dropdown-item active" href="{{ route('articles.sex_no') }}">一般</a></li>
            @elseif($data['sex_set'] === 1)
            <li><a class="dropdown-item" href="{{ route('articles.sex_all') }}">全部</a></li>
            <li><a class="dropdown-item active" href="{{ route('articles.sex_only')}}">我要瑟瑟</a></li>
            <li><a class="dropdown-item" href="{{ route('articles.sex_no') }}">一般</a></li>
            @else
            <li><a class="dropdown-item active" href="{{ route('articles.sex_all') }}">全部</a></li>
            <li><a class="dropdown-item" href="{{ route('articles.sex_only')}}">我要瑟瑟</a></li>
            <li><a class="dropdown-item" href="{{ route('articles.sex_no') }}">一般</a></li>
            @endif
            <!-- 登出 -->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
    </div>


    <!-- Live2DCubismCore script -->
    <script src="/js/Core/live2dcubismcore.js"></script>
    <!-- Build script -->
    <script src="/live2dDemo-master/Samples/TypeScript/Demo/dist/meidou_live2d.js"></script>
    <script src="/live2dDemo-master/Samples/TypeScript/Demo/live2d/assets/waifu-tips.js"></script>
    <script type="text/javascript">
        //必选参数
        let remoteurl = "127.0.0.1:8000/"
        let modulesPath = "/live2dDemo-master/Samples/TypeScript/Demo/live2d/models/"
        //modulesPath = remoteurl
        let modelNames = ['Ball'] //注意，这里的名字是存放你模型文件的主目录的名字，目录中的moc3.json文件的名字一定要与目录同名
        //可选参数
        let waifuTipsUrl = "/live2dDemo-master/Samples/TypeScript/Demo/live2d/assets/waifu-tips.json"
        initModel(modulesPath, modelNames, waifuTipsUrl);
    </script>
    <!-- summernote -->
    <script type="text/javascript" src="/js/summernote-lite.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>
