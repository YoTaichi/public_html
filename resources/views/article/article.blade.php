@foreach($data['articles'] as $article)

<a href="{{ route('articles.show',$article) }}" class="p-0 border-0 mb-1 d-flex flex-column" type="button" style="border-radius:7px; text-decoration:none; background-color:transparent; color:black;">
  <!--卡片-->
  <div class="card " style="border-radius:7px; ">
    <div class="row g-0">
      <!--左邊圖片-->
      <!--d-flex align-items-center 垂直對齊右邊-->
      <div class="col-md-1 col-12  d-flex justify-content-center d-block " >
        <div class="row mt-2 px-3">
          <div class="col-auto mx-auto">
            {{ $article->user->name }}
          </div>
          <!-- 讚 -->
          <div class="col-auto mx-auto">
            <div class=" text-black-50 ms-2"><img class="" src="img/thumbs-up.svg"> {{ $article->good()->count() }}</div>
          </div>
          <div class="col-auto mx-auto">
            <div class=" text-black-50 ms-2"><img class="" src="img/thumbs-down.svg"> {{ $article->bad()->count() }}</div>
          </div>
          <!-- 留言 -->
        </div>
        <!-- <img src="img/rushia-2.svg" class="img-fluid " alt="..." style="height:200px ;"> -->
      </div>
      <!--右邊文字-->
      <div class=" col ">
        <!-- 標題 -->

        <div class="row m-0 ps-2">
          <h2 class=" ellipsis2 text-start pt-2 pb-2 mb-0 px-2"> {{ $article->title }}</h2>
        </div>
        <div class="row ps-4 m-0">
          {{ $article->tag }}
        </div>
        <!-- 內容 -->
        <div class="row ps-4 ellipsis2 text-black-50 fw-light mx-0" style="max-height: 200px;">
          {!! $article->detail !!}
        </div>
      </div>
    </div>
  </div>
</a>
@endforeach
<div>
</div>
<div class="col d-flex justify-content-center mb-5">
  {!! $data['articles']->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
<div class="col "></div>