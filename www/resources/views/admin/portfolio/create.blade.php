@extends('layouts.admin')

@section('content')
    
<div class="max-w-7xl mx-auto p-6 lg:p-10 pt-32">
     <div class="flex items-center justify-between mb-8 pt-32">
           <div class="flex flex-col md:flex-row justify-between items-start gap-4 mb-8">
            <div>
                <h1 class="text-4xl font-bold mb-2">Utwórz projekt</h1>
                <p class="text-emerald-400 font-mono text-sm uppercase tracking-widest">Dodaj nową realizację do swojego portfolio</p>
            </div>
           
        </div>
         <a href="#" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Powrót do listy projektów
            </a>
        </div>
        {{-- SUCCESS --}}
            @if (session('success'))
                <div class="mb-6 flex items-start gap-3 rounded-xl border border-green-500/30 bg-green-500/10 p-4 text-green-400 shadow-lg">
                    <i class="fas fa-check-circle mt-1"></i>
                    <div>
                        <p class="font-bold">Sukces</p>
                        <p class="text-sm opacity-90">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            {{-- ERRORS --}}
            @if ($errors->any())
                <div class="mb-6 flex items-start gap-3 rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-red-400 shadow-lg">
                    <i class="fas fa-exclamation-triangle mt-1"></i>
                    <div>
                        <p class="font-bold">Coś poszło nie tak</p>
                        <ul class="text-sm mt-2 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        <form action="{{ route('admin.portfolio.store') }}" method="POST" id="postForm" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Edytor Lewa Strona -->
                <div class="lg:col-span-8 space-y-8">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Tytuł Projektu</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="np. System ERP dla logistyki" class="w-full input-field rounded-lg p-4 text-white">
                         @error('title') <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Technologie</label>
                        <input type="text" placeholder="Laravel, Docker, PostgreSQL, Vue.js" class="w-full input-field rounded-lg p-4 text-white">
                         @error('technology') <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    
                    </section>

                    <section class="bg-[#111827] rounded-3xl p-1 border border-white/5 overflow-hidden">
                        <textarea name="content" id="ezcode-editor"></textarea>
                    </section>
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-white/5">
                    <button type="reset"
                        class="px-6 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-white/5 transition-all font-medium">
                        Resetuj
                    </button>
                    <button type="submit"
                        class="bg-brand hover:bg-brand-dark text-white px-10 py-3 rounded-xl font-bold flex items-center gap-2 transition-all transform hover:scale-[1.02] active:scale-[0.98] shadow-lg shadow-brand/20">
                        <i class="fas fa-paper-plane text-sm"></i>
                        Opublikuj post
                    </button>
                </div>
                </div>
                
                <!-- Sidebar Prawa Strona -->
                <div class="lg:col-span-4 space-y-6 glass-panel rounded-3xl">
                    <div class="bborder border-white/5 rounded-3xl p-6 sticky top-24">
                        <h4 class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-6 flex items-center gap-2">
                            <i data-lucide="layout" class="w-4 h-4"></i> Konfiguracja
                        </h4>
                      
                     <!-- Pole URL -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Link do Live Demo / GitHub</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                                <i class="fas fa-link"></i>
                            </span>
                            <input type="url" placeholder="https://..." class="w-full input-field rounded-lg p-3 pl-12 text-sm text-white">
                        </div>
                    </div>
                   
                        <div class="mb-8 pt-10 ">
                            <label class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Miniatura (16:9)</label>
                            <div class="relative aspect-video rounded-2xl overflow-hidden  border border-dashed border-white/20 flex flex-col items-center justify-center cursor-pointer hover:border-emerald-500/50 group transition-all" id="dropZone">
                                <img id="imgPreview" class="hidden w-full h-full object-cover " src="#" />
                                <div id="uploadPlaceholder" class="flex flex-col items-center gap-2 text-gray-500 group-hover:text-cyan-400 transition-colors">
                                    <i data-lucide="upload" class="w-8 h-8"></i>
                                    <span class="text-[10px] font-bold uppercase tracking-widest hover:border-emerald-500/50">Wgraj obraz</span>
                                </div>
                                <input 
                                    type="file" 
                                    name="image_path"
                                    id="thumbnailInput"
                                    class="absolute inset-0 opacity-0 cursor-pointer" 
                                    accept="image/*"
                                />
                            </div>
                        </div>

                        <!-- LIVE PREVIEW CARD -->
                        <div class="space-y-4 pt-4 border-t border-white/5">
                            <h4 class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Podgląd karty</h4>
                            
                            <div class="scale-[0.85] origin-top mx-auto">
                                <div >
                                    <!-- Projekt 6 -->
                                    <div class="group cursor-pointer">
                                        <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">
                                            <img id="cardThumbnail" src="" class="hidden w-full h-full object-cover opacity-80 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                            <div class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                                <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-brand text-[10px] font-black uppercase tracking-[0.2em] mb-2">Personal Blog / UX</span>
                                            <h4 class="text-white text-lg font-bold leading-tight mb-3 line-clamp-2 min-h-[44px]"id="previewTitle" >Tytuł projektu...</h4>
                                            <div class="flex gap-2">
                                                <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">Gatsby</span>
                                                <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">GraphQL</span>
                                            </div>
                                        </div>
                                    </div>

                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
            </div>
        </form>
