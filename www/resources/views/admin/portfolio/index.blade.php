@extends('layouts.admin')

@section('content')
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
@endsection