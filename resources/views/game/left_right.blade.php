@extends('template')
@section('content')
<!--NavBar-->
<nav class="navbar navbar-expand-lg navbar-light navbg ">
  <div class="container-fluid ">
    <div class="col-auto">
      <!-- LOGO -->
      <a class="navbar-brand" href="/articles">
        <img src="/img/instand.svg" alt="" class="instand" width="100" height="30">
      </a>
    </div>
    <!-- 登出按鈕 -->
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{ __('Log Out') }}
      </x-dropdown-link>
    </form>
        <!-- 錢 -->
    <div class="col " id="money">
      <div class="row justify-content-star">
        <div class="col-lg-auto pe-0 text-light">
          <img src="/img/money2.png" alt="" style="height:20px;">
          {{ Auth::user()->money }}
        </div>
        <!-- 鑽 -->
        <div class="col-lg-auto text-light">
          <img src="/img/gem2.png" alt="" style="height:20px;">
          {{ Auth::user()->diamond }}
        </div>
      </div>
    </div>
    <div class="col-auto text-end ">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 ms-auto mb-lg-0">
        <!-- id -->
        <li class="nav-item">
          <a class="nav-link text-light" href="#">{{ Auth::user()->name }}</a>
        </li>
        <li class="nav-item">
          <!-- 彈出黑名單 -->
          <a class="nav-link active text-light" aria-current="page"  href="#blacklist" data-bs-toggle="modal">黑名單</a>
          <!-- Modal -->
<div class="modal fade" id="blacklist" tabindex="-1" aria-labelledby="blacklistLabel"">
  <div class=" modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header modal-footer--sticky">
      <h5 class="modal-title" id="blacklistLabel">黑名單</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <!-- 內容 -->
    <form action="{{ route('blacklist') }}" method="post">
      @csrf
      <div class="input-group mb-3 px-3 pt-3">
        <input name="blacklist" class="form-control" placeholder="新增黑名單" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
      </div>
    </form>
    <!-- 顯示+刪除黑名單 -->
    <div class="mx-3 d-flex flex-row">
      @dd($data);
      @foreach($data['blacklists'] as $blacklist)
      <form action="{{ route('blacklist.blacklist_del',$blacklist) }}" method="post">
        @csrf
        <div class="btn-group me-2" role="group" aria-label="Basic example">
          <div class="input-group-text px-1" id="btnGroupAddon2">
            <div class="me-2">{{ $blacklist->blacklist }}</div>
            <button type="submit " class="btn-close btn-sm"></button>
          </div>
        </div>
      </form>
      @endforeach
    </div>
    <!-- 按鈕 -->
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">儲存</button>
    </div>
  </div>
</div>
</div>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('game.index') }}">遊戲</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>

            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('articles.create') }}">發文</a>
        </li>
        <li class="nav-item">
        </li>
      </ul>
      <form action="{{ route('search.store') }}" class="d-flex" method="POST">
        @csrf
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<!--內容-->
<div class="container-fluid mt-3">
    <div class="row">
        <!--左邊切版-->
        <div class="col-lg-1">bloc 1/3</div>
        <!--中間切版-->
        <div class="col-lg-9 p-0">

        </div>
    </div>
    <!--右邊切版-->
    <div class="col-lg-2">bloc 3/3</div>
    @include('sign_in.first_day')
</div>


@stop