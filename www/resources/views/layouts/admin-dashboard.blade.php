<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ezCode - Full Stack Developer')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"/>

<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
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
    
    <main>
   
        @yield('content')
    </main>

    @include('partials.admin-footer')

    @stack('scripts')
  
    <script>
        // Funkcja inicjalizująca z jawnym wskazaniem ścieżek
        function initEditor() {
            if (window.tinymce) {
                tinymce.init({
                    selector: 'textarea',
                    license_key: 'gpl',
                    
                    // base_url musi być adresem URL, nie ścieżką systemową
                    base_url: "{{ asset('js/tinymce') }}",
                    suffix: '.min',
                    
                    // Skórki i style
                    skin: 'oxide-dark',
                    skin_url: "{{ asset('js/tinymce/skins/ui/oxide-dark') }}",
                    content_css: "{{ asset('js/tinymce/skins/content/dark/content.min.css') }}",
                    
                    plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
                    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | code fullscreen',
                    
                    height: 500,
                    menubar: false,
                    branding: false,
                    promotion: false,
                    
                    content_style: `
                        body { 
                            font-family: 'Inter', sans-serif; 
                            background-color: #0f172a; 
                            color: #f8fafc; 
                            line-height: 1.6;
                            padding: 1rem;
                        }
                    `,

                    // API do zdjęć
                    images_upload_url: "{{ url('/admin/posts/upload-image') }}",
                    automatic_uploads: true,
                    
                    images_upload_handler: (blobInfo, progress) => new Promise((resolve, reject) => {
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', "{{ url('/admin/posts/upload-image') }}");
                        xhr.setRequestHeader("X-CSRF-Token", "{{ csrf_token() }}");

                        xhr.upload.onprogress = (e) => progress(e.loaded / e.total * 100);

                        xhr.onload = function() {
                            if (xhr.status < 200 || xhr.status >= 300) {
                                reject('Błąd: ' + xhr.status);
                                return;
                            }
                            const json = JSON.parse(xhr.responseText);
                            if (!json || typeof json.location != 'string') {
                                reject('Błąd odpowiedzi');
                                return;
                            }
                            resolve(json.location);
                        };

                        const formData = new FormData();
                        formData.append('file', blobInfo.blob(), blobInfo.filename());
                        xhr.send(formData);
                    }),

                    setup: function(editor) {
                        editor.on('init', function() {
                            const loader = document.getElementById('editor-loader');
                            if(loader) loader.style.display = 'none';
                            
                            const editorEl = document.querySelector('.tox-tinymce');
                            if(editorEl) editorEl.style.visibility = 'visible';
                            
                            document.getElementById('content').classList.remove('opacity-0');
                        });
                    }
                });
            } else {
                // Ponawiamy próbę jeśli skrypt jeszcze się nie załadował
                setTimeout(initEditor, 200);
            }
        }

        window.onload = initEditor;
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
    </script>
   
  
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    const lightbox = GLightbox({
        selector: '.glightbox'
    });
</script>

</body>
</html>