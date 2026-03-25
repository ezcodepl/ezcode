@extends('layouts.app') @section('title', 'ezCode - oferta')

@section('content')
    <!-- Efekty tła -->
    <div
        class="fixed inset-0 bg-[radial-gradient(circle_at_top_right,rgba(29,78,216,0.12),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(157,78,221,0.08),transparent_40%)] pointer-events-none z-0">
    </div>
    <div
        class="fixed inset-0 opacity-[0.02] pointer-events-none z-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
    </div>

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
                    <a href="{{ route('projekty', $portfolio->id) }}"
                        class="btn-secondary h-12 w-12 rounded-xl flex items-center justify-center hover:bg-slate-700 transition-all"
                        title="Powrót">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <a href="{{ route('projekty') }}"
                        class="btn-primary h-12 px-8 rounded-xl flex items-center gap-2 font-semibold hover:scale-105 transition-all active:scale-95 text-white">
                        <i class="fa-solid fa-pen-to-square"></i> Wszystkie projekty
                    </a>
                </div>
            </header>

            <!-- Main Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Left Column: Media & Description -->
                <div class="lg:col-span-2 space-y-8">

                    <!-- Hero Image -->
                    @if ($portfolio->images && $portfolio->images->count() > 0)
                        <div class="hero-image-container group">
                            <img src="{{ asset('storage/' . $portfolio->images->first()->image_path) }}"
                                alt="{{ $portfolio->title }} Main Image" class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-8">
                                <div>
                                    <span
                                        class="text-xs font-bold uppercase tracking-widest text-blue-400 mb-2 block">Zdjęcie
                                        główne</span>
                                    <h2 class="text-xl font-semibold text-white">{{ $portfolio->title }}</h2>
                                </div>
                            </div>
                            <button
                                class="absolute top-4 right-4 h-10 w-10 bg-black/40 backdrop-blur-md text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fa-solid fa-expand"></i>
                            </button>
                        </div>
                    @endif
                    <div class="flex flex-wrap gap-2">
                        @foreach (explode(',', $portfolio->technology) as $tech)
                            <span
                                class="px-4 py-2 rounded-xl bg-white/[0.03] border border-white/10 backdrop-blur-md text-slate-300 text-sm font-medium hover:bg-white/[0.08] hover:text-white hover:border-white/20 transition-all duration-200 cursor-default">


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
