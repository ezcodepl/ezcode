@extends('layouts.admin')

@section('content')
<div class="p-6">
    <a href="{{ route('admin.portfolio.create') }}" class="bg-green-500 px-4 py-2 text-white">Dodaj projekt</a>

    @if($projects->isEmpty())
        <p class="mt-4">Brak projektów 😕</p>
    @else
        <table class="w-full mt-4 border">
            <tr>
                <th class="border px-2 py-1">Tytuł</th>
                <th class="border px-2 py-1">Akcje</th>
            </tr>

            @foreach($projects as $p)
                <tr>
                    <td class="border px-2 py-1">{{ $p->title }}</td>
                    <td class="border px-2 py-1">
                        <a href="{{ route('admin.portfolio.edit', $p->id) }}" class="text-blue-500">Edytuj</a>

                        <form method="POST" action="{{ route('admin.portfolio.delete', $p->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
</div>
@endsection