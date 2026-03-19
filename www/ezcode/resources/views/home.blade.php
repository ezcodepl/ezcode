@extends('layouts.app') @section('title', 'Strona Główna - Witamy!')

@section('content')
      <!-- HERO SLIDER SECTION -->
    <section class="relative min-h-screen flex items-center pt-20 hero-gradient overflow-hidden">
        <div id="hero-slider" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            
            <!-- Slajd 1: Programowanie -->
            <div class="slide active">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="inline-flex items-center px-4 py-1.5 rounded-full border border-brand/20 bg-brand/10 text-brand text-xs font-medium mb-6">
                            <i class="fa-solid fa-terminal mr-2"></i> Dostępny do współpracy
                        </div>
                        <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.1] mb-6">
                            Witaj, jestem <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand to-purple-400">Full Stack</span><br>
                            Developerem.
                        </h1>
                        <p class="text-slate-400 text-lg mb-8 max-w-lg leading-relaxed">
                            Projektuję i koduję nowoczesne, w pełni responsywne aplikacje webowe oraz strony internetowe. Zmieniam pomysły w działający kod.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#projekty" class="bg-brand hover:bg-brand-dark text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg shadow-brand/25 flex items-center">
                                Moje realizacje <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                            </a>
                            <button class="bg-[#1e293b] hover:bg-slate-700 text-white px-8 py-4 rounded-xl font-bold transition-all flex items-center border border-slate-700">
                                <i class="fa-brands fa-github mr-2 text-xl"></i> GitHub
                            </button>
                        </div>
                    </div>
                    <div class="hidden lg:block relative">
                        <div class="bg-[#1e293b] rounded-2xl p-5 shadow-2xl border border-slate-800 transform rotate-1 hover:rotate-0 transition-transform duration-700">
                            <div class="flex gap-1.5 mb-5 px-1">
                                <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                                <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                                <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                            </div>
                            <div class="code-font text-sm leading-relaxed p-4 bg-[#0f172a] rounded-lg">
                               <pre class="text-slate-300"><span class="text-purple-400">const</span> <span class="text-blue-400">developer</span> = {
  <span class="text-brand">name</span>: <span class="text-green-300">'ezCode'</span>,
  <span class="text-brand">role</span>: <span class="text-green-300">'Full Stack Web Developer'</span>,
  <span class="text-brand">skills</span>: [<span class="text-green-300">'PHP'</span>, <span class="text-green-300">'JavaScript'</span>, <span class="text-green-300">'Tailwind'</span>],
  <span class="text-brand">responsive</span>: <span class="text-orange-400">true</span>,
  <span class="text-brand">buildWebsite</span>: <span class="text-purple-400">function</span>() {
    <span class="text-slate-500">// Zmieniamy pomysły w rzeczywistość</span>
    <span class="text-blue-400">return</span> <span class="text-green-300">'Sukces!'</span>;
  }
};</pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slajd 2: E-commerce -->
            <div class="slide">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="inline-flex items-center px-4 py-1.5 rounded-full border border-purple-500/20 bg-purple-500/10 text-purple-400 text-xs font-medium mb-6">
                            <i class="fa-solid fa-cart-shopping mr-2"></i> Sklepy internetowe
                        </div>
                        <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.1] mb-6">
                            Rozwiń swój <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500">E-commerce</span><br>
                            bez ograniczeń.
                        </h1>
                        <p class="text-slate-400 text-lg mb-8 max-w-lg leading-relaxed">
                            Tworzę szybkie, bezpieczne i zoptymalizowane pod sprzedaż sklepy online. Integruję płatności, kurierów i systemy ERP.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#oferta" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg shadow-purple-500/25 flex items-center">
                                Sprawdź ofertę <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:block relative">
                        <div class="bg-cardbg rounded-2xl p-8 border border-slate-800 shadow-2xl relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/10 blur-3xl rounded-full"></div>
                            <div class="flex flex-col gap-6">
                                <div class="flex items-center justify-between p-4 bg-darkbg/50 rounded-xl border border-white/5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded bg-brand/20 flex items-center justify-center text-brand"><i class="fa-solid fa-box"></i></div>
                                        <div><div class="text-sm font-bold text-white">Nowe zamówienie</div><div class="text-xs text-slate-500">#4521 - 249.00 zł</div></div>
                                    </div>
                                    <div class="text-xs text-green-400 font-bold">+12% dzisiaj</div>
                                </div>
                                <div class="h-32 w-full bg-darkbg/50 rounded-xl border border-white/5 flex items-end p-4 gap-2">
                                    <div class="w-full bg-brand/40 h-1/2 rounded-t-sm"></div>
                                    <div class="w-full bg-brand/60 h-3/4 rounded-t-sm"></div>
                                    <div class="w-full bg-brand h-full rounded-t-sm"></div>
                                    <div class="w-full bg-brand/50 h-2/3 rounded-t-sm"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slajd 3: UX/UI -->
            <div class="slide">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="inline-flex items-center px-4 py-1.5 rounded-full border border-emerald-500/20 bg-emerald-500/10 text-emerald-400 text-xs font-medium mb-6">
                            <i class="fa-solid fa-wand-magic-sparkles mr-2"></i> Systemy dedykowane
                        </div>
                        <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.1] mb-6">
                            Interfejsy, które <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-brand">Zachwycają</span><br>
                            użytkowników.
                        </h1>
                        <p class="text-slate-400 text-lg mb-8 max-w-lg leading-relaxed">
                            Analizuję, projektuję i wdrażam dedykowane panele administracyjne oraz systemy CRM dopasowane do Twoich procesów.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#omnie" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg shadow-emerald-500/25 flex items-center">
                                Dowiedz się więcej <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:block relative">
                         <div class="grid grid-cols-2 gap-4">
                            <div class="bg-cardbg p-6 rounded-2xl border border-slate-800 shadow-xl">
                                <div class="w-8 h-8 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-400 mb-4"><i class="fa-solid fa-chart-line"></i></div>
                                <div class="text-2xl font-bold text-white">99.9%</div>
                                <div class="text-xs text-slate-500">Dostępności systemów</div>
                            </div>
                            <div class="bg-cardbg p-6 rounded-2xl border border-slate-800 shadow-xl mt-8">
                                <div class="w-8 h-8 rounded-full bg-brand/20 flex items-center justify-center text-brand mb-4"><i class="fa-solid fa-gauge-high"></i></div>
                                <div class="text-2xl font-bold text-white">&lt; 1s</div>
                                <div class="text-xs text-slate-500">Czas ładowania strony</div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>

            <!-- Kontrolki slidera -->
            <div class="mt-12 flex items-center gap-6">
                <div id="slider-dots" class="flex">
                    <span class="dot active" onclick="currentSlide(0)"></span>
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                </div>
                <div class="flex gap-2">
                    <button onclick="changeSlide(-1)" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center text-slate-400 hover:bg-white/5 transition-all">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button onclick="changeSlide(1)" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center text-slate-400 hover:bg-white/5 transition-all">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
     <!-- O MNIE -->
    <section id="omnie" class="py-24 bg-darkbg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative group">
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80" alt="Stanowisko pracy" class="w-full grayscale group-hover:grayscale-0 transition-all duration-700">
                    </div>
                    <div class="absolute -bottom-6 -right-6 md:right-10 md:bottom-10 bg-[#1e293b]/95 backdrop-blur-md p-6 rounded-2xl border border-slate-700 shadow-2xl flex items-center gap-4 z-20">
                        <div class="w-12 h-12 rounded-lg bg-brand/20 flex items-center justify-center text-brand">
                            <i class="fa-solid fa-mobile-screen-button text-2xl"></i>
                        </div>
                        <div>
                            <div class="font-bold text-white leading-none">100% Responsywności</div>
                            <div class="text-xs text-slate-400 mt-1">Idealnie na PC i Mobile</div>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="text-brand font-bold uppercase text-xs tracking-widest mb-3">POZNAJMY SIĘ</h2>
                    <h3 class="text-4xl font-bold text-white mb-6">Od pomysłu do wdrożenia.</h3>
                    <p class="text-slate-400 leading-relaxed mb-8">
                        Wszystkie moje projekty są responsywne, co niesie za sobą możliwość poprawnego wyświetlania stron internetowych i aplikacji na urządzeniach mobilnych oraz PC.
                    </p>
                    <p class="text-slate-400 leading-relaxed mb-10">
                        Moja przygoda z programowaniem trwa od lat. Do czasu stworzenia <span class="text-white font-medium">ezcode.pl</span> moje projekty widniały pod domeną www.page4me.pl. Stale rozwijam swoje umiejętności, aby dostarczać rozwiązania najwyższej jakości, opierając się na nowoczesnych technologiach takich jak PHP, JavaScript i nowoczesne frameworki CSS.
                    </p>
                    <div class="flex gap-16 border-t border-slate-800 pt-10">
                        <div>
                            <div class="text-4xl font-bold text-white mb-1">5+</div>
                            <div class="text-sm text-slate-500">Lat Doświadczenia</div>
                        </div>
                        <div>
                            <div class="text-4xl font-bold text-white mb-1">50+</div>
                            <div class="text-sm text-slate-500">Zrealizowanych Projektów</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OFERTA (PRZYWRÓCONY ELEMENT) -->
    <section class="py-24 bg-[#111827]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-brand font-bold uppercase text-xs tracking-widest mb-3">OFERTA</h2>
                <h3 class="text-4xl font-bold text-white">Kompleksowe rozwiązania</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Strony WWW -->
                <div class="offer-card p-10 rounded-2xl">
                    <div class="w-14 h-14 bg-brand/10 rounded-xl flex items-center justify-center text-brand mb-8">
                        <i class="fa-solid fa-laptop-code text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-4">Strony WWW</h4>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Projektowanie nowoczesnych, szybkich i bezpiecznych stron internetowych dopasowanych do Twojego biznesu.
                    </p>
                </div>
                <!-- Sklepy Online -->
                <div class="offer-card p-10 rounded-2xl">
                    <div class="w-14 h-14 bg-brand/10 rounded-xl flex items-center justify-center text-brand mb-8">
                        <i class="fa-solid fa-cart-shopping text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-4">Sklepy Online</h4>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Wdrażanie funkcjonalnych platform e-commerce zintegrowanych z płatnościami i logistyką.
                    </p>
                </div>
                <div class="offer-card p-10 rounded-2xl">
                    <div class="w-14 h-14 bg-brand/10 rounded-xl flex items-center justify-center text-brand mb-8">
                        <i class="fa-solid fa-cart-shopping text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-4">Aplikacje bazodanowe</h4>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Wdrażanie funkcjonalnych platform e-commerce zintegrowanych z płatnościami i logistyką.
                    </p>
                </div>
                <!-- Branding -->
                <div class="offer-card p-10 rounded-2xl">
                    <div class="w-14 h-14 bg-brand/10 rounded-xl flex items-center justify-center text-brand mb-8">
                        <i class="fa-solid fa-wand-magic-sparkles text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-white mb-4">Branding</h4>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Tworzenie logotypów oraz identyfikacji wizualnej, która wyróżni Twoją markę na tle konkurencji.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- UMIEJĘTNOŚCI (Zaktualizowane o PostgreSQL, MSSQL, Python, Docker) -->
    <section id="umiejetnosci" class="py-24 bg-darkbg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-brand font-bold uppercase text-xs tracking-widest mb-3">MOJE UMIEJĘTNOŚCI</h2>
                <h3 class="text-4xl font-bold text-white">Technologie, z którymi pracuję</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-12 mb-16">
                <!-- Kolumna 1 -->
                <div class="space-y-10">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-3">
                                <i class="fa-brands fa-php text-[#777bb4] text-lg"></i>
                                <span class="text-white font-bold text-sm uppercase tracking-wide">PHP & MySQL</span>
                            </div>
                            <span class="text-slate-500 text-sm">65%</span>
                        </div>
                        <div class="w-full bg-slate-800/50 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-brand h-full rounded-full progress-bar-glow" style="width: 65%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-3">
                                <i class="fa-brands fa-python text-[#3776AB] text-lg"></i>
                                <span class="text-white font-bold text-sm uppercase tracking-wide">Python (Django / Flask)</span>
                            </div>
                            <span class="text-slate-500 text-sm">70%</span>
                        </div>
                        <div class="w-full bg-slate-800/50 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-brand h-full rounded-full progress-bar-glow" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-database text-[#336791] text-lg"></i>
                                <span class="text-white font-bold text-sm uppercase tracking-wide">PostgreSQL</span>
                            </div>
                            <span class="text-slate-500 text-sm">75%</span>
                        </div>
                        <div class="w-full bg-slate-800/50 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-brand h-full rounded-full progress-bar-glow" style="width: 75%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-3">
                                <i class="fa-brands fa-docker text-[#2496ED] text-lg"></i>
                                <span class="text-white font-bold text-sm uppercase tracking-wide">Docker</span>
                            </div>
                            <span class="text-slate-500 text-sm">65%</span>
                        </div>
                        <div class="w-full bg-slate-800/50 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-brand h-full rounded-full progress-bar-glow" style="width: 65%"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Kolumna 2 -->
                <div class="space-y-10">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-3">
                                <i class="fa-brands fa-html5 text-[#e34f26] text-lg"></i>
                                <span class="text-white font-bold text-sm uppercase tracking-wide">HTML5 & CSS3</span>
                            </div>
                            <span class="text-slate-500 text-sm">90%</span>
                        </div>
                        <div class="w-full bg-slate-800/50 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-brand h-full rounded-full progress-bar-glow" style="width: 90%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-3">
                                <i class="fa-brands fa-js text-[#f7df1e] text-lg"></i>
                                <span class="text-white font-bold text-sm uppercase tracking-wide">JavaScript (ES6+)</span>
                            </div>
                            <span class="text-slate-500 text-sm">80%</span>
                        </div>
                        <div class="w-full bg-slate-800/50 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-brand h-full rounded-full progress-bar-glow" style="width: 80%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-server text-[#CC2927] text-lg"></i>
                                <span class="text-white font-bold text-sm uppercase tracking-wide">MSSQL Server</span>
                            </div>
                            <span class="text-slate-500 text-sm">60%</span>
                        </div>
                        <div class="w-full bg-slate-800/50 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-brand h-full rounded-full progress-bar-glow" style="width: 60%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-wind text-brand text-lg"></i>
                                <span class="text-white font-bold text-sm uppercase tracking-wide">Tailwind CSS / Bootstrap</span>
                            </div>
                            <span class="text-slate-500 text-sm">85%</span>
                        </div>
                        <div class="w-full bg-slate-800/50 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-brand h-full rounded-full progress-bar-glow" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-2 mt-12">
                <span class="skill-tag">Git / GitHub</span>
                <span class="skill-tag">WordPress</span>
                <span class="skill-tag">Responsive Web Design</span>
                <span class="skill-tag">UX/UI</span>
                <span class="skill-tag">Figma</span>
                <span class="skill-tag">Laravel</span>
                <span class="skill-tag">API Integration</span>
                <span class="skill-tag">Python</span>
                <span class="skill-tag">Docker</span>
            </div>
        </div>
    </section>
    
@endsection