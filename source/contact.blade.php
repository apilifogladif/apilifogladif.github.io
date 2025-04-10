@extends('_layouts.master')

@section('body')
<section class="relative py-20 bg-gradient-to-b from-gray-50 to-gray-100">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 opacity-15 bg-pattern"></div>
        <!-- Enhanced animated particles for background effect -->
        <div class="absolute inset-0" id="particles-js"></div>
    </div>
    <div class="container relative z-10 max-w-4xl px-6 mx-auto">
        <h1 class="mb-4 text-4xl font-bold text-center text-gray-800">Get In Touch</h1>
        <div class="w-24 h-1 mx-auto mb-8 rounded-full bg-turquoise"></div>
        <p class="max-w-3xl mx-auto mb-12 text-center text-gray-600">Feel free to reach out to me for collaboration opportunities, project inquiries, or just to say hello. I'm always open to new connections!</p>
        
        <div class="transition-all duration-300 hover:transform hover:scale-[1.01]">
            <div class="p-10 bg-white shadow-lg rounded-xl">
                <h2 class="mb-8 text-2xl font-bold text-gray-800">Contact Information</h2>
                
                <div class="space-y-8">
                    <div class="flex items-start transition-transform duration-300 hover:translate-x-2">
                        <div class="flex items-center justify-center w-12 h-12 mr-5 text-xl rounded-full bg-lightTurquoise">
                            <i class="text-turquoise fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Email</h3>
                            <a href="mailto:filipajacobfidalgo@gmail.com" class="text-turquoise hover:underline hover:text-turquoise-dark">filipajacobfidalgo@gmail.com</a>
                        </div>
                    </div>
                    
                    <div class="flex items-start transition-transform duration-300 hover:translate-x-2">
                        <div class="flex items-center justify-center w-12 h-12 mr-5 text-xl rounded-full bg-lightTurquoise">
                            <i class="text-turquoise fab fa-linkedin"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">LinkedIn</h3>
                            <a href="https://www.linkedin.com/in/filipa-fidalgo-a28a48247/" target="_blank" rel="noopener noreferrer" class="text-turquoise hover:underline hover:text-turquoise-dark">Filipa Fidalgo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-12 text-center">
            <p class="text-gray-600">I typically respond within 24-48 hours</p>
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
