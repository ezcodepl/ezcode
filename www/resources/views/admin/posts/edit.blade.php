@extends('layouts.admin') 
@section('title', 'ezCode - admin panel - posts')

@section('content')


<div class="max-w-5xl mx-auto p-6">
    <div class="flex items-center justify-between mb-8 pb-6 border-b border-white/5">
        <div>
            <h2 class="text-3xl font-heading font-bold text-white">Edycja posta</h2>
            <p class="text-brand text-sm code-font italic">ID: #{{ $post->id }} — {{ $post->created_at->format('d.m.Y') }}</p>
        </div>
        <a href="{{ route('admin.posts.index') }}" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2 group">
            <i class="fas fa-arrow-left text-sm group-hover:-translate-x-1 transition-transform"></i>
            Wróć do listy
        </a>
    </div>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-cardbg border border-white/5 rounded-2xl shadow-2xl p-8">
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-400 ml-1">Tytuł posta</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}" 
                                   class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white focus:border-brand focus:ring-1 focus:ring-brand transition-all outline-none">
                            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-400 ml-1">Treść posta</label>
                            <textarea name="content" id="content" rows="12" 
                                      class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white focus:border-brand focus:ring-1 focus:ring-brand transition-all outline-none resize-none">{{ old('content', $post->content) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-cardbg border border-white/5 rounded-2xl shadow-2xl p-8">
                    <h3 class="text-white font-bold mb-6 flex items-center gap-2">
                        <i class="fas fa-images text-brand"></i> Multimedia
                    </h3>
                    
                    <div class="grid grid-cols-3 md:grid-cols-4 gap-4 mb-6">
                        @foreach($post->images as $image)
                            <div class="relative group aspect-square rounded-xl overflow-hidden border border-white/10 bg-darkbg">
                                <img src="{{ $image->url }}" class="w-full h-full object-cover opacity-70 group-hover:opacity-100 transition-opacity">
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-black/40">
                                    <button type="button" class="bg-red-500 text-white p-2 rounded-full hover:scale-110 transition-transform">
                                        <i class="fas fa-trash-alt text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach

                        <label class="border-2 border-dashed border-white/10 rounded-xl flex flex-col items-center justify-center cursor-pointer hover:border-brand/50 hover:bg-brand/5 transition-all group aspect-square">
                            <i class="fas fa-plus text-gray-500 group-hover:text-brand mb-1"></i>
                            <span class="text-[10px] text-gray-500 group-hover:text-brand uppercase font-bold">Dodaj</span>
                            <input type="file" name="images[]" multiple class="hidden">
                        </label>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-cardbg border border-white/5 rounded-2xl shadow-2xl p-8 sticky top-6">
                    <h3 class="text-white font-bold mb-6">Ustawienia</h3>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-400 ml-1">Status publikacji</label>
                            <select name="status" class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white focus:border-brand outline-none appearance-none cursor-pointer">
                                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Szkic</option>
                                <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Opublikowany</option>
                                <option value="archived" {{ $post->status == 'archived' ? 'selected' : '' }}>Zarchiwizowany</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-400 ml-1">Data publikacji</label>
                            <input type="date" name="date_public" 
                                   value="{{ old('date_public', $post->date_public ? $post->date_public->format('Y-m-d') : '') }}" 
                                   class="w-full bg-darkbg border border-white/10 rounded-xl px-4 py-3 text-white focus:border-brand outline-none">
                        </div>

                        <div class="pt-6 border-t border-white/5 space-y-3">
                            <button type="submit" class="w-full bg-brand hover:bg-brand-dark text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-brand/20 flex items-center justify-center gap-2">
                                <i class="fas fa-save"></i> Zapisz zmiany
                            </button>
                            
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="w-full block text-center py-3 rounded-xl text-gray-400 hover:bg-white/5 transition-all text-sm">
                                Anuluj edycję
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection