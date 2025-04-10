@extends('_layouts.master')

@section('body')
<section class="relative py-20 bg-gray-50">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 opacity-10 bg-pattern"></div>
        <!-- Adding animated particles for background effect -->
        <div class="absolute inset-0" id="particles-js"></div>
    </div>
    <div class="container relative z-10 max-w-6xl px-4 mx-auto">
        <h1 class="mb-4 text-4xl font-bold text-center text-gray-800">Skills & Expertise</h1>
        <div class="w-24 h-1 mx-auto mb-8 rounded-full bg-turquoise"></div>
        <p class="max-w-3xl mx-auto mb-16 text-center text-gray-600">A comprehensive overview of my technical skills, programming languages, and tools I've worked with throughout my academic and personal projects.</p>
        
        @php
            // Since $page->skills isn't working, let's try reading the files directly
            $skillsPath = __DIR__ . '/../source/_information/skills';
            $skillFiles = is_dir($skillsPath) ? glob($skillsPath . '/*.md') : [];
            
            $parsedSkills = [];
            $skillCategories = [];
            $parseErrors = [];
             
            foreach ($skillFiles as $file) {
                try {
                    $content = file_get_contents($file);
                    $filename = basename($file);
                    
                    // Fix for Markdown files with a comment line at the top
                    $content = preg_replace('/^<!--.*?-->\s*/s', '', $content);
                    
                    // Now parse the frontmatter
                    if (preg_match('/^---\s*$(.*?)^---\s*$(.*)/sm', $content, $matches)) {
                        $yaml = $matches[1];
                        $description = trim($matches[2]);
                        
                        // Parse YAML line by line
                        $skill = [];
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
                                
                                $skill[$key] = $value;
                            }
                        }
                        
                        if (!empty($skill) && isset($skill['name'])) {
                            $skill['description'] = $description;
                            $parsedSkills[] = $skill;
                            
                            // Track categories for grouping
                            if (isset($skill['category']) && !in_array($skill['category'], $skillCategories)) {
                                $skillCategories[] = $skill['category'];
                            }
                        }
                    }
                } catch (Exception $e) {
                    // Silently handle errors
                }
            }
            
            // Sort skills by proficiency (descending)
            usort($parsedSkills, function($a, $b) {
                $profA = isset($a['proficiency']) ? (int)$a['proficiency'] : 0;
                $profB = isset($b['proficiency']) ? (int)$b['proficiency'] : 0;
                return $profB - $profA;
            });
            
            // Sort categories
            sort($skillCategories);
        @endphp
        
        @if (empty($parsedSkills))
            <div class="p-4 text-center bg-white rounded-lg shadow-sm">
                <h2 class="mb-2 text-xl font-bold text-red-500">No skills found</h2>
                <p class="text-sm text-gray-600">Please check that skill files exist in the _information/skills directory.</p>
            </div>
        @else
            <!-- Display skills by category -->
            @foreach ($skillCategories as $category)
                <div class="mb-8">
                    <h2 class="mb-4 text-xl font-bold text-center text-gray-800 capitalize">{{ $category }}</h2>
                    <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
                        @foreach ($parsedSkills as $skill)
                            @if (isset($skill['category']) && $skill['category'] === $category)
                                <div class="p-4 transition-shadow bg-white rounded-lg shadow-sm hover:shadow-md">
                                    <div class="flex items-center mb-2">
                                        <h3 class="text-base font-semibold text-gray-800">{{ $skill['name'] }}</h3>
                                    </div>
                                    
                                    @if (isset($skill['proficiency']))
                                        <div class="mb-2">
                                            <div class="flex justify-between mb-1">
                                                <span class="text-xs font-medium text-gray-700">Proficiency</span>
                                                <span class="text-xs font-medium text-gray-700">{{ $skill['proficiency'] }}%</span>
                                            </div>
                                            <div class="w-full h-1.5 bg-gray-200 rounded-full">
                                                <div class="h-1.5 rounded-full bg-turquoise" style="width: {{ $skill['proficiency'] }}%"></div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    @if (isset($skill['description']) && !empty($skill['description']))
                                        <p class="mt-2 text-xs text-gray-600">{{ \Illuminate\Support\Str::limit($skill['description'], 100) }}</p>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
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
