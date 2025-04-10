@extends('_layouts.master')

@section('body')
<section class="relative py-20 bg-gray-50">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 opacity-10 bg-pattern"></div>
        <!-- Adding animated particles for background effect -->
        <div class="absolute inset-0" id="particles-js"></div>
    </div>
    <div class="container relative z-10 max-w-6xl px-6 mx-auto">
        <h1 class="mb-4 text-4xl font-bold text-center text-gray-800">My Projects</h1>
        <div class="w-24 h-1 mx-auto mb-8 rounded-full bg-turquoise"></div>
        <p class="max-w-3xl mx-auto mb-16 text-center text-gray-600">A collection of academic and personal projects that showcase my technical skills and problem-solving abilities.</p>
        
        @php
            // Reading project files directly
            $projectsPath = __DIR__ . '/../source/_information/projects';
            $projectFiles = is_dir($projectsPath) ? glob($projectsPath . '/*.md') : [];
            
            $parsedProjects = [];
            $projectCategories = [];
            
            foreach ($projectFiles as $file) {
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
                        
                        $project = [];
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
                                // Handle arrays (for technologies)
                                else if (preg_match('/^\[(.*)\]$/', $value, $arrayMatch)) {
                                    $value = array_map('trim', explode(',', $arrayMatch[1]));
                                }
                                
                                $project[$key] = $value;
                            }
                        }
                        
                        if (!empty($project) && isset($project['title'])) {
                            $project['description'] = $description;
                            $parsedProjects[] = $project;
                            
                            // Track categories for grouping
                            if (isset($project['category']) && !in_array($project['category'], $projectCategories)) {
                                $projectCategories[] = $project['category'];
                            }
                        }
                    }
                } catch (Exception $e) {
                    // Silently handle errors
                }
            }
            
            // Sort projects by year (descending)
            usort($parsedProjects, function($a, $b) {
                $yearA = isset($a['year']) ? (int)$a['year'] : 0;
                $yearB = isset($b['year']) ? (int)$b['year'] : 0;
                return $yearB - $yearA;
            });
            
            // Sort categories
            sort($projectCategories);
        @endphp
        
        @if (empty($parsedProjects))
            <div class="p-4 text-center bg-white rounded-lg shadow-sm">
                <h2 class="mb-2 text-xl font-bold text-red-500">No projects found</h2>
                <p class="text-sm text-gray-600">Please check that project files exist in the _information/projects directory.</p>
            </div>
        @else
            <div class="grid gap-8 md:grid-cols-2">
                @foreach ($parsedProjects as $project)
                    <div class="overflow-hidden transition-all duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
                        <div class="p-4 bg-turquoise">
                            <h3 class="text-xl font-bold text-white">{{ $project['title'] }}</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex flex-wrap items-center gap-2 mb-4">
                                @if (isset($project['technologies']))
                                    @php 
                                        $technologies = is_array($project['technologies']) 
                                            ? $project['technologies'] 
                                            : explode(',', $project['technologies']);
                                    @endphp
                                    @foreach ($technologies as $tech)
                                        <span class="px-3 py-1 text-xs font-semibold 
                                            @if (trim($tech) == 'C++') text-blue-800 bg-blue-100 
                                            @elseif (trim($tech) == 'Flutter' || trim($tech) == 'Dart') text-purple-800 bg-purple-100 
                                            @elseif (trim($tech) == 'C') text-red-800 bg-red-100 
                                            @elseif (trim($tech) == 'Java') text-yellow-800 bg-yellow-100
                                            @elseif (trim($tech) == 'Python') text-green-800 bg-green-100
                                            @elseif (trim($tech) == 'JavaScript') text-orange-800 bg-orange-100
                                            @elseif (trim($tech) == 'HTML') text-pink-800 bg-pink-100
                                            @elseif (trim($tech) == 'CSS') text-teal-800 bg-teal-100
                                            @elseif (trim($tech) == 'PHP') text-blue-800 bg-blue-100
                                            @elseif (trim($tech) == 'SQL') text-indigo-800 bg-indigo-100
                                            @elseif (trim($tech) == 'Laravel') text-indigo-800 bg-indigo-100
                                            @elseif (trim($tech) == 'Flutter') text-purple-800 bg-purple-100
                                            @elseif (trim($tech) == 'Dart') text-purple-800 bg-purple-100
                                            @elseif (trim($tech) == 'Firebase') text-yellow-800 bg-yellow-100
                                            @else text-gray-800 bg-gray-100 
                                            @endif 
                                            rounded-full">{{ trim($tech) }}</span>
                                    @endforeach
                                @endif
                                @if (isset($project['grade']))
                                    <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Grade: {{ $project['grade'] }}/20</span>
                                @endif
                            </div>
                            <p class="mb-6 text-gray-700">{{ $project['description'] }}</p>
                            <div class="flex justify-between pt-4 border-t border-gray-200">
                                <div class="flex items-center">
                                    <i class="mr-2 text-gray-600 fas fa-calendar"></i>
                                    <span class="text-sm text-gray-600">{{ $project['year'] }}</span>
                                </div>
                                @if (isset($project['github']))
                                    <a href="{{ $project['github'] }}" class="flex items-center text-turquoise hover:underline" target="_blank">
                                        <span>View on GitHub</span>
                                        <i class="ml-2 fas fa-external-link-alt"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
