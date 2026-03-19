@extends('layouts.app') 
@section('title', 'ezCode - blog')

@section('content')
<!-- Efekty tła -->
    <div
        class="fixed inset-0 bg-[radial-gradient(circle_at_top_right,rgba(29,78,216,0.12),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(157,78,221,0.08),transparent_40%)] pointer-events-none z-0">
    </div>
    <div
        class="fixed inset-0 opacity-[0.02] pointer-events-none z-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
    </div>
    <header class="relative z-10 max-w-7xl mx-auto px-6 pt-24 md:pt-32 pb-12">
        <h1 class="text-5xl md:text-7xl font-extrabold mb-4 tracking-tighter">
            Baza <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand to-purple-500">Wiedzy.</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl leading-relaxed">
            Artykuły o programowaniu, architekturze systemów i nowoczesnym designie.
        </p>
    </header>

    <div class="relative z-10 max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <article class="blog-card rounded-[2rem] overflow-hidden flex flex-col bg-[#151b2b] border border-white/5 shadow-xl transition-all hover:border-brand/30">
                <div class="h-52 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1633356122544-f134324a6cee?auto=format&fit=crop&q=80&w=800" alt="Architektura Next.js" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full border border-brand/30 bg-brand/10 text-brand text-[10px] font-bold uppercase tracking-widest">Development</span>
                    </div>
                </div>
                <div class="p-8 flex-grow flex flex-col">
                    <div class="flex items-center gap-3 text-xs text-gray-500 mb-4">
                        <span class="flex items-center gap-1"><i data-lucide="user" class="w-3 h-3"></i> ezCode Admin</span>
                        <span>•</span>
                        <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3 h-3"></i> 12.01.2024</span>
                    </div>
                    <h2 class="text-xl font-bold mb-4 leading-tight hover:text-brand transition-colors cursor-pointer">Architektura Next.js 14: Jak optymalizować Core Web Vitals?</h2>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6 line-clamp-3">Poznaj najnowsze techniki optymalizacji wydajności w Next.js, które pozwolą Twojej stronie osiągnąć 100 punktów w Google Lighthouse.</p>
                    <div class="mt-auto pt-4 border-t border-white/5 flex justify-between items-center">
                        <span class="text-[10px] font-mono text-gray-500 uppercase tracking-widest">8 min czytania</span>
                        <a href="#" class="text-brand hover:underline flex items-center gap-2 text-sm font-bold">Czytaj <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                    </div>
                </div>
            </article>

            <article class="blog-card rounded-[2rem] overflow-hidden flex flex-col bg-[#151b2b] border border-white/5 shadow-xl transition-all hover:border-brand/30">
                <div class="h-52 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1516116216624-53e697fedbea?auto=format&fit=crop&q=80&w=800" alt="TypeScript vs JavaScript" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full border border-purple-500/30 bg-purple-500/10 text-purple-500 text-[10px] font-bold uppercase tracking-widest">Architecture</span>
                    </div>
                </div>
                <div class="p-8 flex-grow flex flex-col">
                    <div class="flex items-center gap-3 text-xs text-gray-500 mb-4">
                        <span class="flex items-center gap-1"><i data-lucide="user" class="w-3 h-3"></i> ezCode Admin</span>
                        <span>•</span>
                        <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3 h-3"></i> 05.12.2023</span>
                    </div>
                    <h2 class="text-xl font-bold mb-4 leading-tight hover:text-brand transition-colors cursor-pointer">TypeScript vs JavaScript – standard w dużych projektach</h2>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6 line-clamp-3">Dlaczego firmy technologiczne rezygnują z czystego JavaScriptu na rzecz TypeSafe rozwiązań? Analiza korzyści biznesowych.</p>
                    <div class="mt-auto pt-4 border-t border-white/5 flex justify-between items-center">
                        <span class="text-[10px] font-mono text-gray-500 uppercase tracking-widest">12 min czytania</span>
                        <a href="#" class="text-brand hover:underline flex items-center gap-2 text-sm font-bold">Czytaj <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                    </div>
                </div>
            </article>

            <article class="blog-card rounded-[2rem] overflow-hidden flex flex-col bg-[#151b2b] border border-white/5 shadow-xl transition-all hover:border-brand/30">
                <div class="h-52 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&q=80&w=800" alt="Docker Containers" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full border border-blue-500/30 bg-blue-500/10 text-blue-500 text-[10px] font-bold uppercase tracking-widest">DevOps</span>
                    </div>
                </div>
                <div class="p-8 flex-grow flex flex-col">
                    <div class="flex items-center gap-3 text-xs text-gray-500 mb-4">
                        <span class="flex items-center gap-1"><i data-lucide="user" class="w-3 h-3"></i> ezCode Admin</span>
                        <span>•</span>
                        <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3 h-3"></i> 18.11.2023</span>
                    </div>
                    <h2 class="text-xl font-bold mb-4 leading-tight hover:text-brand transition-colors cursor-pointer">Konteneryzacja dla początkujących: Pierwsze kroki</h2>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6 line-clamp-3">Praktyczny przewodnik po Dockerze. Dowiedz się jak odizolować środowisko i ułatwić wdrażanie aplikacji.</p>
                    <div class="mt-auto pt-4 border-t border-white/5 flex justify-between items-center">
                        <span class="text-[10px] font-mono text-gray-500 uppercase tracking-widest">10 min czytania</span>
                        <a href="#" class="text-brand hover:underline flex items-center gap-2 text-sm font-bold">Czytaj <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                    </div>
                </div>
            </article>

        </div>
    </div>
@endsection