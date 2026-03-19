@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto p-6 pt-32">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-heading font-bold text-white">Utwórz nowy post</h2>
                <p class="text-gray-400 text-sm italic code-font">Dodaj nową treść do swojej bazy</p>
            </div>
            <a href="{{ route('admin.posts.index') }}"
                class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                <i class="fas fa-arrow-left text-sm"></i>
                Powrót do listy
            </a>
        </div>

        <div class="bg-cardbg border border-white/5 rounded-2xl shadow-2xl p-8">
            <form action="{{ route('admin.posts.store') }}" method="POST" class="space-y-6" novalidate>
                @csrf

                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-gray-300 ml-1">Tytuł posta</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        placeholder="Wpisz chwytliwy tytuł..."
                        class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all shadow-inner"
                        required>
                    @error('title') <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="date_public" class="block text-sm font-medium text-gray-300 ml-1">Data
                            publikacji</label>
                        <div class="relative">
                            <input type="date" name="date_public" id="date_public" value="{{ old('date_public') }}"
                                class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all appearance-none">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="status" class="block text-sm font-medium text-gray-300 ml-1">Status</label>
                        <select name="status" id="status"
                            class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all cursor-pointer">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Szkic (Draft)</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Opublikowany
                            </option>
                            <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Zarchiwizowany
                            </option>
                        </select>
                    </div>
                </div>


                <div class="space-y-2">
                    <label for="content" class="block text-sm font-medium text-gray-300 ml-1">Treść posta</label>
                    <textarea name="content" id="content" rows="8" placeholder="Zacznij pisać tutaj..."
                        class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-all resize-none shadow-inner"
                        required></textarea>
                    @error('content') <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-white/5">
                    <button type="reset"
                        class="px-6 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-white/5 transition-all font-medium">
                        Resetuj
                    </button>
                    <button type="submit"
                        class="bg-brand hover:bg-brand-dark text-white px-10 py-3 rounded-xl font-bold flex items-center gap-2 transition-all transform hover:scale-[1.02] active:scale-[0.98] shadow-lg shadow-brand/20">
                        <i class="fas fa-paper-plane text-sm"></i>
                        Opublikuj post
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection