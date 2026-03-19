@extends('layouts.admin') 
@section('title', 'ezCode - admin panel - posts')

@section('content')



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

@endsection
