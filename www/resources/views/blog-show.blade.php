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
           <div class="flex justify-end mb-8">
    <a href="{{ route('blog') }}" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
        <i class="fas fa-arrow-left text-sm"></i> Powrót do listy
    </a>
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
         <div class="flex items-center gap-4 text-gray-500 text-[10px] mb-6 font-bold uppercase tracking-widest pt-4">
                <div class="flex items-center gap-2"><i data-lucide="user" class="w-3 h-3"></i>
                  
                    {{ $post->user->name ?? 'Admin' }}
                </div>
                <span class="opacity-20">/</span>
                <div class="flex items-center gap-1.5">
                    <i class="far fa-clock text-cyan-500"></i>
                    {{ $post->date_public ? $post->date_public->format('d M Y') : '---' }}
                </div>
                <div>
                <span class="inset-0 bg-gradient-to-t from-[#0f141f] via-transparent to-transparent opacity-90  backdrop-blur-xl text-cyan-400 text-[10px] font-black px-5 py-2.5 rounded-2xl border border-white/10 tracking-[0.2em] uppercase shadow-2xl">
                    {{ strtoupper($post->category) }}
                </span>
                 <!-- Gradientowy Overlay -->
            <div class="absolute c"></div>
                <span class="text-gray-600 text-[10px] uppercase tracking-[0.3em] font-black ml-5">{{ $post->read_time ?? '10 MIN READ' }}</span>
            </div>
            </div>
    </header>
    <div class="relative">
    <img 
        src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail->path) : 'https://via.placeholder.com/600x400' }}" 
        alt="{{ $post->title }}" 
        class="w-full h-[400px] opacity-60 object-cover rounded-t-2xl [mask-image:linear-gradient(to_top,transparent,black_100px)]"
    >
    
</div>
    
     <div class="pt-16 max-w-full text-white [&>h1]:text-3xl [&>h2]:text-2xl [&>h3]:text-xl [&>h1]:font-bold [&>h2]:font-bold [&>h3]:font-semibold [&>p]:my-4 [&>img]:max-w-full [&>img]:h-auto">
          {!! $post->content !!}
      </div>
</section
     
@endsection