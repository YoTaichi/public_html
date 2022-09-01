<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    @include('bootstrap_css')
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-image:url(/img/background6.png); background-size:auto; background-repeat:round;">
    <!-- style="background-color: #DCDBDC; -->
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

                
                </div>
            </div>
            <!--右邊切版-->
            <div class="col-lg-2">bloc 3/3</div>
        </div>
    </div>



    <!-- Bootstrap JavaScript Libraries -->
    @include('bootstrap_js')
</body>

</html>