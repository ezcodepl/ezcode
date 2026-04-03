@extends('layouts.admin')
@section('title', 'ezCode - Podgląd projektu: ' . $portfolio->title)

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background-color: #0f172a;
        color: #f8fafc;
        background-image: 
            radial-gradient(circle at 0% 0%, rgba(30, 58, 138, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 100% 100%, rgba(30, 58, 138, 0.15) 0%, transparent 50%);
        min-height: 100vh;
    }

    .glass-card {
        background: rgba(30, 41, 59, 0.7);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 1.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
    }

    .btn-secondary {
        background: rgba(51, 65, 85, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .hero-image-container {
        position: relative;
        border-radius: 1.5rem;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        aspect-ratio: 21 / 9;
    }

    @media (max-width: 768px) {
        .hero-image-container {
            aspect-ratio: 16 / 9;
        }
    }

    .status-badge {
        background: rgba(16, 185, 129, 0.1);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.2);
    }
</style>

<div class="min-h-screen bg-darkbg text-gray-300 font-sans selection:bg-brand selection:text-white pt-32">
    <div class="max-w-7xl mx-auto p-6 lg:p-12 space-y-8">

        <!-- Header Section -->
        <header class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
            <div>
              
                <h1 class="text-4xl font-bold tracking-tight text-white">
                    {{ $portfolio->title }}
                </h1>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.portfolio.index') }}" class="btn-secondary h-12 w-12 rounded-xl flex items-center justify-center hover:bg-slate-700 transition-all" title="Powrót">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn-primary h-12 px-8 rounded-xl flex items-center gap-2 font-semibold hover:scale-105 transition-all active:scale-95 text-white">
                    <i class="fa-solid fa-pen-to-square"></i> Edytuj projekt
                </a>
            </div>
        </header>

        <!-- Main Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Media & Description -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Hero Image -->
               @if($portfolio->image_desktop)
                <div class="hero-image-container group">
                    <img src="{{ $portfolio->getImageUrl('desktop') }}" 
                        alt="{{ $portfolio->title }} Main Image" 
                        class="w-full h-full object-cover">
                </div>
                @endif
                <div class="flex flex-wrap gap-2">
    @foreach(explode(',', $portfolio->technology) as $tech)
         <span class="px-4 py-2 rounded-xl bg-white/[0.03] border border-white/10 backdrop-blur-md text-slate-300 text-sm font-medium hover:bg-white/[0.08] hover:text-white hover:border-white/20 transition-all duration-200 cursor-default">
              

            {{ trim($tech) }}
        </span>
    @endforeach
</div>
                <!-- Description -->
                <section class="glass-card p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="h-8 w-1 bg-blue-500 rounded-full"></div>
                        <h2 class="text-xl font-semibold text-white">O projekcie</h2>
                    </div>
                    <div class="prose prose-invert max-w-none text-slate-300 space-y-4">
                        {!! $portfolio->description ?? '<p>Brak opisu projektu.</p>' !!}
                    </div>
                </section>
            </div>

            <!-- Right Column: Info Panel -->
            <div class="space-y-6">
                <!-- Project Specs -->
                <section class="glass-card p-6 divide-y divide-white/5">
                    <div class="pb-6">
                        <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Metadane</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400 text-sm">ID Projektu</span>
                            <span class="font-mono text-white text-lg">#{{ $portfolio->id }}</span>
                        </div>
                    </div>

                    <div class="py-6 space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="text-blue-400 mt-1"><i class="fa-solid fa-calendar-check"></i></div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase tracking-tighter">Utworzono</p>
                                <p class="text-sm font-medium text-slate-200">{{ $portfolio->created_at->format('d F Y, H:i') }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="text-blue-400 mt-1"><i class="fa-solid fa-arrows-rotate"></i></div>
                            <div>
                                <p class="text-xs text-slate-500 uppercase tracking-tighter">Aktualizacja</p>
                                <p class="text-sm font-medium text-slate-200">{{ $portfolio->updated_at->format('d F Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <div class="status-badge rounded-xl p-4 flex items-center justify-between">
                            <span class="text-sm font-semibold uppercase tracking-wide">Status: Aktywny</span>
                            <div class="h-2 w-2 rounded-full bg-emerald-500 shadow-[0_0_8px_#10b981]"></div>
                        </div>
                    </div>
                </section>

                
            </div>

        </div>
    </div>
</div>
@endsection