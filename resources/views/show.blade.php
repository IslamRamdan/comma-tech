@php
    $phones = ['201228602122', '201289155883', '201289154294'];
    $fmt = fn($p) => optional($p->published_at ?? $p->created_at)
        ->locale('ar')
        ->translatedFormat('j F Y');

    $pageTitle = $post->meta_title ?: $post->title;
    $pageDesc = $post->meta_description ?: \Illuminate\Support\Str::limit(trim(strip_tags($post->excerpt)), 160);
    $canonical = $post->canonical_url ?: route('blog.show', $post->slug);
    $ogImage = $post->image_url ?: 'https://comma-tech.online/images/logo.jpg';
    $date = optional($post->published_at ?? $post->created_at);

    // المحتوى: لو فيه وسوم HTML نعرضه كما هو، وإلا نحوله لفقرات
    $content = $post->content;
    $isHtml = $content !== strip_tags($content);
    $body = $isHtml ? $content : nl2br(e($content));

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $pageTitle,
        'description' => $pageDesc,
        'image' => [$ogImage],
        'datePublished' => $date->toIso8601String(),
        'dateModified' => $post->updated_at->toIso8601String(),
        'mainEntityOfPage' => $canonical,
        'inLanguage' => 'ar',
        'author' => ['@type' => 'Organization', 'name' => 'كوما تيك'],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'كوما تيك',
            'logo' => ['@type' => 'ImageObject', 'url' => 'https://comma-tech.online/images/logo.jpg'],
        ],
    ];
    $crumbs = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'الرئيسية', 'item' => url('/')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'المدونة', 'item' => route('blog.index')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $post->title, 'item' => $canonical],
        ],
    ];
    $shareUrl = urlencode($canonical);
    $shareText = urlencode($post->title);
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }} | كوما تيك</title>
    <meta name="description" content="{{ $pageDesc }}">
    @if ($post->meta_keywords)
        <meta name="keywords" content="{{ $post->meta_keywords }}">
    @endif
    <meta name="author" content="كوما تيك | Comma Tech">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="theme-color" content="#ffffff">
    <meta name="color-scheme" content="light only">
    <link rel="canonical" href="{{ $canonical }}">

    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDesc }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:locale" content="ar_AR">
    <meta property="article:published_time" content="{{ $date->toIso8601String() }}">
    <meta property="article:modified_time" content="{{ $post->updated_at->toIso8601String() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDesc }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="icon" type="image/png" href="{{ asset('images/logo-mark.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-mark.png') }}">

    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
    <script type="application/ld+json">{!! json_encode($crumbs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600&family=Readex+Pro:wght@500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css'])

    <style>
        @media (prefers-reduced-motion: no-preference) {
            html {
                scroll-behavior: smooth
            }
        }

        html {
            scroll-padding-top: 5rem
        }

        ::selection {
            background: #0068FD;
            color: #fff
        }

        :focus-visible {
            outline: 2px solid #0068FD;
            outline-offset: 3px
        }

        @keyframes bl-blob {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1)
            }

            33% {
                transform: translate3d(50px, -34px, 0) scale(1.14)
            }

            66% {
                transform: translate3d(-36px, 36px, 0) scale(.9)
            }
        }

        @keyframes bl-grid {
            to {
                background-position: 30px 30px
            }
        }

        @keyframes bl-up {
            from {
                opacity: 0;
                transform: translateY(34px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        .bl-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: .26;
            animation: bl-blob 18s ease-in-out infinite
        }

        .bl-grid {
            position: absolute;
            inset: 0;
            opacity: .5;
            background-image: radial-gradient(rgba(0, 104, 253, .25) 1.2px, transparent 1.5px);
            background-size: 30px 30px;
            -webkit-mask-image: radial-gradient(ellipse 70% 80% at 50% 20%, #000 20%, transparent 75%);
            mask-image: radial-gradient(ellipse 70% 80% at 50% 20%, #000 20%, transparent 75%);
            animation: bl-grid 26s linear infinite
        }

        .bl-link {
            position: relative
        }

        .bl-link::after {
            content: "";
            position: absolute;
            inset-inline: 0;
            bottom: -7px;
            height: 2px;
            border-radius: 2px;
            background: linear-gradient(90deg, #18E3B0, #0068FD);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform .35s cubic-bezier(.2, .8, .2, 1)
        }

        .bl-link:hover::after,
        .bl-link.active::after {
            transform: scaleX(1)
        }

        .bl-card {
            transition: transform .4s cubic-bezier(.2, .8, .2, 1), box-shadow .4s, border-color .4s
        }

        .bl-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 50px -26px rgba(0, 104, 253, .45);
            border-color: rgba(0, 104, 253, .4)
        }

        .bl-card img {
            transition: transform .7s cubic-bezier(.2, .8, .2, 1)
        }

        .bl-card:hover img {
            transform: scale(1.06)
        }

        .js [data-reveal] {
            opacity: 0
        }

        .js [data-reveal].in {
            animation: bl-up .8s cubic-bezier(.2, .8, .2, 1) var(--d, 0s) both
        }

        #mobileMenu:not(.hidden) {
            animation: bl-up .3s ease both
        }

        #top {
            transition: box-shadow .3s
        }

        #top.scrolled {
            box-shadow: 0 10px 30px -18px rgba(14, 23, 38, .25)
        }

        /* ===== تنسيق محتوى المقال ===== */
        .article {
            font-size: 1.1rem;
            line-height: 2.2;
            color: rgba(14, 23, 38, .82);
            overflow-wrap: anywhere
        }

        .article>*+* {
            margin-top: 1.4rem
        }

        .article h2,
        .article h3,
        .article h4 {
            font-family: 'Readex Pro', sans-serif;
            color: #0E1726;
            font-weight: 700;
            line-height: 1.6
        }

        .article h2 {
            font-size: 1.65rem;
            margin-top: 2.8rem;
            padding-inline-start: 1rem;
            border-inline-start: 4px solid #18E3B0
        }

        .article h3 {
            font-size: 1.3rem;
            margin-top: 2.2rem
        }

        .article h4 {
            font-size: 1.1rem;
            margin-top: 1.8rem
        }

        .article a {
            color: #0068FD;
            font-weight: 500;
            text-decoration: underline;
            text-underline-offset: 4px;
            text-decoration-color: rgba(0, 104, 253, .35)
        }

        .article a:hover {
            color: #0050D1;
            text-decoration-color: currentColor
        }

        .article strong {
            color: #0E1726;
            font-weight: 600
        }

        .article ul,
        .article ol {
            padding-inline-start: 1.6rem
        }

        .article ul {
            list-style: disc
        }

        .article ol {
            list-style: decimal
        }

        .article li+li {
            margin-top: .5rem
        }

        .article li::marker {
            color: #0068FD
        }

        .article blockquote {
            margin-block: 2rem;
            padding: 1.2rem 1.5rem;
            border-inline-start: 4px solid #0068FD;
            background: #EAF2FF;
            border-radius: 1rem;
            color: #0E1726;
            font-weight: 500
        }

        .article img {
            max-width: 100%;
            height: auto;
            border-radius: 1.25rem;
            margin-block: 2rem;
            border: 1px solid #E3E8F0
        }

        .article figure img {
            margin-block: 0
        }

        .article figcaption {
            margin-top: .6rem;
            text-align: center;
            font-size: .85rem;
            color: rgba(14, 23, 38, .55)
        }

        .article hr {
            border: 0;
            height: 1px;
            background: #E3E8F0;
            margin-block: 2.5rem
        }

        .article code {
            direction: ltr;
            unicode-bidi: embed;
            background: #F5F8FC;
            border: 1px solid #E3E8F0;
            padding: .1rem .45rem;
            border-radius: .4rem;
            font-size: .9em
        }

        .article pre {
            direction: ltr;
            text-align: left;
            background: #0E1726;
            color: #e6edf7;
            padding: 1.2rem 1.4rem;
            border-radius: 1rem;
            overflow-x: auto;
            font-size: .92rem;
            line-height: 1.8
        }

        .article pre code {
            background: none;
            border: 0;
            padding: 0;
            color: inherit
        }

        .article table {
            display: block;
            overflow-x: auto;
            width: 100%;
            border-collapse: collapse;
            font-size: .98rem
        }

        .article th,
        .article td {
            border: 1px solid #E3E8F0;
            padding: .7rem 1rem;
            text-align: start
        }

        .article th {
            background: #F5F8FC;
            font-weight: 600
        }

        .article iframe,
        .article video {
            max-width: 100%;
            border-radius: 1rem
        }

        .fab {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 3.5rem;
            min-width: 3.5rem;
            padding-inline: 1rem;
            border-radius: 999px;
            color: #fff;
            font-weight: 600;
            font-size: .9rem;
            white-space: nowrap;
            box-shadow: 0 10px 24px -8px rgba(0, 0, 0, .35);
            transition: transform .25s, gap .25s
        }

        .fab:hover,
        .fab:focus-visible {
            transform: translateY(-3px);
            gap: .6rem
        }

        .fab-wa {
            background: #25d366
        }

        .fab-call {
            background: #0068FD
        }

        .fab-label {
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-width .35s ease, opacity .25s ease
        }

        .fab:hover .fab-label,
        .fab:focus-visible .fab-label {
            max-width: 8rem;
            opacity: 1
        }

        @media (prefers-reduced-motion: reduce) {

            .bl-blob,
            .bl-grid {
                animation: none !important
            }

            .bl-card,
            .bl-card img {
                transition: none !important
            }

            .js [data-reveal] {
                opacity: 1 !important;
                animation: none !important
            }
        }
    </style>

    <script>
        document.documentElement.classList.add('js')
    </script>
    <noscript>
        <style>
            .js [data-reveal] {
                opacity: 1 !important
            }
        </style>
    </noscript>
</head>

<body class="bg-paper text-ink antialiased">

    {{-- ===================== Navbar ===================== --}}
    <header id="top" class="sticky top-0 z-50 border-b border-line bg-white/90 backdrop-blur">
        <div id="progress"
            class="absolute inset-x-0 top-0 h-[3px] origin-right scale-x-0 bg-gradient-to-l from-mint via-[#04C4F4] to-brand"
            aria-hidden="true"></div>
        <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6">

            <a href="{{ url('/') }}" class="flex items-center gap-2.5" aria-label="كوما تيك - الرئيسية">
                <img src="{{ asset('images/logo-mark.png') }}" alt="" class="h-9 w-auto" width="47"
                    height="36">
                <img src="{{ asset('images/logo-wordmark.png') }}" alt="comma_tech" class="h-4 w-auto sm:h-5"
                    width="146" height="20">
            </a>

            <nav class="hidden items-center gap-8 text-[15px] font-medium md:flex" aria-label="التنقل الرئيسي">
                <a href="{{ url('/') }}" class="bl-link text-ink/70 hover:text-brand">الرئيسية</a>
                <a href="{{ url('/') }}#about" class="bl-link text-ink/70 hover:text-brand">من نحن</a>
                <a href="{{ url('/') }}#services" class="bl-link text-ink/70 hover:text-brand">خدماتنا</a>
                <a href="{{ route('blog.index') }}" class="bl-link active text-brand">المدونة</a>
                <a href="{{ url('/') }}#contact" class="bl-link text-ink/70 hover:text-brand">اتصل بنا</a>
            </nav>

            <div class="flex items-center gap-2">
                <a href="tel:+{{ $phones[0] }}" data-random-call
                    class="hidden h-10 w-10 place-items-center rounded-full border border-line text-ink/70 hover:border-brand hover:text-brand sm:grid"
                    aria-label="اتصل بنا">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372a1.125 1.125 0 0 0-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97a1.125 1.125 0 0 0 .417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                </a>
                <a href="https://wa.me/{{ $phones[0] }}" data-random-wa target="_blank" rel="noopener"
                    class="inline-flex h-10 items-center rounded-full bg-brand px-5 text-sm font-semibold text-white hover:bg-brand-dark">
                    ابدأ مشروعك
                </a>
                <button id="menuBtn" type="button"
                    class="grid h-10 w-10 place-items-center rounded-lg border border-line md:hidden"
                    aria-label="فتح القائمة" aria-expanded="false" aria-controls="mobileMenu">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobileMenu" class="hidden border-t border-line bg-white md:hidden">
            <nav class="mx-auto flex max-w-6xl flex-col px-4 py-2 text-base font-medium" aria-label="قائمة الجوال">
                <a href="{{ url('/') }}" class="py-3 text-ink/80">الرئيسية</a>
                <a href="{{ url('/') }}#about" class="py-3 text-ink/80">من نحن</a>
                <a href="{{ url('/') }}#services" class="py-3 text-ink/80">خدماتنا</a>
                <a href="{{ route('blog.index') }}" class="py-3 text-brand">المدونة</a>
                <a href="{{ url('/') }}#contact" class="py-3 text-ink/80">اتصل بنا</a>
            </nav>
        </div>
    </header>

    <main>

        {{-- ===================== Article header ===================== --}}
        <header class="relative overflow-hidden bg-white">
            <div class="pointer-events-none absolute inset-0" aria-hidden="true">
                <span class="bl-blob"
                    style="top:-8rem;right:-6rem;width:26rem;height:26rem;background:#18E3B0"></span>
                <span class="bl-blob"
                    style="bottom:-12rem;left:10%;width:24rem;height:24rem;background:#04C4F4;animation-delay:-6s"></span>
                <span class="bl-grid"></span>
            </div>

            <div class="relative mx-auto max-w-3xl px-4 pb-10 pt-12 sm:px-6 sm:pt-16">

                <nav aria-label="مسار التنقل" class="mb-6 text-[13px] font-medium text-ink/60">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a href="{{ url('/') }}" class="hover:text-brand">الرئيسية</a></li>
                        <li aria-hidden="true">/</li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-brand">المدونة</a></li>
                    </ol>
                </nav>

                <h1 class="font-display text-3xl font-bold leading-[1.5] sm:text-4xl sm:leading-[1.5]">
                    {{ $post->title }}
                </h1>

                @if ($post->summary)
                    <p class="mt-5 text-lg leading-9 text-ink/70">{{ $post->summary }}</p>
                @endif

                <div class="mt-6 flex flex-wrap items-center gap-x-3 gap-y-2 text-[13px] font-medium text-ink/60">
                    <span class="inline-flex items-center gap-2">
                        <img src="{{ asset('images/logo-mark.png') }}" alt="" class="h-5 w-auto">
                        فريق كوما تيك
                    </span>
                    <span class="h-1 w-1 rounded-full bg-mint" aria-hidden="true"></span>
                    <time datetime="{{ $date->toDateString() }}">{{ $fmt($post) }}</time>
                    <span class="h-1 w-1 rounded-full bg-mint" aria-hidden="true"></span>
                    <span>{{ $post->reading_time }} دقائق قراءة</span>
                    <span class="h-1 w-1 rounded-full bg-mint" aria-hidden="true"></span>
                    <span>{{ number_format($post->views_count) }} مشاهدة</span>
                </div>
            </div>
        </header>

        {{-- ===================== Featured image ===================== --}}
        @if ($post->image_url)
            <div class="mx-auto max-w-4xl px-4 sm:px-6">
                <figure
                    class="overflow-hidden rounded-3xl border border-line bg-brand-soft shadow-[0_24px_50px_-34px_rgba(0,104,253,.35)]">
                    <img src="{{ $post->image_url }}" alt="{{ $post->alt_text ?: $post->title }}"
                        class="aspect-[16/9] w-full object-cover" fetchpriority="high">
                </figure>
            </div>
        @endif

        {{-- ===================== Content ===================== --}}
        <section class="py-12 sm:py-16">
            <div class="mx-auto max-w-3xl px-4 sm:px-6">

                <article class="article" id="article">
                    {!! $body !!}
                </article>

                {{-- معرض الصور --}}
                @if (count($post->gallery_urls))
                    <div class="mt-14">
                        <h2 class="font-display text-xl font-bold">معرض الصور</h2>
                        <div class="mt-5 grid grid-cols-2 gap-3 sm:grid-cols-3">
                            @foreach ($post->gallery_urls as $img)
                                <a href="{{ $img }}" target="_blank" rel="noopener"
                                    class="group block aspect-square overflow-hidden rounded-2xl border border-line bg-mist">
                                    <img src="{{ $img }}"
                                        alt="{{ $post->title }} - صورة {{ $loop->iteration }}"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- مشاركة --}}
                <div class="mt-14 flex flex-wrap items-center justify-between gap-4 border-t border-line pt-8">
                    <span class="font-display text-base font-semibold">شارك المقال</span>
                    <div class="flex items-center gap-2.5">
                        <a href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank"
                            rel="noopener" aria-label="مشاركة عبر واتساب"
                            class="grid h-11 w-11 place-items-center rounded-xl border border-line text-ink/70 transition hover:-translate-y-0.5 hover:border-[#25d366] hover:text-[#25d366]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank"
                            rel="noopener" aria-label="مشاركة عبر فيسبوك"
                            class="grid h-11 w-11 place-items-center rounded-xl border border-line text-ink/70 transition hover:-translate-y-0.5 hover:border-brand hover:text-brand">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path
                                    d="M15 8.5h2V5.2h-2c-2.2 0-3.5 1.4-3.5 3.6v2.1H9.5v3.2h2V22h3.2v-7.9h2.4l.4-3.2h-2.8V8.9c0-.6.3-.9 1-.9Z" />
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ $shareText }}&url={{ $shareUrl }}"
                            target="_blank" rel="noopener" aria-label="مشاركة عبر X"
                            class="grid h-11 w-11 place-items-center rounded-xl border border-line text-ink/70 transition hover:-translate-y-0.5 hover:border-ink hover:text-ink">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path d="M4 4l16 16M20 4 4 20" />
                            </svg>
                        </a>
                        <button type="button" id="copyLink" data-url="{{ $canonical }}"
                            aria-label="نسخ الرابط"
                            class="relative grid h-11 w-11 place-items-center rounded-xl border border-line text-ink/70 transition hover:-translate-y-0.5 hover:border-brand hover:text-brand">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path d="M10 14a4 4 0 0 0 5.7 0l3-3a4 4 0 0 0-5.7-5.7l-1 1" />
                                <path d="M14 10a4 4 0 0 0-5.7 0l-3 3A4 4 0 0 0 11 18.700l1-1" />
                            </svg>
                            <span id="copyTip"
                                class="pointer-events-none absolute -top-9 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-lg bg-ink px-2.5 py-1 text-xs font-medium text-white opacity-0 transition">تم
                                النسخ</span>
                        </button>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('blog.index') }}"
                        class="inline-flex items-center gap-2 text-sm font-semibold text-brand hover:text-brand-dark">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                        </svg>
                        العودة لكل المقالات
                    </a>
                </div>
            </div>
        </section>

        {{-- ===================== Related ===================== --}}
        @if ($related->isNotEmpty())
            <section class="bg-mist py-16 sm:py-20">
                <div class="mx-auto max-w-6xl px-4 sm:px-6">
                    <h2 class="font-display text-2xl font-bold leading-snug sm:text-3xl" data-reveal>مقالات قد تعجبك
                    </h2>

                    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($related as $item)
                            <article
                                class="bl-card group flex flex-col overflow-hidden rounded-3xl border border-line bg-white"
                                data-reveal style="--d:{{ $loop->index * 0.1 }}s">
                                <a href="{{ route('blog.show', $item->slug) }}"
                                    class="relative block aspect-[16/10] overflow-hidden bg-brand-soft" tabindex="-1"
                                    aria-hidden="true">
                                    @if ($item->image_url)
                                        <img src="{{ $item->image_url }}"
                                            alt="{{ $item->alt_text ?: $item->title }}"
                                            class="absolute inset-0 h-full w-full object-cover" loading="lazy">
                                    @else
                                        <div
                                            class="absolute inset-0 grid place-items-center bg-gradient-to-br from-[#0A8DF0] to-[#0050D1]">
                                            <img src="{{ asset('images/logo-mark.png') }}" alt=""
                                                class="h-14 w-auto opacity-90">
                                        </div>
                                    @endif
                                </a>
                                <div class="flex flex-1 flex-col p-6">
                                    <div
                                        class="flex flex-wrap items-center gap-x-3 text-[13px] font-medium text-ink/60">
                                        <time
                                            datetime="{{ optional($item->published_at ?? $item->created_at)->toDateString() }}">{{ $fmt($item) }}</time>
                                        <span class="h-1 w-1 rounded-full bg-mint" aria-hidden="true"></span>
                                        <span>{{ $item->reading_time }} د قراءة</span>
                                    </div>
                                    <h3 class="mt-3 font-display text-lg font-semibold leading-8">
                                        <a href="{{ route('blog.show', $item->slug) }}"
                                            class="hover:text-brand">{{ $item->title }}</a>
                                    </h3>
                                    <p class="mt-2 line-clamp-3 text-[15px] leading-8 text-ink/70">
                                        {{ $item->excerpt }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- ===================== CTA ===================== --}}
        <section class="px-4 py-20 sm:px-6">
            <div class="relative isolate mx-auto max-w-6xl overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#18E3B0] via-[#04C4F4] to-[#1B6DF0] px-6 py-14 text-center sm:px-12"
                data-reveal>
                <span
                    class="pointer-events-none absolute -right-10 -top-16 -z-10 h-56 w-56 rounded-full bg-white/25 blur-2xl"
                    aria-hidden="true"></span>
                <span
                    class="pointer-events-none absolute -bottom-20 -left-10 -z-10 h-64 w-64 rounded-full bg-white/20 blur-2xl"
                    aria-hidden="true"></span>

                <h2 class="font-display text-3xl font-bold leading-snug text-[#04141A] sm:text-4xl sm:leading-snug">
                    لديك فكرة؟<br>لنضع لها فاصلة.
                </h2>
                <p class="mx-auto mt-4 max-w-xl text-base font-medium leading-8 text-[#04141A]/80 sm:text-lg">
                    أخبرنا عن مشروعك، وسنساعدك في تحويل الفكرة إلى خطة واضحة وحل رقمي قابل للتنفيذ والنمو.
                </p>
                <div class="mt-8 flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
                    <a href="https://wa.me/{{ $phones[0] }}" data-random-wa target="_blank" rel="noopener"
                        class="inline-flex h-12 items-center justify-center rounded-full bg-ink px-8 text-base font-semibold text-white hover:bg-black">
                        تواصل معنا عبر واتساب
                    </a>
                    <a href="mailto:comma.tech.dev@gmail.com"
                        class="inline-flex h-12 items-center justify-center rounded-full bg-white/90 px-8 text-base font-semibold text-ink hover:bg-white">
                        راسلنا عبر البريد
                    </a>
                </div>
            </div>
        </section>

    </main>

    {{-- ===================== Footer ===================== --}}
    <footer id="contact" class="border-t border-line bg-white">
        <div class="mx-auto grid max-w-6xl gap-12 px-4 py-16 sm:px-6 md:grid-cols-3">
            <div>
                <a href="{{ url('/') }}" class="flex items-center gap-2.5" aria-label="كوما تيك">
                    <img src="{{ asset('images/logo-mark.png') }}" alt="" class="h-9 w-auto" width="47"
                        height="36">
                    <img src="{{ asset('images/logo-wordmark.png') }}" alt="comma_tech" class="h-5 w-auto"
                        width="146" height="20">
                </a>
                <p class="mt-4 max-w-xs leading-8 text-ink/70">
                    نحول الأفكار إلى منتجات رقمية قابلة للنمو: مواقع، متاجر إلكترونية، تطبيقات جوال، وحلول برمجية مخصصة.
                </p>
            </div>

            <div>
                <h2 class="font-display text-base font-semibold">روابط سريعة</h2>
                <ul class="mt-4 space-y-3 text-[15px] text-ink/70">
                    <li><a href="{{ url('/') }}" class="hover:text-brand">الرئيسية</a></li>
                    <li><a href="{{ url('/') }}#about" class="hover:text-brand">من نحن</a></li>
                    <li><a href="{{ url('/') }}#services" class="hover:text-brand">خدماتنا</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-brand">المدونة</a></li>
                    <li><a href="{{ url('/') }}#faq" class="hover:text-brand">الأسئلة الشائعة</a></li>
                </ul>
            </div>

            <div>
                <h2 class="font-display text-base font-semibold">تواصل معنا</h2>
                <ul class="mt-4 space-y-3 text-[15px]">
                    <li><a href="mailto:comma.tech.dev@gmail.com" class="text-ink/80 hover:text-brand"
                            dir="ltr">comma.tech.dev@gmail.com</a></li>
                    @foreach ($phones as $phone)
                        <li><a href="tel:+{{ $phone }}" class="text-ink/80 hover:text-brand"
                                dir="ltr">+{{ $phone }}</a></li>
                    @endforeach
                    <li><a href="https://maps.app.goo.gl/Yuu1uR5wcA7bWEW1A" target="_blank" rel="noopener"
                            class="text-ink/80 hover:text-brand">موقعنا على الخريطة</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-line">
            <p class="mx-auto max-w-6xl px-4 py-5 text-sm text-ink/60 sm:px-6">
                © {{ date('Y') }} comma_tech — جميع الحقوق محفوظة
            </p>
        </div>
    </footer>

    {{-- أزرار عائمة --}}
    <div class="fixed bottom-5 left-4 z-40 flex flex-col gap-3 sm:bottom-6 sm:left-6"
        style="padding-bottom:env(safe-area-inset-bottom,0px)">
        <a href="https://wa.me/{{ $phones[0] }}" data-random-wa
            data-wa-text="مرحباً كوما تيك، قرأت مقال «{{ $post->title }}» وأرغب في الاستفسار" target="_blank"
            rel="noopener" class="fab fab-wa" aria-label="تواصل معنا عبر واتساب">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                <path
                    d="M9 9.2c.2 2.4 2.600 4.800 5.800 5.600l1.200-1.400-2-1-.9.8a4.500 4.500 0 0 1-2-2l.8-.9-1-2L9 9.200Z"
                    fill="currentColor" stroke="none" />
            </svg>
            <span class="fab-label">واتساب</span>
        </a>
        <a href="tel:+{{ $phones[0] }}" data-random-call class="fab fab-call" aria-label="اتصل بنا الآن">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372a1.125 1.125 0 0 0-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97a1.125 1.125 0 0 0 .417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
            </svg>
            <span class="fab-label">اتصل الآن</span>
        </a>
    </div>

    <script>
        (() => {
            const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

            // أرقام التواصل العشوائية
            const phones = @json($phones);
            const pick = () => phones[Math.floor(Math.random() * phones.length)];

            function randomize(el) {
                if (el.hasAttribute('data-random-call')) {
                    el.href = 'tel:+' + pick();
                } else {
                    const text = el.dataset.waText;
                    el.href = 'https://wa.me/' + pick() + (text ? '?text=' + encodeURIComponent(text) : '');
                }
            }
            document.querySelectorAll('[data-random-call],[data-random-wa]').forEach(el => {
                randomize(el);
                ['pointerdown', 'touchstart', 'mouseenter', 'focus'].forEach(ev =>
                    el.addEventListener(ev, () => randomize(el), {
                        passive: true
                    }));
            });

            // قائمة الجوال
            const btn = document.getElementById('menuBtn');
            const menu = document.getElementById('mobileMenu');
            btn.addEventListener('click', () => {
                const open = menu.classList.toggle('hidden') === false;
                btn.setAttribute('aria-expanded', open);
            });

            // شريط التقدم: يتبع قراءة المقال نفسه
            const header = document.getElementById('top');
            const progress = document.getElementById('progress');
            const article = document.getElementById('article');
            let ticking = false;

            function onScroll() {
                const rect = article.getBoundingClientRect();
                const total = rect.height - innerHeight * 0.6;
                const done = Math.min(Math.max(-rect.top + innerHeight * 0.2, 0) / Math.max(total, 1), 1);
                progress.style.transform = 'scaleX(' + done + ')';
                header.classList.toggle('scrolled', scrollY > 10);
                ticking = false;
            }
            addEventListener('scroll', () => {
                if (!ticking) {
                    ticking = true;
                    requestAnimationFrame(onScroll);
                }
            }, {
                passive: true
            });
            onScroll();

            // نسخ الرابط
            const copyBtn = document.getElementById('copyLink');
            const tip = document.getElementById('copyTip');
            copyBtn.addEventListener('click', async () => {
                const url = copyBtn.dataset.url;
                try {
                    await navigator.clipboard.writeText(url);
                } catch (e) {
                    const t = document.createElement('textarea');
                    t.value = url;
                    document.body.appendChild(t);
                    t.select();
                    document.execCommand('copy');
                    t.remove();
                }
                tip.style.opacity = 1;
                setTimeout(() => tip.style.opacity = 0, 1600);
            });

            // ظهور العناصر عند التمرير
            const items = document.querySelectorAll('[data-reveal]');
            if (reduce || !('IntersectionObserver' in window)) {
                items.forEach(el => el.classList.add('in'));
                return;
            }
            const io = new IntersectionObserver(entries => {
                entries.forEach(e => {
                    if (!e.isIntersecting) return;
                    e.target.classList.add('in');
                    io.unobserve(e.target);
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -6% 0px'
            });
            items.forEach(el => io.observe(el));
        })();
    </script>
</body>

</html>
