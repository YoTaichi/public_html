<nav class="navbar navbar-expand-lg navbar-light navbg ">
  <div class="container-fluid ">
    <div class="col-auto">
      <!-- LOGO -->
      <a class="navbar-brand" href="/articles">
        <img src="/img/instand.svg" alt="" class="instand" width="100" height="30">
      </a>
    </div>
    <!-- 登出按鈕 -->
    <!-- 錢 -->
    <div class="col " id="money">
      <div class="row justify-content-star">
        <div class="col-lg-auto pe-0 text-light">
          <img src="/img/money2.png" alt="" style="height:20px;">
          {{ Auth::user()->money }}
          <a href="{{ route('buy.money_index') }}"><img src="/img/plus-circle.svg" alt=""></a>
        </div>
        <!-- 鑽 -->
        <div class="col-lg-auto text-light">
          <img src="/img/gem2.png" alt="" style="height:20px;">
          {{ Auth::user()->diamond }}
          <a href="{{ route('buy.gem_index') }}"><img src="/img/plus-circle.svg" alt=""></a>
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
          <a class="nav-link active text-light" aria-current="page" href="#blacklist" data-bs-toggle="modal">黑名單</a>
          @include('nav.blacklist')
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('game.index') }}">遊戲</a>
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