</div>
<style>
        body {
            background: radial-gradient(circle at top right, #1a2a4a, #0a0f1a);
            color: #ffffff;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .input-field {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .input-field:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
            outline: none;
        }
        .btn-primary {
            background: #10b981;
            transition: transform 0.2s, background 0.3s;
        }
        .btn-primary:hover {
            background: #059669;
            transform: translateY(-1px);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
    </style>
    <script>
        // Inicjalizacja Ikon
        lucide.createIcons();

        // Inicjalizacja TinyMCE
        tinymce.init({
            selector: '#ezcode-editor',
            height: 500,
            menubar: false,
            license_key: 'gpl',
            skin: 'oxide-dark',
            content_css: 'dark',
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
            toolbar: 'undo redo | blocks | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image gallery | help',
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; font-size: 16px; background: #111827; color: #d1d5db; padding: 20px; } h2, h3 { color: white; font-weight: bold; }',
            setup: (editor) => {
                editor.ui.registry.addButton('gallery', {
                    icon: 'gallery',
                    tooltip: 'Wstaw galerię zdjęć',
                    onAction: () => {
                        const html = `
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin: 20px 0;">
                                <div style="background: #1e293b; border-radius: 12px; height: 150px; display: flex; align-items: center; justify-content: center;">Zdjęcie 1</div>
                                <div style="background: #1e293b; border-radius: 12px; height: 150px; display: flex; align-items: center; justify-content: center;">Zdjęcie 2</div>
                            </div>
                        `;
                        editor.insertContent(html);
                    }
                });
            }
        });

        // Obsługa Live Preview
        const inputTitle = document.getElementById('title');
        const inputExcerpt = document.getElementById('inputExcerpt');
        const inputCategory = document.getElementById('inputCategory');
        const inputReadTime = document.getElementById('inputReadTime');
        const thumbnailInput = document.getElementById('thumbnailInput');

        const previewTitle = document.getElementById('previewTitle');
    
        const cardThumbnail = document.getElementById('cardThumbnail');
        const cardThumbnailPlaceholder = document.getElementById('cardThumbnailPlaceholder');
        const imgPreview = document.getElementById('imgPreview');
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');

        inputTitle.addEventListener('input', (e) => {
            previewTitle.innerText = e.target.value || "Tytuł artykułu...";
        });

      
        thumbnailInput.addEventListener('change', function(e) {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imgPreview.src = event.target.result;
                    imgPreview.classList.remove('hidden');
                    uploadPlaceholder.classList.add('hidden');
                    
                    cardThumbnail.src = event.target.result;
                    cardThumbnail.classList.remove('hidden');
                    cardThumbnailPlaceholder.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection