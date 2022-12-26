@extends('template')
@section('content')

<div class="container-fluid mt-3">
    <div class="row">
        <!--左邊切版-->
        <div class="col-lg-2"></div>
        <!--中間切版-->
        <div class="col-lg-8 p-0">

            <div class="container-fluid mt-3 ">
                <div class="row gx-5">
                    <!-- 一顆-49元 -->
                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/gem2.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1">1顆</p>
                        </div>
                        <div class="row mb-2">
                            <div class="d-grid gap">
                            </div>
                            <a type="button" class="btn btn-success" href="{{ route('buy.get_paid_one') }}">NT$49</a>
                        </div>
                    </div>

                   <!-- 7顆-290元 -->
                   <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/gem2.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1">7顆</p>
                        </div>
                        <div class="row mb-2">
                            <div class="d-grid gap">
                            </div>
                            <a type="button" class="btn btn-success" href="{{ route('buy.get_paid_two') }}">NT$290</a>
                        </div>
                    </div>

                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/gem2.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1">12顆</p>
                        </div>
                        <div class="row mb-2">
                            <div class="d-grid gap">
                            </div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#onegemModal">NT$490</button>
                            <!-- Modal -->
                            <div class="modal fade" id="onegemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/gem2.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1">25顆</p>
                        </div>
                        <div class="row mb-2">
                            <div class="d-grid gap">
                            </div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#onegemModal">NT$990</button>
                            <!-- Modal -->
                            <div class="modal fade" id="onegemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/gem2.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1">52顆</p>
                        </div>
                        <div class="row mb-2">
                            <div class="d-grid gap">
                            </div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#onegemModal">NT$1990</button>
                            <!-- Modal -->
                            <div class="modal fade" id="onegemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/gem2.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1">80顆</p>
                        </div>
                        <div class="row mb-2">
                            <div class="d-grid gap">
                            </div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#onegemModal">NT$2990</button>
                            <!-- Modal -->
                            <div class="modal fade" id="onegemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <!--右邊切版-->
        <div class="col-lg-2"></div>
        <!-- 簽到 -->
        @include('sign_in.first_day')
    </div>

</div>





@stop