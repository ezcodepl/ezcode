<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ezCode - Full Stack Developer')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { DEFAULT: '#0ea5e9', dark: '#0284c7', light: '#38bdf8' },
                        darkbg: '#0f172a',
                        cardbg: '#1e293b'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif'],
                        mono: ['Fira Code', 'monospace']
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
     <!-- Font Awesome dla ikon w stopce -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0f172a; color: #f8fafc; }
        .glass-nav { background: rgba(15, 23, 42, 0.9); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255, 255, 255, 0.05); }
        
        /* Style Slidera */
        .slide { display: none; animation: fadeIn 0.8s ease-in-out; }
        .slide.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        
        .dot { cursor: pointer; height: 10px; width: 10px; margin: 0 5px; background-color: rgba(255,255,255,0.2); border-radius: 50%; display: inline-block; transition: all 0.3s ease; }
        .dot.active { background-color: #0ea5e9; width: 25px; border-radius: 5px; }
    </style>
    @stack('styles')
</head>
<body class="antialiased selection:bg-brand selection:text-white bg-darkbg text-white">
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(29,78,216,0.15),transparent_45%),radial-gradient(circle_at_bottom_left,rgba(157,78,221,0.1),transparent_45%)]"></div>
    </div>

    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(29,78,216,0.12),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(157,78,221,0.08),transparent_40%)]"></div>
        <div class="absolute inset-0 opacity-[0.02] bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
    </div>
    @include('partials.navbar')


    <main>
   
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // NAVBAR SCROLL EFFECT
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar?.classList.add('glass-nav', 'py-3');
                } else {
                    navbar?.classList.remove('glass-nav', 'py-3');
                }
            });

            // LOGIKA SLIDERA
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.dot');
            let slideIndex = 0;
            let slideInterval;

            if (slides.length > 0) {
                function showSlide(n) {
                    slides.forEach(s => s.classList.remove('active'));
                    dots.forEach(d => d.classList.remove('active'));
                    slideIndex = (n + slides.length) % slides.length;
                    slides[slideIndex].classList.add('active');
                    if(dots[slideIndex]) dots[slideIndex].classList.add('active');
                }

                window.changeSlide = (n) => { showSlide(slideIndex + n); resetInterval(); };
                window.currentSlide = (n) => { showSlide(n); resetInterval(); };

                const startInterval = () => { slideInterval = setInterval(() => showSlide(slideIndex + 1), 8000); };
                const resetInterval = () => { clearInterval(slideInterval); startInterval(); };

                showSlide(0);
                startInterval();
            }
        });
          // Scroll effect for navbar
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.classList.add('glass-nav', 'py-3');
                } else {
                    navbar.classList.remove('glass-nav', 'py-3');
                }
            }
        });

        // Initialize Lucide icons
        lucide.createIcons();
    </script>
    
</body>
</html>