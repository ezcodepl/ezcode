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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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
    @include('partials.admin-navbar')


    <main>
   
        @yield('content')
    </main>

    @include('partials.admin-footer')

    @stack('scripts')
    
   <script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof tinymce !== 'undefined') {
        tinymce.init({
            selector: 'textarea#content',
            plugins: 'image link media table code lists',
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | bullist numlist | link image media | code',
            height: 400,
            menubar: false,
            
            // ===== DARK / TRANSPARENT STYLE =====
            skin: 'oxide-dark', // wbudowana ciemna skórka
            content_css: 'dark', // wbudowany dark content CSS
            // jeśli chcesz w pełni transparent, można nadpisać poniżej
            content_style: "body { background-color: transparent; color: #f8fafc; font-family: 'Inter', sans-serif; }",
            
            images_upload_url: '{{ route("admin.posts.uploadImage") }}',
            images_upload_credentials: true,
            automatic_uploads: true,
            images_reuse_filename: true
        });
        console.log("TinyMCE initialized (dark)");
    } else {
        console.error("TinyMCE not loaded");
    }
});
</script>
</body>
</html>