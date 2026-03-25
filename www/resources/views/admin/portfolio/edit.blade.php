@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto p-6 lg:p-10 pt-32">
    <div class="flex items-center justify-between mb-8 pt-32">
        <div>
            <h1 class="text-4xl font-bold mb-2">Edytuj projekt</h1>
            <p class="text-emerald-400 font-mono text-sm uppercase tracking-widest">
                Aktualizuj realizację w portfolio
            </p>
        </div>

        <a href="{{ route('admin.portfolio.index') }}"
           class="text-gray-400 hover:text-white transition text-sm flex items-center gap-2">
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

    <form action="{{ route('admin.portfolio.update', $portfolio->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            {{-- LEWA STRONA --}}
            <div class="lg:col-span-8 space-y-8">

                {{-- TITLE --}}
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">
                        Tytuł Projektu
                    </label>

                    <input type="text"
                           name="title"
                           id="title"
                           value="{{ old('title', $portfolio->title) }}"
                           class="w-full input-field rounded-lg p-4 text-white">

                    @error('title')
                        <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TECHNOLOGY --}}
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">
                        Technologie
                    </label>

                    <input type="text"
                           name="technology"
                           value="{{ old('technology', $portfolio->technology) }}"
                           placeholder="Laravel, Docker, Vue..."
                           class="w-full input-field rounded-lg p-4 text-white">
                </div>

                {{-- DESCRIPTION --}}
                <section class="bg-[#111827] rounded-3xl p-1 border border-white/5 overflow-hidden">
                    <textarea name="description" id="ezcode-editor">
{{ old('description', $portfolio->description) }}
                    </textarea>
                </section>

                {{-- BUTTONS --}}
                <div class="flex items-center justify-end gap-4 pt-4 border-t border-white/5">
                    <a href="{{ route('admin.portfolio.index') }}"
                       class="px-6 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-white/5 transition-all font-medium">
                        Anuluj
                    </a>

                    <button type="submit"
                            class="bg-brand hover:bg-brand-dark text-white px-10 py-3 rounded-xl font-bold flex items-center gap-2 transition-all">
                        <i class="fas fa-save text-sm"></i>
                        Zapisz zmiany
                    </button>
                </div>

            </div>

            {{-- PRAWA STRONA --}}
            <div class="lg:col-span-4 space-y-6 glass-panel rounded-3xl">
                <div class="border border-white/5 rounded-3xl p-6 sticky top-24">

                    {{-- URL --}}
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">
                            Link do projektu
                        </label>

                        <input type="url"
                               name="url"
                               value="{{ old('url', $portfolio->url) }}"
                               placeholder="https://..."
                               class="w-full input-field rounded-lg p-3 text-sm text-white">
                    </div>

                    {{-- MINIATURA --}}
                    <div class="mb-8 pt-10">
                        <label class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">
                            Miniatura
                        </label>

                        <div class="relative aspect-video rounded-2xl overflow-hidden border border-dashed border-white/20 flex items-center justify-center cursor-pointer">

                            <img
                                id="imgPreview"
                                src="{{ $portfolio->images->first() ? asset('storage/'.$portfolio->images->first()->image_path) : '' }}"
                                class="w-full h-full object-cover {{ $portfolio->images->first() ? '' : 'hidden' }}"
                            >

                            <div id="uploadPlaceholder"
                                 class="{{ $portfolio->images->first() ? 'hidden' : '' }} text-gray-500">
                                Wgraj obraz
                            </div>

                            <input
                                type="file"
                                name="image_path"
                                id="thumbnailInput"
                                class="absolute inset-0 opacity-0 cursor-pointer"
                                accept="image/*"
                            >
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </form>
</div>

{{-- STYLE --}}
<style>
body {
    background: radial-gradient(circle at top right, #1a2a4a, #0a0f1a);
}
.input-field {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
}
.input-field:focus {
    border-color: #10b981;
    outline: none;
}
</style>

{{-- SCRIPTS --}}
<script>
lucide.createIcons();

tinymce.init({
    selector: '#ezcode-editor',
    height: 500,
    skin: 'oxide-dark',
    content_css: 'dark',
     license_key: 'gpl',
    menubar: false
});

const thumbnailInput = document.getElementById('thumbnailInput');
const imgPreview = document.getElementById('imgPreview');
const uploadPlaceholder = document.getElementById('uploadPlaceholder');

thumbnailInput.addEventListener('change', function() {
    const file = this.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        imgPreview.src = e.target.result;
        imgPreview.classList.remove('hidden');
        uploadPlaceholder.classList.add('hidden');
    };
    reader.readAsDataURL(file);
});
</script>

@endsection