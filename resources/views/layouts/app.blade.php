<x-layouts.base>
    {{-- If the admin is authenticated --}}
    @auth()
        @if (in_array(request()->route()->getName(),['web-user', 'web-user'],))
            {{ $slot }}
        @else
            @include('layouts.navbars.sidebar')
            @include('layouts.navbars.nav')
           
            {{ $slot }}
            <main>
                <div class="container-fluid">
                    <div class="row">
                        @include('layouts.footer')
                    </div>
                </div>
            </main>
        @endif
    @endauth

    {{-- Page User, Login and Sign-up --}}
    @guest
        {{-- If the user is on the login page --}}
        @if (!auth()->check() && in_array(request()->route()->getName(),['web-user', 'web-user'],))
            {{ $slot }}
        @elseif (!auth()->check() && in_array(request()->route()->getName(),['login', 'login'],))
            <div class="main-content position-relative bg-grey">
                {{ $slot }}
            </div>
        @elseif (!auth()->check() && in_array(request()->route()->getName(),['sign-up', 'sign-up'],))
            <div class="main-content position-relative bg-grey">
                {{ $slot }}
            </div>
        @endif 

    @endguest

</x-layouts.base>
