@extends('template')
@section('content')
<!--NavBar-->



<!--內容-->
<div class="container-fluid mt-3">
    <div class="row">
        <!--左邊切版-->
        <div class="col-lg-1"></div>
        <!--中間切版-->
        <div class="col-lg-8 p-0">
            @include('article/article')
        </div>
        <!--右邊切版-->
        <div class="col-lg-2"></div>
        <!-- 簽到 -->
        @include('sign_in.first_day')
    </div>
</div>
<!-- 底部 -->
<nav class="navigation fixed-bottom d-block d-sm-none">
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



<!-- 登入畫面 -->


<input class="" id="datecount" type="hidden" value="{{'day'.$data['datecount'] }}">
<input class="" id="out" type="hidden" value="out">
<input class="" id="count" type="hidden" value="{{ $data['datecount'] }}">


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
