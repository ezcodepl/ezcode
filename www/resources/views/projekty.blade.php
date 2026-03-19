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
                    <h3 class="text-4xl md:text-5xl font-bold mb-6">Zrealizowane<span class="text-brand">projekty</span></h23>
                    
                </div>
                
            </div>

            <!-- SIATKA TRZYKOLUMNOWA -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Projekt 1 -->
                <div class="group cursor-pointer">
                    <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Lex Partners">
                        <div class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-brand text-[10px] font-black uppercase tracking-[0.2em] mb-2">Web Design / Development</span>
                        <h4 class="text-xl font-bold mb-3">Lex Partners Portal</h4>
                        <div class="flex gap-2">
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">React</span>
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">Tailwind</span>
                        </div>
                    </div>
                </div>

                <!-- Projekt 2 -->
                <div class="group cursor-pointer">
                    <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1557821552-17105176677c?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Aroma Beans">
                        <div class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-brand text-[10px] font-black uppercase tracking-[0.2em] mb-2">E-commerce / Shopify</span>
                        <h4 class="text-xl font-bold mb-3">Aroma Beans Shop</h4>
                        <div class="flex gap-2">
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">Shopify</span>
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">Liquid</span>
                        </div>
                    </div>
                </div>

                <!-- Projekt 3 -->
                <div class="group cursor-pointer">
                    <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Gym Hero">
                        <div class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-brand text-[10px] font-black uppercase tracking-[0.2em] mb-2">Landing Page / UX</span>
                        <h4 class="text-xl font-bold mb-3">Gym Hero App</h4>
                        <div class="flex gap-2">
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">Next.js</span>
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">Framer Motion</span>
                        </div>
                    </div>
                </div>
                
                <!-- Projekt 4 -->
                <div class="group cursor-pointer">
                    <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1551288049-bbbda5366392?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Tech Dashboard">
                        <div class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-brand text-[10px] font-black uppercase tracking-[0.2em] mb-2">SaaS / Web App</span>
                        <h4 class="text-xl font-bold mb-3">DataFlow Analytics</h4>
                        <div class="flex gap-2">
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">Vue.js</span>
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">Firebase</span>
                        </div>
                    </div>
                </div>

                <!-- Projekt 5 -->
                <div class="group cursor-pointer">
                    <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1542744094-24638eff58bb?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Property Website">
                        <div class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-brand text-[10px] font-black uppercase tracking-[0.2em] mb-2">Real Estate / WP</span>
                        <h4 class="text-xl font-bold mb-3">Green Estates</h4>
                        <div class="flex gap-2">
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">WordPress</span>
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">PHP</span>
                        </div>
                    </div>
                </div>

                <!-- Projekt 6 -->
                <div class="group cursor-pointer">
                    <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Creative Blog">
                        <div class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-brand text-[10px] font-black uppercase tracking-[0.2em] mb-2">Personal Blog / UX</span>
                        <h4 class="text-xl font-bold mb-3">Artify Journal</h4>
                        <div class="flex gap-2">
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">Gatsby</span>
                            <span class="px-2 py-1 rounded bg-white/5 border border-white/10 text-[10px] text-slate-400 font-bold uppercase tracking-wider">GraphQL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection