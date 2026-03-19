    <!-- NAWIGACJA -->
    <header id="navbar" class="fixed w-full top-0 z-50 transition-all duration-300 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                    <div class="w-9 h-9 bg-brand rounded-lg flex items-center justify-center text-white shadow-lg shadow-brand/20">
                        <i class="fa-solid fa-code text-sm"></i>
                    </div>
                    <span class="font-heading font-bold text-xl tracking-tight text-white">ez<span class="text-brand">Code</span></span>
                </a>

                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/o-mnie') }}" class="text-sm font-medium text-slate-300 hover:text-brand transition-colors">O mnie</a>
                    <a href="{{ url('/oferta') }}" class="text-sm font-medium text-slate-300 hover:text-brand transition-colors">Oferta</a>
                    <a href="{{ url('/projekty') }}" class="text-sm font-medium text-slate-300 hover:text-brand transition-colors">Projekty</a>
					<a href="{{ url('/blog') }}" class="text-sm font-medium text-slate-300 hover:text-brand transition-colors">Blog</a>
                    
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="bg-brand hover:bg-brand-dark text-white px-6 py-2 rounded-full text-sm font-medium transition-all shadow-lg shadow-brand/25">
                            Wyloguj
                        </button>
                    </form>
                </nav>

                <button id="mobile-menu-btn" class="md:hidden text-slate-300 p-2">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </header>