<div class="w-full">
    <!-- Page Header -->
    <section class="bg-base-200 py-12 mb-8" data-aos="fade-down">
        <div class="container mx-auto px-4">
            <div class="text-center" data-aos="zoom-in" data-aos-delay="200">
                <h1 class="text-3xl lg:text-4xl font-bold text-primary mb-4">
                    @if($currentCategory)
                        Berita {{ $currentCategory->tittle }}
                    @else
                        Semua Berita
                    @endif
                </h1>
                <p class="text-base-content/70 max-w-2xl mx-auto">
                    @if($currentCategory)
                        Temukan berita terkini seputar {{ strtolower($currentCategory->tittle) }}
                    @else
                        Temukan berbagai berita terkini seputar Islam, fatwa, dan kegiatan MUI
                    @endif
                </p>
            </div>
        </div>
    </section>

    <!-- News Grid -->
    <section class="mb-12" data-aos="fade-up">
        <div class="container mx-auto px-4">
            @if($news->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($news as $item)
                        <a href="{{ route('berita.detail', $item->slug) }}" class="block" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 50) }}">
                            <x-card class="overflow-hidden border border-base-300 hover:border-primary transition-all duration-300 hover:shadow-lg h-full">
                                <div class="relative">
                                    <div class="absolute top-3 left-3 z-10">
                                        <x-badge value="{{ $item->category_name }}" class="badge-accent badge-sm" />
                                    </div>
                                    <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : 'https://placehold.co/400x200' }}"
                                         alt="{{ $item->tittle }}" class="w-full h-48 object-cover">
                                </div>
                                <div class="p-4 flex flex-col flex-1">
                                    <h3 class="font-bold text-base mb-3 text-primary line-clamp-2 flex-1">
                                        {{ $item->tittle }}
                                    </h3>
                                    <p class="text-base-content/60 text-sm mb-3 line-clamp-2">
                                        {{ Str::limit(strip_tags($item->content), 100) }}
                                    </p>
                                    <div class="flex items-center justify-between text-xs text-base-content/60 mt-auto">
                                        <div class="flex items-center gap-1">
                                            <x-icon name="phosphor.user" class="h-3 w-3" />
                                            <span>{{ Str::words($item->author_name, 2) }}</span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <div class="flex items-center gap-1">
                                                <x-icon name="phosphor.eye" class="h-3 w-3" />
                                                <span>{{ $item->view_count ?? 0 }}</span>
                                            </div>
                                            <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d M') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </x-card>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8" data-aos="fade-up" data-aos-delay="300">
                    {{ $news->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16" data-aos="zoom-in" data-aos-delay="200">
                    <div class="mb-4">
                        <x-icon name="phosphor.newspaper" class="h-16 w-16 mx-auto text-base-content/30" />
                    </div>
                    <h3 class="text-xl font-semibold text-base-content mb-2">Tidak ada berita ditemukan</h3>
                    <p class="text-base-content/60 mb-4">
                        @if($search || $category)
                            Coba ubah kata kunci pencarian atau filter kategori
                        @else
                            Belum ada berita yang dipublikasikan
                        @endif
                    </p>
                    @if($search || $category)
                        <x-button wire:click="$set('search', '')" wire:click="$set('category', '')" class="btn-primary">
                            Reset Filter
                        </x-button>
                    @endif
                </div>
            @endif
        </div>
    </section>
    
    <!-- Banner Section -->
    <div data-aos="fade-up" data-aos-delay="100">
        <livewire:news.component.banner />
    </div>
</div>
