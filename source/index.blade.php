@extends('_layouts.master')

@section('body')
<section class="container max-w-8xl mx-auto px-6 py-10 md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8 lg:w-4/5">
            <h1 id="intro-docs-template">Hello, my name is {{ $page->siteName }}.</h1>

            <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">{{ $page->siteDescription }}</h2>

            <p class="text-xl">I'm Filipa, a 20-year-old passionate about programming, with a keen interest in software development and robotics. This site showcases my academic journey, personal milestones, and the projects that have shaped my path so far. You can also download my CV in PDF format for more detailed insights into my experience and skills.</p>

            <div class="flex my-10">
                <a href="assets/files/Filipa Fidalgo.pdf" download>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Download CV
                    </button>
                </a>
            </div>
        </div>

        <div class="mx-auto w-1/5 md:w-1/2">
            <img src="/assets/img/main_pic.jpg" alt="{{ $page->siteName }} large logo" class="mx-auto rounded-image">
        </div>
    </div>

    <div id="education" class="max-w-8xl mx-auto my-10">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800"><i class="fas fa-graduation-cap text-3xl mr-2"></i>Education</h2>

        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">BSc in Informatics and Computing Engineering</h3>
            <p class="text-gray-700 font-medium mb-1">Faculty of Engineering, University of Porto, Portugal</p>
            <p class="text-gray-500 mb-3"><i class="far fa-calendar-alt"></i> September 2022 - Current</p>
            <p class="text-gray-800"><span class="font-semibold">Current Grade:</span> 15.9</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">High School</h3>
            <p class="text-gray-700 font-medium mb-1">Escola Secundária João Gonçalves Zarco, Matosinhos, Porto, Portugal</p>
            <p class="text-gray-500 mb-3"><i class="far fa-calendar-alt"></i> September 2019 - July 2022</p>
            <p class="text-gray-800"><span class="font-semibold">Final Grade:</span> 17.8</p>
        </div>
    </div>

    <div id="languages" class="max-w-8xl mx-auto my-10">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800"><i class="fa-solid fa-language text-3xl mr-2"></i>Languages</h2>
        <div class="flex flex-wrap justify-center">
            <div class="bg-white shadow-lg rounded-lg p-6 m-4 w-60 text-center">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Portuguese</h3>
                <p class="text-gray-700 font-medium">Native</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 m-4 w-60 text-center">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">English</h3>
                <p class="text-gray-700 font-medium">Advanced</p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 m-4 w-60 text-center">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Spanish</h3>
                <p class="text-gray-700 font-medium">Basic</p>
            </div>
        </div>
    </div>

    <div id="projects" class="max-w-8xl mx-auto my-10">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800"><i class="fa-solid fa-folder text-3xl mr-2"></i>Projects</h2>
        <div class="space-y-6">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/AED2324_PRJ1_G1207/tree/main" class="hover:underline text-turquoise">Schedule Management</a></h3>
                <p class="text-gray-700">System that manages schedules after their elaboration. - <span class="font-semibold">C++</span></p>
                <p class="text-gray-700">Grade: <span class="font-semibold">19.5</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/ES2324_Project" class="hover:underline text-turquoise">Maze</a></h3>
                <p class="text-gray-700">Mobile app that allows users to track buses' locations, with increased accuracy due to users' contributions. - <span class="font-semibold">Flutter & Dart</span></p>
                <p class="text-gray-700">Grade: <span class="font-semibold">18.0</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/AED2324_PRJ2_G1207/tree/main" class="hover:underline text-turquoise">Flight Management</a></h3>
                <p class="text-gray-700">Flight management system for air travelling of airlines. - <span class="font-semibold">C++</span></p>
                <p class="text-gray-700">Grade: <span class="font-semibold">19.4</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/DA2324_PRJ1_G13_4" class="hover:underline text-turquoise">Water Supply Management</a></h3>
                <p class="text-gray-700">Water supply network management system in Portugal to make informed decisions about resource allocation. - <span class="font-semibold">C++</span></p>
                <p class="text-gray-700">Grade: <span class="font-semibold">19.3</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/LDTS2324_Project/tree/main" class="hover:underline text-turquoise">BlackJack</a></h3>
                <p class="text-gray-700">BlackJack game within the constraints of a purely textual interface. - <span class="font-semibold">Java</span></p>
                <p class="text-gray-700">Grade: <span class="font-semibold">17.1</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/DA2324_PRJ2_G13_3/tree/main" class="hover:underline text-turquoise">TSP</a></h3>
                <p class="text-gray-700">Routing Algorithm for Ocean Shipping and Urban Deliveries. - <span class="font-semibold">C++</span></p>
                <p class="text-gray-700">Grade: <span class="font-semibold">18.4</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/LTW2324_Project/tree/main" class="hover:underline text-turquoise">Dealify</a></h3>
                <p class="text-gray-700">Website that facilitates the buying and selling of pre-loved items. - <span class="font-semibold">HTML, CSS, PHP, JS</span></p>
                <p class="text-gray-700">Grade: <span class="font-semibold">19.1</span></p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 mb-2"><a href="https://github.com/apilifogladif/LCOM2324_Project/tree/main/proj" class="hover:underline text-turquoise">BattleShip</a></h3>
                <p class="text-gray-700">BattleShip game in MINIX - <span class="font-semibold">C</span></p>
                <p class="text-gray-700">Grade: <span class="font-semibold">19.5</span></p>
            </div>
        </div>
    </div>

    <div id="skills" class="max-w-8xl mx-auto my-10">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800"><i class="fa-solid fa-laptop text-3xl mr-2"></i>Skills &amp; Proficiency</h2>
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Flutter & Dart</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="h-4 rounded-full bg-turquoise" style="width: 75%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Python</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="h-4 rounded-full bg-turquoise" style="width: 85%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">C++</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="h-4 rounded-full bg-turquoise" style="width: 85%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">C</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="h-4 rounded-full bg-turquoise" style="width: 55%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">JavaScript</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="h-4 rounded-full bg-turquoise" style="width: 60%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">HTML5 & CSS</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="h-4 rounded-full bg-turquoise" style="width: 80%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">PHP</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="h-4 rounded-full bg-turquoise" style="width: 70%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">SQLite</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="h-4 rounded-full bg-turquoise" style="width: 80%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Firebase</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="h-4 rounded-full bg-turquoise" style="width: 80%;"></div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Java</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="h-4 rounded-full bg-turquoise" style="width: 65%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="extras" class="max-w-8xl mx-auto my-10">
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
