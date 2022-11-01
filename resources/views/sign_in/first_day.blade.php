<!-- Modal -->
<div class="modal fade" id="sign_in" tabindex="-1" aria-labelledby="sign_in"">
  <div class=" modal-dialog modal-lg">
    <div class="modal-content">

        <!-- 內容 -->
        <!-- 登入獎勵 -->
        <div class="p-3 text-white" style="background-color: rgba(30,30,30,1); ">
            <div class="row">
                <div class="col fs-1 py-3 ps-3">登入獎勵</div>
                <div class="col-auto fs-5">連續登入{{ auth()->user()->sign_in[0]->count }} 日</div>
            </div>
            <div class="d-flex align-items-start  d-flex justify-content-around flex-wrap" ">
                    <!-- 1 -->
            <div class=" border d-inline-flex mb-4 me-3 position-relative " style=" border-radius:7px;">
                <div id="out1" class="border m-1 px-3 py-2 sign_in_color sign_in_opacity" style="border-radius:4px; ">
                    <div class="col">
                        <!-- 錢 -->
                        <div class="row-auto pe-0 text-light">
                            <img src="/img/money2.png" alt="" style="height:20px;">X10
                        </div>
                        <!-- 親密度 -->
                        <div class="row-auto text-light">
                            <img src="/img/heart.png" alt="" style="height:20px;">X1
                        </div>
                    </div>
                    <span class="position-absolute top-0 start-0 badge translate-middle sign_in_mark p-2">1日<span class="visually-hidden">unread messages</span></span>
                </div>
                <div id="day1" class="position-absolute top-0 start-50 translate-middle walkhidden"><img src="/img/walk.png" alt=""></div>
            </div>
            <!-- 2 -->
            <div class="border d-inline-flex mb-4 me-3 position-relative" style="border-radius:7px;">
                <div id="out2" class="border m-1 px-3 py-2 sign_in_color sign_in_opacity" style="border-radius:4px; ">
                    <div class="col">
                        <!-- 錢 -->
                        <div class="row-auto pe-0 text-light">
                            <img src="/img/money2.png" alt="" style="height:20px;">X10
                        </div>
                        <!-- 親密度 -->
                        <div class="row-auto text-light">
                            <img src="/img/heart.png" alt="" style="height:20px;">X2
                        </div>
                    </div>
                    <span class="position-absolute top-0 start-0 badge translate-middle sign_in_mark p-2">2日<span class="visually-hidden">unread messages</span></span>
                </div>
                <div id="day2" class="position-absolute top-0 start-50 translate-middle walkhidden"><img src="/img/walk.png" alt=""></div>
            </div>
            <!-- 3 -->
            <div class="border d-inline-flex mb-4 me-3 position-relative" style="border-radius:7px;">
                <div id="out3" class="border m-1 px-3 py-2 sign_in_color sign_in_opacity" style="border-radius:4px; ">
                    <div class="col">
                        <!-- 錢 -->
                        <div class="row-auto pe-0 text-light">
                            <img src="/img/money2.png" alt="" style="height:20px;">X15
                        </div>
                        <!-- 親密度 -->
                        <div class="row-auto text-light">
                            <img src="/img/heart.png" alt="" style="height:20px;">X2
                        </div>
                    </div>
                    <span class="position-absolute top-0 start-0 badge translate-middle sign_in_mark p-2">3日<span class="visually-hidden">unread messages</span></span>
                </div>
                <div id="day3" class="position-absolute top-0 start-50 translate-middle walkhidden"><img src="/img/walk.png" alt=""></div>

            </div>
            <!-- 4 -->
            <div class="border d-inline-flex mb-4 me-3 position-relative" style="border-radius:7px;">
                <div id="out4" class="border m-1 px-3 py-2 sign_in_color sign_in_opacity" style="border-radius:4px; ">
                    <div class="col">
                        <!-- 錢 -->
                        <div class="row-auto pe-0 text-light">
                            <img src="/img/money2.png" alt="" style="height:20px;">X15
                        </div>
                        <!-- 親密度 -->
                        <div class="row-auto text-light">
                            <img src="/img/heart.png" alt="" style="height:20px;">X3
                        </div>
                    </div>
                    <span class="position-absolute top-0 start-0 badge translate-middle sign_in_mark p-2">4日<span class="visually-hidden">unread messages</span></span>
                </div>
                <div id="day4" class="position-absolute top-0 start-50 translate-middle walkhidden"><img src="/img/walk.png" alt=""></div>

            </div>
            <!-- 5 -->
            <div class="border d-inline-flex mb-4 me-3 position-relative" style="border-radius:7px;">
                <div id="out5" class="border m-1 px-3 py-2 sign_in_color sign_in_opacity" style="border-radius:4px; ">
                    <div class="col">
                        <!-- 錢 -->
                        <div class="row-auto pe-0 text-light">
                            <img src="/img/money2.png" alt="" style="height:20px;">X20
                        </div>
                        <!-- 親密度 -->
                        <div class="row-auto text-light">
                            <img src="/img/heart.png" alt="" style="height:20px;">X3
                        </div>
                    </div>
                    <span class="position-absolute top-0 start-0 badge translate-middle sign_in_mark p-2">5日<span class="visually-hidden">unread messages</span></span>
                </div>
                <div id="day5" class="position-absolute top-0 start-50 translate-middle walkhidden"><img src="/img/walk.png" alt=""></div>

            </div>
            <!-- 6 -->
            <div class="border d-inline-flex mb-4 me-3 position-relative" style="border-radius:7px;">
                <div id="out6" class="border m-1 px-3 py-2 sign_in_color sign_in_opacity" style="border-radius:4px; ">
                    <div class="col">
                        <!-- 錢 -->
                        <div class="row-auto pe-0 text-light">
                            <img src="/img/money2.png" alt="" style="height:20px;">X20
                        </div>
                        <!-- 親密度 -->
                        <div class="row-auto text-light">
                            <img src="/img/heart.png" alt="" style="height:20px;">X4
                        </div>
                    </div>
                    <span class="position-absolute top-0 start-0 badge translate-middle sign_in_mark p-2">6日<span class="visually-hidden">unread messages</span></span>
                </div>
                <div id="day6" class="position-absolute top-0 start-50 translate-middle walkhidden"><img src="/img/walk.png" alt=""></div>

            </div>
            <!-- 7 -->
            <div class="border d-inline-flex mb-4 me-3 position-relative" style="border-radius:7px;">
                <div id="out7" class="border m-1 px-3 py-2 sign_in_color sign_in_opacity" style="border-radius:4px; ">
                    <div class="col">
                        <!-- 錢 -->
                        <div class="row-auto pe-0 text-light">
                            <img src="/img/money2.png" alt="" style="height:20px;">X30
                        </div>
                        <!-- 親密度 -->
                        <div class="row-auto text-light">
                            <img src="/img/heart.png" alt="" style="height:20px;">X5
                        </div>
                    </div>
                    <span class="position-absolute top-0 start-0 badge translate-middle sign_in_mark p-2">7日<span class="visually-hidden">unread messages</span></span>
                </div>
                <div id="day7" class="position-absolute top-0 start-50 translate-middle walkhidden"><img src="/img/walk.png" alt=""></div>

            </div>
            <!-- 7+ -->
            <div class="border d-inline-flex mb-4 me-3 position-relative" style="border-radius:7px;">
                <div id="out8" class="border m-1 px-3 py-2 sign_in_color sign_in_opacity" style="border-radius:4px; ">
                    <div class="col">
                        <!-- 錢 -->
                        <div class="row-auto pe-0 text-light">
                            <img src="/img/money2.png" alt="" style="height:20px;">X30
                        </div>
                        <!-- 親密度 -->
                        <div class="row-auto text-light">
                            <img src="/img/heart.png" alt="" style="height:20px;">X5
                        </div>
                    </div>
                    <span class="position-absolute top-0 start-0 badge translate-middle sign_in_mark p-2">7+<span class="visually-hidden">unread messages</span></span>
                </div>
                <div id="day8" class="position-absolute top-0 start-50 translate-middle walkhidden"><img src="/img/walk.png" alt=""></div>

            </div>
            <!-- 30 -->
            <div class="border d-inline-flex mb-4 me-3 position-relative" style="border-radius:7px;">
                <div id="out30" class="border m-1 px-2 py-2 sign_in_color sign_in_opacity" style="border-radius:4px; ">
                    <div class="col">
                        <!-- 錢 -->
                        <div class="row-auto pe-0 text-light">
                            <img src="/img/money2.png" alt="" style="height:20px;">X1000
                        </div>
                        <!-- 親密度 -->
                        <div class="row-auto text-light">
                            <img src="/img/heart.png" alt="" style="height:20px;">X50
                        </div>
                    </div>
                    <span class="position-absolute top-0 start-0 badge translate-middle sign_in_mark p-2">30<span class="visually-hidden">unread messages</span></span>
                </div>
                <div id="day30" class="position-absolute top-0 start-50 translate-middle walkhidden"><img src="/img/walk.png" alt=""></div>
            </div>
        </div>
        <div class="fs-1 py-3 ps-3"></div>
    </div>
</div>
<!-- 登入獎勵 -->
</div>
</div>