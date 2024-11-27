<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarIsOpen: false }" class="relative flex w-full flex-col md:flex-row">
            <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
            <a class="sr-only" href="#main-content">skip to the main content</a>

            <!-- dark overlay for when the sidebar is open on smaller screens  -->
            <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-zinc-900/10 backdrop-blur-sm md:hidden" aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity ></div>

        @include('components.penguin.sidebar')
        <x-banner />

        <div class="h-svh w-full overflow-y-auto bg-zinc-50 dark:bg-zinc-900">
            <!-- top navbar  -->
            @include('components.penguin.topnav')
            <!-- main content  -->
            <div id="main-content" class="p-4">
                <div class="overflow-y-auto">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
