@if (Route::has('login'))
                <div class="hidden  fixed top-0 right-0 p-2 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link text-sm text-light text-gray-700 dark:text-gray-500 ">@include('app')</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link text-sm text-light text-gray-700 dark:text-gray-500">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link ml-4 text-sm text-light text-gray-700 dark:text-gray-500 ">Register</a>
                        @endif
                    @endauth
                </div>
            @endif