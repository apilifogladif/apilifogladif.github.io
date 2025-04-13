@extends('_layouts.master')

@section('body')
<section class="relative py-24 overflow-hidden text-white bg-gradient-to-r from-blue-600 to-turquoise">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 opacity-10 bg-pattern"></div>
        <!-- Adding animated particles for background effect -->
        <div class="absolute inset-0" id="particles-js"></div>
    </div>
    <div class="container relative z-10 max-w-5xl px-6 mx-auto">
        <div class="flex flex-col-reverse items-center lg:flex-row lg:space-x-12">
            <div class="w-full mt-12 text-center lg:mt-0 lg:w-3/5 lg:text-left">
                <h1 class="mb-4 text-4xl font-bold leading-tight md:text-5xl animate__animated animate__fadeInUp">
                    Hello, I'm <span class="relative inline-block text-yellow-300">
                        {{ $page->personalInfo['name'] }}
                        <span class="absolute bottom-0 left-0 w-full h-1 mt-1 bg-yellow-300 rounded-full"></span>
                    </span>
                </h1>
                <h2 class="mb-6 text-xl font-light md:text-2xl animate__animated animate__fadeIn animate__delay-1s">
                    <span id="typed-strings">
                        <span>{{ $page->siteDescription }}</span>
                    </span>
                    <span id="typed"></span>
                </h2>
                <p class="mb-8 text-lg leading-relaxed animate__animated animate__fadeIn animate__delay-2s">
                    A passionate programmer interested in software development, robotics, and AI.
                    Currently pursuing my degree in Informatics and Computing Engineering at the Faculty of Engineering, University of Porto.
                </p>
                <div class="flex flex-wrap justify-center gap-4 mb-8 lg:justify-start animate__animated animate__fadeInUp animate__delay-3s">
                    <a href="/projects" class="px-6 py-3 font-bold text-blue-600 transition-all duration-300 transform bg-white rounded-lg shadow-lg hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1">
                        <i class="mr-2 fas fa-code"></i> View My Projects
                    </a>
                    <a href="{{ $page->personalInfo['cv'] }}" download class="px-6 py-3 font-bold text-white transition-all duration-300 transform bg-transparent border-2 border-white rounded-lg hover:bg-white hover:text-blue-600 hover:-translate-y-1">
                        <i class="mr-2 fas fa-file-download"></i> Download CV
                    </a>
                </div>
            </div>
            <div class="flex justify-center w-48 lg:w-2/5 md:w-64 animate__animated animate__fadeIn">
                <div class="relative">
                    <div class="absolute inset-0 transform scale-110 rounded-full bg-gradient-to-r from-blue-600 to-turquoise blur-xl opacity-30 animate-pulse"></div>
                    <img src="/assets/img/main_pic.jpg" alt="{{ $page->siteName }}" class="relative object-cover w-48 h-48 transition-transform duration-300 border-4 border-white rounded-full shadow-xl md:w-64 md:h-64 hover:scale-105">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Academic Background Section with improved styling -->
<section class="py-10 bg-white">
    <div class="container max-w-5xl px-6 mx-auto">
        <div class="flex flex-col items-center mb-12">
            <h2 class="relative pb-3 text-3xl font-bold text-gray-800 wow fadeInUp">
                <span class="text-blue-600">Academic</span> Background
                <span class="absolute bottom-0 w-24 h-1 transform -translate-x-1/2 rounded-full left-1/2 bg-gradient-to-r from-blue-600 to-turquoise"></span>
            </h2>
            <p class="max-w-2xl mx-auto mt-4 text-center text-gray-600 wow fadeIn">My educational journey has provided me with a strong foundation in computer science and engineering principles.</p>
        </div>
        
        <div class="text-center wow fadeInUp">
            <a href="/academic" class="inline-flex items-center px-8 py-4 font-medium text-white transition-all duration-300 transform rounded-lg shadow-lg bg-gradient-to-r from-blue-600 to-turquoise hover:shadow-xl hover:-translate-y-1">
                <span>View Academic Background</span>
                <i class="ml-2 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Professional Experience Section improved -->
