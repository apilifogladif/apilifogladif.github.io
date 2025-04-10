@extends('_layouts.master')

@section('body')
<section class="relative py-20 bg-gradient-to-b from-gray-50 to-gray-100">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 opacity-10 bg-pattern"></div>
        <!-- Adding animated particles for background effect -->
        <div class="absolute inset-0" id="particles-js"></div>
    </div>
    <div class="container relative z-10 max-w-5xl px-6 mx-auto">
        <h1 class="mb-4 text-4xl font-bold text-center text-gray-800">Professional Experience</h1>
        <div class="w-24 h-1 mx-auto mb-8 rounded-full bg-turquoise"></div>
        <p class="max-w-2xl mx-auto mb-16 text-lg text-center text-gray-600">A chronological overview of my professional journey and career achievements.</p>
        
        <!-- Experience Items -->
        @php
            // Reading experience files directly
            $experiencePath = __DIR__ . '/../source/_information/experience';
            $experienceFiles = is_dir($experiencePath) ? glob($experiencePath . '/*.md') : [];
            
            $parsedExperiences = [];
            
            foreach ($experienceFiles as $file) {
                try {
                    $content = file_get_contents($file);
                    // Fix for Markdown files with a comment line at the top
                    $content = preg_replace('/^<!--.*?-->\s*/s', '', $content);
                    
                    // Parse the frontmatter
                    if (preg_match('/^---\s*$(.*?)^---\s*$(.*)/sm', $content, $matches)) {
                        $yaml = $matches[1];
                        $description = trim($matches[2]);
                        
                        // Parse YAML line by line
                        $experience = [];
                        foreach (preg_split('/\r?\n/', $yaml) as $line) {
                            $line = trim($line);
                            if (empty($line)) continue;
                            
                            if (preg_match('/^(\w+):\s*(.*)$/', $line, $parts)) {
                                $key = $parts[1];
                                $value = trim($parts[2]);
                                
                                // Handle numbers
                                if (is_numeric($value)) {
                                    $value = $value + 0;
                                }
                                
                                $experience[$key] = $value;
                            }
                        }
                        
                        if (!empty($experience) && isset($experience['title'])) {
                            $experience['description'] = $description;
                            $parsedExperiences[] = $experience;
                        }
                    }
                } catch (Exception $e) {
                    // Silently handle errors
                }
            }
            
            // Sort experiences by order (ascending)
            usort($parsedExperiences, function($a, $b) {
                $orderA = isset($a['order']) ? $a['order'] : PHP_INT_MAX;
                $orderB = isset($b['order']) ? $b['order'] : PHP_INT_MAX;
                return $orderA - $orderB;
            });
        @endphp
        
        <div class="space-y-12">
            @foreach ($parsedExperiences as $index => $experience)
                <div class="transition-all duration-300 bg-white shadow-md group rounded-xl hover:shadow-lg" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="grid grid-cols-1 md:grid-cols-10">
                        <!-- Left timeline indicator -->
                        <div class="relative items-center justify-center hidden md:flex md:col-span-1 bg-turquoise rounded-l-xl">
                            <div class="absolute right-0 w-1 h-full transform translate-x-1/2 bg-turquoise-dark"></div>
                            <div class="z-10 flex items-center justify-center w-10 h-10 bg-white rounded-full shadow-md">
                                <i class="text-lg fas fa-briefcase text-turquoise-dark"></i>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6 md:p-8 md:col-span-9">
                            <!-- Header Section -->
                            <div class="flex flex-col mb-4 md:flex-row md:items-center md:justify-between">
                                <div>
                                    <div class="mb-1 gap-x-3">
                                        <h3 class="flex items-center text-2xl font-bold leading-none text-gray-800">
                                            {{ $experience['title'] }}
                                        </h3>
                                    </div>
                                    <span class="px-3 py-1 text-xs font-semibold text-gray-600 bg-gray-100 rounded-full">
                                        {{ $experience['type'] }}
                                    </span>
                                    <p class="flex items-center text-gray-600">
                                        <i class="mr-2 fas fa-building text-turquoise-dark"></i>
                                        {{ $experience['institution'] }}
                                    </p>
                                </div>
                                <div class="mt-2 md:mt-0">
                                    <span class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-full bg-turquoise-light text-turquoise-dark">
                                        <i class="mr-1 fas fa-calendar-alt"></i>
                                        {{ $experience['start_date'] }} - {{ $experience['end_date'] }}
                                    </span>
                                </div>
                            </div>
                          
                            <!-- Description Section -->
                            @if (!empty($experience['description']))
                                <div class="pt-4 mt-4 border-t border-gray-100">
                                    <p class="leading-relaxed text-gray-700">
                                        {{ $experience['description'] }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            
            @if (empty($parsedExperiences))
                <div class="p-8 mt-8 text-center bg-white rounded-lg shadow-md">
                    <i class="block mb-4 text-4xl text-gray-400 fas fa-briefcase"></i>
                    <p class="text-gray-700">No professional experience entries found.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: "#000000" },
                shape: { type: "circle" },
                opacity: { value: 0.5, random: false },
                size: { value: 3, random: true },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#000000",
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
    });
</script>
@endpush
