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
                @foreach($articles as $article)
                        <!-- 找ID: route('search.find',$article)  這是找其他欄位article_id -->
                <a href="{{ route('search.find',['id' => $article->articles_id ] ) }}" class="p-0 border-0 mb-1" type="button" style="text-decoration:none; background-color:transparent; color:black;">
                <!--卡片-->
                    <div class="card" style="border-radius:7px;">
                        <div class="row g-0">
                            <!--左邊圖片-->
                            <!--d-flex align-items-center 垂直對齊右邊-->
                            <div class="col-md-2 py-1 col-12 p-1 d-flex align-items-center">
                                <div class="">
                                    <img src="img/rushia-3.svg" class="img-fluid" alt="...">
                                </div>
                            </div>
                            <!--右邊文字-->
                            <div class="col-md-10 col-12 p-1">
                                <div class="card-body px-0 py-1 d-flex align-items-start flex-column " style="height: 150px; width:360px;">
                                    <div class="">
                                        <h4 class="card-title fw-bold text-start text-truncate "> {{ $article->title }}</h6>
                                    </div>
                                    <div class="mb-auto ">
                                        <p class="card-text text-black-50 col-9 fw-light text-truncate p-1 mt-1 mb-2 mx-2">
                                            <!-- 我先，上原亞依，宇宙第一，誰敢跟誰敢跟我asd --> {!! $article->detail !!}
                                        </p>
                                    </div>
                                    <div class="row-lg row mx-0">
                                        <div class="col-3 d-flex p-0 m-0"><img src="img/Good.svg">100</div>
                                        <div class="col d-flex flex-row-reverse">
                                            <p class="card-text text-black-50 ">
                                                <small class="text-muted"> {{ $article->user->name }}&nbsp;&nbsp;&nbsp;</small>
                                                <small class="text-muted"> 留言 120 &nbsp;&nbsp;&nbsp;</small>
                                                <small class="text-muted">&nbsp;</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
        <!--右邊切版-->
        <div class="col-lg-2">bloc 3/3</div>
    </div>
</div>

@stop