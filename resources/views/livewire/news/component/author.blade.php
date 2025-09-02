<section class="-mx-4 px-4 py-12 bg-base-100 mb-12" data-aos="fade-up">
    <div class="flex flex-col md:flex-row justify-between items-center w-full mb-8" data-aos="fade-down" data-aos-delay="100">
        <div class="font-bold text-3xl text-center md:text-left text-primary">
            <p>Kenali Penulis</p>
            <p>Terbaik Dari Kami</p>
        </div>
        <x-button class="btn-primary mt-4 md:mt-0">
            Daftar Sebagai Penulis
            <x-icon name="phosphor.arrow-right" class="h-4 w-4 ml-1" />
        </x-button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @forelse($topAuthors as $author)
            <a href="#" class="block" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
                <x-card
                    class="text-center border border-base-300 hover:border-primary transition-all duration-300 hover:shadow-lg h-full">
                    <div class="p-6 flex flex-col h-full">
                        @if ($author->avatar)
                            <img src="{{ asset('storage/' . $author->avatar) }}" alt="{{ $author->name }}"
                                class="rounded-full w-24 h-24 mx-auto mb-4 border-2 border-primary object-cover">
                        @else
                            <div class="bg-primary text-primary-content rounded-full w-24 h-24 mx-auto mb-4 flex items-center justify-center border-2 border-primary">
                                <span class="text-xl font-bold">{{ substr($author->name, 0, 2) }}</span>
                            </div>
                        @endif
                        <div class="flex-1 flex flex-col justify-center">
                            <h4 class="font-bold text-xl text-primary mb-1">
                                {{ Str::words($author->name, 25) }}
                            </h4>
                            <p class="text-base-content/60 text-sm">{{ $author->news_count }} Artikel</p>
                        </div>
                    </div>
                </x-card>
            </a>
        @empty
            <div class="col-span-full text-center py-8" data-aos="fade-in" data-aos-delay="200">
                <p class="text-base-content/60">Belum ada penulis.</p>
            </div>
        @endforelse
    </div>
</section>
