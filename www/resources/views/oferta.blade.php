@extends('layouts.app') @section('title', 'ezCode - oferta')

@section('content')
<!-- Efekty tła -->
    <div
        class="fixed inset-0 bg-[radial-gradient(circle_at_top_right,rgba(29,78,216,0.12),transparent_40%),radial-gradient(circle_at_bottom_left,rgba(157,78,221,0.08),transparent_40%)] pointer-events-none z-0">
    </div>
    <div
        class="fixed inset-0 opacity-[0.02] pointer-events-none z-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]">
    </div>
 <!-- Nagłówek Sekcji -->
    <header class="relative z-10 max-w-4xl mx-auto px-6 pt-32 pb-12 text-center animate-slide-up">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-brand/30 bg-brand/5 text-brand text-[10px] font-bold uppercase tracking-widest mb-6 ">
            <i data-lucide="briefcase" class="w-3 h-3"></i>
            <span>Pełne Spektrum Usług IT</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight">
            Technologia wspierająca <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand to-[#9d4edd]">Twoją wizję.</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto leading-relaxed">
            Od projektu graficznego, przez zaawansowaną architekturę bazodanową, aż po administrację bezpiecznymi serwerami Linux. Kompleksowe wsparcie Twojego biznesu w sieci.
        </p>
    </header>

    <!-- Grid z Ofertą -->
    <section class="relative z-10 max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Usługa 1: Strony WWW -->
        <div class="glass-card p-8 rounded-3xl animate-slide-up" style="animation-delay: 0.1s;">
            <div class="w-12 h-12 bg-brand/10 rounded-2xl flex items-center justify-center text-brand mb-6">
                <i data-lucide="monitor"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Strony WWW</h3>
            <p class="text-gray-400 text-sm leading-relaxed mb-6">
                Tworzę nowoczesne, responsywne witryny wizytówkowe oraz rozbudowane portale informacyjne oparte o najnowsze technologie frontendowe.
            </p>
            <ul class="space-y-3 text-xs text-gray-300 font-medium">
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-brand"></i> Landing Pages & Single Page Apps</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-brand"></i> Optymalizacja Core Web Vitals</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-brand"></i> CMS (WordPress, Headless CMS)</li>
            </ul>
        </div>

        <!-- Usługa 2: Sklepy Internetowe -->
        <div class="glass-card p-8 rounded-3xl animate-slide-up" style="animation-delay: 0.2s;">
            <div class="w-12 h-12 bg-[#27c93f]/10 rounded-2xl flex items-center justify-center text-[#27c93f] mb-6">
                <i data-lucide="shopping-cart"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Sklepy Internetowe</h3>
            <p class="text-gray-400 text-sm leading-relaxed mb-6">
                Kompleksowe wdrożenia e-commerce, które sprzedają. Integruję systemy płatności, kurierów i narzędzia marketingowe.
            </p>
            <ul class="space-y-3 text-xs text-gray-300 font-medium">
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#27c93f]"></i> Dedykowane rozwiązania PrestaShop</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#27c93f]"></i> Integracje z Allegro i ERP</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#27c93f]"></i> Szybkie płatności (PayU, BLIK)</li>
            </ul>
        </div>

        <!-- Usługa 3: Aplikacje Bazodanowe -->
        <div class="glass-card p-8 rounded-3xl animate-slide-up" style="animation-delay: 0.3s;">
            <div class="w-12 h-12 bg-[#9d4edd]/10 rounded-2xl flex items-center justify-center text-[#9d4edd] mb-6">
                <i data-lucide="database"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Aplikacje Bazodanowe</h3>
            <p class="text-gray-400 text-sm leading-relaxed mb-6">
                Projektowanie i wdrażanie systemów zarządzania danymi. Od prostych baz po skomplikowane systemy CRM/ERP.
            </p>
            <ul class="space-y-3 text-xs text-gray-300 font-medium">
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#9d4edd]"></i> Architektura PostgreSQL / MySQL</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#9d4edd]"></i> Optymalizacja zapytań i struktur</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#9d4edd]"></i> Bezpieczeństwo i backupy danych</li>
            </ul>
        </div>

        <!-- Usługa 4: Konfiguracja Systemów -->
        <div class="glass-card p-8 rounded-3xl animate-slide-up" style="animation-delay: 0.4s;">
            <div class="w-12 h-12 bg-[#ffbd2e]/10 rounded-2xl flex items-center justify-center text-[#ffbd2e] mb-6">
                <i data-lucide="settings"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Konfiguracja Systemów</h3>
            <p class="text-gray-400 text-sm leading-relaxed mb-6">
                Profesjonalna konfiguracja środowisk deweloperskich i produkcyjnych dopasowanych do specyfiki projektu.
            </p>
            <ul class="space-y-3 text-xs text-gray-300 font-medium">
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#ffbd2e]"></i> Środowiska Docker & Compose</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#ffbd2e]"></i> Optymalizacja PHP / Node.js</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#ffbd2e]"></i> Zarządzanie domenami i DNS</li>
            </ul>
        </div>

        <!-- Usługa 5: Serwery Linux -->
        <div class="glass-card p-8 rounded-3xl animate-slide-up" style="animation-delay: 0.5s;">
            <div class="w-12 h-12 bg-[#ff5f56]/10 rounded-2xl flex items-center justify-center text-[#ff5f56] mb-6">
                <i data-lucide="terminal"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Serwery Linux</h3>
            <p class="text-gray-400 text-sm leading-relaxed mb-6">
                Wdrażanie i zarządzanie serwerami WWW opartymi na dystrybucjach Linux (Ubuntu, Debian, CentOS). 
            </p>
            <ul class="space-y-3 text-xs text-gray-300 font-medium">
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#ff5f56]"></i> Administracja Nginx / Apache</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#ff5f56]"></i> Hardening & Security (Firewall)</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#ff5f56]"></i> Monitoring zasobów 24/7</li>
            </ul>
        </div>

        <!-- Usługa 6: Wsparcie Techniczne -->
        <div class="glass-card p-8 rounded-3xl animate-slide-up" style="animation-delay: 0.6s;">
            <div class="w-12 h-12 bg-brand/10 rounded-2xl flex items-center justify-center text-brand mb-6">
                <i data-lucide="cpu"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">DevOps & Zarządzanie</h3>
            <p class="text-gray-400 text-sm leading-relaxed mb-6">
                Automatyzacja procesów wdrażania kodu. Zapewniam ciągłość działania Twoich aplikacji bez przestojów.
            </p>
            <ul class="space-y-3 text-xs text-gray-300 font-medium">
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-brand"></i> Deployment CI/CD</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-brand"></i> Certyfikaty SSL Let's Encrypt</li>
                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-brand"></i> Skalowanie horyzontalne</li>
            </ul>
        </div>

    </section>

    <!-- Sekcja CTA -->
    <section class="relative z-10 max-w-5xl mx-auto px-6 py-20 animate-slide-up" id="kontakt">
        <div class="bg-gradient-to-br from-[#151b2b] to-darkbg border border-[#1e293b] rounded-[3rem] p-12 text-center relative overflow-hidden group">
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-brand/10 rounded-full blur-3xl group-hover:bg-brand/20 transition-all"></div>
            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 italic">Gotowy na stabilne rozwiązanie?</h2>
                <p class="text-gray-400 mb-10 max-w-xl mx-auto">Niezależnie od tego, czy potrzebujesz zaawansowanej aplikacji, czy stabilnego serwera – dostarczę rozwiązanie, które nie zawiedzie Twoich klientów.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="bg-brand text-white px-10 py-4 rounded-2xl font-bold hover:bg-[#0088ff] transition-all shadow-xl shadow-brand/20">
                        Poproś o wycenę
                    </button>
                    <a href="tel:+48883900240" class="bg-white/5 text-white border border-white/10 px-10 py-4 rounded-2xl font-bold hover:bg-white/10 transition-all flex items-center gap-3">
                        <i data-lucide="phone" class="w-5 h-5"></i>
                        Zadzwoń teraz
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection