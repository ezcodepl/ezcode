@extends('layouts.admin') 
@section('title', 'ezCode - admin panel - posts')

@section('content')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#content',
        plugins: 'image link media table code',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | image media link | code',
        images_upload_url: '{{ route("admin.posts.uploadImage") }}',
        images_upload_credentials: true,
        automatic_uploads: true,
        images_reuse_filename: true
    });
</script>
<div class="max-w-7xl mx-auto p-6 space-y-10">
    
    <div class="flex items-center justify-between pb-6 border-b border-white/5">
        <div>
            <div class="flex items-center gap-3 mb-2">
                @if($post->status === 'published')
                    <span class="bg-emerald-500/10 text-emerald-500 text-[10px] uppercase font-bold px-3 py-1 rounded-full border border-emerald-500/20 shadow-sm shadow-emerald-500/10">
                        Opublikowano
                    </span>
                @elseif($post->status === 'draft')
                    <span class="bg-amber-500/10 text-amber-500 text-[10px] uppercase font-bold px-3 py-1 rounded-full border border-amber-500/20">
                        Szkic
                    </span>
                @else
                    <span class="bg-gray-500/10 text-gray-500 text-[10px] uppercase font-bold px-3 py-1 rounded-full border border-gray-500/20">
                        Zarchiwizowano
                    </span>
                @endif
                <span class="text-gray-500 text-xs code-font">ID: #{{ $post->id }}</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-heading font-extrabold text-white leading-tight">
                {{ $post->title }}
            </h1>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.posts.index') }}" class="p-3 text-gray-400 hover:text-white hover:bg-white/5 rounded-xl transition-all" title="Powrót do listy">
                <i class="fas fa-arrow-left"></i>
            </a>
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg font-medium flex items-center gap-2 transition-all transform hover:scale-105 shadow-lg shadow-brand/20">
                <i class="fas fa-edit text-sm"></i>
                Edytuj post
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        
        <div class="lg:col-span-2 space-y-10">
            
            <div class="bg-cardbg border border-white/5 rounded-3xl p-8 shadow-2xl">
                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-6 pb-3 border-b border-white/5">
                    Treść posta
                </h3>
                <div class="prose prose-invert prose-lg max-w-none text-gray-100 leading-relaxed space-y-6">
                    {{-- Używamy nl2br dla zachowania nowych linii z textarea --}}
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>

            {{-- Zakładamy, że model Post ma relację 'images' (np. Spatie Media Library lub własna) --}}
            @if($post->images && $post->images->count() > 0)
                <div class="bg-cardbg border border-white/5 rounded-3xl p-8 shadow-2xl overflow-hidden relative">
                    {{-- Subtelny gradient w tle karty --}}
                    <div class="absolute inset-0 hero-gradient opacity-40 pointer-events-none"></div>

                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-6 pb-3 border-b border-white/5 relative z-10">
                        Galeria zdjęć ({{ $post->images->count() }})
                    </h3>
                    
                    {{-- Grid zdjęć (responsywny) --}}
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 relative z-10">
                        @foreach($post->images ?? [] as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" width="100">
                        @endforeach
                        @foreach($post->images as $image)
                            <div class="group aspect-square rounded-2xl overflow-hidden border border-white/5 bg-darkbg cursor-pointer shadow-lg hover:border-brand/40 transition-all">
                                <img src="{{ $image->getUrl('thumb') }}" {{-- Dopasuj metodę pobierania URL --}}
                                     alt="Zdjęcie do posta {{ $post->title }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="space-y-8">
            <div class="bg-cardbg border border-white/5 rounded-3xl p-8 shadow-2xl sticky top-24">
                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-6 pb-3 border-b border-white/5">
                    Szczegóły
                </h3>
                
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-brand/20 rounded-full flex items-center justify-center text-brand text-xl font-bold border border-brand/30">
                            {{ strtoupper(substr($post->user->name ?? '?', 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Autor</p>
                            <p class="text-white font-medium text-lg">{{ $post->user->name ?? 'Brak autora' }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 pt-4 border-t border-white/5">
                        <div>
                            <p class="text-xs text-gray-500 flex items-center gap-2 mb-1">
                                <i class="fas fa-calendar-alt text-brand/70"></i>
                                Opublikowano
                            </p>
                            <p class="text-sm text-white font-medium italic">
                                {{ $post->date_public ? $post->date_public->format('d.m.Y') : '---' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 flex items-center gap-2 mb-1">
                                <i class="fas fa-clock text-gray-600"></i>
                                Utworzono
                            </p>
                            <p class="text-sm text-gray-400 italic">
                                {{ $post->created_at->format('d.m.Y H:i') }}
                            </p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-white/5 space-y-3">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Liczba słów:</span>
                            <span class="text-gray-300 font-medium code-font">{{ str_word_count($post->content) }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Liczba zdjęć:</span>
                            <span class="text-gray-300 font-medium code-font">{{ $post->images ? $post->images->count() : 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection