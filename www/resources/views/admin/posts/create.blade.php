@extends('layouts.admin')

@section('content')
    <!-- <div class="max-w-4xl mx-auto p-6 pt-32">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-heading font-bold text-white">Utwórz nowy post</h2>
                <p class="text-gray-400 text-sm italic code-font">Dodaj nową treść do swojej bazy</p>
            </div>
            <a href="{{ route('admin.posts.index') }}"
                class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                <i class="fas fa-arrow-left text-sm"></i>
                Powrót do listy
            </a>
        </div>

        <div class="bg-cardbg border border-white/5 rounded-2xl shadow-2xl p-8">
            <form action="{{ route('admin.posts.store') }}" method="POST" class="space-y-6" novalidate>
                @csrf

                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-gray-300 ml-1">Tytuł posta</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        placeholder="Wpisz chwytliwy tytuł..."
                        class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all shadow-inner"
                        required>
                    @error('title') <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="date_public" class="block text-sm font-medium text-gray-300 ml-1">Data
                            publikacji</label>
                        <div class="relative">
                            <input type="date" name="date_public" id="date_public" value="{{ old('date_public') }}"
                                class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all appearance-none">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="status" class="block text-sm font-medium text-gray-300 ml-1">Status</label>
                        <select name="status" id="status"
                            class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all cursor-pointer">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Szkic (Draft)</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Opublikowany
                            </option>
                            <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Zarchiwizowany
                            </option>
                        </select>
                    </div>
                </div>


                <div class="space-y-2">
                    <label for="content" class="block text-sm font-medium text-gray-300 ml-1">Treść posta</label>
                    <textarea name="content" id="content" rows="8" placeholder="Zacznij pisać tutaj..."
                        class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all resize-none shadow-inner"
                        required></textarea>
                    @error('content') <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

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
            </form>
        </div>
    </div> -->

