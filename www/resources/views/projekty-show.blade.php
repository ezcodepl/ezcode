@extends('layouts.app')
@section('title', 'ezCode - Podgląd projektu: ' . $portfolio->title)

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background-color: #0f172a;
        color: #f8fafc;
        background-image: 
            radial-gradient(circle at 0% 0%, rgba(30, 58, 138, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 100% 100%, rgba(30, 58, 138, 0.15) 0%, transparent 50%);
        min-height: 100vh;
    }

    .glass {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .screen-glare::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent 45%, rgba(255,255,255,0.05) 50%, transparent 55%);
        pointer-events: none;
        z-index: 10;
    }

    .project-gradient-overlay {
        background: linear-gradient(to bottom, rgba(15, 23, 42, 0.2), rgba(15, 23, 42, 0.6));
    }

    .device-screen-bg {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }
</style>

@php
    $desktopImage = $portfolio->getImageUrl('desktop') ?? 'https://via.placeholder.com/1200x800?text=Brak+zdjecia';
    $tabletImage  = $portfolio->getImageUrl('tablet')  ?? 'https://via.placeholder.com/800x600?text=Brak+zdjecia';
    $mobileImage  = $portfolio->getImageUrl('mobile')  ?? 'https://via.placeholder.com/400x800?text=Brak+zdjecia';
@endphp

