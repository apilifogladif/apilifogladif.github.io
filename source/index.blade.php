@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8 lg:w-4/5">
            <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

            <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">{{ $page->siteDescription }}</h2>

            <!-- <div class="flex my-10">
                <a href="/docs/getting-started" title="{{ $page->siteName }} getting started" class="bg-blue-500 hover:bg-blue-600 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">Get Started</a>
            </div> -->
        </div>

        <div class="mx-auto w-1/5 md:w-1/2">
            <img src="/assets/img/main_pic.jpg" alt="{{ $page->siteName }} large logo" class="mx-auto rounded-image">
        </div>
    </div>

    <div id="education" class="max-w-4xl mx-auto my-10">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800"><i class="fas fa-graduation-cap text-3xl mr-2"></i>Education</h2>

        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">BSc in Informatics and Computing Engineering</h3>
            <p class="text-gray-700 font-medium mb-1">Faculty of Engineering, University of Porto, Portugal</p>
            <p class="text-gray-500 mb-3"><i class="far fa-calendar-alt"></i> September 2022 - Current</p>
            <p class="text-gray-800"><span class="font-semibold">Current Grade:</span> 15.9</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Ensino Secundário</h3>
            <p class="text-gray-700 font-medium mb-1">Escola Secundária João Gonçalves Zarco, Matosinhos, Porto, Portugal</p>
            <p class="text-gray-500 mb-3"><i class="far fa-calendar-alt"></i> September 2019 - July 2022</p>
            <p class="text-gray-800"><span class="font-semibold">Final Grade:</span> 17.6</p>
        </div>
    </div>

    <div id="languages" class="max-w-4xl mx-auto my-10">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800"><i class="fa-solid fa-language text-3xl mr-2"></i>Languages</h2>
        <div class="flex flex-wrap justify-center">
            <div class="bg-white shadow-lg rounded-lg p-6 m-4 w-60 text-center">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Portuguese</h3>
                <p class="text-gray-700 font-medium">Native</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 m-4 w-60 text-center">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">English</h3>
                <p class="text-gray-700 font-medium">Intermediate</p>
            </div>
        </div>
    </div>

    <div id="projects" class="max-w-4xl mx-auto my-10">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800"><i class="fa-solid fa-folder text-3xl mr-2"></i>Projects</h2>
        <div class="space-y-6">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/AED2324_PRJ1_G1207/tree/main" class="text-blue-600 hover:underline">Schedule Management</a></h3>
                <p class="text-gray-700">System to manage schedules after they have been elaborated. - <span class="font-semibold">C++</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/ES2324_Project" class="text-blue-600 hover:underline">Maze</a></h3>
                <p class="text-gray-700">Phone app that allows users to check the location of the bus they are waiting for more accurately with users' contributions. - <span class="font-semibold">Flutter & Dart</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/AED2324_PRJ2_G1207/tree/main" class="text-blue-600 hover:underline">Flight Management</a></h3>
                <p class="text-gray-700">Flight management system for the air travel network of the airlines. - <span class="font-semibold">C++</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/DA2324_PRJ1_G13_4" class="text-blue-600 hover:underline">Water Supply Management</a></h3>
                <p class="text-gray-700">Water supply network management system in Portugal to make informed decisions about resource allocation. - <span class="font-semibold">C++</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/LDTS2324_Project/tree/main" class="text-blue-600 hover:underline">BlackJack</a></h3>
                <p class="text-gray-700">BlackJack game within the constraints of a purely textual interface. - <span class="font-semibold">Java</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/DA2324_PRJ2_G13_3/tree/main" class="text-blue-600 hover:underline">TSP</a></h3>
                <p class="text-gray-700">Routing Algorithm for Ocean Shipping and Urban Deliveries. - <span class="font-semibold">C++</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/LTW2324_Project/tree/main" class="text-blue-600 hover:underline">Dealify</a></h3>
                <p class="text-gray-700">Website that facilitates the buying and selling of pre-loved items. - <span class="font-semibold">HTML, CSS, PHP, JS</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/LCOM2324_Project/tree/main/proj" class="text-blue-600 hover:underline">BattleShip</a></h3>
                <p class="text-gray-700">BattleShip game in MINIX - <span class="font-semibold">C</span></p>
            </div>
        </div>
    </div>

    <div id="skills" class="max-w-4xl mx-auto my-10">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800"><i class="fa-solid fa-laptop text-3xl mr-2"></i>Skills &amp; Proficiency</h2>
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Python</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: 95%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">C++</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: 95%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">C</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: 85%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">JavaScript</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: 80%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">HTML5 & CSS</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: 95%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">PHP</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: 80%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">SQLite</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: 80%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Java</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: 85%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="extras" class="max-w-4xl mx-auto my-10">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800"><i class="fa-solid fa-star text-3xl mr-2"></i>Extracurricular</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Volunteer for Banco Alimentar</h3>
            <p class="text-gray-500 mb-3"><i class="far fa-calendar-alt"></i> December 2023 - Now</p>
            <p class="text-gray-700">Banco Alimentar</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 mb-2">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Handball Goalkeeper</h3>
            <p class="text-gray-500 mb-3"><i class="far fa-calendar-alt"></i> 2014 - 2022</p>
            <p class="text-gray-700">Clube de Andebol de Leça - CALE</p>
        </div>
    </div>

</section>
@endsection
