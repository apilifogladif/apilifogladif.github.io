@extends('_layouts.master')

@section('body')
<section class="relative py-16 bg-gray-50">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 opacity-10 bg-pattern"></div>
        <!-- Adding animated particles for background effect -->
        <div class="absolute inset-0" id="particles-js"></div>
    </div>
    <div class="container relative z-10 max-w-5xl px-6 mx-auto">
        <h1 class="mb-8 text-4xl font-bold text-center text-gray-800">About Me</h1>
        
        @php
            $aboutPath = __DIR__ . '/../source/_information/about.md';
            $aboutContent = is_file($aboutPath) ? file_get_contents($aboutPath) : '';
            
            // Fix for Markdown files with a comment line at the top
            $aboutContent = preg_replace('/^<!--.*?-->\s*/s', '', $aboutContent);
            
            // Parse the frontmatter
            if (preg_match('/^---\s*$(.*?)^---\s*$(.*)/sm', $aboutContent, $matches)) {
                $yaml = $matches[1];
                $description = trim($matches[2]);
                
                // Parse YAML line by line
                $aboutInfo = [];
                foreach (preg_split('/\r?\n/', $yaml) as $line) {
                    $line = trim($line);
                    if (empty($line)) continue;
                    
                    if (preg_match('/^(\w+):\s*(.*)$/', $line, $parts)) {
                        $key = $parts[1];
                        $value = trim($parts[2]);
                        
                        // Handle numbers
                        if (is_numeric($value)) {
                            $value = $value + 0; // Convert to number
                        }
                        
                        $aboutInfo[$key] = $value;
                    }
                }
            }
        @endphp
        
        <div class="flex flex-col gap-10 md:flex-row">
            <div class="mr-6 md:w-1/3">
                <div class="relative mx-auto mb-6 overflow-hidden rounded-lg shadow-lg w-60 h-72 md:w-full">
                    <img src="/assets/img/main_pic.jpg" alt="{{ $page->siteName }}" class="object-cover w-full h-full">
                </div>
                
                <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
                    <h3 class="mb-4 text-xl font-semibold text-gray-800">Quick Info</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex">
                            <i class="mr-3 text-turquoise fas fa-user"></i>
                            <span>{{ $aboutInfo['name'] ?? 'Filipa Fidalgo' }}</span>
                        </li>
                        <li class="flex">
                            <i class="mr-3 text-turquoise fas fa-calendar"></i>
                            <span>{{ $aboutInfo['age'] ?? '20 years old' }}</span>
                        </li>
                        <li class="flex">
                            <i class="mr-3 text-turquoise fas fa-map-marker-alt"></i>
                            <span>{{ $aboutInfo['location'] ?? 'Porto, Portugal' }}</span>
                        </li>
                        <li class="flex">
                            <i class="mr-3 text-turquoise fas fa-graduation-cap"></i>
                            <span>{{ $aboutInfo['education'] ?? 'BSc in Informatics and Computing Engineering' }}</span>
                        </li>
                        <li class="flex">
                            <i class="mr-3 text-turquoise fas fa-briefcase"></i>
                            <span>{{ $aboutInfo['job'] ?? 'AI Developer Analyst at UPGRAIDE' }}</span>
                        </li>
                        <li class="flex">
                            <i class="mr-3 text-turquoise fas fa-envelope"></i>
                            <a href="mailto:{{ $aboutInfo['email'] ?? 'filipajacobfidalgo@gmail.com' }}" class="text-blue-600 hover:underline">{{ $aboutInfo['email'] ?? 'filipajacobfidalgo@gmail.com' }}</a>
                        </li>
                    </ul>
                </div>
                
                <div class="flex justify-center">
                    <a href="assets/files/Filipa Fidalgo.pdf" download class="inline-block px-6 py-3 font-medium text-white transition duration-300 rounded-lg shadow bg-turquoise hover:bg-turquoise-dark">
                        <i class="mr-2 fas fa-download"></i>Download CV
                    </a>
                </div>
            </div>
            
            <div class="md:w-2/3">
                <div class="p-8 mb-8 bg-white rounded-lg shadow-md">
                    <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b border-gray-200">About Myself</h2>
                    <div class="mb-4 leading-relaxed text-gray-700">
                        {!! \Michelf\Markdown::defaultTransform($description) !!}
                    </div>
                </div>
                
                <div class="p-8 bg-white rounded-lg shadow-md">
                    <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b border-gray-200">Languages</h2>
                    <div class="space-y-4">
                        @php
                            // Reading language files directly
                            $languagesPath = __DIR__ . '/../source/_information/languages';
                            $languageFiles = is_dir($languagesPath) ? glob($languagesPath . '/*.md') : [];
                            
                            $parsedLanguages = [];
                            
                            foreach ($languageFiles as $file) {
                                try {
                                    $content = file_get_contents($file);
                                    // Fix for Markdown files with a comment line at the top
                                    $content = preg_replace('/^<!--.*?-->\s*/s', '', $content);
                                    
                                    // Parse the frontmatter
                                    if (preg_match('/^---\s*$(.*?)^---\s*$(.*)/sm', $content, $matches)) {
                                        $yaml = $matches[1];
                                        
                                        // Parse YAML line by line
                                        $language = [];
                                        foreach (preg_split('/\r?\n/', $yaml) as $line) {
                                            $line = trim($line);
                                            if (empty($line)) continue;
                                            
                                            if (preg_match('/^(\w+):\s*(.*)$/', $line, $parts)) {
                                                $key = $parts[1];
                                                $value = trim($parts[2]);
                                                
                                                // Handle numbers
                                                if (is_numeric($value)) {
                                                    $value = $value + 0; // Convert to number
                                                }
                                                
                                                $language[$key] = $value;
                                            }
                                        }
                                        
                                        if (!empty($language) && isset($language['language'])) {
                                            $parsedLanguages[] = $language;
                                        }
                                    }
                                } catch (Exception $e) {
                                    // Silently handle errors
                                }
                            }
                            
                            // Sort languages by level (descending)
                            usort($parsedLanguages, function($a, $b) {
                                $levelA = isset($a['level']) ? (int)$a['level'] : 0;
                                $levelB = isset($b['level']) ? (int)$b['level'] : 0;
                                return $levelB - $levelA;
                            });
                        @endphp
                        
                        @foreach ($parsedLanguages as $language)
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-base font-medium text-gray-700">{{ $language['language'] }}</span>
                                    <span class="text-sm font-medium text-gray-600">{{ $language['description'] }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="h-2.5 rounded-full bg-turquoise" style="width: {{ $language['level'] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="p-8 mt-8 bg-white rounded-lg shadow-md">
                    <h2 class="pb-2 mb-4 text-2xl font-bold text-gray-800 border-b border-gray-200">Extracurricular Activities</h2>
                    
                    @php
                        // Reading extracurricular activities files directly
                        $activitiesPath = __DIR__ . '/../source/_information/extra_activities';
                        $activityFiles = is_dir($activitiesPath) ? glob($activitiesPath . '/*.md') : [];
                        
                        $parsedActivities = [];
                        
                        foreach ($activityFiles as $file) {
                            try {
                                $content = file_get_contents($file);
                                // Fix for Markdown files with a comment line at the top
                                $content = preg_replace('/^<!--.*?-->\s*/s', '', $content);
                                
                                // Parse the frontmatter
                                if (preg_match('/^---\s*$(.*?)^---\s*$(.*)/sm', $content, $matches)) {
                                    $yaml = $matches[1];
                                    $description = trim($matches[2]);
                                    
                                    // Parse YAML line by line
                                    $activity = [];
                                    foreach (preg_split('/\r?\n/', $yaml) as $line) {
                                        $line = trim($line);
                                        if (empty($line)) continue;
                                        
                                        if (preg_match('/^(\w+):\s*(.*)$/', $line, $parts)) {
                                            $key = $parts[1];
                                            $value = trim($parts[2]);
                                            
                                            $activity[$key] = $value;
                                        }
                                    }
                                    
                                    if (!empty($activity) && isset($activity['title'])) {
                                        $activity['description'] = $description;
                                        $parsedActivities[] = $activity;
                                    }
                                }
                            } catch (Exception $e) {
                                // Silently handle errors
                            }
                        }
                        
                        // Sort activities by date (most recent first)
                        usort($parsedActivities, function($a, $b) {
                            // If end_date contains "Present", it should be first
                            if (isset($a['end_date']) && strpos($a['end_date'], 'Present') !== false) {
                                return -1;
                            }
                            if (isset($b['end_date']) && strpos($b['end_date'], 'Present') !== false) {
                                return 1;
                            }
                            
                            // Otherwise compare by start_date
                            $dateA = isset($a['start_date']) ? strtotime($a['start_date']) : 0;
                            $dateB = isset($b['start_date']) ? strtotime($b['start_date']) : 0;
                            return $dateB - $dateA;
                        });
                    @endphp
                    
                    @foreach ($parsedActivities as $activity)
                        <div class="mb-6">
                            <div class="flex items-start mb-2">
                                <div class="flex items-center justify-center w-10 h-10 mr-4 rounded-full bg-lightTurquoise">
                                    <i class="text-turquoise fas fa-{{ $activity['icon'] ?? 'star' }} flex items-center justify-center w-10 h-10"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $activity['title'] }}</h3>
                                    @if (isset($activity['start_date']) && isset($activity['end_date']))
                                        <p class="text-sm text-gray-600">{{ $activity['start_date'] }} - {{ $activity['end_date'] }}</p>
                                    @endif
                                    <p class="mt-1 text-gray-700">{{ $activity['description'] }}</p> 
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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
