<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
    <meta name="description"
        content="Portal berita resmi Majelis Ulama Indonesia - Menyajikan informasi terpercaya seputar keislaman, fatwa, dan kegiatan MUI">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CDN Style Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- CDN Style AOS JS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="min-h-dvh font-sans antialiased bg-base-100">
    <!-- Header dengan logo MUI -->
    <livewire:news.header />

    <!-- Navigation -->
    <livewire:news.nav />

    <!-- Main Content -->
    <main class="bg-base-100">
        <div class="container mx-auto px-4 py-8">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <livewire:news.footer />

    <!-- CDN Script Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--CDN Script AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
