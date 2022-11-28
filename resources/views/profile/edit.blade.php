@extends('template')
@section('content')

<!--內容-->
<div class="container-fluid mt-3">
    <div class="row">
        <!--左邊切版-->
        <div class="col-lg-1"></div>
        <!--中間切版-->
        <div class="col-lg-8 p-0">

        <x-app-layout>
        <div class="mx-3">
            
            <div class="p-4 mb-3 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 mb-3 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
        </x-app-layout>


        </div>
        <!--右邊切版-->
        <div class="col-lg-2"></div>
        <!-- 簽到 -->
        @include('sign_in.first_day')
    </div>
</div>




@stop