<section class="relative py-10 bg-gray-50">
    <div class="container max-w-5xl px-6 mx-auto">
        <div class="flex flex-col items-center mb-12">
            <h2 class="relative pb-3 text-3xl font-bold text-gray-800 wow fadeInUp">
                <span class="text-blue-600">Professional</span> Experience
                <span class="absolute bottom-0 w-24 h-1 transform -translate-x-1/2 rounded-full left-1/2 bg-gradient-to-r from-blue-600 to-turquoise"></span>
            </h2>
            <p class="max-w-2xl mx-auto mt-4 text-center text-gray-600 wow fadeIn">A glimpse into my work history and career accomplishments.</p>
        </div>
        
        @php
            // Reading first experience file directly
            $experiencePath = __DIR__ . '/../source/_information/experience';
            $experienceFiles = is_dir($experiencePath) ? glob($experiencePath . '/*.md') : [];
            
            $latestExperience = null;
            
            if (count($experienceFiles) > 0) {
                try {
                    $content = file_get_contents($experienceFiles[0]);
                    $content = preg_replace('/^<!--.*?-->\s*/s', '', $content);
                    
                    if (preg_match('/^---\s*$(.*?)^---\s*$(.*)/sm', $content, $matches)) {
                        $yaml = $matches[1];
                        $description = trim($matches[2]);
                        
                        $experience = [];
                        foreach (preg_split('/\r?\n/', $yaml) as $line) {
                            $line = trim($line);
                            if (empty($line)) continue;
                            
                            if (preg_match('/^(\w+):\s*(.*)$/', $line, $parts)) {
                                $key = $parts[1];
                                $value = trim($parts[2]);
                                $experience[$key] = $value;
                            }
                        }
                        
                        if (!empty($experience) && isset($experience['title'])) {
                            $experience['description'] = $description;
                            $latestExperience = $experience;
                        }
                    }
                } catch (Exception $e) {
                    // Silently handle errors
                }
            }
        @endphp
        
        @if ($latestExperience)
        <div class="p-0 transition-all duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl wow fadeInUp">
            <div class="h-2 rounded-t-lg bg-gradient-to-r from-blue-600 to-turquoise"></div>
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="p-3 mr-4 text-blue-600 bg-blue-100 rounded-full">
                        <i class="text-xl fas fa-briefcase"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">{{ $latestExperience['title'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $latestExperience['institution'] }}</p>
                    </div>
                </div>
                <div class="mb-3 text-sm text-gray-600">
                    <i class="mr-1 fas fa-calendar"></i>
                    {{ $latestExperience['start_date'] }} - {{ $latestExperience['end_date'] }}
                </div>
                @if (!empty($latestExperience['description']))
                <p class="text-sm text-gray-700">{{ \Illuminate\Support\Str::limit($latestExperience['description'], 120) }}</p>
                @endif
            </div>
        </div>
        @else
        <div class="p-0 transition-all duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl wow fadeInUp">
            <div class="h-2 rounded-t-lg bg-gradient-to-r from-blue-600 to-turquoise"></div>
            <div class="p-8">
                <div class="flex flex-col items-center justify-center p-6 text-center">
                    <div class="p-4 mb-4 text-blue-600 bg-blue-100 rounded-full">
                        <i class="text-3xl fas fa-briefcase"></i>
                    </div>
                    <p class="text-lg text-gray-600">Check out my professional experience section for details on my work history.</p>
                </div>
            </div>
        </div>
        @endif
        
        <div class="mt-10 text-center wow fadeInUp">
            <a href="/experience" class="inline-flex items-center px-8 py-4 font-medium text-white transition-all duration-300 transform rounded-lg shadow-lg bg-gradient-to-r from-blue-600 to-turquoise hover:shadow-xl hover:-translate-y-1">
                <span>View Full Experience</span>
                <i class="ml-2 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Featured Projects with card design overhaul -->
