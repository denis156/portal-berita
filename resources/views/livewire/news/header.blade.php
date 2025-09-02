<header class="bg-base-200 shadow-sm border-b border-base-300">
    <div class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                    <x-icon name="phosphor.mosque" class="h-8 w-8 text-primary-content" />
                </div>
                <div>
                    <h1 class="text-xl font-bold text-primary">{{ config('app.name') }}</h1>
                    <p class="text-sm text-base-content/70">Portal Berita {{ config('app.name') }}</p>
                </div>
            </div>
            <div class="hidden md:block">
                <p class="text-sm text-base-content/60">{{ now()->format('d F Y (H:i)') }}</p>
            </div>
        </div>
    </div>
</header>
