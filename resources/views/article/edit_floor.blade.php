@extends('template')

@section('head')
@stop
@section('content')


<body style="background-image:url(/img/background6.png); background-size:auto; background-repeat:round;">
    <div class="body">
        <div class="col-0 col-lg-2 d-inline-flex"></div>
        <div class="col-12 col-lg-7 pt-3 px-0 d-inline-flex">
            <div class="container-fluid border shadow-sm py-3 px-1 bg-white">
                <div class="row">
                    <div class="col">
                        <h1>發文</h1>
                        <hr>
                    </div>
 
                    <!-- 右上叉叉 -->
                    <div class="col-auto">
                        <a href="{{ url()->previous() }}">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </a>
                    </div>
                </div>
                <form action="{{ route('article_floor.update', $data['article']) }}" method="post">
                    @csrf
                    @method('patch')
                    <!-- 標題 -->
                    <div class="form-group mb-3">
                        <input type="" value="" name="title" class="form-control form-control-lg shadow-sm" id="" placeholder="請輸入標題...">
                    </div>
                    <!-- 副標 -->
                    <div class="form-group mb-3 ">
                        <input type="" value="" name="tag" class="form-control form-control-lg shadow-sm" id="" placeholder="使用 # 設置副標籤...">
                    </div>
                    <!-- 18X -->
                    <input type="checkbox" value="{{ $article->sex }}" name="sex" class="btn-check" value="1" id="btn-check-outlined" autocomplete="off">
                    <label class="btn btn-outline-danger mb-2" for="btn-check-outlined">18X</label><br>
                    <!-- 編輯 -->
                    <textarea id="summernote" name="detail"></textarea>
                    <!-- 存image位置 -->
                    <input type="hidden" name="image">
                    <!-- 按鈕 -->
                    <div class="actions align-self-end mt-2">
                        <input type="submit" class="btn btn-primary btn-lg ">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col col-lg-2"></div>
    </div>

    <!-- Summernote JS - CDN Link -->

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 500,
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