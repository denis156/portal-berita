<div class="w-full">
    <!-- Banner Section -->
    <div data-aos="fade-in" data-aos-delay="50">
        <livewire:news.component.banner />
    </div>

    <!-- Berita Unggulan -->
    <section class="-mx-4 px-4 py-12 bg-base-100 mb-12" data-aos="fade-up">
        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-8" data-aos="fade-down" data-aos-delay="100">
            <div class="font-bold text-3xl text-center md:text-left text-primary">
                <p>Berita Unggulan</p>
            </div>
            <x-button class="btn-primary mt-4 md:mt-0">
                Lihat Semua
                <x-icon name="phosphor.arrow-right" class="h-4 w-4 ml-1" />
            </x-button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($featuredNews as $news)
                <a href="{{ route('berita.detail', $news->slug) }}" class="block" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
                    <x-card
                        class="overflow-hidden border border-base-300 hover:border-primary transition-all duration-300 hover:shadow-lg">
                        <div class="relative">
                            <div class="absolute top-3 left-3 z-10">
                                <x-badge value="{{ $news->category_name }}" class="badge-accent badge-sm" />
                            </div>
                            <img src="{{ $news->thumbnail ? asset('storage/' . $news->thumbnail) : 'https://placehold.co/400x200' }}"
                                alt="{{ $news->tittle }}" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-base mb-2 text-primary line-clamp-2">
                                {{ $news->tittle }}
                            </h3>
                            <p class="text-base-content/60 text-sm">{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</p>
                        </div>
                    </x-card>
                </a>
            @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-base-content/60">Belum ada berita unggulan.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Berita Terbaru -->
    <section class="-mx-4 px-4 py-12 bg-base-200 mb-12" data-aos="fade-up">
        <div class="flex flex-col md:flex-row w-full mb-8" data-aos="fade-right" data-aos-delay="100">
            <div class="font-bold text-3xl text-center md:text-left text-primary">
                <p>Berita Terbaru</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Berita Utama -->
            @if($latestMainNews)
            <div class="relative col-span-1 lg:col-span-7" data-aos="slide-right" data-aos-delay="200">
                <a href="{{ route('berita.detail', $latestMainNews->slug) }}" class="block">
                    <x-card
                        class="overflow-hidden border border-base-300 hover:border-primary transition-all duration-300 hover:shadow-lg">
                        <div class="relative">
                            <div class="absolute top-4 left-4 z-10">
                                <x-badge value="{{ $latestMainNews->category_name }}" class="badge-accent" />
                            </div>
                            <img src="{{ $latestMainNews->thumbnail ? asset('storage/' . $latestMainNews->thumbnail) : 'https://placehold.co/800x400' }}"
                                alt="{{ $latestMainNews->tittle }}" class="w-full h-64 lg:h-80 object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl lg:text-2xl text-primary mb-3">
                                {{ $latestMainNews->tittle }}
                            </h3>
                            <p class="text-base-content/70 text-base mb-4">
                                {{ Str::limit(strip_tags($latestMainNews->content), 200) }}
                            </p>
                            <div class="flex items-center gap-2 text-base-content/60 text-sm mb-2">
                                <span>{{ $latestMainNews->author_name }}</span>
                                <span>•</span>
                                <span>{{ \Carbon\Carbon::parse($latestMainNews->created_at)->format('d F Y') }}</span>
                            </div>
                        </div>
                    </x-card>
                </a>
            </div>
            @else
            <div class="relative col-span-1 lg:col-span-7">
                <div class="text-center py-8">
                    <p class="text-base-content/60">Belum ada berita terbaru.</p>
                </div>
            </div>
            @endif

            <!-- Berita Samping -->
            <div class="col-span-1 lg:col-span-5 space-y-4" data-aos="slide-left" data-aos-delay="300">
                @forelse($latestSideNews as $news)
                    <a href="{{ route('berita.detail', $news->slug) }}" class="block" data-aos="fade-left" data-aos-delay="{{ 400 + ($loop->index * 100) }}">
                        <x-card
                            class="overflow-hidden border border-base-300 hover:border-primary transition-all duration-300 hover:shadow-lg">
                            <div class="flex flex-col md:flex-row gap-4 p-4">
                                <div class="relative flex-shrink-0">
                                    <div class="absolute top-2 left-2 z-10">
                                        <x-badge value="{{ $news->category_name }}" class="badge-accent badge-sm" />
                                    </div>
                                    <img src="{{ $news->thumbnail ? asset('storage/' . $news->thumbnail) : 'https://placehold.co/200x150' }}"
                                        alt="{{ $news->tittle }}"
                                        class="w-full md:w-32 h-32 object-cover rounded-lg">
                                </div>
                                <div class="flex-1 mt-2 md:mt-0">
                                    <h4 class="font-semibold text-lg text-primary mb-2 line-clamp-2">
                                        {{ $news->tittle }}
                                    </h4>
                                    <p class="text-base-content/60 text-sm">
                                        {{ Str::limit(strip_tags($news->content), 120) }}
                                    </p>
                                    <div class="flex items-center gap-2 text-base-content/60 text-xs mt-2">
                                        <span>{{ $news->author_name }}</span>
                                        <span>•</span>
                                        <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </x-card>
                    </a>
                @empty
                    <div class="text-center py-8">
                        <p class="text-base-content/60">Belum ada berita samping.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Kenali Author -->
    <div data-aos="fade-up" data-aos-delay="100">
        <livewire:news.component.author />
    </div>

    <!-- Berita terbanyak dikunjungi -->
    <section class="-mx-4 px-4 py-12 bg-base-200 mb-12" data-aos="fade-up">
        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-8" data-aos="fade-down" data-aos-delay="100">
            <div class="font-bold text-3xl text-center md:text-left text-primary">
                <p>Berita Terbanyak</p>
                <p>Dikunjungi</p>
            </div>
            <x-button class="btn-primary mt-4 md:mt-0">
                Lihat Semua
                <x-icon name="phosphor.arrow-right" class="h-4 w-4 ml-1" />
            </x-button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($editorsChoice as $news)
                <a href="{{ route('berita.detail', $news->slug) }}" class="block" data-aos="flip-up" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
                    <x-card
                        class="overflow-hidden border border-base-300 hover:border-primary transition-all duration-300 hover:shadow-lg">
                        <div class="relative">
                            <div class="absolute top-3 left-3 z-10">
                                <x-badge value="{{ $news->category_name }}" class="badge-accent badge-sm" />
                            </div>
                            <img src="{{ $news->thumbnail ? asset('storage/' . $news->thumbnail) : 'https://placehold.co/400x200' }}"
                                alt="{{ $news->tittle }}" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-base mb-2 text-primary line-clamp-2">
                                {{ $news->tittle }}
                            </h3>
                            <div class="flex items-center gap-2 text-base-content/60 text-sm">
                                <span>{{ Str::words($news->author_name, 3) }}</span>
                                <span>•</span>
                                <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</span>
                            </div>
                        </div>
                    </x-card>
                </a>
            @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-base-content/60">Belum ada pilihan ulama.</p>
                </div>
            @endforelse
        </div>
    </section>
</div>
