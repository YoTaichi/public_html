@extends('template')
@section('content')
<!--NavBar-->
<!--內容-->
<div class="container-fluid mt-3">
    <div class="row">
        <!--左邊切版-->
        <div class="col-lg-1"></div>
        <!--中間切版-->
        <div class="col-lg-9 p-0 ">
            <div style="height:42em; background-color:white;">
                <div class="col d-flex justify-content-center">Round {{ $data['newround'] }}</div>
                <input type="hidden" name="round" value="1">
                <div class="p-4">
                    <div class="progress" style=" height: 100px;">
                        <div class="progress-bar progress-bar-striped fs-1 progress-bar-animated bg-info" role="progressbar" style="width: {{ $data['teamAper']*100 }}%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">{{ $data['teamAper']*100 }}% {{ $data['teamAAll'] }}</div>
                        <div class="progress-bar progress-bar-striped fs-1 progress-bar-animated bg-danger" role="progressbar" style="width:{{ $data['teamBper']*100 }}%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{ $data['teamBper']*100 }}% {{ $data['teamBAll'] }}</div>
                    </div>

                    <div class="row mt-3 ">
                        @foreach($data['teamAbet'] as $teamAbet)
                        <div class="col p-1 shadow">
                            <form action="{{ route('game.store') }}" method="post">
                                @csrf
                                <div class="position-relative border rounded p-3">
                                    <div class="position-absolute top-0 start-50 translate-middle">Taem A</div>
                                    <div class="row">已投入: {{$teamAbet->bet}}</div>
                                    <div class="row">
                                        <input type="hidden" name="team" value="A">
                                        <input type="hidden" name="round" value="{{ $data['newround'] }}">
                                        <button class="btn btn-info mt-2" type="submit" name="bet" value="1">1 </button>
                                        <button class="btn btn-info mt-2" type="submit" name="bet" value="5">5</button>
                                        <button class="btn btn-info mt-2" type="submit" name="bet" value="10">10</button>
                                        <button class="btn btn-info mt-2" type="submit" name="bet" value="100">100</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                        @foreach($data['teamBbet'] as $teamBbet)
                        <div class="col p-1 shadow">
                            <form action="{{ route('game.store') }}" method="post">
                                @csrf
                                <div class="position-relative border rounded p-3">
                                    <div class="position-absolute top-0 start-50 translate-middle">Taem B</div>
                                    <div class="row">已投入: {{$teamBbet->bet}}</div>
                                    <div class="row">
                                        <input type="hidden" name="team" value="B">
                                        <input type="hidden" name="round" value="{{ $data['newround'] }}">
                                        <button class="btn btn-danger mt-2" type="submit" name="bet" value="1">1</button>
                                        <button class="btn btn-danger mt-2" type="submit" name="bet" value="5">5</button>
                                        <button class="btn btn-danger mt-2" type="submit" name="bet" value="10">10</button>
                                        <button class="btn btn-danger mt-2" type="submit" name="bet" value="100">100</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    </div>
                    <div class="row mt-3">
                    <h1 >
                        規則
                    </h1>
                    <h2 class="ms-2">
                        大於對方平分對方所有錢
                    </h2>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--右邊切版-->
        <div class=" col-lg-2"></div>
        <!-- 簽到 -->
        @include('sign_in.first_day')
    </div>
</div>
<!-- 底部 -->
<nav class="navigation fixed-bottom d-block d-sm-none ">
    <ul class="navigation__list">

        <li class="navigation__item">
            <a class="navigation__link active" href="#home">
                <i class="navigation__icon" data-feather="home"></i>
                <span class="navigation__text">HOME</span>
            </a>
        </li>
        <li class="navigation__item">
            <a class="navigation__link" href="#categories">
                <i class="navigation__icon" data-feather="layers"></i>
                <span class="navigation__text">CATEGORIES</span>
            </a>
        </li>
        <li class="navigation__item">
            <a class="navigation__link" href="{{ route('ball.index') }}">
                <i class="navigation__icon" data-feather="heart"></i>
                <span class="navigation__text">LIKES</span>
            </a>
        </li>
    </ul>
</nav>


<!-- 懸浮裘依 -->
<div class=" btn-group dropstart d-none d-sm-block">
    <!-- 本體 -->
    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false" style="
            width: 220px;height: auto;position: fixed;
            bottom: -30rem;right: 0.5rem;box-shadow:none;">
        <img src="/img/Ball2.png" class="img-fluid" alt="...">
    </button>
    <ul class="dropdown-menu list-group-flush">
        <!-- 簽到 -->
        <li><a class="dropdown-item" id="test">早安</a></li>
        <li>
            <a class="dropdown-item" id="gg" aria-current="page" data-bs-target="#sign_in" data-bs-toggle="modal">123</a>
        </li>
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

<!-- 登入畫面 -->


<input class="" id="datecount" type="hidden" value="{{'day'.$data['datecount'] }}">
<input class="" id="out" type="hidden" value="out">
<input class="" id="count" type="hidden" value="{{ $data['datecount'] }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.js" integrity="sha512-FofOhk0jW4BYQ6CFM9iJutqL2qLk6hjZ9YrS2/OnkqkD5V4HFnhTNIFSAhzP3x//AD5OzVMO8dayImv06fq0jA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    feather.replace()

    const links = document.querySelectorAll('.navigation__link')

    links.forEach(link => {
        link.addEventListener('hover', (e) => {
            e.preventDefault();
            if (!link.classList.contains('hover')) {
                const hover = document.querySelector('.navigation__link.hover');
                if (hover !== null) {
                    hover.classList.remove('hover');
                }
                link.classList.add('hover');
            }
        })
    })
</script>



@if($yesorno === 1){
<!-- 換日自動開啟登入 -->
<input class="" id="sigin_datecount" type="hidden" value="{{'day'. $data['datecount'] +1}}">
<script>
    $(function() {
        var datecount = document.getElementById("sigin_datecount").value;
        var element = document.getElementById(datecount);
        element.classList.remove('walkhidden');
    });
</script>
<script>
    $(function() {
        var myModal = new bootstrap.Modal(document.getElementById('sign_in'))
        myModal.show()
    })
</script>
}
@else
<script>
    $(function() {
        /* 小人 */
        var datecount = document.getElementById("datecount").value;
        var dateelement = document.getElementById(datecount);
        dateelement.classList.remove('walkhidden');
        /* 背景黯淡 */
        var out = document.getElementById("out").value;
        var count = document.getElementById("count").value;
        var aaa = out + count
        var outelement = document.getElementById(aaa);
        outelement.classList.add('sign_in_nonopacity');

    });
</script>
@endif

@stop