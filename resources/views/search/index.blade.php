@extends('template')
@section('content')

    <!--NavBar-->
    <!--內容-->
    <div class="container-fluid mt-3">
        <div class="row">
            <!--左邊切版-->
            <div class="col-lg-1">bloc 1/3</div>
            <!--中間切版-->
            <div class="col-lg-9 p-0">
                <div id="container" class="container p-0">
                    @include('search/article')
                </div>
            </div>
            <!--右邊切版-->
            <div class="col-lg-2">bloc 3/3</div>
        </div>
    </div>

@stop
