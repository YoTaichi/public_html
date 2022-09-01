@extends('template')
@section('content')
      @include('nav/navbar')
      <div class=" border-0 mt-2 p-2" style="background-image:url(/img/background6.png); background-size:auto; background-repeat:round;">
        <div class="container px-0">
          <div class="col-lg-9 ">
            <!-- 樓 -->
            <div class="row mb-2 mx-0 rounded " id="floor" style="background-color:white;">
              <!-- 標題 -->
              <div class="header d-flex mt-2 ">
                <div class="col-auto">
                  <img src="/img/head.svg" class="img-fluid" alt="...">
                </div>
                <div class="col ms-2">
                  <div class="row">
                    <h3 class="title align-self-center ">
                      <!-- 露西亞QQQQQQQ -->{{ $article->title }}
                    </h3>
                  </div>
                  <div class="row">
                    <h6>
                      <!-- 2022-03-16 14:29:00 編輯 -->{{ $article->updated_at }} </h4>
                  </div>
                </div>
                <div class="col-auto d-flex justify-content-end m-3  ">
                  <a href="{{ route('articles.edit' , $article ) }}" class="m-2">編輯</a>
                  <div class="border shadow-sm bg-light d-flex  align-items-center py-1 px-2">1F</div>
                </div>
              </div>
              <hr>
              <!-- 內容 -->
              <div class="body mb-5">
                {!! $article->detail !!}
              </div>
              <!-- 留言 -->
              <div class="footer pe-0 pt-2" style="background-color: #604765; border-bottom-right-radius:3px; border-bottom-left-radius:3px;">
                @include('article/message')
              </div>
            </div>
          </div>
        </div>
      </div>
@stop


