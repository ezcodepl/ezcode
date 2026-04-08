@extends('layouts.admin-dashboard')

@section('content')
    <style>
        :root {
            --bg-main: #0b1120;
            --bg-card: #111827;
            --accent-blue: #0ea5e9;
            --border-color: rgba(255, 255, 255, 0.05);
        }

        body {
            background-color: var(--bg-main);
            color: #e5e7eb;
            font-family: 'Inter', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        /* Responsive Sidebar Logic */
        .sidebar {
            background: rgba(17, 24, 39, 0.95);
            backdrop-filter: blur(20px);
            border-right: 1px solid var(--border-color);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 100;
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            main {
                margin-left: 0 !important;
            }
        }

        .sidebar-link {
            transition: all 0.2s ease;
            border-radius: 12px;
            margin: 4px 12px;
        }

        .sidebar-link.active {
            background: #0ea5e9;
            color: white;
            box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3);
        }

        /* Cards and Elements */
        .card-custom {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .status-pill {
            padding: 4px 10px;
            border-radius: 99px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            white-space: nowrap;
        }

        .view-section {
            display: none;
            animation: fadeIn 0.3s ease-in-out;
        }

        .view-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Mobile Overlay */
        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(4px);
            z-index: 90;
        }
        .overlay.active { display: block; }

        /* Custom Scrollbar for tables on mobile */
        .table-container {
            overflow-x: auto;
            scrollbar-width: thin;
            scrollbar-color: #1e293b transparent;
        }

        input, textarea, select {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 10px 16px;
            color: white;
            outline: none;
            width: 100%;
        }
    </style>

 

    <!-- Mobile Header -->
    <div class="lg:hidden fixed top-0 left-0 right-0 h-16 bg-[#111827]/80 backdrop-blur-md border-b border-white/5 flex items-center justify-between px-6 z-[80]">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-sky-500 rounded-lg flex items-center justify-center text-white font-bold text-xs">
                <i class="fas fa-terminal"></i>
            </div>
            <span class="font-bold tracking-tight">ezCode</span>
        </div>
        <button onclick="toggleMenu()" class="w-10 h-10 flex items-center justify-center bg-white/5 rounded-xl border border-white/10">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div id="sidebar-overlay" class="overlay" onclick="toggleMenu()"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar w-64 fixed inset-y-0 left-0 flex flex-col pt-20 lg:pt-0">
        <div class="p-6 hidden lg:flex items-center gap-3">
            <div class="w-8 h-8 bg-sky-500 rounded-lg flex items-center justify-center text-white font-bold">
                <i class="fas fa-terminal text-sm"></i>
            </div>
            <span class="text-xl font-bold tracking-tight">ezCode</span>
        </div>

        <nav class="mt-4 flex-grow overflow-y-auto">
            <div class="px-6 mb-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Główny Panel</div>
            <a href="#" onclick="showView('dashboard')" class="sidebar-link active flex items-center gap-3 px-4 py-3 text-sm font-medium" id="link-dashboard">
                <i class="fas fa-grip-vertical w-5"></i> Dashboard
            </a>
            <a href="#" onclick="showView('posts')" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-400" id="link-posts">
                <i class="fas fa-paper-plane w-5"></i> Posty
            </a>
            <a href="#" onclick="showView('portfolio')" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-400" id="link-portfolio">
                <i class="fas fa-briefcase w-5"></i> Portfolio
            </a>
            
            <div class="px-6 mt-8 mb-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Twoja Marka</div>
            <a href="#" onclick="showView('settings')" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-400" id="link-settings">
                <i class="fas fa-sliders-h w-5"></i> Ustawienia
            </a>
        </nav>

        <div class="p-6 border-t border-white/5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-sky-500 to-indigo-500 flex items-center justify-center font-bold text-xs shrink-0">AD</div>
                <div class="flex-grow min-w-0">
                    <p class="text-xs font-bold truncate">
                        @if(auth()->user()->is_admin)
                            {{ auth()->user()->name }}
                        @endif
                    </p>
                    <p class="text-[10px] text-slate-500 truncate">Wyloguj się</p>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">
                <i class="fas fa-external-link-alt text-[20px] text-slate-600"></i>
            </button>
        </form>
                
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="lg:ml-64 flex-grow p-4 md:p-8 lg:p-10 mt-16 lg:mt-0 transition-all">
        
        <!-- DASHBOARD VIEW -->
        <section id="view-dashboard" class="view-section active">
            <header class="mb-8 lg:mb-10 flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold tracking-tight mb-2">Witaj w ezCode Dashboard</h1>
                    <p class="text-slate-500 text-sm">Zarządzaj swoimi usługami i blogiem.</p>
                </div>
                <div class="flex items-center gap-4 text-[10px] md:text-xs font-semibold text-slate-400">
                    <span class="hidden sm:inline">Ostatnia kopia: Dzisiaj, 14:20</span>
                    <button class="bg-white/5 hover:bg-white/10 p-2 rounded-lg border border-white/5"><i class="fas fa-sync"></i></button>
                </div>
            </header>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-8 lg:mb-10">
                <div class="card-custom p-6 md:p-8">
                    <div class="icon-box text-sky-500"><i class="fas fa-desktop"></i></div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Strony & Blog</h3>
                    <p class="text-xs md:text-sm text-slate-500 mb-6 leading-relaxed">Aktualnie posiadasz 12 aktywnych wpisów i 4 wersje robocze.</p>
                    <div class="flex items-center gap-2 text-xs font-bold text-sky-500 cursor-pointer hover:underline">
                        Dodaj nowy wpis <i class="fas fa-arrow-right text-[10px]"></i>
                    </div>
                </div>
                <div class="card-custom p-6 md:p-8">
                    <div class="icon-box text-emerald-500"><i class="fas fa-shopping-cart"></i></div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Portfolio</h3>
                    <h4 class="text-2xl font-black mb-1">24 Projekty</h4>
                    <p class="text-[9px] md:text-[10px] text-emerald-500 uppercase font-black mb-6 italic">+3 w tym miesiącu</p>
                    <button class="w-full py-3 bg-white/5 hover:bg-white/10 rounded-xl text-xs font-bold transition-all border border-white/5">Zarządzaj</button>
                </div>
                <div class="card-custom p-6 md:p-8 sm:col-span-2 lg:col-span-1 bg-gradient-to-br from-sky-500/10 to-transparent">
                    <div class="icon-box text-indigo-500"><i class="fas fa-server"></i></div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Infrastruktura</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-400 font-medium">Serwery Linux</span>
                            <span class="text-emerald-400">Stable</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-400 font-medium">Bazy Danych</span>
                            <span class="text-emerald-400">99.9% Up</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card-custom overflow-hidden">
                <div class="p-6 md:p-8 border-b border-white/5 flex justify-between items-center">
                    <h3 class="text-lg font-bold">Ostatnie wpisy</h3>
                    <button onclick="showView('posts')" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-wider">Wszystkie</button>
                </div>
                <div class="divide-y divide-white/[0.02]">
                    <div class="p-5 md:p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 hover:bg-white/[0.01] transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-slate-800 rounded-xl flex items-center justify-center text-slate-600 shrink-0"><i class="fas fa-file-alt"></i></div>
                            <div class="min-w-0">
                                <p class="font-bold text-sm truncate pr-4">Windows potrzebował tego od wielu lat...</p>
                                <p class="text-[10px] text-slate-500">Technologie • 27.03.2026</p>
                            </div>
                        </div>
                        <span class="status-pill bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Opublikowano</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- POSTS VIEW -->
        <section id="view-posts" class="view-section">
           <div class="relative z-10 max-w-7xl mx-auto px-6 py-12 pt-32">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-heading font-bold text-white">Zarządzanie Postami</h2>
            <p class="text-gray-400 text-sm italic code-font">admin / posts / index</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" 
           class="bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-lg font-medium flex items-center gap-2 transition-all transform hover:scale-105 shadow-lg shadow-brand/20">
            <i class="fas fa-plus text-sm"></i>
            Dodaj nowy post
        </a>
    </div>

    <div class="bg-cardbg border border-white/5 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/5 text-gray-400 uppercase text-xs tracking-wider font-semibold">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Tytuł</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4">Data publikacji</th>
                        <th class="px-6 py-4">Autor</th>
                        <th class="px-6 py-4 text-right">Akcje</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($posts as $post)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <td class="px-6 py-4 text-gray-500 code-font text-sm">#{{ $post->id }}</td>
                            <td class="px-6 py-4">
                                <span class="text-white font-medium group-hover:text-brand transition-colors">
                                    {{ Str::limit($post->title, 40) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($post->status === 'published')
                                    <span class="bg-emerald-500/10 text-emerald-500 text-[10px] uppercase font-bold px-2.5 py-1 rounded-full border border-emerald-500/20 shadow-sm shadow-emerald-500/10">
                                        Opublikowano
                                    </span>
                                @else
                                    <span class="bg-amber-500/10 text-amber-500 text-[10px] uppercase font-bold px-2.5 py-1 rounded-full border border-amber-500/20 uppercase">
                                        Szkic
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm italic font-light">
                                {{ $post->date_public ? $post->date_public->format('d.m.Y') : '---' }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 bg-brand/20 rounded-full flex items-center justify-center text-brand text-xs font-bold">
                                        {{ strtoupper(substr($post->user->name ?? '?', 0, 1)) }}
                                    </div>
                                    <span class="text-gray-300 text-sm">{{ $post->user->name ?? 'Brak autora' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3">
                                     <a href="{{ route('admin.posts.show', $post->id) }}" 
                                       class="p-2 text-gray-400 hover:text-brand hover:bg-brand/10 rounded-lg transition-all"
                                       title="Pokaż">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" 
                                       class="p-2 text-gray-400 hover:text-brand hover:bg-brand/10 rounded-lg transition-all"
                                       title="Edytuj">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Na pewno chcesz usunąć ten post?')"
                                                class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-500/10 rounded-lg transition-all"
                                                title="Usuń">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500 italic">
                                <i class="fas fa-folder-open text-3xl mb-3 block opacity-20"></i>
                                Nie znaleziono żadnych postów...
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
        </section>

        <!-- PORTFOLIO VIEW -->
        <section id="view-portfolio" class="view-section">
            <main class="max-w-7xl mx-auto pt-32 px-6 lg:px-10">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
        <div>
            <h1 class="text-4xl font-bold text-white mb-2">Zarządzanie Portfolio</h1>
            <p class="text-emerald-400 font-mono text-sm uppercase tracking-widest">Twoje realizacje i projekty</p>
        </div>

        <a href="{{ route('admin.portfolio.create') }}" 
           class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-2xl font-bold flex items-center gap-3 transition-all transform hover:scale-[1.02] shadow-xl shadow-emerald-500/20">
            <i class="fas fa-plus"></i> Dodaj nowy projekt
        </a>
    </div>

    <!-- TABELA -->
    <div class="glass-panel rounded-[2.5rem] overflow-hidden shadow-2xl border border-white/5">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                
                <!-- HEAD -->
                <thead>
                    <tr class="bg-white/[0.03] text-[11px] uppercase tracking-[0.2em] text-gray-400 font-black">
                        <th class="px-8 py-6">ID</th>
                        <th class="px-8 py-6">Projekt</th>
                        <th class="px-8 py-6 text-center">Data dodania</th>
                        <th class="px-8 py-6 text-right">Akcje</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="text-sm divide-y divide-white/[0.05]">
                    @forelse($projects as $p)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            
                            <!-- ID -->
                            <td class="px-8 py-6 text-gray-600 font-mono text-xs">
                                #{{ $p->id }}
                            </td>

                            <!-- PROJEKT + MINIATURKA -->
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-6">
                                   {{-- MINIATURKA --}}
                                    <div class="relative w-32 h-20 flex-shrink-0 overflow-hidden rounded-xl border border-white/10 group-hover:border-emerald-500/50 transition-colors">
                                        @php $desktopUrl = $p->getImageUrl('desktop'); @endphp

                                        @if($desktopUrl)
                                            <img 
                                                src="{{ $desktopUrl }}" 
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                            >
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-white/5 text-[10px] text-gray-500 uppercase font-bold">
                                                Brak foto
                                            </div>
                                        @endif
                                    </div>

                                    {{-- TEKST --}}
                                    <div class="flex flex-col">
                                        <span class="text-white font-bold text-lg mb-1 group-hover:text-emerald-400 transition-colors">
                                            {{ $p->title }}
                                        </span>
                                        <div class="flex flex-wrap gap-2">
                                            @php
                                                $techs = explode(',', $p->technology ?? '');
                                            @endphp
                                            @foreach(array_slice($techs, 0, 3) as $tech)
                                                <span class="text-[9px] px-2 py-0.5 rounded bg-white/5 text-gray-400 border border-white/10 uppercase font-bold tracking-wider">
                                                    {{ trim($tech) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- DATA -->
                            <td class="px-8 py-6 text-center text-gray-500 font-mono text-xs">
                                <div class="flex flex-col items-center">
                                    <span class="text-gray-300">{{ optional($p->created_at)->format('d.m.Y') ?? '-' }}</span>
                                    <span class="text-[10px] opacity-50">{{ optional($p->created_at)->format('H:i') }}</span>
                                </div>
                            </td>

                            <!-- AKCJE -->
                            <td class="px-8 py-6">
                                <div class="flex justify-end gap-3">
                                    <!-- POKAZ -->
                                    <a href="{{ route('admin.portfolio.show', $p->id) }}" 
                                       class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-gray-400 hover:bg-blue-500 hover:text-white transition-all shadow-lg" 
                                       title="Podgląd">
                                        <i class="far fa-eye text-xs"></i>
                                    </a>

                                    <!-- EDYTUJ -->
                                    <a href="{{ route('admin.portfolio.edit', $p->id) }}" 
                                       class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-gray-400 hover:bg-emerald-500 hover:text-white transition-all shadow-lg" 
                                       title="Edytuj">
                                        <i class="far fa-edit text-xs"></i>
                                    </a>

                                    <!-- USUŃ -->
                                    <form method="POST" action="{{ route('admin.portfolio.destroy', $p->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-gray-400 hover:bg-red-500 hover:text-white transition-all shadow-lg"
                                                onclick="return confirm('Czy na pewno chcesz trwale usunąć ten projekt?')"
                                                title="Usuń">
                                            <i class="far fa-trash-alt text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-20">
                                <div class="flex flex-col items-center gap-3 text-gray-500">
                                    <i class="fas fa-folder-open text-4xl opacity-20"></i>
                                    <p class="text-sm font-medium tracking-wide">Nie znaleziono żadnych projektów</p>
                                    <a href="{{ route('admin.portfolio.create') }}" class="text-emerald-400 text-xs underline uppercase tracking-widest font-bold mt-2">Dodaj pierwszy projekt</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- STOPKA -->
        <div class="bg-white/[0.03] px-8 py-6 flex justify-between items-center">
            <span class="text-xs text-gray-500 font-medium uppercase tracking-widest">
                Łącznie: <span class="text-white font-bold ml-1">{{ $projects->count() }}</span>
            </span>
            <div class="text-[10px] text-gray-600 uppercase font-black tracking-widest">
                System Zarządzania Portfolio v2.0
            </div>
        </div>
    </div>
</main>

<style>
    .glass-panel {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(15px);
    }
    /* Animacja rzędu przy najechaniu */
    tr.table-row {
        transition: transform 0.2s ease;
    }
</style>
        </section>

        <!-- SETTINGS VIEW -->
        <section id="view-settings" class="view-section">
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight mb-8">Ustawienia</h1>
            <div class="max-w-2xl space-y-6">
                <div class="card-custom p-6 md:p-8">
                    <h3 class="text-lg font-bold mb-6 border-b border-white/5 pb-4">Personalizacja Portfolio</h3>
                    <div class="space-y-6">
                        <div class="flex flex-col gap-2">
                            <label class="text-[9px] font-bold text-slate-500 uppercase tracking-widest px-1">Główny Tytuł (Hero)</label>
                            <input type="text" value="Tworzę nowoczesne, responsywne witryny...">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-[9px] font-bold text-slate-500 uppercase tracking-widest px-1">Krótki opis o mnie</label>
                            <textarea rows="4" class="text-sm">Specjalizuję się w systemach zarządzania danymi...</textarea>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                    <button class="w-full sm:w-auto px-6 py-3 rounded-xl font-bold text-slate-400 hover:text-white transition-all text-sm bg-white/5 sm:bg-transparent">Anuluj</button>
                    <button class="w-full sm:w-auto bg-sky-500 px-8 py-3 rounded-xl font-bold text-white shadow-lg shadow-sky-500/20 text-sm transition-all hover:bg-sky-600">Zapisz zmiany</button>
                </div>
            </div>
        </section>

    </main>

    <script>
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
        }

        function showView(viewId) {
            // Hide all sections
            document.querySelectorAll('.view-section').forEach(section => {
                section.classList.remove('active');
            });
            // Show target
            document.getElementById('view-' + viewId).classList.add('active');

            // Update sidebar links
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.classList.remove('active');
                link.classList.add('text-slate-400');
            });
            const activeLink = document.getElementById('link-' + viewId);
            activeLink.classList.add('active');
            activeLink.classList.remove('text-slate-400');

            // On mobile, close menu after selection
            if (window.innerWidth < 1024) {
                toggleMenu();
            }

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
@endsection