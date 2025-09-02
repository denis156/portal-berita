<nav class="bg-accent text-accent-content sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto px-4">
        <div class="navbar min-h-0 py-2">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-sm lg:hidden text-primary-content">
                        <x-icon name="phosphor.list" class="h-5 w-5" />
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content bg-base-100 text-base-content rounded-box z-[1] mt-3 w-52 p-2 shadow-lg">
                        <li><a href="{{ route('berita.beranda') }}" class="hover:bg-primary/10 {{ $currentRoute == 'berita.beranda' ? 'bg-primary/20 font-semibold text-primary' : '' }}">Beranda</a></li>
                        @foreach($categories as $category)
                            <li><a href="{{ route('berita.kategori', $category->slug) }}" class="hover:bg-primary/10 {{ ($currentRoute == 'berita.kategori' && $currentParam == $category->slug) ? 'bg-primary/20 font-semibold text-primary' : '' }}">{{ $category->tittle }}</a></li>
                        @endforeach
                        <li><a href="#" class="hover:bg-primary/10">Tentang {{ config('app.name') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal space-x-4 text-sm font-medium">
                    <li><a href="{{ route('berita.beranda') }}" class="{{ $currentRoute == 'berita.beranda' ? 'text-primary font-bold border-b-4 border-primary' : ' link link-hover' }}">Beranda</a></li>
                    @foreach($categories as $category)
                        <li><a href="{{ route('berita.kategori', $category->slug) }}" class="{{ ($currentRoute == 'berita.kategori' && $currentParam == $category->slug) ? 'text-primary font-bold border-b-4 border-primary' : 'link link-hover' }}">{{ $category->tittle }}</a></li>
                    @endforeach
                    <li><a href="#" class="link link-hover">Tentang {{ config('app.name') }}</a></li>
                </ul>
            </div>

            <div class="navbar-end">
                <x-button class="btn-sm btn-secondary" link="{{ route('filament.admin.auth.login') }}">
                    <x-icon name="phosphor.sign-in" class="h-4 w-4 mr-1" />
                    Admin
                </x-button>
            </div>
        </div>
    </div>
</nav>
