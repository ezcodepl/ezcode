@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-[#1f2937] via-[#111827] to-[#0f172a] flex flex-col">
    

    <main class="flex-grow flex items-center justify-center px-6">
        <div class="bg-gray-900 bg-opacity-90 rounded-lg shadow-lg max-w-md w-full p-8">
            <h1 class="text-white text-3xl font-semibold mb-6 text-center">Zaloguj się</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label for="email" class="block mb-2 text-gray-300 font-medium">Email</label>
                <input id="email" type="email" name="email" required autofocus
                    class="w-full mb-4 px-4 py-3 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500">

                <label for="password" class="block mb-2 text-gray-300 font-medium">Hasło</label>
                <input id="password" type="password" name="password" required
                    class="w-full mb-4 px-4 py-3 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500">

                <div class="flex items-center justify-between mb-4">
                    <label class="inline-flex items-center text-gray-400">
                        <input type="checkbox" name="remember" class="rounded text-cyan-500 focus:ring-cyan-400">
                        <span class="ml-2">Zapamiętaj mnie</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-cyan-400 hover:underline text-sm">Zapomniałeś hasła?</a>
                </div>

                <button type="submit"
                    class="w-full bg-cyan-500 hover:bg-cyan-600 transition-colors rounded py-3 font-semibold text-white">
                    Zaloguj się
                </button>
            </form>
        </div>
    </main>

   
</div>
@endsection