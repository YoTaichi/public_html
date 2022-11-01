<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Bootstrap 5 CDN Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <link rel="stylesheet" href="css/navbar.css">
  <!-- Summernote CSS - CDN Link -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
  <!-- //Summernote CSS - CDN Link -->
  @yield('head')
</head>

<body style="background-image:url(/img/background.png) ; background-size:auto; background-repeat:round;">

  @yield('content')

  <!-- 編輯 -->
  <textarea id="summernote" name="detail"> </textarea>
  <!-- 存image位置 -->
  <input type="hidden" name="image">






  <!-- Summernote JS - CDN Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
  <!-- //Summernote JS - CDN Link -->
</body>

</html>