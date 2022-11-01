@extends('template')
@section('content')
<div class=" border-0 mt-2 p-2">
  <div class="row px-0 ">
    <div class="col-lg-2"></div>
    <div class="col-lg-7">
      <!-- 1樓 -->
      <div class="col  mx-0 px-4 pt-3  rounded-top " id="floor" style="background-color:white;">
        <!-- 標題 -->
        <div class="col mt-2 ">
          <h3 class="fw-bold" style="word-break: break-all">
            <!-- 露西亞QQQQQQQ -->{{ $data['article']->title }}
          </h3>
        </div>

        <div class="col d-flex flex-row">
          @foreach( $data['article']->article_tag as $article_tag )
          <form action="{{ route('search.store') }}" class="" method="POST">
            @csrf
            <input type="hidden" name="search" value="{{ $article_tag->tag }}">
            <button class="btn btn-sm btn-light" type="submit">{{ $article_tag->tag }}</button>
          </form>
          @endforeach
        </div>


        <hr>
        <!-- 頭像+編輯+F -->
        <div class="row mb-2">
          <div class="col">
            <img src="/img/head.svg" class="img-fluid" alt="...">
            {{ $data['article']->user->name}}
          </div>
          <div class="col-auto d-flex ">
            <!-- 要發文者才能編輯 -->
            @if( auth()->user()->id === $data['article']->user->id )
            <a href="{{ route('articles.edit' , $data['article'] ) }}" class=" align-self-center m-2" style="text-decoration:none; background-color:transparent; color:black;">編輯</a>
            @endif
            <div class="border shadow-sm bg-light d-flex  align-items-center my-1 px-2">{{ $data['article']->floor }}F</div>
          </div>

        </div>
        <!-- 內容 -->
        <div class="body pb-4" style="word-break: break-all;">
          {!! $data['article']->detail !!}
        </div>
        <!-- 讚 -->
        <div class="row">
          <div class="col mx-0 d-flex align-items-center pb-3">
            <!-- 讚按鈕 -->
            <a href="{{ route('good', $data['article'] ) }}" style="border:none; background:none;">
              <img class="me-2" src="/img/good.png">
            </a>
            <!-- 讚數 -->
            <div class="d-flex align-items-end text-black-50 mx-2">{{ $data['article']->good()->count() }}</div>
            <!-- 倒讚按鈕 -->
            <a href="{{ route('bad' , $data['article'] ) }}" style="border:none; background:none;">
              <img class="me-2" src="/img/Bad.png">
            </a>
            <!-- 倒讚數 -->
            <div class="d-flex align-items-end text-black-50 ms-2">{{ $data['article']->bad()->count() }}</div>
          </div>
          <div class="col-auto d-flex align-items-end">
            <h6>
              <!-- 2022-03-16 14:29:00 編輯 -->{{ $data['article']->updated_at }}
            </h6>
          </div>
        </div>


      </div>
      <!-- 留言 -->
      <div class="footer px-3 py-2 rounded-botton message ">
        @include('article/message')
      </div>

      <!-- 其他樓 -->
      @foreach($data['article_floors'] as $article_floor)

      <div class="col mt-2 mx-0 px-4 pt-3  rounded-top " id="floor" style="background-color:white;">
        <!-- 頭像+編輯+F -->
        <div class="row mb-2">
          <div class="col">
            <img src="/img/head.svg" class="img-fluid" alt="...">
            {{ $article_floor->user->name}}
          </div>
          <div class="col-auto d-flex ">
            <!-- 要發文者才能編輯 -->
            @if( auth()->user()->id === $article_floor->user->id )
            <a href="{{ route('article_floor.edit' , $article_floor ) }}" class=" align-self-center m-2" style="text-decoration:none; background-color:transparent; color:black;">編輯</a>
            @endif
            <div class="border shadow-sm bg-light d-flex  align-items-center my-1 px-2">{{ $article_floor->floor }}F</div>
          </div>

        </div>
        <hr>
        <!-- 內容 -->
        <div class="body pb-4" style="word-break: break-all;">
          {!! $article_floor->detail !!}
        </div>
        <!-- 讚 -->
        <div class="row">
          <div class="col mx-0 d-flex align-items-center pb-3">
            <!-- 讚按鈕 -->
            <a href="{{ route('good', $data['article'] ) }}" style="border:none; background:none;">
              <img class="me-2" src="/img/good.png">
            </a>
            <!-- 讚數 -->
            <div class="d-flex align-items-end text-black-50 mx-2">{{ $article_floor->good()->count() }}</div>
            <!-- 倒讚按鈕 -->
            <a href="{{ route('bad' , $data['article'] ) }}" style="border:none; background:none;">
              <img class="me-2" src="/img/Bad.png">
            </a>
            <!-- 倒讚數 -->
            <div class="d-flex align-items-end text-black-50 ms-2">{{ $article_floor->bad()->count() }}</div>
          </div>
          <div class="col-auto d-flex align-items-end">
            <h6>
              <!-- 2022-03-16 14:29:00 編輯 -->{{ $article_floor->updated_at }}
            </h6>
          </div>
        </div>

      </div>
      <!-- 留言 -->
      <div class="footer px-3 py-2 rounded-botton message">
        @include('article/message_floor')
      </div>

      @endforeach



      <!-- 回覆 -->
      <div class="border rounded shadow-sm mt-5  bg-white">
        <form action="{{ route('article_floor.store') }}" method="post">
          @csrf
          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
          <input type="hidden" name="article_id" value="{{ $data['article']->id }}">
          <input type="hidden" name="floor" value="{{ $data['floor'] }}">

          <!-- 編輯 -->
          <textarea id="summernote" name="detail"> </textarea>
          <!-- 存image位置 -->
          <input type="hidden" name="image">

          <div class="actions align-self-end mt-2">
            <input type="submit" class="btn btn-primary btn-lg ">
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 200,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['codeview', 'help']]
      ],
      callbacks: {
        // 刪掉上傳圖片 直接至後端做處理
        onMediaDelete: function(element) {
          // console.log(element.attr('src'));
          // 取得圖片的src
          // 將資料送至後端
          var formData = new FormData();
          formData.append('_token', '{{ csrf_token() }}');
          formData.append('src', element.attr('src'))
          // 將圖片的src存起來傳去後端
          fetch('/admin/summernote/delete', {
              method: 'POST',
              body: formData
            })
            .then(function(response) {
              return response.text();
            })
            .then(function(data) {
              console.log(data);
            })

        }
      }
    });
  });
</script>
@stop