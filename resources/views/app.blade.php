@extends('template')
@section('content')

<!--NavBar-->
@include('nav/navbar')
<!--內容-->
<div class="container-fluid mt-3">
    <div class="row">
        <!--左邊切版-->
        <div class="col-lg-1">bloc 1/3</div>
        <!--中間切版-->
        <div class="col-lg-9 p-0">
            <div id="container" class="container p-0">
                @include('article/article')
            </div>
        </div>
        <!--右邊切版-->
        <div class="col-lg-2">bloc 3/3</div>
    </div>
</div>
<!-- 懸浮裘依 -->
<div class="btn-group dropstart ">
    <button type="button" class="btn " data-bs-toggle="dropdown" aria-expanded="false" style="
    width: 220px;height: auto;position: fixed;
    bottom: -30rem;right: 0.5rem;box-shadow:none;">
        <img src="/img/Ball2.png" class="img-fluid" alt="...">
    </button>
    <ul class="dropdown-menu list-group-flush">
        @if($sex_set === 0)
        <li><a class="dropdown-item" href="{{ route('articles.sex_all') }}">全部</a></li>
        <li><a class="dropdown-item" href="{{ route('articles.sex_only')}}">我要瑟瑟</a></li>
        <li><a class="dropdown-item active" href="{{ route('articles.sex_no') }}">一般</a></li>
        @elseif($sex_set === 1)
        <li><a class="dropdown-item" href="{{ route('articles.sex_all') }}">全部</a></li>
        <li><a class="dropdown-item active" href="{{ route('articles.sex_only')}}">我要瑟瑟</a></li>
        <li><a class="dropdown-item" href="{{ route('articles.sex_no') }}">一般</a></li>
        @else
        <li><a class="dropdown-item active" href="{{ route('articles.sex_all') }}">全部</a></li>
        <li><a class="dropdown-item" href="{{ route('articles.sex_only')}}">我要瑟瑟</a></li>
        <li><a class="dropdown-item" href="{{ route('articles.sex_no') }}">一般</a></li>
        @endif
    </ul>
</div>

@stop