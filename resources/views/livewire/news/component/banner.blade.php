<section class="w-full">
    <div class="swiper bannerSwiper">
        <div class="swiper-wrapper">
            @forelse($bannerNews as $banner)
                <div class="swiper-slide">
                    <a href="{{ route('berita.detail', $banner->slug) }}" class="block">
                        <div class="relative flex flex-col justify-end p-6 h-72 md:h-96 rounded-xl bg-cover bg-center overflow-hidden"
                            style="background-image: url('{{ $banner->thumbnail ? asset('storage/' . $banner->thumbnail) : 'https://placehold.co/1200x400' }}')">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-secondary/60 via-secondary/30 to-transparent rounded-xl">
                            </div>
                            <div class="relative z-10 mb-4">
                                <div
                                    class="bg-accent text-accent-content text-xs rounded-lg w-fit px-3 py-1 font-medium mb-3">
                                    {{ $banner->category_name }}
                                </div>
                                <h2
                                    class="text-2xl md:text-3xl lg:text-4xl font-bold text-base-content/80 leading-tight mb-3">
                                    {{ $banner->tittle }}
                                </h2>
                                <div class="flex items-center gap-2 text-base-content/60">
                                    <x-icon name="phosphor.user" class="w-4 h-4" />
                                    <span class="text-sm">{{ Str::words($banner->author_name, 3) }}</span>
                                    <span class="text-sm">•</span>
                                    <span
                                        class="text-sm">{{ \Carbon\Carbon::parse($banner->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <!-- Fallback banner jika tidak ada data -->
                <div class="swiper-slide">
                    <a href="{{ route('berita.beranda') }}" class="block">
                        <div class="relative flex flex-col justify-end p-6 h-72 md:h-96 rounded-xl bg-cover bg-center overflow-hidden"
                            style="background-image: url('https://placehold.co/1200x400')">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-secondary/60 via-secondary/30 to-transparent rounded-xl">
                            </div>
                            <div class="relative z-10 mb-4">
                                <div
                                    class="bg-primary text-primary-content text-xs rounded-lg w-fit px-3 py-1 font-medium mb-3">
                                    Portal Berita MUI
                                </div>
                                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-base-100 leading-tight mb-3">
                                    Selamat Datang di Portal Berita MUI
                                </h2>
                                <div class="flex items-center gap-2 text-base-200">
                                    <x-icon name="phosphor.info" class="w-4 h-4" />
                                    <span class="text-sm">Belum ada banner berita</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Navigation arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Pagination dots -->
        <div class="swiper-pagination"></div>
    </div>
</section>

@assets
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.bannerSwiper', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'slide',
                speed: 800,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 1,
                    },
                    1024: {
                        slidesPerView: 1,
                    },
                },
            });
        });
    </script>
@endassets
