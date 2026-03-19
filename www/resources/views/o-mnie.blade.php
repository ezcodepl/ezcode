@extends('layouts.app') @section('title', 'ezCode - o mnie')

@section('content')
    <div class="pt-16"></div>
    <!-- Efekty tła -->
    <div
        class="fixed inset-0 bg-[radial-gradient(circle_at_top_right,rgba(29,78,216,0.12),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(157,78,221,0.08),transparent_40%)] pointer-events-none z-0">
    </div>
    <div
        class="fixed inset-0 opacity-[0.02] pointer-events-none z-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
    </div>

   
    <div class="relative z-10 max-w-6xl mx-auto px-6 py-12 lg:py-20 animate-in fade-in slide-in-from-bottom-4 duration-1000">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <div class="lg:col-span-7 space-y-10 ">
                <section>
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-[#00c3ff]/30 bg-[#00c3ff]/5 text-[#00c3ff] text-xs font-bold uppercase tracking-widest mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-terminal" aria-hidden="true">
                            <path d="M12 19h8"></path>
                            <path d="m4 17 6-6-6-6"></path>
                        </svg><span>Full Stack Path</span></div>
                    <h1 class="text-5xl lg:text-6xl font-extrabold mb-8 leading-[1.1] tracking-tight">Ewolucja poprzez
                        <br><span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-[#00c3ff] via-[#6a00ff] to-[#9d4edd]">czysty
                            kod.</span></h1>
                    <p class="text-gray-400 text-lg leading-relaxed mb-6">Nazywam się <span
                            class="text-white font-semibold">ezCode</span> i od lat zajmuję się budowaniem ekosystemów
                        cyfrowych. Moja praca to połączenie precyzyjnej inżynierii z kreatywnym podejściem do interfejsów
                        użytkownika.</p>
                    <p class="text-gray-400 text-lg leading-relaxed">Specjalizuję się w technologiach <strong
                            class="text-gray-200">TypeScript</strong> oraz <strong class="text-gray-200">Next.js</strong>,
                        wierząc, że statyczne typowanie i nowoczesne renderowanie to klucz do niezawodnych aplikacji
                        webowych.</p>
                </section>
                <section class="space-y-6">
                    <h2 class="text-2xl font-bold flex items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layers text-[#00c3ff]"
                            aria-hidden="true">
                            <path
                                d="M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z">
                            </path>
                            <path d="M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"></path>
                            <path d="M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"></path>
                        </svg>Stack Technologiczny</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div
                            class="p-6 bg-[#151b2b] border border-[#1e293b] rounded-2xl hover:border-[#00c3ff]/50 transition-colors group">
                            <h3 class="text-[#00c3ff] font-bold mb-4 text-xs uppercase tracking-widest">Frontend</h3>
                            <div class="flex flex-wrap gap-2"><span
                                    class="px-3 py-1.5 bg-[#00c3ff]/5 border border-[#00c3ff]/20 rounded-lg text-sm text-gray-300 hover:text-white transition-colors cursor-default">React</span><span
                                    class="px-3 py-1.5 bg-[#00c3ff]/5 border border-[#00c3ff]/20 rounded-lg text-sm text-gray-300 hover:text-white transition-colors cursor-default">Next.js</span><span
                                    class="px-3 py-1.5 bg-[#00c3ff]/5 border border-[#00c3ff]/20 rounded-lg text-sm text-gray-300 hover:text-white transition-colors cursor-default">TypeScript</span><span
                                    class="px-3 py-1.5 bg-[#00c3ff]/5 border border-[#00c3ff]/20 rounded-lg text-sm text-gray-300 hover:text-white transition-colors cursor-default">Tailwind
                                    CSS</span><span
                                    class="px-3 py-1.5 bg-[#00c3ff]/5 border border-[#00c3ff]/20 rounded-lg text-sm text-gray-300 hover:text-white transition-colors cursor-default">Framer
                                    Motion</span></div>
                        </div>
                        <div
                            class="p-6 bg-[#151b2b] border border-[#1e293b] rounded-2xl hover:border-[#9d4edd]/50 transition-colors group">
                            <h3 class="text-[#9d4edd] font-bold mb-4 text-xs uppercase tracking-widest">Infrastructure</h3>
                            <div class="flex flex-wrap gap-2"><span
                                    class="px-3 py-1.5 bg-[#9d4edd]/5 border border-[#9d4edd]/20 rounded-lg text-sm text-gray-300 hover:text-white transition-colors cursor-default">Node.js</span><span
                                    class="px-3 py-1.5 bg-[#9d4edd]/5 border border-[#9d4edd]/20 rounded-lg text-sm text-gray-300 hover:text-white transition-colors cursor-default">PostgreSQL</span><span
                                    class="px-3 py-1.5 bg-[#9d4edd]/5 border border-[#9d4edd]/20 rounded-lg text-sm text-gray-300 hover:text-white transition-colors cursor-default">Docker</span><span
                                    class="px-3 py-1.5 bg-[#9d4edd]/5 border border-[#9d4edd]/20 rounded-lg text-sm text-gray-300 hover:text-white transition-colors cursor-default">AWS</span><span
                                    class="px-3 py-1.5 bg-[#9d4edd]/5 border border-[#9d4edd]/20 rounded-lg text-sm text-gray-300 hover:text-white transition-colors cursor-default">GraphQL</span>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="flex flex-wrap items-center gap-6 pt-4"><button
                        class="bg-gradient-to-r from-[#00c3ff] to-[#0088ff] text-white px-8 py-3.5 rounded-xl font-bold hover:shadow-2xl hover:shadow-[#00c3ff]/30 transition-all transform hover:-translate-y-1">Pobierz
                        pełne CV</button><button
                        class="flex items-center gap-2 text-gray-400 hover:text-white font-medium transition-colors group">Moje
                        repozytoria<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-external-link group-hover:translate-x-1 transition-transform"
                            aria-hidden="true">
                            <path d="M15 3h6v6"></path>
                            <path d="M10 14 21 3"></path>
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                        </svg></button></div>
            </div>
            <div class="lg:col-span-5 space-y-8 lg:sticky lg:top-24">
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-[#00c3ff]/20 to-[#9d4edd]/20 rounded-2xl blur-xl opacity-50 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div class="relative bg-[#0d1117] border border-[#1e293b] rounded-2xl shadow-2xl overflow-hidden">
                        <div class="bg-[#161b22] px-4 py-3 flex items-center gap-1.5 border-b border-[#1e293b]">
                            <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                            <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                            <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div><span
                                class="ml-4 text-[10px] text-gray-500 font-mono uppercase tracking-widest">about_me.tsx</span>
                        </div>
                        <div class="p-6 font-mono text-sm leading-relaxed text-gray-300">
                            <div class="flex gap-4"><span class="text-gray-600 select-none">1</span><span><span
                                        class="text-[#ff7b72]">export default function</span> <span
                                        class="text-[#d2a8ff]">Profile</span>() {</span></div>
                            <div class="flex gap-4"><span class="text-gray-600 select-none">2</span><span class="pl-4"><span
                                        class="text-[#ff7b72]">return</span> (</span></div>
                            <div class="flex gap-4"><span class="text-gray-600 select-none">3</span><span
                                    class="pl-8 text-gray-400">&lt;<strong>Developer</strong></span></div>
                            <div class="flex gap-4"><span class="text-gray-600 select-none">4</span><span
                                    class="pl-12 text-[#a5d6ff]">focus</span>=<span
                                    class="text-[#79c0ff]">"Architecture"</span></div>
                            <div class="flex gap-4"><span class="text-gray-600 select-none">5</span><span
                                    class="pl-12 text-[#a5d6ff]">status</span>=<span
                                    class="text-[#79c0ff]">"Creative"</span></div>
                            <div class="flex gap-4"><span class="text-gray-600 select-none">6</span><span
                                    class="pl-8 text-gray-400">/&gt;</span></div>
                            <div class="flex gap-4"><span class="text-gray-600 select-none">7</span><span
                                    class="pl-4">);</span></div>
                            <div class="flex gap-4"><span class="text-gray-600 select-none">8</span><span>}</span></div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div
                        class="bg-[#151b2b] border border-[#1e293b] p-6 rounded-2xl text-center group hover:border-[#00c3ff]/30 transition-colors">
                        <div class="text-3xl font-black text-[#00c3ff] mb-1">6+</div>
                        <div class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">Lat Doświadczenia</div>
                    </div>
                    <div
                        class="bg-[#151b2b] border border-[#1e293b] p-6 rounded-2xl text-center group hover:border-[#9d4edd]/30 transition-colors">
                        <div class="text-3xl font-black text-[#9d4edd] mb-1">50+</div>
                        <div class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">Projektów</div>
                    </div>
                </div>
                <div
                    class="relative p-8 rounded-2xl bg-gradient-to-br from-[#00c3ff]/10 to-transparent border-l-4 border-[#00c3ff]">
                    <p class="italic text-gray-300 leading-relaxed text-sm">"Kodowanie to nie tylko pisanie instrukcji dla
                        maszyn, to rzemiosło tworzenia wartości tam, gdzie wcześniej była tylko pustka."</p><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-quote absolute top-4 right-4 text-[#00c3ff]/10 w-10 h-10" aria-hidden="true">
                        <path
                            d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z">
                        </path>
                        <path
                            d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
</div>
@endsection