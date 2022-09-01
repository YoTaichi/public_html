<nav class="navbar navbar-expand-lg navbar-light modal-header--sticky" style="background-color: #604765;">
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

    <div class="col " id="money">
      <div class="row justify-content-star">
        <div class="col-lg-auto pe-0 text-light">
          <img src="/img/money2.png" alt="" style="height:20px;">
          {{ Auth::user()->money }}
        </div>
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
          <!-- 彈出我的最愛 -->
          <a class="nav-link active text-light" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#favorite">最愛</a>
          @include("nav/favorite")
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="#">Link</a>
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