<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="bg-gray-300">
        {{-- Head --}}
            @include('layouts.partials.head')
        {{-- End Head --}}

        {{-- Navbar --}}
          @livewire('navbar')
        {{-- End Navbar --}}
        
        {{-- Content product --}}
            <div class="h-full mt-20 overflow-y-auto">
                <div class="container mx-auto p-2">
                    @yield('content')
                </div>
            </div>
        {{-- End Content product --}}
        @livewireScripts
    </body>
</html>
