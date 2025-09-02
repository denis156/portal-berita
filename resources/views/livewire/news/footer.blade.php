<footer class="bg-base-300 text-base-content mt-16" data-aos="fade-up">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo dan Deskripsi -->
            <div class="col-span-1 md:col-span-2" data-aos="fade-right" data-aos-delay="100">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                        <x-icon name="phosphor.mosque" class="h-6 w-6 text-primary-content" />
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-primary">Portal Berita MUI</h3>
                        <p class="text-sm text-base-content/70">Majelis Ulama Indonesia</p>
                    </div>
                </div>
                <p class="text-sm text-base-content/80 leading-relaxed mb-4">
                    Portal berita resmi Majelis Ulama Indonesia yang menyajikan informasi terpercaya seputar
                    keislaman, fatwa, kegiatan, dan publikasi MUI untuk umat Islam Indonesia.
                </p>
            </div>

            <!-- Navigasi -->
            <div data-aos="fade-up" data-aos-delay="200">
                <h6 class="footer-title text-primary mb-4">Navigasi</h6>
                <ul class="space-y-2">
                    <li><a href="{{ route('berita.beranda') }}" class="link text-sm {{ $currentRoute == 'berita.beranda' ? 'link-primary font-semibold' : 'link-hover' }}">Beranda</a></li>
                    @foreach($categories as $category)
                        <li><a href="{{ route('berita.kategori', $category->slug) }}" class="link text-sm {{ ($currentRoute == 'berita.kategori' && $currentParam == $category->slug) ? 'link-primary font-semibold' : 'link-hover' }}">{{ $category->tittle }}</a></li>
                    @endforeach
                    <li><a href="#" class="link link-hover text-sm">Tentang {{ config('app.name') }}</a></li>
                </ul>
            </div>

            <!-- Kontak dan Media Sosial -->
            <div data-aos="fade-left" data-aos-delay="300">
                <h6 class="footer-title text-primary mb-4">Kontak & Media Sosial</h6>
                <div class="space-y-3">
                    <div class="flex items-center space-x-2">
                        <x-icon name="phosphor.envelope" class="h-4 w-4 text-primary" />
                        <span class="text-sm">info@mui.or.id</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <x-icon name="phosphor.phone" class="h-4 w-4 text-primary" />
                        <span class="text-sm">(021) 3920418</span>
                    </div>
                    <div class="flex space-x-3 mt-4" data-aos="zoom-in" data-aos-delay="500">
                        <a href="#"
                            class="btn btn-circle btn-sm bg-primary/10 border-primary/20 hover:bg-primary hover:text-primary-content">
                            <x-icon name="phosphor.facebook-logo" class="h-4 w-4" />
                        </a>
                        <a href="#"
                            class="btn btn-circle btn-sm bg-primary/10 border-primary/20 hover:bg-primary hover:text-primary-content">
                            <x-icon name="phosphor.twitter-logo" class="h-4 w-4" />
                        </a>
                        <a href="#"
                            class="btn btn-circle btn-sm bg-primary/10 border-primary/20 hover:bg-primary hover:text-primary-content">
                            <x-icon name="phosphor.instagram-logo" class="h-4 w-4" />
                        </a>
                        <a href="#"
                            class="btn btn-circle btn-sm bg-primary/10 border-primary/20 hover:bg-primary hover:text-primary-content">
                            <x-icon name="phosphor.youtube-logo" class="h-4 w-4" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <!-- Copyright -->
        <div class="flex flex-col md:flex-row justify-between items-center pt-6">
            <p class="text-sm text-base-content/70">
                © {{ date('Y') }} Majelis Ulama Indonesia. Hak cipta dilindungi undang-undang.
            </p>
            <p class="text-sm text-base-content/70">
                Dikembangkan dengan ❤️ untuk umat Islam Indonesia
            </p>
        </div>
    </div>
</footer>
