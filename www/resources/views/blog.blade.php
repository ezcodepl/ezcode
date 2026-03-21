@extends('layouts.app') 
@section('title', 'ezCode - blog')

@section('content')
<!-- Efekty tła -->
  <section class="max-w-7xl mx-auto px-6 py-24">
    <div class="fixed inset-0 bg-[radial-gradient(circle_at_top_right,rgba(29,78,216,0.12),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(157,78,221,0.08),transparent_40%)] pointer-events-none z-0">
    </div>
    <div
        class="fixed inset-0 opacity-[0.02] pointer-events-none z-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
    </div>
    <header class="relative z-10 max-w-7xl mx-auto px-6 pt-24 md:pt-8 pb-12">
        <h1 class="text-5xl lg:text-6xl font-extrabold mb-4 tracking-tighter">
            Baza <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand to-purple-500">Wiedzy.</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl leading-relaxed">
            Artykuły o programowaniu, architekturze systemów i nowoczesnym designie.
        </p>
    </header>

     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 ml-10">


    @foreach($posts as $post)
    <article class="blog-card rounded-[2rem] overflow-hidden flex flex-col bg-[#151b2b] border border-white/5 shadow-xl transition-all hover:border-brand/30">
        
        <!-- Górna część z obrazkiem -->
        <div class="relative h-[208px] w-full overflow-hidden">
            <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail->path) : 'https://via.placeholder.com/600x400' }}" 
                 alt="{{ $post->title }}" 
                 class="w-full h-full object-cover opacity-60 group-hover:opacity-100 group-hover:scale-110 transition-all duration-1000 ease-in-out">

            <!-- Kategoria -->
            <div class="absolute top-8 left-8">
                <span class="bg-black/60 backdrop-blur-xl text-cyan-400 text-[10px] font-black px-5 py-2.5 rounded-2xl border border-white/10 tracking-[0.2em] uppercase shadow-2xl">
                    {{ strtoupper($post->category) }}
                </span>
            </div>
            
            <!-- Gradientowy Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f141f] via-transparent to-transparent opacity-90"></div>
        </div>

        <!-- Treść -->
        <div class="p-10 pt-4">
            <!-- Meta -->
            <div class="flex items-center gap-4 text-gray-500 text-[10px] mb-6 font-bold uppercase tracking-widest">
                <div class="flex items-center gap-2"><i data-lucide="user" class="w-3 h-3"></i>
                  
                    {{ $post->user->name ?? 'Admin' }}
                </div>
                <span class="opacity-20">/</span>
                <div class="flex items-center gap-1.5">
                    <i class="far fa-clock text-cyan-500"></i>
                    {{ $post->date_public ? $post->date_public->format('d M Y') : '---' }}
                </div>
            </div>

            <!-- Tytuł -->
            <h3 class="text-white text-xl title-font leading-[1.3] line-clamp-2 min-h-[56px] group-hover:text-cyan-400 transition-colors duration-300">
                {{ $post->title }}
            </h3>

            <p class="text-gray-500 text-sm leading-relaxed mb-3 line-clamp-3 min-h-[20px]">
                {{ Str::limit(strip_tags($post->content), 140) }}
            </p>

            <!-- Stopka -->
            <div class="flex items-center justify-between border-t border-white/[0.05] pt-6">
                <span class="text-gray-600 text-[10px] uppercase tracking-[0.3em] font-black">{{ $post->read_time ?? '10 MIN READ' }}</span>
                
                <a href="{{ route('blog-show', $post->slug) }}" class="group/btn flex items-center gap-4 text-white text-[11px] font-black uppercase tracking-[0.2em] hover:text-cyan-400 transition-all">
                    CZYTAJ
                    <div class="w-10 h-10 rounded-2xl bg-white/[0.03] flex items-center justify-center group-hover/btn:bg-cyan-500/20 group-hover/btn:rotate-[45deg] transition-all duration-500">
                        <i class="fas fa-arrow-up-right-from-square text-[10px]"></i>
                    </div>
                </a>
            </div>
        </div>
    </article>
    @endforeach
    </div>
</section>
     
@endsection