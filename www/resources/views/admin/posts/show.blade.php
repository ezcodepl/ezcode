@extends('layouts.admin')
@section('title', 'ezCode - Podgląd posta: ' . $post->title)

@section('content')

<div class="min-h-screen bg-darkbg text-gray-300 font-sans selection:bg-brand selection:text-white pt-32">
<div class="max-w-7xl mx-auto p-6 lg:p-12 pt-32 space-y-8">

    <!-- Header Section -->
    <div class="relative flex flex-col md:flex-row md:items-end justify-between gap-6 pb-10 border-b border-white/10">
        <div class="space-y-4 max-w-4xl">
            <div class="flex flex-wrap items-center gap-3">
                @php
                    $statusConfig = [
                        'published' => ['label' => 'Opublikowano', 'class' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20 shadow-emerald-500/5'],
                        'draft' => ['label' => 'Szkic', 'class' => 'bg-amber-500/10 text-amber-400 border-amber-500/20 shadow-amber-500/5'],
                        'archived' => ['label' => 'Zarchiwizowano', 'class' => 'bg-red-500/10 text-red-400 border-red-500/20 shadow-red-500/5'],
                    ];
                    $status = $statusConfig[$post->status] ?? $statusConfig['draft'];
                @endphp
                
                <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider border {{ $status['class'] }} shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-current mr-2 animate-pulse"></span>
                    {{ $status['label'] }}
                </span>

                <span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-mono text-gray-500">
                    ID: #{{ $post->id }}
                </span>

                @if($post->category)
    <span class="px-3 py-1 bg-brand/10 border border-brand/20 rounded-full text-[11px] font-bold text-brand uppercase">
        <i class="fas fa-folder mr-1"></i> {{ $post->category }}
    </span>
@endif
            </div>

             <h1 class="text-5xl lg:text-4xl font-extrabold mb-4 tracking-tighter">
        
        @php
            $words = explode(' ', $post->title);
            $half = ceil(count($words) / 2);
            $firstPart = implode(' ', array_slice($words, 0, $half));
            $secondPart = implode(' ', array_slice($words, $half));
        @endphp

        {{ $firstPart }}<span class="text-transparent bg-clip-text bg-gradient-to-r from-brand to-purple-500"> {{ $secondPart }}</span>
    </h1>
        <p class="text-gray-400 text-lg max-w-2xl leading-relaxed">
            {{ $post->excerpt }}
        </p>
        </div>
        
        <div class="flex items-center gap-3 self-start md:self-end">
            <a href="{{ route('admin.posts.index') }}" class="group flex items-center justify-center w-12 h-12 rounded-2xl bg-white/5 border border-white/10 text-gray-400 hover:text-white hover:bg-white/10 transition-all">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            </a>
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="flex items-center gap-2 bg-brand hover:bg-brand-dark text-white px-8 py-3.5 rounded-2xl font-bold transition-all transform hover:scale-[1.02] active:scale-95 shadow-xl shadow-brand/20">
                <i class="fas fa-pen-nib text-sm"></i>
                Edytuj
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left Column: Main Content -->
        <div class="lg:col-span-8 space-y-8">
            
            <!-- Post Body -->
            <div class="bg-[#1a1f2e]/95 border border-white/5 rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden group">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-brand/40 to-transparent"></div>
                
                 <div class="max-w-full text-white [&>h1]:text-3xl [&>h2]:text-2xl [&>h3]:text-xl [&>h1]:font-bold [&>h2]:font-bold [&>h3]:font-semibold [&>p]:my-4 [&>img]:max-w-full [&>img]:h-auto">
                    {!! $post->content !!}
                </div>
                @if($post->tags && $post->tags->count() > 0)
                    <div class="mt-12 pt-8 border-t border-white/5 flex flex-wrap gap-2">
                        @foreach($post->tags as $tag)
                            <span class="text-xs font-medium px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-gray-400">
                                #{{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Media Gallery -->
            @if($post->images && $post->images->count() > 0)
                <div class="bg-[#1a1f2e]/95 border border-white/5 rounded-3xl p-8 shadow-2xl">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-xl font-bold text-white flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-brand/20 text-brand flex items-center justify-center text-sm">
                                <i class="fas fa-images"></i>
                            </span>
                            Galeria multimediów
                        </h3>
                        <span class="text-xs font-mono text-gray-500 uppercase tracking-widest">{{ $post->images->count() }} plików</span>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($post->images as $image)
                            <a href="{{ asset('storage/' . $image->path) }}" class="glightbox group relative aspect-video rounded-2xl overflow-hidden border border-white/5 bg-black cursor-zoom-in transition-all hover:border-brand/50">
                                <img src="{{ asset('storage/' . $image->path) }}" 
                                    alt="Media"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- SEO & Metadata Details -->
            <div class="bg-[#1a1f2e]/95 border border-white/5 rounded-3xl p-8 shadow-2xl grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h4 class="text-xs font-bold text-brand uppercase tracking-[0.2em] mb-4">Ustawienia SEO</h4>
                    <div class="space-y-4">
                        <div class="bg-black/30 p-4 rounded-2xl border border-white/5">
                            <p class="text-[10px] text-gray-500 uppercase font-bold mb-1">Slug URL</p>
                            <p class="text-sm text-gray-300 font-mono">/blog/{{ $post->slug }}</p>
                        </div>
                        <div class="bg-black/30 p-4 rounded-2xl border border-white/5">
                            <p class="text-[10px] text-gray-500 uppercase font-bold mb-1">Meta Title</p>
                            <p class="text-sm text-gray-300">{{ $post->meta_title ?? $post->title }}</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-gray-500 uppercase tracking-[0.2em] mb-4">Indeksowanie</h4>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Search Engine Index:</span>
                            <span class="{{ $post->is_indexed ? 'text-emerald-500' : 'text-red-500' }} font-bold">
                                {{ $post->is_indexed ? 'TAK' : 'NIE' }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Kanonical URL:</span>
                            <span class="text-gray-300 text-xs">Ustawiony automatycznie</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Sidebar -->
        <div class="lg:col-span-4 space-y-8">
            
            <!-- Author & Date Card -->
            <div class="bg-[#1a1f2e]/95 border border-white/5 rounded-3xl p-6 sticky top-24 z-50 backdrop-blur-sm">
                
                <!-- Author -->
                <div class="flex items-center gap-4 p-4 bg-white/5 rounded-3xl border border-white/5">
                    <div class="w-14 h-14 bg-gradient-to-br from-brand to-brand-dark rounded-2xl flex items-center justify-center text-white text-xl font-black shadow-lg shadow-brand/20">
                        {{ strtoupper(substr($post->user->name ?? '?', 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500 uppercase font-bold tracking-wider">Autor wpisu</p>
                        <p class="text-white font-bold text-lg leading-tight">{{ $post->user->name ?? 'System' }}</p>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="space-y-6 mt-6">
                    <h4 class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em]">Oś czasu</h4>
                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <div class="flex flex-col items-center">
                                <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                                <div class="w-px h-full bg-white/10 mt-1"></div>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-500 font-bold uppercase">Data publikacji</p>
                                <p class="text-sm text-white font-medium">{{ $post->date_public ? $post->date_public->format('d M Y, H:i') : 'Zaplanowano' }}</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex flex-col items-center">
                                <div class="w-2 h-2 rounded-full bg-gray-600"></div>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-500 font-bold uppercase">Utworzono rekord</p>
                                <p class="text-sm text-gray-400">{{ $post->created_at->format('d.m.Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="pt-8 border-t border-white/5">
                    <h4 class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] mb-4">Analityka treści</h4>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-black/40 p-4 rounded-2xl border border-white/5 text-center">
                            <p class="text-2xl font-black text-white leading-none mb-1">{{ str_word_count(strip_tags($post->content)) }}</p>
                            <p class="text-[9px] text-gray-500 uppercase font-bold">Słów</p>
                        </div>
                        <div class="bg-black/40 p-4 rounded-2xl border border-white/5 text-center">
                            @php $readTime = max(1, ceil(str_word_count(strip_tags($post->content)) / 200)); @endphp
                            <p class="text-2xl font-black text-brand leading-none mb-1">{{ $readTime }}'</p>
                            <p class="text-[9px] text-gray-500 uppercase font-bold">Czytania</p>
                        </div>
                        <div class="bg-black/40 p-4 rounded-2xl border border-white/5 text-center col-span-2">
                            <p class="text-xl font-black text-white leading-none mb-1">
                                {{ number_format($post->views ?? 0, 0, ',', ' ') }}
                            </p>
                            <p class="text-[9px] text-gray-500 uppercase font-bold">Wyświetleń posta</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="pt-4 space-y-3">
                    <button onclick="window.print()" class="w-full py-3 rounded-xl border border-white/10 text-gray-400 text-xs font-bold hover:bg-white/5 transition-all flex items-center justify-center gap-2">
                        <i class="fas fa-print"></i> Drukuj raport
                    </button>
                    @if($post->status === 'published')
                        <a href="#" class="w-full py-3 rounded-xl bg-white/5 text-white text-xs font-bold hover:bg-white/10 transition-all flex items-center justify-center gap-2 border border-white/10">
                            <i class="fas fa-external-link-alt"></i> Zobacz na stronie
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


</div>


@endsection