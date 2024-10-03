@php
    use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
</head>

<body class="bg-[#252a2f] mt-20">
    <header>
        <nav
            class="bg-transparent bg-gradient-to-b from-slate-600 fixed top-0 w-full backdrop-filter backdrop-blur-sm z-50">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="/img/serfort.png" class="h-12" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Serfort</span>
                </a>

                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>

                {{-- Navbar Link --}}
                <div class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border md:space-x-8 rtl:space-x-reverse w-full md:flex-row md:mt-0 md:border-0">
                        <li>
                            <a href="/"
                                class="block py-2 px-3 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-200 
                    md:p-0 dark:text-white md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white 
                    md:dark:hover:bg-transparent dardk:border-gray-700 hover:border-b-2 hover:border-gray-300 
                    active:border-b-2 active:border-gray-500 focus:border-b-2 focus:border-blue-500
                    {{ request()->is('/') ? 'text-white font-bold' : 'text-gray-400' }}">
                                Home
                            </a>
                        </li>
                        <li x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="py-2 px-3 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-200 
                md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white 
                md:dark:hover:bg-transparent dark:border-gray-700 hover:border-b-2 hover:border-gray-300 
                active:border-b-2 active:border-gray-500 focus:border-b-2 focus:border-blue-500 flex items-center space-x-1
                {{ request()->is('products/*') ? 'text-white font-bold' : 'text-gray-400' }}">
                                Products
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ms-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false"
                                class="absolute z-10 mt-2 w-48 bg-white rounded-md shadow-lg overflow-hidden dark:bg-gray-800">
                                @foreach ($productTypes as $productType)
                                    <a href="{{ route('products.index', $productType->slug) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                                        {{ str_replace(' Type', '', $productType->name) }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        <li>
                            <a href="/about"
                                class="block py-2 px-3 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-200 
                    md:p-0 dark:text-white md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent 
                    dark:border-gray-700 hover:border-b-2 hover:border-gray-300 active:border-b-2 active:border-gray-500 focus:border-b-2 focus:border-blue-500
                    {{ request()->is('about') ? 'text-white font-bold' : 'text-gray-400' }}">
                                About
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- User Drop Down --}}
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="/profile/profile.png" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">User Name</span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">user@email.com</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class="bg-gradient-to-b from-slate-600 shadow ">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="/img/serfort.png" class="h-16" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Serfort</span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-200 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-white sm:text-center">© 2024 <a href="/"
                    class="hover:underline">Serfort™</a>. All Rights Reserved.
            </span>
        </div>
    </footer>
</body>

</html>
