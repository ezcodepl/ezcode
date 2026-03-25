@extends('layouts.app') @section('title', 'ezCode - oferta')

@section('content')
    <!-- Efekty tła -->
    <div
        class="fixed inset-0 bg-[radial-gradient(circle_at_top_right,rgba(29,78,216,0.12),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(157,78,221,0.08),transparent_40%)] pointer-events-none z-0">
    </div>
    <div
        class="fixed inset-0 opacity-[0.02] pointer-events-none z-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
    </div>


    <!-- PROJEKTY SECTION -->
    <section id="projekty" class="py-24 bg-darker">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-16">
                <div class="max-w-xl">
                    <h3 class="text-4xl md:text-5xl font-bold mb-6">Zrealizowane <span class="text-brand">projekty</span></h23>

                </div>

            </div>

            <!-- SIATKA TRZYKOLUMNOWA -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($projects as $project)
                   <a href="{{ route('projekty-show', $project->id) }}">
                             <div class="group cursor-pointer">
                    <div class="group cursor-pointer">
                        <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">

                            {{-- obrazek --}}
                           
                                @php
                                    $image = $project->images->first();
                                @endphp

                                <img src="{{ $image ? asset('storage/' . $image->image_path) : 'https://via.placeholder.com/800x450?text=Brak+zdjecia' }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                    alt="{{ $project->title ?? 'Projekt' }}">
                            
                            {{-- overlay --}}
                            <div
                                class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                @if ($project->url)
                                    <a href="{{ $project->url }}" target="_blank">
                                        <div
                                            class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-col">

                           

                            {{-- tytuł --}}
                            <h4 class="text-xl font-bold mb-3">
                                {{ $project->title ?? 'Brak tytułu' }}
                            </h4>

                          

                            {{-- tagi technologii (jeśli chcesz rozbić np. "React, Tailwind") --}}
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
                    </div>
                     </div>
                            </a>
                @empty
                    <p class="text-center text-slate-400">Brak projektów</p>
                @endforelse

                
            </div>
        </div>
    </section>



@endsection
