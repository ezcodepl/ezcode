@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto p-6 lg:p-10 ">
    <div class="flex items-center justify-between mb-8 pt-32">
        <div>
            <h1 class="text-4xl font-bold mb-2 text-white">Edytuj projekt</h1>
            <p class="text-emerald-400 font-mono text-sm uppercase tracking-widest">Aktualizuj realizację w portfolio</p>
        </div>
        <a href="{{ route('admin.portfolio.index') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Powrót do listy projektów
        </a>
    </div>

    {{-- ALERT SUCCESS/ERRORS --}}
    @if (session('success'))
        <div class="mb-6 flex items-start gap-3 rounded-xl border border-green-500/30 bg-green-500/10 p-4 text-green-400 shadow-lg">
            <i class="fas fa-check-circle mt-1"></i>
            <div>
                <p class="font-bold text-sm">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 flex items-start gap-3 rounded-xl border border-red-500/30 bg-red-500/10 p-4 text-red-400 shadow-lg">
            <i class="fas fa-exclamation-triangle mt-1"></i>
            <ul class="text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" id="portfolioForm">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- LEWA STRONA: TREŚĆ -->
            <div class="lg:col-span-7 space-y-8">
                <div class="glass-panel p-8 rounded-[2rem] space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Tytuł Projektu</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $portfolio->title) }}" placeholder="np. System ERP dla logistyki" class="w-full input-field rounded-xl p-4 text-white">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Technologie (po przecinku)</label>
                        <input type="text" name="technology" id="technology" value="{{ old('technology', $portfolio->technology) }}" placeholder="Laravel, Docker, Tailwind" class="w-full input-field rounded-xl p-4 text-white">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Opis Projektu</label>
                        <section class="bg-[#111827] rounded-2xl p-1 border border-white/5 overflow-hidden">
                            <textarea name="description" id="ezcode-editor">{{ old('description', $portfolio->description) }}</textarea>
                        </section>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('admin.portfolio.index') }}" class="px-6 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-white/5 transition-all font-medium">Anuluj</a>
                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-10 py-4 rounded-2xl font-bold flex items-center gap-3 transition-all transform hover:scale-[1.02] shadow-xl shadow-emerald-500/20">
                        <i class="fas fa-save"></i> Zapisz zmiany
                    </button>
                </div>
            </div>

            <!-- PRAWA STRONA: KONFIGURACJA I MEDIA -->
            <div class="lg:col-span-5 space-y-6">
                <div class="glass-panel p-8 rounded-[2.5rem] sticky top-24 space-y-8">
                    
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-widest text-emerald-400 mb-6 flex items-center gap-2">
                            <i class="fas fa-cog"></i> Linki i Media
                        </h4>
                        
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Adres URL Realizacji</label>
                        <div class="relative mb-8">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"><i class="fas fa-link"></i></span>
                            <input type="url" name="url" value="{{ old('url', $portfolio->url) }}" placeholder="https://..." class="w-full input-field rounded-xl p-3 pl-12 text-sm text-white">
                        </div>

                        <!-- UPLOAD: DESKTOP / MAIN -->
                        <div class="space-y-3 mb-6">
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">Główna miniatura (Desktop)</label>
                            <div class="relative aspect-video rounded-2xl overflow-hidden border-2 border-dashed border-white/10 flex flex-col items-center justify-center cursor-pointer hover:border-emerald-500/40 group transition-all bg-white/[0.02]">
                                <img id="previewDesktop" class="w-full h-full object-cover {{ $portfolio->image_desktop ? '' : 'hidden' }}" src="{{ $portfolio->image_desktop ? asset('storage/'.$portfolio->image_desktop) : '#' }}" />
                                <div id="placeholderDesktop" class="{{ $portfolio->image_desktop ? 'hidden' : '' }} flex flex-col items-center gap-2 text-gray-500">
                                    <i class="fas fa-desktop text-xl"></i>
                                    <span class="text-[9px] font-bold uppercase tracking-tighter">Kliknij aby wgrać</span>
                                </div>
                                <input type="file" name="image_desktop" class="absolute inset-0 opacity-0 cursor-pointer preview-trigger" data-target="previewDesktop" data-placeholder="placeholderDesktop" accept="image/*" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- UPLOAD: TABLET -->
                            <div class="space-y-3">
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tablet View</label>
                                <div class="relative aspect-[4/3] rounded-2xl overflow-hidden border-2 border-dashed border-white/10 flex flex-col items-center justify-center cursor-pointer hover:border-sky-500/40 transition-all bg-white/[0.02]">
                                    <img id="previewTablet" class="w-full h-full object-cover {{ $portfolio->image_tablet ? '' : 'hidden' }}" src="{{ $portfolio->image_tablet ? asset('storage/'.$portfolio->image_tablet) : '#' }}" />
                                    <div id="placeholderTablet" class="{{ $portfolio->image_tablet ? 'hidden' : '' }} text-center text-gray-500">
                                        <i class="fas fa-tablet-alt text-lg"></i>
                                    </div>
                                    <input type="file" name="image_tablet" class="absolute inset-0 opacity-0 cursor-pointer preview-trigger" data-target="previewTablet" data-placeholder="placeholderTablet" accept="image/*" />
                                </div>
                            </div>

                            <!-- UPLOAD: MOBILE -->
                            <div class="space-y-3">
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">Mobile View</label>
                                <div class="relative aspect-[9/16] rounded-2xl overflow-hidden border-2 border-dashed border-white/10 flex flex-col items-center justify-center cursor-pointer hover:border-purple-500/40 transition-all bg-white/[0.02]">
                                    <img id="previewMobile" class="w-full h-full object-cover {{ $portfolio->image_mobile ? '' : 'hidden' }}" src="{{ $portfolio->image_mobile ? asset('storage/'.$portfolio->image_mobile) : '#' }}" />
                                    <div id="placeholderMobile" class="{{ $portfolio->image_mobile ? 'hidden' : '' }} text-center text-gray-500">
                                        <i class="fas fa-mobile-alt text-lg"></i>
                                    </div>
                                    <input type="file" name="image_mobile" class="absolute inset-0 opacity-0 cursor-pointer preview-trigger" data-target="previewMobile" data-placeholder="placeholderMobile" accept="image/*" />
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
body { background: radial-gradient(circle at top right, #1a2a4a, #0a0f1a); color:#fff; min-height:100vh; font-family:'Inter', sans-serif; }
.glass-panel { background: rgba(255,255,255,0.03); backdrop-filter: blur(10px); border:1px solid rgba(255,255,255,0.1); }
.input-field { background: rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); transition: all 0.3s ease; }
.input-field:focus { border-color:#10b981; box-shadow:0 0 0 4px rgba(16,185,129,0.1); outline:none; }
</style>

<script>
tinymce.init({
    selector: '#ezcode-editor',
    height: 450,
    license_key: 'gpl',
    skin: 'oxide-dark',
    content_css: 'dark',
    menubar: false,
    plugins: 'advlist autolink lists link image charmap preview code wordcount',
    toolbar: 'undo redo | blocks bold italic | alignleft aligncenter alignright | bullist numlist | code',
    content_style: 'body { background: #111827; color: #d1d5db; font-family: Inter, sans-serif; }'
});

document.querySelectorAll('.preview-trigger').forEach(input => {
    input.addEventListener('change', function() {
        const file = this.files[0];
        const targetId = this.getAttribute('data-target');
        const placeholderId = this.getAttribute('data-placeholder');
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.getElementById(targetId);
            const placeholder = document.getElementById(placeholderId);
            img.src = e.target.result;
            img.classList.remove('hidden');
            if(placeholder) placeholder.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    });
});
</script>
@endsection