@extends('layouts.app') @section('title', 'Strona Główna - Witamy!')

@section('content')
    <!-- Efekty tła -->
    <div
        class="fixed inset-0 bg-[radial-gradient(circle_at_top_right,rgba(29,78,216,0.12),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(157,78,221,0.08),transparent_40%)] pointer-events-none z-0">
    </div>
    <div
        class="fixed inset-0 opacity-[0.02] pointer-events-none z-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
    </div>
    <!-- HERO SLIDER SECTION -->
    <section class="relative min-h-screen flex items-center pt-20 hero-gradient overflow-hidden">
        <div id="hero-slider" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">

            <!-- Slajd 1: Programowanie -->
            <div class="slide active">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div
                            class="inline-flex items-center px-4 py-1.5 rounded-full border border-brand/20 bg-brand/10 text-brand text-xs font-medium mb-6">
                            <i class="fa-solid fa-terminal mr-2"></i> Dostępny do współpracy
                        </div>
                        <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.1] mb-6">
                            Witaj, jestem <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand to-purple-400">Full
                                Stack</span><br>
                            Developerem.
                        </h1>
                        <p class="text-slate-400 text-lg mb-8 max-w-lg leading-relaxed">
                            Projektuję i koduję nowoczesne, w pełni responsywne aplikacje webowe oraz strony internetowe.
                            Zmieniam pomysły w działający kod.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#projekty"
                                class="bg-brand hover:bg-brand-dark text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg shadow-brand/25 flex items-center">
                                Moje realizacje <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                            </a>
                            <button
                                class="bg-[#1e293b] hover:bg-slate-700 text-white px-8 py-4 rounded-xl font-bold transition-all flex items-center border border-slate-700">
                                <i class="fa-brands fa-github mr-2 text-xl"></i> GitHub
                            </button>
                        </div>
                    </div>
                    <div class="hidden lg:block relative max-w-xl mx-auto">
                        <div
                            class="bg-[#1e293b] rounded-2xl p-5 shadow-2xl border border-slate-800 transform rotate-1 hover:rotate-0 transition-transform duration-700">
                            <div class="flex gap-1.5 mb-5 px-1">
                                <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                                <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                                <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                            </div>
                            <div class="code-font text-sm leading-relaxed p-4 bg-[#0f172a] rounded-lg">
  <pre class="text-slate-300">
  <span class="text-purple-400">const</span> <span class="text-blue-400">developer</span> = {
       <span class="text-brand">name</span>: <span class="text-green-300">'ezCode'</span>,
       <span class="text-brand">role</span>: <span class="text-green-300">'Full Stack Web Developer'</span>,
       <span class="text-brand">skills</span>: [<span class="text-green-300">'PHP'</span>, <span class="text-green-300">'JavaScript'</span>, <span class="text-green-300">'Tailwind'</span>],
       <span class="text-brand">responsive</span>: <span class="text-orange-400">true</span>,
       <span class="text-brand">buildWebsite</span>: <span class="text-purple-400">function</span>() {
       <span class="text-slate-500">// Zmieniam pomysły w rzeczywistość</span>
      <span class="text-blue-400">return</span> <span class="text-green-300">'Sukces!'</span>;
       }
     };
                                    </pre>
                            </div>                              
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slajd 2: E-commerce -->
            <div class="slide">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div
                            class="inline-flex items-center px-4 py-1.5 rounded-full border border-purple-500/20 bg-purple-500/10 text-purple-400 text-xs font-medium mb-6">
                            <i class="fa-solid fa-cart-shopping mr-2"></i> Sklepy internetowe
                        </div>
                        <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.1] mb-6">
                            Rozwiń swój <br>
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500">E-commerce</span><br>
                            bez ograniczeń.
                        </h1>
                        <p class="text-slate-400 text-lg mb-8 max-w-lg leading-relaxed">
                            Tworzę szybkie, bezpieczne i zoptymalizowane pod sprzedaż sklepy online. Integruję płatności,
                            kurierów i systemy ERP.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#oferta"
                                class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg shadow-purple-500/25 flex items-center">
                                Sprawdź ofertę <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:block relative">
                        <!-- <div
                            class="bg-cardbg rounded-2xl p-8 border border-slate-800 shadow-2xl relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/10 blur-3xl rounded-full"></div>
                            <div class="flex flex-col gap-6">
                                <div
                                    class="flex items-center justify-between p-4 bg-darkbg/50 rounded-xl border border-white/5">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded bg-brand/20 flex items-center justify-center text-brand">
                                            <i class="fa-solid fa-box"></i></div>
                                        <div>
                                            <div class="text-sm font-bold text-white">Nowe zamówienie</div>
                                            <div class="text-xs text-slate-500">#4521 - 249.00 zł</div>
                                        </div>
                                    </div>
                                    <div class="text-xs text-green-400 font-bold">+12% dzisiaj</div>
                                </div>
                                <div
                                    class="h-32 w-full bg-darkbg/50 rounded-xl border border-white/5 flex items-end p-4 gap-2">
                                    <div class="w-full bg-brand/40 h-1/2 rounded-t-sm"></div>
                                    <div class="w-full bg-brand/60 h-3/4 rounded-t-sm"></div>
                                    <div class="w-full bg-brand h-full rounded-t-sm"></div>
                                    <div class="w-full bg-brand/50 h-2/3 rounded-t-sm"></div>
                                </div>
                            </div>
                        </div> -->
                        <!-- PRAWA STRONA: Modern Dashboard Interface (Przemodelowana) -->
        <div class="relative w-full max-w-[550px] flex items-center justify-center">
            
            <!-- Główny Kontener (bazujący na przesłanym kodzie) -->
            <div class="w-[420px] bg-[#141624]/70 rounded-2xl p-8 border border-slate-800 shadow-2xl relative overflow-hidden group backdrop-blur-xl z-10">
                <!-- Efekt poświaty wewnątrz -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/10 blur-3xl rounded-full transition-all group-hover:bg-purple-500/20"></div>
                
                <div class="flex flex-col gap-6 relative z-10">
                    <!-- Karta Statusu -->
                    <div class="flex items-center justify-between p-4 bg-[#0b0d17]/50 rounded-xl border border-white/5 transition-colors hover:border-white/10">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded bg-purple-500/20 flex items-center justify-center text-purple-400">
                                <i class="fa-solid fa-box"></i>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-white">Nowe zamówienie</div>
                                <div class="text-xs text-slate-500">#4521 - 249.00 zł</div>
                            </div>
                        </div>
                        <div class="text-xs text-green-400 font-bold bg-green-400/10 px-2 py-1 rounded">+12% dzisiaj</div>
                    </div>

                    <!-- Wykres Słupkowy -->
                    <div class="h-32 w-full bg-[#0b0d17]/50 rounded-xl border border-white/5 flex items-end p-4 gap-2">
                        <div class="w-full bg-purple-500/40 h-1/2 rounded-t-sm transition-all hover:bg-purple-500/60 cursor-pointer"></div>
                        <div class="w-full bg-purple-500/60 h-3/4 rounded-t-sm transition-all hover:bg-purple-500/80 cursor-pointer"></div>
                        <div class="w-full bg-gradient-to-t from-purple-600 to-pink-500 h-full rounded-t-sm shadow-[0_0_15px_rgba(168,85,247,0.3)]"></div>
                        <div class="w-full bg-purple-500/50 h-2/3 rounded-t-sm transition-all hover:bg-purple-500/70 cursor-pointer"></div>
                        <div class="w-full bg-purple-500/30 h-1/3 rounded-t-sm transition-all hover:bg-purple-500/50 cursor-pointer"></div>
                    </div>

                    <!-- Dodatkowe statystyki -->
                    <div class="flex justify-between items-center px-1">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Aktywne sesje</span>
                            <span class="text-lg font-bold text-white">1,420</span>
                        </div>
                        <div class="w-px h-8 bg-white/5"></div>
                        <div class="flex flex-col">
                            <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Konwersja</span>
                            <span class="text-lg font-bold text-white">4.2%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pływająca karta użytkownika (dodająca głębi) -->
            <div class="absolute -bottom-6 -left-8 w-[200px] flex items-center gap-3 p-3 rounded-2xl bg-[#1e2032]/80 backdrop-blur-md border border-white/10 shadow-2xl z-20 animate-float">
                <div class="w-9 h-9 bg-gradient-to-br from-indigo-600 to-purple-500 rounded-xl flex items-center justify-center font-bold text-xs text-white">MK</div>
                <div>
                    <p class="text-sm font-bold text-white">Marek Kowalski</p>
                    <p class="text-[10px] text-green-400 font-bold">Właśnie kupił!</p>
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
                        <div
                            class="inline-flex items-center px-4 py-1.5 rounded-full border border-emerald-500/20 bg-emerald-500/10 text-emerald-400 text-xs font-medium mb-6">
                            <i class="fa-solid fa-wand-magic-sparkles mr-2"></i> Systemy dedykowane
                        </div>
                        <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.1] mb-6">
                            Interfejsy, które <br>
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-brand">Zachwycają</span><br>
                            użytkowników.
                        </h1>
                        <p class="text-slate-400 text-lg mb-8 max-w-lg leading-relaxed">
                            Analizuję, projektuję i wdrażam dedykowane panele administracyjne oraz systemy CRM dopasowane do
                            Twoich procesów.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#omnie"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg shadow-emerald-500/25 flex items-center">
                                Dowiedz się więcej <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:block relative">
                        <!-- <div class="grid grid-cols-2 gap-4">
                            <div class="bg-cardbg p-6 rounded-2xl border border-slate-800 shadow-xl">
                                <div
                                    class="w-8 h-8 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-400 mb-4">
                                    <i class="fa-solid fa-chart-line"></i></div>
                                <div class="text-2xl font-bold text-white">99.9%</div>
                                <div class="text-xs text-slate-500">Dostępności systemów</div>
                            </div>
                            <div class="bg-cardbg p-6 rounded-2xl border border-slate-800 shadow-xl mt-8">
                                <div
                                    class="w-8 h-8 rounded-full bg-brand/20 flex items-center justify-center text-brand mb-4">
                                    <i class="fa-solid fa-gauge-high"></i></div>
                                <div class="text-2xl font-bold text-white">&lt; 1s</div>
                                <div class="text-xs text-slate-500">Czas ładowania strony</div>
                            </div>
                        </div> -->
                        <!-- Prawa Strona: Wizualizacja Infrastruktury -->
                <div class="hidden lg:block relative">
                    <!-- Tło dekoracyjne -->
                    <div class="absolute -top-20 -right-20 w-96 h-96 bg-emerald-500/10 rounded-full blur-[100px]"></div>
                    
                    <div class="floating relative z-20 space-y-6">
                        
                        <!-- Karta Docker Engine -->
                        <div class="glass-card rounded-3xl p-6 border-l-4 border-l-blue-500">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-blue-500/20 rounded-xl flex items-center justify-center text-blue-400">
                                        <i class="fa-brands fa-docker text-xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold">Docker Infrastructure</div>
                                        <div class="text-[10px] text-slate-500 font-mono">CONTAINER_ORCHESTRATION</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-3 bg-white/5 rounded-xl border border-white/5">
                                    <div class="flex items-center gap-3">
                                        <i class="fa-brands fa-laravel text-red-500"></i>
                                        <span class="text-xs font-mono">Laravel Application</span>
                                    </div>
                                    <span class="text-[9px] text-emerald-400 font-bold">RUNNING</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-white/5 rounded-xl border border-white/5">
                                    <div class="flex items-center gap-3">
                                        <i class="fa-brands fa-python text-blue-400"></i>
                                        <span class="text-xs font-mono">Django Core Engine</span>
                                    </div>
                                    <span class="text-[9px] text-emerald-400 font-bold">RUNNING</span>
                                </div>
                            </div>
                        </div>

                        <!-- Karta Bazy Danych -->
                        <div class="glass-card rounded-3xl p-6 border-l-4 border-l-emerald-500 ml-12">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 bg-emerald-500/20 rounded-xl flex items-center justify-center text-emerald-400">
                                    <i class="fa-solid fa-database"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-bold">Relational Databases</div>
                                    <div class="text-[10px] text-slate-500 font-mono">STORAGE_LAYER</div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-slate-900/80 p-4 rounded-2xl border border-white/5 flex flex-col items-center">
                                    <img src="https://www.mysql.com/common/logos/logo-mysql-170x115.png" class="w-12 h-8 object-contain grayscale invert opacity-50 mb-2" alt="MySQL">
                                    <span class="text-[10px] font-mono text-slate-400">MySQL 8.x</span>
                                </div>
                                <div class="bg-slate-900/80 p-4 rounded-2xl border border-white/5 flex flex-col items-center">
                                    <img src="https://wiki.postgresql.org/images/a/a4/PostgreSQL_logo.3colors.svg" class="w-12 h-8 object-contain grayscale invert opacity-50 mb-2" alt="PostgreSQL">
                                    <span class="text-[10px] font-mono text-slate-400">PostgreSQL</span>
                                </div>
                            </div>
                        </div>

                        <!-- Pływający Code Snippet (Docker Compose) -->
                        <div class="absolute -bottom-6 -right-6 glass-card p-5 rounded-2xl floating shadow-2xl" style="animation-delay: -2s;">
                            <div class="font-mono text-[10px] text-slate-400 space-y-1">
                                <div class="text-blue-400">version: '3.8'</div>
                                <div class="text-emerald-500">services:</div>
                                <div class="pl-2 text-slate-300">app_laravel:</div>
                                <div class="pl-4">build: ./laravel</div>
                                <div class="pl-2 text-slate-300">db_postgres:</div>
                                <div class="pl-4">image: postgres:alpine</div>
                            </div>
                        </div>

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
                    <button onclick="changeSlide(-1)"
                        class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center text-slate-400 hover:bg-white/5 transition-all">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button onclick="changeSlide(1)"
                        class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center text-slate-400 hover:bg-white/5 transition-all">
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
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80"
                            alt="Stanowisko pracy"
                            class="w-full grayscale group-hover:grayscale-0 transition-all duration-700">
                    </div>
                    <div
                        class="absolute -bottom-6 -right-6 md:right-10 md:bottom-10 bg-[#1e293b]/95 backdrop-blur-md p-6 rounded-2xl border border-slate-700 shadow-2xl flex items-center gap-4 z-20">
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
                        Wszystkie moje projekty są responsywne, co niesie za sobą możliwość poprawnego wyświetlania stron
                        internetowych i aplikacji na urządzeniach mobilnych oraz PC.
                    </p>
                    <p class="text-slate-400 leading-relaxed mb-10">
                        Moja przygoda z programowaniem trwa od lat. Do czasu stworzenia <span
                            class="text-white font-medium">ezcode.pl</span> moje projekty widniały pod domeną
                        www.page4me.pl. Stale rozwijam swoje umiejętności, aby dostarczać rozwiązania najwyższej jakości,
                        opierając się na nowoczesnych technologiach takich jak PHP, JavaScript i nowoczesne frameworki CSS.
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
                        Projektowanie nowoczesnych, szybkich i bezpiecznych stron internetowych dopasowanych do Twojego
                        biznesu.
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
                                <span class="text-white font-bold text-sm uppercase tracking-wide">Python (Django /
                                    Flask)</span>
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
                                <span class="text-white font-bold text-sm uppercase tracking-wide">Tailwind CSS /
                                    Bootstrap</span>
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
    <!-- PROJEKTY SECTION -->
    <section id="projekty" class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-16">
                <div class="max-w-xl">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">Ostatnie <span class="text-brand">Realizacje</span></h2>
                    <p class="text-slate-400 text-sm uppercase tracking-widest font-bold">Prezentacja wybranych projektów
                    </p>
                </div>
                <a href="#"
                    class="text-brand font-bold border-b border-brand/30 pb-1 hover:border-brand transition-all">Zobacz
                    wszystkie projekty</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Projekt 1 -->
                <div class="group cursor-pointer">
                    <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1200"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Project 1">
                        <div
                            class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-brand text-xs font-bold uppercase tracking-wider">Web Design /
                                Development</span>
                            <h4 class="text-2xl font-bold mt-1">Lex Partners Portal</h4>
                        </div>
                    </div>
                </div>
                <!-- Projekt 2 -->
                <div class="group cursor-pointer">
                    <div class="relative aspect-video rounded-3xl overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1557821552-17105176677c?auto=format&fit=crop&q=80&w=1200"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Project 2">
                        <div
                            class="absolute inset-0 bg-brand/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="w-16 h-16 bg-white text-black rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-brand text-xs font-bold uppercase tracking-wider">E-commerce / Shopify</span>
                            <h4 class="text-2xl font-bold mt-1">Aroma Beans Shop</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-7xl mx-auto px-6 py-24">
        <!-- BLOG PREVIEW (OPCJONALNIE) -->
        <!-- Siatka postów -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div>
                <h2 class="text-brand font-bold uppercase text-xs tracking-widest mb-3">BLOG</h2>
                <h3 class="text-4xl font-bold text-white">Wiedza i aktualności</h3>
            </div>
            <a href="{{ route('blog') }}"
                class="text-brand hover:text-white transition-colors flex items-center gap-2 font-medium">
                Zobacz wszystkie wpisy <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @forelse($posts as $post)
                <article
                    class="blog-card rounded-[2rem] overflow-hidden flex flex-col bg-[#151b2b] border border-white/5 shadow-xl transition-all hover:border-brand/30">

                    <!-- Górna część z obrazkiem -->
                    <div class="relative h-[208px] w-full overflow-hidden">
                        <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail->path) : 'https://via.placeholder.com/600x400' }}"
                            alt="{{ $post->title }}"
                            class="w-full h-full object-cover opacity-60 group-hover:opacity-100 group-hover:scale-110 transition-all duration-1000 ease-in-out">

                        <!-- Kategoria -->
                        @if(isset($post->category))
                            <div class="absolute top-8 left-8">
                                <span
                                    class="bg-black/60 backdrop-blur-xl text-cyan-400 text-[10px] font-black px-5 py-2.5 rounded-2xl border border-white/10 tracking-[0.2em] uppercase shadow-2xl">
                                    {{ strtoupper($post->category) }}
                                </span>
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f141f] via-transparent to-transparent opacity-90">
                        </div>
                    </div>

                    <!-- Treść -->
                    <div class="p-10 pt-4">
                        <div class="flex items-center gap-4 text-gray-500 text-[10px] mb-6 font-bold uppercase tracking-widest">
                            <div class="flex items-center gap-2">
                                <i data-lucide="user" class="w-3 h-3"></i>
                                {{ $post->user->name ?? 'Admin' }}
                            </div>
                            <span class="opacity-20">/</span>
                            <div class="flex items-center gap-1.5">
                                <i class="far fa-clock text-cyan-500"></i>
                                {{ $post->date_public ? \Carbon\Carbon::parse($post->date_public)->format('d M Y') : '---' }}
                            </div>
                        </div>

                        <h3
                            class="text-white text-xl title-font leading-[1.3] line-clamp-2 min-h-[56px] group-hover:text-cyan-400 transition-colors duration-300">
                            {{ $post->title }}
                        </h3>

                        <p class="text-gray-500 text-sm leading-relaxed mb-3 line-clamp-3 min-h-[20px]">
                            {{ Str::limit(strip_tags($post->content), 140) }}
                        </p>

                        <div class="flex items-center justify-between border-t border-white/[0.05] pt-6">
                            <span
                                class="text-gray-600 text-[10px] uppercase tracking-[0.3em] font-black">{{ $post->read_time ?? '10 MIN READ' }}</span>

                            <a href="{{ route('blog-show', $post->slug) }}"
                                class="group/btn flex items-center gap-4 text-white text-[11px] font-black uppercase tracking-[0.2em] hover:text-cyan-400 transition-all">
                                CZYTAJ
                                <div
                                    class="w-10 h-10 rounded-2xl bg-white/[0.03] flex items-center justify-center group-hover/btn:bg-cyan-500/20 group-hover/btn:rotate-[45deg] transition-all duration-500">
                                    <i class="fas fa-arrow-up-right-from-square text-[10px]"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <p class="text-white text-center mt-10">Brak nowych postów.</p>
            @endforelse
        </div>
    </section>


    <!-- ROZPOCZNIJ PROJEKT -->
    <section class="py-24 bg-darkbg border-t border-slate-800/50">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h3 class="text-4xl font-bold text-white mb-6">Rozpocznijmy projekt</h3>
            <p class="text-slate-400 mb-10">
                Skontaktuj się ze mną, a wspólnie stworzymy coś wyjątkowego. <br class="hidden md:block">
                Odpowiadam zazwyczaj w ciągu 24h.
            </p>
            <a href="mailto:info@ezcode.pl"
                class="inline-block bg-brand hover:bg-brand-dark text-white px-10 py-4 rounded-xl font-bold transition-all shadow-xl shadow-brand/20">
                info@ezcode.pl
            </a>
        </div>
    </section>

@endsection