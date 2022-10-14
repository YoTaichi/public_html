@extends('template')
@section('content')
@include('nav/navbar')
<div class=" border-0 mt-2 p-2" style="background-image:url(/img/background6.png); background-size:auto; background-repeat:round;">
  <div class="container px-0 ">
    <div class="col-lg-9 ">
      <!-- 樓 -->
      <div class="col  mx-0 px-3 pt-3  rounded-top " id="floor" style="background-color:white;">
        <!-- 標題 -->
        <div class="col mt-2 ">
          <h3 class="fw-bold" style="word-break: break-all">
            <!-- 露西亞QQQQQQQ -->{{ $article->title }}
          </h3>
        </div>

        <div class="col d-flex flex-row">
          @foreach( $article->article_tag as $article_tag )
          <form action="{{ route('search.store') }}" class="" method="POST">
            @csrf
            <input type="hidden" name="search" value="{{ $article_tag->tag }}">
            <button class="btn btn-sm btn-light" type="submit">{{ $article_tag->tag }}</button>
          </form>
          @endforeach
        </div>

        <div class="col">
          <h6>
            <!-- 2022-03-16 14:29:00 編輯 -->{{ $article->updated_at }} </h4>
        </div>
        <hr>
        <!-- 頭像+編輯+F -->
        <div class="row mb-2">
          <div class="col">
            <img src="/img/head.svg" class="img-fluid" alt="...">
            {{ $article->user->name}}
          </div>
          <div class="col-auto d-flex ">
            <!-- 要發文者才能編輯 -->
            @if( auth()->user()->id === $article->user->id )
            <a href="{{ route('articles.edit' , $article ) }}" class=" align-self-center m-2" style="text-decoration:none; background-color:transparent; color:black;">編輯</a>
            @endif
            <div class="border shadow-sm bg-light d-flex  align-items-center my-1 px-2">1333F</div>
          </div>

        </div>
        <!-- 內容 -->

        
        <div class="body pb-4" style="word-break: break-all;">
          {!! $article->detail !!}
        </div>
        <!-- 讚 -->
        <div class="mx-0 d-flex align-items-center pb-3">
          <!-- 讚按鈕 -->
          <a href="{{ route('good', $article ) }}" style="border:none; background:none;">
            <img class="me-2" src="/img/good.png">
          </a>
          <!-- 讚數 -->
          <div class="d-flex align-items-end text-black-50 mx-2">{{ $article->good()->count() }}</div>
          <!-- 倒讚按鈕 -->
          <a href="{{ route('bad' , $article ) }}" style="border:none; background:none;">
            <img class="me-2" src="/img/Bad.png">
          </a>
          <!-- 倒讚數 -->
          <div class="d-flex align-items-end text-black-50 ms-2">{{ $article->bad()->count() }}</div>
        </div>

      </div>
      <!-- 留言 -->
      <div class="footer px-3 py-2 rounded-botton " style="word-break: break-all; background-color: #604765; border-bottom-right-radius:3px; border-bottom-left-radius:3px;">
        @include('article/message')
      </div>
    </div>
  </div>
</div>

@stop