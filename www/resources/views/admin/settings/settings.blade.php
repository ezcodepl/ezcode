@extends('layouts.admin')
@section('title', 'ezCode - Podgląd posta: ' . $post->title)

@section('content')
<!-- Nagłówek -->
        <div class="mb-10">
            <h1 class="text-4xl font-extrabold text-white tracking-tight">Konsola Administracyjna</h1>
            <p class="text-[#10b981] font-mono text-sm mt-2 uppercase tracking-widest">System & Data Integrity</p>
        </div>

        <!-- Nawigacja Zakładek -->
        <div class="flex space-x-1 mb-8 border-b border-white/5">
            <button onclick="switchTab('backup')" id="btn-backup" class="tab-btn active px-8 py-4 font-bold text-xs uppercase tracking-widest transition-all flex items-center">
                Kopia Zapasowa
            </button>
            <button onclick="switchTab('update')" id="btn-update" class="tab-btn px-8 py-4 font-bold text-xs uppercase tracking-widest transition-all flex items-center">
                Aktualizacja WWW
            </button>
        </div>

        <!-- Treść: KOPIE ZAPASOWE -->
        <div id="tab-backup" class="tab-content active">
            <!-- Kafelki podsumowujące (Przywrócone) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="stat-card p-6 rounded-2xl">
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Łączna wielkość</p>
                    <p class="text-2xl font-bold text-white">24.2 GB</p>
                </div>
                <div class="stat-card p-6 rounded-2xl border-l-2 border-l-[#00a3ff]">
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Miejsce docelowe</p>
                    <p class="text-2xl font-bold text-white">S3 Cloud</p>
                </div>
                <div class="stat-card p-6 rounded-2xl">
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Automatyka</p>
                    <p class="text-2xl font-bold text-[#10b981]">Aktywna</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Lista kopii -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="glass-panel rounded-3xl overflow-hidden shadow-2xl">
                        <div class="p-6 border-b border-white/5 bg-white/5">
                            <h3 class="font-bold text-white uppercase text-[10px] tracking-widest">Historia Archiwizacji</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="text-slate-500 text-[11px] uppercase tracking-wider font-bold">
                                    <tr class="border-b border-white/5">
                                        <th class="px-8 py-4">ID / Nazwa Archiwum</th>
                                        <th class="px-8 py-4 text-center">Wielkość</th>
                                        <th class="px-8 py-4 text-right">Akcje</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5">
                                    <tr class="group hover:bg-white/[0.02] transition-colors">
                                        <td class="px-8 py-6">
                                            <div class="flex items-center">
                                                <div class="p-3 bg-[#00a3ff]/10 text-[#00a3ff] rounded-xl mr-4 border border-[#00a3ff]/20">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                                </div>
                                                <div>
                                                    <div class="font-bold text-white">full_backup_2023_10_25.zip</div>
                                                    <div class="flex space-x-2 mt-1">
                                                        <span class="text-[9px] bg-[#10b981]/20 text-[#10b981] px-2 py-0.5 rounded font-bold uppercase">System</span>
                                                        <span class="text-[9px] bg-indigo-500/20 text-indigo-400 px-2 py-0.5 rounded font-bold uppercase">Baza SQL</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6 text-center">
                                            <div class="text-sm font-bold text-white">1.2 GB</div>
                                            <div class="text-[10px] text-slate-500">Dzisiaj, 14:20</div>
                                        </td>
                                        <td class="px-8 py-6 text-right">
                                            <div class="flex justify-end space-x-3">
                                                <button onclick="confirmRestore('full_backup_2023_10_25.zip')" class="p-2.5 bg-white/5 hover:bg-[#00a3ff] hover:text-white rounded-xl transition text-slate-400 shadow-sm">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                                </button>
                                                <button class="p-2.5 bg-white/5 hover:bg-red-500/20 hover:text-red-500 rounded-xl transition text-slate-400 shadow-sm">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-5 bg-white/5 text-slate-500 text-[10px] font-bold uppercase tracking-widest border-t border-white/5 flex justify-between">
                            <span>ŁĄCZNIE: 1</span>
                            <span>System Zarządzania Portfolio v2.0</span>
                        </div>
                    </div>
                </div>

                <!-- Panel Akcji -->
                <div class="space-y-6">
                    <button onclick="simulateAction('Inicjalizacja backupu...', 'Kopia utworzona pomyślnie!')" class="w-full btn-neon-green text-white font-bold py-5 rounded-2xl flex items-center justify-center text-sm uppercase tracking-widest shadow-lg">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Dodaj nową kopię
                    </button>
                    
                    <div class="glass-panel rounded-3xl p-6">
                        <h4 class="font-bold text-white mb-6 uppercase text-[10px] tracking-widest flex items-center">
                            <span class="w-2 h-2 bg-[#10b981] rounded-full mr-2 shadow-[0_0_8px_#10b981]"></span>
                            Parametry Retencji
                        </h4>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center border-b border-white/5 pb-3">
                                <span class="text-xs text-slate-500">Przechowywanie:</span>
                                <span class="text-xs font-bold text-white">30 dni</span>
                            </div>
                            <div class="flex justify-between items-center border-b border-white/5 pb-3">
                                <span class="text-xs text-slate-500">Szyfrowanie:</span>
                                <span class="text-xs font-bold text-[#10b981]">AES-256</span>
                            </div>
                            <p class="text-[10px] text-slate-500 italic leading-relaxed">System automatycznie usuwa najstarsze kopie po przekroczeniu limitu 24.2 GB.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Treść: AKTUALIZACJE -->
        <div id="tab-update" class="tab-content">
            <div class="glass-panel rounded-3xl p-10 border-t-4 border-t-[#00a3ff]">
                <div class="max-w-4xl">
                    <div class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-8 mb-12">
                        <div class="w-20 h-20 bg-indigo-500/10 text-[#00a3ff] rounded-3xl flex items-center justify-center border border-[#00a3ff]/20 shadow-[0_0_30px_rgba(0,163,255,0.1)]">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-extrabold text-white tracking-tight uppercase">Nowa wersja v2.5.1</h2>
                            <p class="text-slate-400 mt-1">Dostępna jest krytyczna aktualizacja bezpieczeństwa dla Twojego środowiska ezCode.</p>
                            <div class="mt-4 flex space-x-3">
                                <span class="px-2.5 py-1 bg-[#10b981]/20 text-[#10b981] text-[10px] font-bold rounded uppercase">Security Patch</span>
                                <span class="px-2.5 py-1 bg-amber-500/20 text-amber-500 text-[10px] font-bold rounded uppercase">Rekomendowane</span>
                            </div>
                        </div>
                    </div>

                    <div id="update-idle" class="space-y-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="p-8 bg-white/5 rounded-3xl border border-white/10">
                                <h4 class="text-xs font-bold text-[#00a3ff] mb-4 uppercase tracking-widest">Co nowego w tej wersji?</h4>
                                <ul class="text-sm text-slate-400 space-y-3 font-medium">
                                    <li class="flex items-start"><span class="text-[#10b981] mr-2">●</span> Optymalizacja silnika renderowania Portfolio</li>
                                    <li class="flex items-start"><span class="text-[#10b981] mr-2">●</span> Wsparcie dla PHP 8.3 oraz nowych standardów SSL</li>
                                    <li class="flex items-start"><span class="text-[#10b981] mr-2">●</span> Naprawa błędów w module logowania</li>
                                </ul>
                            </div>
                            <div class="p-8 bg-white/5 rounded-3xl border border-white/10">
                                <h4 class="text-xs font-bold text-amber-500 mb-4 uppercase tracking-widest">Wymagania techniczne</h4>
                                <ul class="text-sm text-slate-400 space-y-3 font-medium">
                                    <li class="flex items-start"><span class="text-amber-500 mr-2">!</span> Tryb Maintenance będzie aktywny przez ok. 2 minuty</li>
                                    <li class="flex items-start"><span class="text-amber-500 mr-2">!</span> Wymagana wolna przestrzeń: 450 MB</li>
                                </ul>
                            </div>
                        </div>

                        <button onclick="startUpdate()" class="group bg-white text-[#0a0f1d] font-black py-5 px-12 rounded-2xl shadow-[0_0_40px_rgba(255,255,255,0.1)] hover:scale-105 transition-all flex items-center uppercase text-sm tracking-[0.2em]">
                            Uruchom aktualizację systemową
                            <svg class="w-5 h-5 ml-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </div>

                    <!-- Progress View -->
                    <div id="update-progress" class="hidden space-y-8">
                        <div class="space-y-4">
                            <div class="flex justify-between text-[11px] font-black uppercase tracking-[0.3em]">
                                <span id="progress-status" class="text-[#00a3ff]">Synchronizacja archiwum...</span>
                                <span id="progress-percent" class="text-white">0%</span>
                            </div>
                            <div class="w-full bg-white/5 rounded-full h-4 p-1 border border-white/5 shadow-inner">
                                <div id="progress-bar" class="bg-[#00a3ff] h-full rounded-full transition-all duration-700 shadow-[0_0_20px_#00a3ff]" style="width: 0%"></div>
                            </div>
                        </div>
                        
                        <div id="update-log" class="bg-black/60 text-slate-400 p-8 rounded-3xl font-mono text-xs h-56 overflow-y-auto border border-white/5 shadow-2xl">
                            <p class="text-[#10b981] mb-2 font-bold uppercase tracking-tighter">ezCode System Update v2.5.1</p>
                            <p class="opacity-30 mb-4"># checksum verification ... OK</p>
                            <div id="log-content" class="space-y-1">
                                <p>> System gotowy do pracy.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection