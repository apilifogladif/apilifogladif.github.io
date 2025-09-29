<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:site_name" content="{{ $page->siteName }}"/>
        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}"/>
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:image" content="/assets/img/logo.png"/>
        <meta property="og:type" content="website"/>

        <meta name="twitter:image:alt" content="{{ $page->siteName }}">
        <meta name="twitter:card" content="summary_large_image">

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <meta name="generator" content="tighten_jigsaw_doc">
        @endif

        <title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        @endif
    </head>

    <body class="flex flex-col justify-between min-h-screen font-sans leading-normal text-gray-800 bg-gray-50">
        <header class="sticky top-0 z-50 flex items-center h-20 py-4 bg-white border-b shadow" role="banner">
            <div class="grid w-full grid-cols-[1fr,auto] px-4 mx-2 lg:px-8">
                <div class="flex items-center justify-start col-span-1 col-start-1">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                        <img class="h-10 mr-3 md:h-12 rounded-image" src="/assets/img/main_pic.jpg" alt="{{ $page->siteName }} logo" />
                        <span class="ml-2 text-xl font-bold text-gray-800">{{ $page->siteName }}</span>
                    </a>
                </div>
                <div class="flex items-center justify-end col-span-1 col-start-2">
                    <!-- Hamburger Button (visible on mobile only) -->
                    <button id="menu-toggle" class="text-gray-700 md:hidden focus:outline-none">
                      <i class="text-2xl fas fa-bars"></i>
                    </button>
                  
                    <!-- Navigation Menu -->
                    <nav id="menu" class="absolute right-0 z-40 hidden w-full bg-white shadow-md top-20 md:static md:flex md:w-auto md:bg-transparent md:shadow-none">
                        <div class="flex flex-col items-start md:flex-row md:items-center">
                            <a href="/about" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-turquoise {{ $page->isActive('/about') ? 'font-bold text-turquoise bg-gray-100' : '' }}">About</a>
                            <a href="/projects" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-turquoise {{ $page->isActive('/projects') ? 'font-bold text-turquoise bg-gray-100' : '' }}">Projects</a>
                            <a href="/academic" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-turquoise {{ $page->isActive('/academic') ? 'font-bold text-turquoise bg-gray-100' : '' }}">Academic</a>
                            <a href="/experience" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-turquoise {{ $page->isActive('/experience') ? 'font-bold text-turquoise bg-gray-100' : '' }}">Experience</a>
                            <a href="/skills" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-turquoise {{ $page->isActive('/skills') ? 'font-bold text-turquoise bg-gray-100' : '' }}">Skills</a>
                            <a href="/contact" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-turquoise {{ $page->isActive('/contact') ? 'font-bold text-turquoise bg-gray-100' : '' }}">Contact</a>
                        </div>
                    </nav>
                  
                    <!-- Social Icons -->
                    <div class="flex items-center ml-4">
                        <a href="https://github.com/apilifogladif" target="_blank" class="flex items-center justify-center p-2 ml-1 text-gray-500 transition-all duration-200 rounded-full hover:text-black hover:bg-gray-100 hover:shadow-md hover:scale-110" title="GitHub Profile">
                            <i class="text-xl fab fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/filipa-fidalgo-a28a48247/" target="_blank" class="flex items-center justify-center p-2 ml-1 text-gray-500 transition-all duration-200 rounded-full hover:text-blue-600 hover:bg-gray-100 hover:shadow-md hover:scale-110" title="LinkedIn Profile">
                            <i class="text-xl fab fa-linkedin"></i>
                        </a>
                        <a href="mailto:filipajacobfidalgo@gmail.com" class="flex items-center justify-center p-2 ml-1 text-gray-500 transition-all duration-200 rounded-full hover:text-blue-600 hover:bg-gray-100 hover:shadow-md hover:scale-110" title="Email Me">
                            <i class="text-xl fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <main role="main" class="flex-auto w-full">
            @yield('body')
        </main>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')

        <script>
            document.getElementById('menu-toggle').addEventListener('click', function () {
                const menu = document.getElementById('menu');
                menu.classList.toggle('hidden');
            });
        </script>

        <footer class="pt-8 pb-4 text-center text-white bg-gradient-to-r from-gray-800 to-gray-900" role="contentinfo">
            <div class="container max-w-6xl px-6 mx-auto">
                <div class="grid gap-8 md:grid-cols-2">
                    <!-- About Column -->
                    <div class="text-left">
                        <h3 class="mb-4 text-xl font-semibold text-turquoise">Filipa Fidalgo</h3>
                        <div class="flex mb-4 space-x-3">
                            <a href="https://github.com/apilifogladif" class="flex items-center justify-center w-10 h-10 p-2 text-white transition-colors bg-gray-700 rounded-full hover:bg-turquoise" target="_blank" aria-label="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/filipa-fidalgo-a28a48247/" class="flex items-center justify-center w-10 h-10 p-2 text-white transition-colors bg-gray-700 rounded-full hover:bg-turquoise" target="_blank" aria-label="LinkedIn">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="mailto:filipajacobfidalgo@gmail.com" class="flex items-center justify-center w-10 h-10 p-2 text-white transition-colors bg-gray-700 rounded-full hover:bg-turquoise" aria-label="Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Download CV -->
                    <div class="text-left md:text-right">
                        <h3 class="mb-4 text-xl font-semibold text-turquoise">Download Resume</h3>
                        <a href="/assets/files/Filipa Fidalgo.pdf" download class="inline-flex items-center px-5 py-2 font-medium text-white transition-colors border-2 rounded-lg border-turquoise hover:bg-turquoise">
                            <i class="mr-2 fas fa-download"></i>Download CV
                        </a>
                    </div>
                </div>
                <div class="mt-4 text-sm text-gray-400 border-t border-gray-700">
                    <p class="mt-2 mb-0">&copy; {{ date('Y') }} Filipa Fidalgo. All rights reserved.</p>
                    <p class="mt-2 mb-0">Built with <a href="http://jigsaw.tighten.co" class="text-turquoise hover:underline">Jigsaw</a>
                    and <a href="https://tailwindcss.com" class="text-turquoise hover:underline">Tailwind CSS</a>.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