<section class="relative py-10 bg-white">
    <div class="container max-w-5xl px-6 mx-auto">
        <div class="flex flex-col items-center mb-12">
            <h2 class="relative pb-3 text-3xl font-bold text-gray-800 wow fadeInUp">
                <span class="text-blue-600">Featured</span> Projects
                <span class="absolute bottom-0 w-24 h-1 transform -translate-x-1/2 rounded-full left-1/2 bg-gradient-to-r from-blue-600 to-turquoise"></span>
            </h2>
            <p class="max-w-2xl mx-auto mt-4 text-center text-gray-600 wow fadeIn">Here are some of my best academic projects. Each one showcases different skills and technologies.</p>
        </div>
        
        <div class="text-center wow fadeInUp">
            <a href="/projects" class="inline-flex items-center px-8 py-4 font-medium text-white transition-all duration-300 transform rounded-lg shadow-lg bg-gradient-to-r from-blue-600 to-turquoise hover:shadow-xl hover:-translate-y-1">
                <span>View Projects</span>
                <i class="ml-2 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Skills Section completely redesigned -->
<section class="relative py-10 bg-gray-50">
    <div class="container max-w-5xl px-6 mx-auto">
        <div class="flex flex-col items-center mb-12">
            <h2 class="relative pb-3 text-3xl font-bold text-gray-800 wow fadeInUp">
                <span class="text-blue-600">Technical</span> Skills
                <span class="absolute bottom-0 w-24 h-1 transform -translate-x-1/2 rounded-full left-1/2 bg-gradient-to-r from-blue-600 to-turquoise"></span>
            </h2>
            <p class="max-w-2xl mx-auto mt-4 text-center text-gray-600 wow fadeIn">A snapshot of my technical expertise across different domains.</p>
        </div>
        
        <div class="grid gap-8 mb-12 md:grid-cols-3">
            <!-- Programming Skills -->
            <div class="overflow-hidden transition-all duration-300 bg-white border border-gray-100 rounded-lg shadow-lg hover:shadow-xl wow fadeInUp" data-wow-delay="0.1s">
                <div class="h-2 bg-gradient-to-r from-blue-500 to-blue-700"></div>
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="p-3 mr-4 text-blue-600 bg-blue-100 rounded-full">
                            <i class="text-xl fas fa-code"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Programming</h3>
                    </div>
                </div>
            </div>
            
            <!-- Web Development Skills -->
            <div class="overflow-hidden transition-all duration-300 bg-white border border-gray-100 rounded-lg shadow-lg hover:shadow-xl wow fadeInUp" data-wow-delay="0.3s">
                <div class="h-2 bg-gradient-to-r from-purple-500 to-purple-700"></div>
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="p-3 mr-4 text-purple-600 bg-purple-100 rounded-full">
                            <i class="text-xl fab fa-html5"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Web Development</h3>
                    </div>
                </div>
            </div>
            
            <!-- Mobile & Database Skills -->
            <div class="overflow-hidden transition-all duration-300 bg-white border border-gray-100 rounded-lg shadow-lg hover:shadow-xl wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-2 bg-gradient-to-r from-turquoise to-turquoise-dark"></div>
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="p-3 mr-4 rounded-full text-turquoise bg-turquoise bg-opacity-20">
                            <i class="text-xl fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Mobile & Database</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center wow fadeInUp">
            <a href="/skills" class="inline-flex items-center px-8 py-4 font-medium text-white transition-all duration-300 transform rounded-lg shadow-lg bg-gradient-to-r from-blue-600 to-turquoise hover:shadow-xl hover:-translate-y-1">
                <span>View All Skills</span>
                <i class="ml-2 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/wow.js@1.1.2/dist/wow.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize typed.js
        const typed = new Typed('#typed', {
            stringsElement: '#typed-strings',
            typeSpeed: 50,
            backSpeed: 30,
            backDelay: 1500,
            startDelay: 1000,
            loop: true,
            showCursor: true,
            cursorChar: '|'
        });
        
        // Initialize particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: "#ffffff" },
                shape: { type: "circle" },
                opacity: { value: 0.5, random: false },
                size: { value: 3, random: true },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#ffffff",
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: "none",
                    random: false,
                    straight: false,
                    out_mode: "out",
                    bounce: false
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: { enable: true, mode: "grab" },
                    onclick: { enable: true, mode: "push" },
                    resize: true
                }
            },
            retina_detect: true
        });
        
        // Initialize WOW.js for scroll animations
        new WOW().init();
    });
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    .wow {
        visibility: hidden;
    }
    #particles-js {
        opacity: 0.3;
    }
    #typed {
        white-space: pre;
    }
</style>
@endpush
