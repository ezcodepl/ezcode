@extends('layouts.admin')

@section('content')
<main class="max-w-6xl mx-auto pt-32">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
        <div>
            <h1 class="text-4xl font-bold text-white mb-1">Zarządzanie Portfolio</h1>
           
        </div>

        <a href="{{ route('admin.portfolio.create') }}" 
           class="btn-add text-white px-8 py-3 rounded-xl font-bold flex items-center gap-3">
            <i class="fas fa-plus"></i> Dodaj nowy projekt
        </a>
    </div>

    <!-- TABELA -->
    <div class="glass-panel rounded-[2rem] overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                
                <!-- HEAD -->
                <thead>
                    <tr class="bg-white/5 text-[13px] uppercase tracking-[0.2em] text-gray-500 font-black">
                        <th class="px-8 py-6">ID</th>
                        <th class="px-8 py-6">Projekt</th>
                        <!-- <th class="px-8 py-6 ext-left">Opis</th> -->
                        <th class="px-8 py-6 text-center">Data dodania</th>
                        <th class="px-8 py-6 text-right">Akcje</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="text-sm">
                    @forelse($projects as $p)
                        <tr class="table-row">
                            
                            <!-- ID -->
                            <td class="px-8 py-6 text-gray-600 font-mono">
                                #{{ $p->id }}
                            </td>

                            <!-- PROJEKT + MINIATURKA -->
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">

                                    {{-- MINIATURKA --}}
                                    @if($p->images->first())
                                        <img 
                                            src="{{ asset('storage/' . $p->images->first()->image_path) }}" 
                                            class="w-40 h-30 object-cover rounded-lg border border-white/10"
                                        >
                                    @else
                                        <div class="w-16 h-12 flex items-center justify-center bg-white/5 rounded-lg text-xs text-gray-500">
                                            brak
                                        </div>
                                    @endif

                                    {{-- TEKST --}}
                                    <div class="flex flex-col">
                                        <span class="text-white font-bold text-base mb-1">
                                            {{ $p->title }}
                                        </span>
                                        <span class="text-gray-500 text-xs uppercase tracking-tighter">
                                            {{ $p->technology ?? 'Brak technologii' }}
                                        </span>
                                    </div>
                                </div>
                            </td>
 <!-- DATA -->
                            <!-- <td class="px-8 py-6 text-left text-gray-400 italic font-mono">
                                {!! \Illuminate\Support\Str::limit($p->description ?? 'brak opisu', 50, '...') !!}
                            </td> -->
                            <!-- DATA -->
                            <td class="px-8 py-6 text-center text-gray-400 italic font-mono">
                                {{ optional($p->created_at)->format('d.m.Y') ?? '-' }}
                            </td>

                            <!-- AKCJE -->
                            <td class="px-8 py-6">
                                <div class="flex justify-end gap-5">
                                    <!-- POKAZ -->
                                    <a href="{{ route('admin.portfolio.show', $p->id) }}" 
                                       class="action-icon" title="show">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <!-- EDYTUJ -->
                                    <a href="{{ route('admin.portfolio.edit', $p->id) }}" 
                                       class="action-icon" title="Edytuj">
                                        <i class="far fa-edit"></i>
                                    </a>

                                    <!-- USUŃ -->
                                    <form method="POST" action="{{ route('admin.portfolio.delete', $p->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="action-icon delete-icon"
                                                onclick="return confirm('Na pewno usunąć?')"
                                                title="Usuń">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty
                        <!-- BRAK DANYCH -->
                        <tr>
                            <td colspan="4" class="text-center py-12 text-gray-500">
                                Brak projektów 😕
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <!-- STOPKA -->
        <div class="bg-white/2 p-6 flex justify-between items-center text-gray-500">
            <span>
                Łącznie projektów: {{ $projects->count() }}
            </span>
        </div>
    </div>

</main>
@endsection