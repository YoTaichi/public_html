@foreach($data['articles'] as $article)
<!-- 找ID: route('search.find',$article)  這是找其他欄位article_id -->
<a href="{{ route('articles.show',$article->article_id) }}" class="p-0 border-0 mb-1" type="button" style="text-decoration:none; background-color:transparent; color:black;">
    <!--卡片-->
    <div class="card" style="border-radius:7px; ">
        <div class="row g-0">
            <!--左邊圖片-->
            <!--d-flex align-items-center 垂直對齊右邊-->
            <div class="col-md-2 py-1 col-12 p-1 d-flex align-items-center" ">
                <div class="">
                    <img src="img/rushia-3.svg" class=" " alt="..." style="height: 20px;">
                </div>
            </div>
            <!--右邊文字-->
            <div class=" col ps-2 pb-2">
                <!-- 標題 -->
                <div class="row m-0">
                    <h4 class="fw-bold ellipsis2 text-start pt-2 px-0"> {{ $article->title }}</h4>
                </div>
                <div class="row m-0">
                    {{ $article->tag }}
                </div>
                <!-- 內容 -->
                <div class="row ellipsis2 text-black-50 fw-light mx-0" style="max-width:350px; height: 150px;">
                    {!! $article->detail !!}
                </div>

                <div class=" mx-0 pt-1 d-flex align-items-center">
                    <!-- 讚 -->
                    <img class="me-2" src="img/Good.png">
                    <div class="d-flex align-items-end text-black-50 mx-2">{{ $article->good()->count() }}</div>
                    <img class="me-2" src="img/Bad.png">
                    <div class="d-flex align-items-end text-black-50 ms-2">{{ $article->bad()->count() }}</div>
                    <div class="col">
                        <p class="card-text text-black-50 ms-3">
                            <small class="text-muted"> {{ $article->user->name }}&nbsp;&nbsp;&nbsp;</small>
                            <small class="text-muted "> 留言 120 &nbsp;&nbsp;&nbsp;</small>
                            <small class="text-muted">&nbsp;</small>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</a>
@endforeach