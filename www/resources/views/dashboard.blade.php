<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ezCode | Panel Zarządzania</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #050a18;
            color: #f8fafc;
            -webkit-tap-highlight-color: transparent;
        }
        .glass {
            background: rgba(10, 20, 40, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .sidebar-transition {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .mobile-overlay {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            transition: opacity 0.3s ease;
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .accent-blue { background: #00b4d8; }
        .accent-green { background: #10b981; }

        @media (max-width: 768px) {
            .responsive-table-cell {
                display: block;
                width: 100%;
                padding: 0.25rem 1rem !important;
            }
            .responsive-table-row {
                display: block;
                padding: 1rem 0;
            }
        }
    </style>
</head>
<body class="bg-[#050a18] min-h-screen">

    <div id="overlay" class="fixed inset-0 mobile-overlay z-40 opacity-0 pointer-events-none lg:hidden" onclick="toggleMenu()"></div>

    <div class="flex h-screen overflow-hidden relative">
        
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 glass z-50 sidebar-transition -translate-x-full lg:translate-x-0 lg:static lg:flex lg:flex-col border-r border-white/5">
            <div class="p-6 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 accent-blue rounded flex items-center justify-center text-white font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <span class="text-lg font-bold tracking-tight text-white">ezCode</span>
                </div>
                <button onclick="toggleMenu()" class="lg:hidden p-2 text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <nav class="flex-1 px-3 space-y-1 overflow-y-auto no-scrollbar">
                <a href="#" class="flex items-center px-4 py-2.5 text-slate-400 hover:bg-white/5 hover:text-[#00b4d8] rounded-lg text-sm transition">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path></svg>
                    Posty
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 bg-[#00b4d8]/10 text-[#00b4d8] rounded-lg text-sm font-medium border-r-2 border-[#00b4d8]">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Portfolio
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-slate-400 hover:bg-white/5 hover:text-[#00b4d8] rounded-lg text-sm transition">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Profil
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-slate-400 hover:bg-white/5 hover:text-[#00b4d8] rounded-lg text-sm transition">
                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                    Ustawienia
                </a>
            </nav>

            <div class="p-4 border-t border-white/5">
                <button class="w-full py-2.5 px-4 rounded-lg bg-[#00b4d8] text-white text-xs font-bold transition active:scale-95">
                    Wyloguj
                </button>
            </div>
        </aside>

        <!-- Main -->
        <main class="flex-1 flex flex-col min-w-0 bg-[#050a18] overflow-hidden">
            
            <header class="h-16 flex items-center justify-between px-4 md:px-6 border-b border-white/5 glass z-30">
                <div class="flex items-center gap-4">
                    <button onclick="toggleMenu()" class="lg:hidden p-1.5 text-slate-300 hover:bg-white/5 rounded-md transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                    <h1 class="text-base md:text-xl font-bold text-white tracking-tight">Portfolio</h1>
                </div>

                <div class="flex items-center gap-2">
                    <button class="bg-white/5 border border-white/10 text-white px-3 py-1.5 rounded-lg text-xs font-bold flex items-center hover:bg-white/10 transition">
                        <svg class="w-3.5 h-3.5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
                        <span class="hidden sm:inline">Nowy post</span>
                    </button>
                    <button class="accent-green text-white px-3 py-1.5 rounded-lg text-xs font-bold flex items-center hover:opacity-90 transition">
                        <svg class="w-3.5 h-3.5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
                        <span class="hidden sm:inline">Nowy projekt</span>
                    </button>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-4 md:p-6 space-y-6 no-scrollbar">
                
                <!-- Statystyki -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="glass rounded-xl p-4 border border-white/5">
                        <p class="text-slate-500 text-[9px] font-bold uppercase tracking-widest mb-1">Projekty</p>
                        <h3 class="text-xl font-bold">12</h3>
                    </div>
                    <div class="glass rounded-xl p-4 border border-white/5">
                        <p class="text-slate-500 text-[9px] font-bold uppercase tracking-widest mb-1">Posty</p>
                        <h3 class="text-xl font-bold">48</h3>
                    </div>
                    <div class="glass rounded-xl p-4 border border-white/5">
                        <p class="text-slate-500 text-[9px] font-bold uppercase tracking-widest mb-1">Wyświetlenia</p>
                        <h3 class="text-xl font-bold text-[#00b4d8]">14.2k</h3>
                    </div>
                </div>

                <!-- Tabela Odchudzona -->
                <div class="glass rounded-2xl border border-white/5 overflow-hidden">
                    <div class="p-4 bg-white/[0.02] border-b border-white/5 flex justify-between items-center">
                        <h4 class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Projekty</h4>
                        <span class="text-[8px] bg-white/5 px-2 py-0.5 rounded text-slate-600 font-mono">V2.0</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="hidden md:table-header-group text-[9px] font-bold text-slate-500 uppercase tracking-widest border-b border-white/5 bg-white/[0.01]">
                                <tr>
                                    <th class="px-6 py-3 w-16">ID</th>
                                    <th class="px-6 py-3">Projekt / Technologie</th>
                                    <th class="px-6 py-3 text-center">Data</th>
                                    <th class="px-6 py-3 text-right">Akcje</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                <tr class="responsive-table-row hover:bg-white/[0.01] transition-colors">
                                    <td class="hidden md:table-cell px-6 py-4 text-slate-600 text-[10px] font-bold">#01</td>
                                    <td class="responsive-table-cell px-6 py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-16 h-10 rounded bg-slate-800 overflow-hidden border border-white/5 flex-shrink-0">
                                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=40&w=100" class="w-full h-full object-cover opacity-60" alt="Work">
                                            </div>
                                            <div class="truncate">
                                                <p class="font-bold text-sm text-white truncate">Fundacja Merkson</p>
                                                <p class="text-[8px] text-slate-500 font-bold uppercase mt-0.5">PHP • MySQL • WP</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="responsive-table-cell px-6 py-1 md:py-4 md:text-center">
                                        <p class="text-[10px] font-bold text-slate-400">26.03.2026 <span class="md:block md:text-[8px] text-slate-600 font-normal">20:22</span></p>
                                    </td>
                                    <td class="responsive-table-cell px-6 py-3 text-right">
                                        <div class="flex justify-start md:justify-end gap-1.5">
                                            <button class="p-1.5 bg-white/5 hover:bg-white/10 rounded-md transition text-slate-400">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </button>
                                            <button class="p-1.5 bg-white/5 hover:bg-white/10 rounded-md transition text-[#00b4d8]">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                            <button class="p-1.5 bg-red-500/5 hover:bg-red-500/10 rounded-md transition text-red-500/70">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 border-t border-white/5 flex justify-between items-center text-[9px] font-bold text-slate-500">
                        <span class="uppercase">1 projekt</span>
                        <div class="flex items-center gap-3">
                            <button class="hover:text-white">Poprzednia</button>
                            <span class="text-[#00b4d8]">1</span>
                            <button class="hover:text-white">Następna</button>
                        </div>
                    </div>
                </div>

                <footer class="pt-2 pb-6 flex flex-col md:flex-row justify-between items-center gap-2">
                    <p class="text-[9px] text-slate-600">© 2026 <span class="text-[#00b4d8]">ezCode</span> Panel</p>
                    <div class="flex gap-4">
                        <a href="#" class="text-slate-600 hover:text-white"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                        <a href="#" class="text-slate-600 hover:text-white"><svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.042-1.416-4.042-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg></a>
                    </div>
                </footer>
            </div>
        </main>
    </div>

    <script>
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.replace('opacity-0', 'opacity-100');
                overlay.classList.remove('pointer-events-none');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.replace('opacity-100', 'opacity-0');
                overlay.classList.add('pointer-events-none');
            }
        }
    </script>
</body>
</html>