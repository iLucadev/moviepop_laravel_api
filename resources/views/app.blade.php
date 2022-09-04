<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="container mx-auto flex flex-col bg-slate-50 h-screen overflow-auto space-y-8 antialiased">
        <nav class="mt-8 text-slate-900">
            <div class="flex flex-wrap justify-between items-center mx-auto">
                <span class="self-center text-2xl font-bold">Moviepop</span>
                <ul class="flex space-x-12 font-semibold">
                    <li>
                        <a href="/" class="hover:text-violet-400">Home</a>
                    </li>
                    <li>
                        <a href="/movies" class="hover:text-violet-400">Movies</a>
                     </li>
                    <li>
                        <a href="/shows" class="hover:text-violet-400">Shows</a>
                    </li>
                </ul>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add content</button>
            </div>
        </nav>
        @yield('content')
        <footer class="h-24 flex justify-center items-center">
            <p class="text-slate-700 text-sm">Moviepop API. Powered on Laravel 8</p>
        </footer>
        @yield('js')
    </body>
</html>
