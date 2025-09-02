<div class="w-full">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Article Header -->
        <section class="bg-base-100 py-8 mb-8" data-aos="fade-down">
            <!-- Breadcrumb -->
            <div class="breadcrumbs text-sm mb-6" data-aos="fade-right" data-aos-delay="100">
                <ul>
                    <li><a href="{{ route('berita.beranda') }}" class="text-primary hover:text-primary/80">Beranda</a>
                    </li>
                    <li class="text-base-content/60">{{ $news->category_name }}</li>
                    <li class="text-base-content/60">Detail Berita</li>
                </ul>
            </div>

            <!-- Category Badge -->
            <div class="mb-4" data-aos="zoom-in" data-aos-delay="200">
                <x-badge value="{{ $news->category_name }}" class="badge-accent" />
            </div>

            <!-- Title -->
            <h1 class="text-3xl lg:text-4xl font-bold text-primary mb-6 leading-tight" data-aos="fade-up" data-aos-delay="300">
                {{ $news->tittle }}
            </h1>

            <!-- Meta Info -->
            <div class="flex flex-col md:flex-row md:items-center gap-4 mb-8" data-aos="fade-up" data-aos-delay="400">
                <div class="flex items-center gap-2">
                    <div class="avatar">
                        <div class="w-10 rounded-full">
                            @if ($news->author_avatar)
                                <img src="{{ asset('storage/' . $news->author_avatar) }}"
                                    alt="{{ $news->author_name }}">
                            @else
                                <div
                                    class="bg-primary text-primary-content rounded-full w-10 h-10 flex items-center justify-center">
                                    <span class="text-sm">{{ substr($news->author_name, 0, 2) }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <p class="font-medium text-base-content">{{ $news->author_name }}</p>
                        <p class="text-sm text-base-content/60">Penulis</p>
                    </div>
                </div>
                <div class="divider divider-horizontal hidden md:flex"></div>
                <div class="flex items-center gap-4 text-sm text-base-content/60">
                    <div class="flex items-center gap-1">
                        <x-icon name="phosphor.calendar" class="h-4 w-4" />
                        <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <x-icon name="phosphor.eye" class="h-4 w-4" />
                        <span>{{ $news->view_count ?? 0 }} views</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Image -->
        @if ($news->thumbnail)
            <section class="mb-8" data-aos="zoom-in" data-aos-delay="500">
                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->tittle }}"
                    class="w-full h-64 lg:h-96 object-cover rounded-lg shadow-lg">
            </section>
        @endif

        <!-- Article Content -->
        <section class="mb-12" data-aos="fade-up" data-aos-delay="200">
            <div class="rich-content">
                {!! str($news->content)->sanitizeHtml() !!}
            </div>
        </section>

        <!-- Author Bio -->
        <section class="mb-10" data-aos="slide-up" data-aos-delay="300">
            <p class="font-semibold text-xl lg:text-2xl mb-4 text-primary">Author</p>
            <div
                class="flex flex-col lg:flex-row gap-4 items-center border border-base-300 rounded-xl p-6 lg:p-8 hover:border-primary transition">
                @if ($news->author_avatar)
                    <img src="{{ asset('storage/' . $news->author_avatar) }}" alt="{{ $news->author_name }}"
                        class="rounded-full w-24 h-24 sm:w-38 sm:h-24 border-2 border-primary">
                @else
                    <div
                        class="bg-primary text-primary-content rounded-full w-24 h-24 sm:w-38 sm:h-24 flex items-center justify-center border-2 border-primary">
                        <span class="text-2xl font-bold">{{ substr($news->author_name, 0, 2) }}</span>
                    </div>
                @endif
                <div class="text-center lg:text-left">
                    <p class="font-bold text-lg lg:text-xl text-primary">{{ $news->author_name }}</p>
                    <p class="text-sm lg:text-base leading-relaxed text-base-content/80">
                        {{ $news->author_bio }}
                    </p>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Section -->
    <div data-aos="fade-up" data-aos-delay="100">
        <livewire:news.component.banner />
    </div>
</div>
@assets
    <style>
        .rich-content h1 {
            font-size: 2rem;
            font-weight: bold;
            margin: 1.5rem 0 1rem 0;
            color: hsl(var(--p));
        }

        .rich-content h2 {
            font-size: 1.75rem;
            font-weight: bold;
            margin: 1.25rem 0 0.75rem 0;
            color: hsl(var(--p));
        }

        .rich-content h3 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 1rem 0 0.5rem 0;
            color: hsl(var(--p));
        }

        .rich-content p {
            margin: 1rem 0;
            line-height: 1.7;
            color: hsl(var(--bc));
        }

        .rich-content ul,
        .rich-content ol {
            margin: 1rem 0;
            padding-left: 2rem;
        }

        .rich-content ul {
            list-style-type: disc;
        }

        .rich-content ol {
            list-style-type: decimal;
        }

        .rich-content li {
            margin: 0.5rem 0;
            color: hsl(var(--bc));
            line-height: 1.6;
        }

        .rich-content blockquote {
            border-left: 4px solid hsl(var(--p));
            padding-left: 1rem;
            margin: 1rem 0;
            font-style: italic;
        }

        .rich-content table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 1.5rem 0;
            border: 2px solid #d1d5db;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .rich-content th {
            background: #f3f4f6;
            border-right: 1px solid #d1d5db;
            border-bottom: 2px solid #d1d5db;
            padding: 12px 16px;
            font-weight: 600;
            text-align: left;
            color: #374151;
            font-size: 14px;
        }

        .rich-content th:last-child {
            border-right: none;
        }

        .rich-content td {
            border-right: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            padding: 12px 16px;
            color: #374151;
        }

        .rich-content td:last-child {
            border-right: none;
        }

        .rich-content tbody tr:last-child td {
            border-bottom: none;
        }

        /* Dark theme support - multiple selectors to ensure it works */
        @media (prefers-color-scheme: dark) {
            .rich-content table {
                border: 2px solid #374151;
            }
            .rich-content th {
                background: transparent;
                border-right: 1px solid #374151;
                border-bottom: 2px solid #374151;
                color: #f3f4f6 !important;
            }
            .rich-content td {
                border-right: 1px solid #374151;
                border-bottom: 1px solid #374151;
                color: #f3f4f6 !important;
            }
        }
        
        [data-theme="dark"] .rich-content table,
        html[data-theme="dark"] .rich-content table,
        .dark .rich-content table {
            border: 2px solid #374151 !important;
        }

        [data-theme="dark"] .rich-content th,
        html[data-theme="dark"] .rich-content th,
        .dark .rich-content th {
            background: transparent !important;
            border-right: 1px solid #374151 !important;
            border-bottom: 2px solid #374151 !important;
            color: #f3f4f6 !important;
        }

        [data-theme="dark"] .rich-content td,
        html[data-theme="dark"] .rich-content td,
        .dark .rich-content td {
            border-right: 1px solid #374151 !important;
            border-bottom: 1px solid #374151 !important;
            color: #f3f4f6 !important;
        }

        .rich-content strong {
            font-weight: bold;
        }

        .rich-content em {
            font-style: italic;
        }

        .rich-content u {
            text-decoration: underline;
        }

        .rich-content a {
            color: hsl(var(--p));
            text-decoration: underline;
        }
    </style>
@endassets