<div class="max-w-7xl mx-auto p-6 lg:p-10 pt-32">
     <div class="flex items-center justify-between mb-8 pt-32">
            <div>
                <h2 class="text-3xl font-heading font-bold text-white">Utwórz nowy post</h2>
                <p class="text-gray-400 text-sm italic code-font">Dodaj nową treść do swojej bazy</p>
            </div>
            <a href="{{ route('admin.posts.index') }}"
                class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                <i class="fas fa-arrow-left text-sm"></i>
                Powrót do listy
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
        <form action="{{ route('admin.posts.store') }}" method="POST" id="postForm" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Edytor Lewa Strona -->
                <div class="lg:col-span-8 space-y-8">
                    <section class="space-y-4">
                        <div class="space-y-2">
                    <label for="title" class="block text-lg font-medium text-gray-300 ml-1">Tytuł posta</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        placeholder="Wpisz chwytliwy tytuł..."
                        class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all shadow-inner"
                        required>
                    @error('title') <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
                </div>
                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-gray-300 ml-1"></label>
                     <input
                            name="excerpt"
                            id="inputExcerpt"
                            placeholder="Krótki opis posta...."
                        class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all shadow-inner"
                        >
                    @error('title') <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
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
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-[#1a1f2e] border border-white/5 rounded-3xl p-6 sticky top-24">
                        <h4 class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-6 flex items-center gap-2">
                            <i data-lucide="layout" class="w-4 h-4"></i> Konfiguracja
                        </h4>

                        <div class="mb-6">
                            <label class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Kategoria</label>
                            <select 
                                name="category"
                                id="inputCategory"
                                class="w-full bg-[#0d1321] border border-white/10 rounded-xl px-4 py-3 text-sm text-white outline-none focus:border-cyan-500 transition-colors appearance-none"
                            >
                                <option value="DEVELOPMENT">DEVELOPMENT</option>
                                <option value="ARCHITECTURE">ARCHITECTURE</option>
                                <option value="DEVOPS">DEVOPS</option>
                                <option value="DESIGN">DESIGN</option>
                            </select>
                        </div>
                         <div class="space-y-2 pb-2">
                        <label for="status" class="block text-sm font-medium text-gray-300 ml-1">Status</label>
                        <select name="status" id="status"
                            class="w-full bg-[#0d1321] border border-white/10 rounded-xl px-4 py-3 text-sm text-white outline-none focus:border-cyan-500 transition-colors appearance-none">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Szkic (Draft)</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Opublikowany
                            </option>
                            <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Zarchiwizowany
                            </option>
                        </select>
                    </div>

                        <div class="space-y-2">
                        <label for="date_public" class="block text-sm font-medium text-gray-300 ml-1">Data
                            publikacji</label>
                        <div class="relative">
                            <input type="date" name="date_public" id="date_public" value="{{ old('date_public') }}"
                                class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all appearance-none">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm text-gray-300">Czas czytania</label>
                        <input 
                            type="text"
                            name="read_time"
                            id="inputReadTime"
                            placeholder="np. 5 min"
                            class="w-full bg-[#0d1321] border border-white/10 rounded-xl px-4 py-3 text-white"
                        >
                    </div>
                        <div class="mb-8">
                            <label class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Miniatura (16:9)</label>
                            <div class="relative aspect-video rounded-2xl overflow-hidden bg-[#0d1321] border border-dashed border-white/20 flex flex-col items-center justify-center cursor-pointer hover:border-cyan-500/50 group transition-all" id="dropZone">
                                <img id="imgPreview" class="hidden w-full h-full object-cover" src="#" />
                                <div id="uploadPlaceholder" class="flex flex-col items-center gap-2 text-gray-500 group-hover:text-cyan-400 transition-colors">
                                    <i data-lucide="upload" class="w-8 h-8"></i>
                                    <span class="text-[10px] font-bold uppercase tracking-widest">Wgraj obraz</span>
                                </div>
                                <input 
                                    type="file" 
                                    name="thumbnail"
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
                                <div class="w-full bg-[#1a1f2e] rounded-[24px] overflow-hidden border border-white/5 shadow-2xl">
                                    <div class="relative h-[180px] w-full bg-[#111827]">
                                        <img id="cardThumbnail" src="" class="hidden w-full h-full object-cover opacity-80">
                                        <div id="cardThumbnailPlaceholder" class="w-full h-full flex flex-col items-center justify-center text-gray-700">
                                            <i data-lucide="image" class="w-10 h-10"></i>
                                        </div>
                                        <div class="absolute top-4 left-4">
                                            <span id="previewCategory" class="bg-cyan-500/20 text-cyan-400 text-[10px] font-bold px-3 py-1 rounded-full border border-cyan-500/30 tracking-widest uppercase">
                                                DEVELOPMENT
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <div class="flex items-center gap-2 text-gray-500 text-[10px] mb-2">
                                            <div class="flex items-center gap-1"><i data-lucide="user" class="w-3 h-3"></i> Admin</div>
                                            <span>•</span>
                                            <div class="flex items-center gap-1"><i data-lucide="clock" class="w-3 h-3"></i> {{ date('d.m.Y') }}</div>
                                        </div>
                                        <h3 id="previewTitle" class="text-white text-lg font-bold leading-tight mb-3 line-clamp-2 min-h-[44px]">Tytuł artykułu...</h3>
                                        <p id="previewExcerpt" class="text-gray-400 text-xs leading-relaxed mb-4 line-clamp-3 min-h-[48px]">Krótki opis posta...</p>
                                        <div class="flex items-center justify-between border-t border-white/5 pt-3">
                                            <span id="previewReadTime" class="text-gray-500 text-[9px] uppercase tracking-widest font-medium">5 MIN CZYTANIA</span>
                                            <div class="text-cyan-400 text-xs font-bold flex items-center gap-1">Czytaj <i data-lucide="arrow-up-right" class="w-3 h-3"></i></div>
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
        const previewExcerpt = document.getElementById('previewExcerpt');
        const previewCategory = document.getElementById('previewCategory');
        const previewReadTime = document.getElementById('previewReadTime');
        const cardThumbnail = document.getElementById('cardThumbnail');
        const cardThumbnailPlaceholder = document.getElementById('cardThumbnailPlaceholder');
        const imgPreview = document.getElementById('imgPreview');
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');

        inputTitle.addEventListener('input', (e) => {
            previewTitle.innerText = e.target.value || "Tytuł artykułu...";
        });

        inputExcerpt.addEventListener('input', (e) => {
            previewExcerpt.innerText = e.target.value || "Krótki opis posta...";
        });

        inputCategory.addEventListener('change', (e) => {
            previewCategory.innerText = e.target.value;
        });

        inputReadTime.addEventListener('input', (e) => {
            previewReadTime.innerText = e.target.value || "5 MIN CZYTANIA";
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