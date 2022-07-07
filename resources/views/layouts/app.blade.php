<x-layouts.base>
    {{-- If the user is authenticated --}}
    @auth()
        {{-- If the user is authenticated on the static sign up or the sign up page --}}
        @if (in_array(request()->route()->getName(),['sign-up', 'sign-up'],))
            @include('layouts.footers.guest.with-socials')
            {{-- If the user is authenticated on the static sign in or the login page --}}
        @elseif (in_array(request()->route()->getName(),['sign-in', 'login'],))
            @include('layouts.footers.guest.description')
        @elseif (in_array(request()->route()->getName(),['profile', 'my-profile'],))
            @include('layouts.navbars.auth.sidebar')
            <div class="main-content position-relative bg-gray-100">
                @include('layouts.navbars.auth.nav-profile')
                <div>
                    {{ $slot }}
                    @include('layouts.footer')
                </div>
            </div>
            <!-- @include('components.plugins.fixed-plugin') -->
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

    {{-- If the user is not authenticated (if the user is a guest) --}}
    @guest
        {{-- If the user is on the login page --}}
        @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
            {{ $slot }}

            {{-- If the user is on the sign up page --}}
        @elseif (!auth()->check() && in_array(request()->route()->getName(),['sign-up'],))
            {{ $slot }}
              
        @endif
    @endguest

</x-layouts.base>