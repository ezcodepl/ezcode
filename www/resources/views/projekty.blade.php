@extends('layouts.app')
@section('title', 'ezCode - oferta')

@section('content')

    <!-- Efekty tła -->
    <div
        class="fixed inset-0 bg-[radial-gradient(circle_at_top_right,rgba(29,78,216,0.12),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(157,78,221,0.08),transparent_40%)] pointer-events-none z-0">
    </div>

    <div
        class="fixed inset-0 opacity-[0.02] pointer-events-none z-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
    </div>


    <!-- PROJEKTY -->
    <section id="projekty" class="py-24 bg-darker">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Nagłówek -->
            <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-16">
                <div class="max-w-xl">
                    <h3 class="text-4xl md:text-5xl font-bold mb-6">
                        Zrealizowane <span class="text-brand">projekty</span>
                    </h3>
                </div>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($projects as $project)

                    <div class="group cursor-pointer">

                        <!-- Obraz -->
                        <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">
                            @php
                                $image = $project->images->first();
                            @endphp

                            <img src="{{ $image ? asset('storage/' . $image->image_path) : 'https://via.placeholder.com/800x450?text=Brak+zdjecia' }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                alt="{{ $project->title ?? 'Projekt' }}" loading="lazy">

                            <!-- Overlay -->
                            <div
                                class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                @if ($project->url)
                                    <a href="{{ $project->url }}" target="_blank">
                                        <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Tytuł -->
                        <a href="{{ route('projekty-show', $project->id) }}">
                            <h4 class="text-xl font-bold mb-3 hover:text-brand transition">
                                {{ $project->title ?? 'Brak tytułu' }}
                            </h4>
                        </a>

                        <!-- Technologie -->
                        <div class="flex gap-2 flex-wrap">
                            @if ($project->technology)
                                @foreach (explode(',', $project->technology) as $tech)
                                    <span
                                        class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">
                                        {{ trim($tech) }}
                                    </span>
                                @endforeach
                            @endif
                        </div>

                    </div>

                @empty
                    <p class="text-center text-slate-400 col-span-3">
                        Brak projektów
                    </p>
                @endforelse
            </div>

            <div class="w-full max-w-2xl mx-auto mt-20">
                @if ($projects->hasPages())

                    <div
                        class="backdrop-blur-md bg-white/5 border border-white/10 p-2 rounded-full flex items-center justify-between px-6 shadow-2xl">

                        <!-- Info -->
                        <div class="flex items-center gap-2">
                            <div class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></div>
                            <span class="text-slate-300 text-sm font-medium">
                                {{ $projects->firstItem() }}-{{ $projects->lastItem() }} z {{ $projects->total() }}
                            </span>
                        </div>

                        <div class="flex gap-2 items-center">

                            {{-- PREV --}}
                            @if ($projects->onFirstPage())
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center text-slate-600 bg-white/5 border border-white/5 cursor-not-allowed">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                            @else
                                <a href="{{ $projects->previousPageUrl() }}"
                                    class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-white/5 hover:bg-white/20 border border-white/10 transition">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            @endif

                            {{-- NUMERY STRON --}}
                            <div class="flex bg-black/20 rounded-full p-1 border border-white/5">
                                @for ($i = 1; $i <= $projects->lastPage(); $i++)
                                    @if ($i == $projects->currentPage())
                                        <span
                                            class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold bg-white text-black">
                                            {{ $i }}
                                        </span>
                                    @else
                                        <a href="{{ $projects->url($i) }}"
                                            class="w-8 h-8 rounded-full flex items-center justify-center text-sm text-white hover:bg-white/10">
                                            {{ $i }}
                                        </a>
                                    @endif
                                @endfor
                            </div>

                            {{-- NEXT --}}
                            @if ($projects->hasMorePages())
                                <a href="{{ $projects->nextPageUrl() }}"
                                    class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-white/5 hover:bg-white/20 border border-white/10 transition">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            @else
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center text-slate-600 bg-white/5 border border-white/5 cursor-not-allowed">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            @endif

                        </div>
                    </div>

                @endif
            </div>
        </div>
    </section>

@endsection