<div class="min-h-screen bg-darkbg text-gray-300 font-sans selection:bg-brand selection:text-white pt-32">
    <div class="max-w-7xl mx-auto p-6 lg:p-12">

        <!-- HEADER -->
        <header class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-16">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $portfolio->title }}</h1>
                <div class="flex gap-2 flex-wrap">
                    @if($portfolio->technology)
                        @foreach(explode(',', $portfolio->technology) as $tech)
                            <span class="px-4 py-1.5 glass rounded-full text-xs text-slate-300 font-medium">{{ trim($tech) }}</span>
                        @endforeach
                    @endif
                </div>
            </div>

            <a href="{{ route('projekty.view') }}" class="group flex items-center gap-3 px-6 py-3 glass rounded-2xl hover:bg-white/10 transition-all border border-white/10">
                <span class="text-sm font-semibold">Powrót</span>
                <i class="fas fa-arrow-left text-sm group-hover:-translate-x-1 transition-transform"></i>
            </a>
        </header>

        <!-- GŁÓWNA SCENA URZĄDZEŃ -->
        <div class="relative w-full h-[550px] flex items-center justify-center mb-24">

            <!-- MONITOR DESKTOP -->
            <div class="absolute left-1/2 -translate-x-1/2 top-0 w-[80%] aspect-[16/10] bg-slate-900 rounded-[2.5rem] p-3 shadow-2xl border border-white/5 z-10 opacity-90 scale-95 lg:scale-100">
                <div class="w-full h-full rounded-3xl overflow-hidden relative screen-glare">
                    <div class="device-screen-bg" style="background-image: url('{{ $desktopImage }}')"></div>
                    <div class="absolute inset-0 project-gradient-overlay"></div>
                    <div class="p-12 h-full flex flex-col justify-end relative z-20">
                        <h3 class="text-4xl font-black mb-2 text-white">Komputer</h3>
                        <p class="text-sky-200/60 text-sm max-w-xs uppercase tracking-widest">System {{ $portfolio->title }}</p>
                    </div>
                    <div class="absolute top-0 left-0 right-0 h-8 bg-black/20 backdrop-blur-md flex items-center px-6 gap-2 z-30">
                        <div class="flex gap-1.5">
                            <div class="w-2.5 h-2.5 rounded-full bg-red-500/20"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-yellow-500/20"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-green-500/20"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABLET -->
            <div class="absolute -bottom-4 right-[0%] w-[42%] aspect-[16/10] bg-[#0a0a0a] rounded-[1.8rem] p-2.5 shadow-[0_30px_60px_rgba(0,0,0,0.8)] border border-white/10 z-30 transition-transform hover:-translate-y-2 duration-500 hidden md:block">
                <div class="w-full h-full rounded-2xl overflow-hidden relative screen-glare">
                    <div class="device-screen-bg" style="background-image: url('{{ $tabletImage }}')"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="p-6 h-full flex flex-col justify-end relative z-20 text-right">
                        <h3 class="text-xl font-bold text-white">Tablet</h3>
                        <p class="text-[10px] text-white/50 uppercase tracking-widest">Responsive UI</p>
                    </div>
                </div>
                <div class="absolute top-1/2 -left-1 -translate-y-1/2 w-0.5 h-4 bg-white/10 rounded-full"></div>
            </div>

            <!-- MOBILE -->
            <div class="absolute -bottom-12 left-[5%] w-[20%] aspect-[9/19.5] bg-[#0f0f0f] rounded-[3.2rem] p-2.5 shadow-[0_40px_80px_rgba(0,0,0,0.9)] border border-white/20 z-40 transition-transform hover:-translate-y-4 duration-500 hidden sm:block">
                <div class="w-full h-full rounded-[2.8rem] overflow-hidden relative screen-glare">
                    <div class="device-screen-bg" style="background-image: url('{{ $mobileImage }}')"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/60"></div>
                    
                    <!-- DYNAMIC ISLAND -->
                    <div class="absolute top-3 left-1/2 -translate-x-1/2 w-20 h-6 bg-black rounded-full z-50 flex items-center justify-end px-2">
                        <div class="w-1 h-1 rounded-full bg-blue-500/20 mr-1"></div>
                    </div>

                    <div class="p-5 h-full flex flex-col justify-center items-center text-center relative z-20">
                        <div class="w-10 h-10 rounded-2xl glass flex items-center justify-center mb-4">
                            <i class="fas fa-mobile-alt text-white/80"></i>
                        </div>
                        <h3 class="text-[10px] font-black leading-tight tracking-tighter text-white">{{ strtoupper($portfolio->title) }}</h3>
                    </div>
                </div>
                <div class="absolute top-32 -right-1 w-1 h-16 bg-white/10 rounded-r-md"></div>
            </div>

        </div>

        <!-- DOLNY PANEL INFORMACYJNY -->
        <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="lg:col-span-2 glass p-10 rounded-[3rem] border-white/5 shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-5">
                    <i class="fas fa-quote-right text-6xl"></i>
                </div>
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-1.5 h-10 bg-gradient-to-b from-sky-400 to-blue-600 rounded-full"></div>
                    <div>
                        <h2 class="text-3xl font-black text-white">O projekcie</h2>
                        <p class="text-sky-400/60 text-xs uppercase tracking-widest font-bold">Technologia & Design</p>
                    </div>
                </div>
                <div class="text-slate-400 leading-relaxed text-lg font-light space-y-4">
                    {!! $portfolio->description ?? '<p>Brak opisu projektu.</p>' !!}
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <!-- Karta Statystyk -->
                <div class="glass p-8 rounded-[3rem] border-white/5 flex flex-col justify-between shadow-xl">
                    <div>
                        <h4 class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-6">Parametry projektu</h4>
                        <div class="space-y-5">
                            <div class="flex justify-between items-center">
                                <span class="text-sm">Responsywność</span>
                                <span class="px-3 py-1 bg-sky-500/10 text-sky-400 rounded-lg text-xs font-bold border border-sky-500/20">RWD READY</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm">Optymalizacja</span>
                                <span class="text-emerald-400 font-bold">98/100</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm">Status</span>
                                <span class="text-white font-bold text-sky-400">Ukończony</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-8 mt-8 border-t border-white/5">
                        <a href="{{ $portfolio->url ?? '#' }}" target="_blank" class="flex items-center justify-center gap-3 w-full py-4 bg-sky-600 hover:bg-sky-500 text-white rounded-2xl font-bold transition-all shadow-lg hover:shadow-sky-500/20 active:scale-95">
                            <span>Zobacz Live Demo</span>
                            <i class="fas fa-external-link-alt text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Karta Udostępniania / Info -->
                <div class="glass p-6 rounded-[2rem] border-white/5 flex items-center justify-center gap-4">
                    <span class="text-xs text-slate-500 uppercase tracking-widest">Share:</span>
                    <div class="flex gap-2">
                        <button class="w-8 h-8 rounded-full glass flex items-center justify-center text-xs hover:bg-white/10 transition-colors"><i class="fab fa-facebook-f"></i></button>
                        <button class="w-8 h-8 rounded-full glass flex items-center justify-center text-xs hover:bg-white/10 transition-colors"><i class="fab fa-linkedin-in"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection