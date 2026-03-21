<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Post - ezCode Admin</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0a0f1a;
            color: #ffffff;
        }

        .tox-tinymce {
            border-radius: 24px !important;
            border: 1px solid rgba(255,255,255,0.05) !important;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a0f1a; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #334155; }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="selection:bg-cyan-500/30">

    <!-- Header -->
    <header class="border-b border-white/10 bg-[#0d1321]/80 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-cyan-500 rounded-lg flex items-center justify-center font-bold text-white shadow-[0_0_15px_rgba(6,182,212,0.5)]">
                    ez
                </div>
                <span class="text-xl font-bold tracking-tight">Admin <span class="text-cyan-400">ezCode</span></span>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" form="postForm" class="bg-cyan-500 hover:bg-cyan-400 text-black px-6 py-2 rounded-full text-sm font-bold transition-all flex items-center gap-2 shadow-[0_0_20px_rgba(6,182,212,0.3)]">
                    <i data-lucide="save" class="w-4 h-4"></i> Opublikuj Post
                </button>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-6 lg:p-10">
        <form action="{{ route('posts.store') }}" method="POST" id="postForm" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <!-- Edytor Lewa Strona -->
                <div class="lg:col-span-8 space-y-8">
                    <section class="space-y-4">
                        <input
                            type="text"
                            name="title"
                            id="inputTitle"
                            placeholder="Wpisz tytuł..."
                            class="w-full bg-transparent text-4xl lg:text-5xl font-bold border-none outline-none placeholder:text-gray-800 focus:ring-0"
                            required
                        >
                        <textarea
                            name="excerpt"
                            id="inputExcerpt"
                            placeholder="Lead / Krótki opis artykułu..."
                            class="w-full bg-transparent text-xl text-gray-400 border-none outline-none placeholder:text-gray-800 focus:ring-0 resize-none h-24"
                        ></textarea>
                    </section>

                    <section class="bg-[#111827] rounded-3xl p-1 border border-white/5 overflow-hidden">
                        <textarea name="content" id="ezcode-editor"></textarea>
                    </section>
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

                        <div class="mb-6">
                            <label class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Czas czytania</label>
                            <input
                                type="text"
                                name="read_time"
                                id="inputReadTime"
                                value="5 MIN CZYTANIA"
                                class="w-full bg-[#0d1321] border border-white/10 rounded-xl px-4 py-3 text-sm text-white outline-none focus:border-cyan-500 transition-colors"
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
    </main>

    <script>
        // Inicjalizacja Ikon
        lucide.createIcons();

        // Inicjalizacja TinyMCE
        tinymce.init({
            selector: '#ezcode-editor',
            height: 500,
            menubar: false,
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
        const inputTitle = document.getElementById('inputTitle');
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
</body>
</html><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Post - ezCode Admin</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0a0f1a;
            color: #ffffff;
        }

        .tox-tinymce {
            border-radius: 24px !important;
            border: 1px solid rgba(255,255,255,0.05) !important;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a0f1a; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #334155; }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="selection:bg-cyan-500/30">

    <!-- Header -->
    <header class="border-b border-white/10 bg-[#0d1321]/80 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-cyan-500 rounded-lg flex items-center justify-center font-bold text-white shadow-[0_0_15px_rgba(6,182,212,0.5)]">
                    ez
                </div>
                <span class="text-xl font-bold tracking-tight">Admin <span class="text-cyan-400">ezCode</span></span>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" form="postForm" class="bg-cyan-500 hover:bg-cyan-400 text-black px-6 py-2 rounded-full text-sm font-bold transition-all flex items-center gap-2 shadow-[0_0_20px_rgba(6,182,212,0.3)]">
                    <i data-lucide="save" class="w-4 h-4"></i> Opublikuj Post
                </button>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-6 lg:p-10">
        <form action="{{ route('posts.store') }}" method="POST" id="postForm" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <!-- Edytor Lewa Strona -->
                <div class="lg:col-span-8 space-y-8">
                    <section class="space-y-4">
                        <input
                            type="text"
                            name="title"
                            id="inputTitle"
                            placeholder="Wpisz tytuł..."
                            class="w-full bg-transparent text-4xl lg:text-5xl font-bold border-none outline-none placeholder:text-gray-800 focus:ring-0"
                            required
                        >
                        <textarea
                            name="excerpt"
                            id="inputExcerpt"
                            placeholder="Lead / Krótki opis artykułu..."
                            class="w-full bg-transparent text-xl text-gray-400 border-none outline-none placeholder:text-gray-800 focus:ring-0 resize-none h-24"
                        ></textarea>
                    </section>

                    <section class="bg-[#111827] rounded-3xl p-1 border border-white/5 overflow-hidden">
                        <textarea name="content" id="ezcode-editor"></textarea>
                    </section>
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

                        <div class="mb-6">
                            <label class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Czas czytania</label>
                            <input
                                type="text"
                                name="read_time"
                                id="inputReadTime"
                                value="5 MIN CZYTANIA"
                                class="w-full bg-[#0d1321] border border-white/10 rounded-xl px-4 py-3 text-sm text-white outline-none focus:border-cyan-500 transition-colors"
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
    </main>

    <script>
        // Inicjalizacja Ikon
        lucide.createIcons();

        // Inicjalizacja TinyMCE
        tinymce.init({
            selector: '#ezcode-editor',
            height: 500,
            menubar: false,
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
        const inputTitle = document.getElementById('inputTitle');
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
</body>
</html>
