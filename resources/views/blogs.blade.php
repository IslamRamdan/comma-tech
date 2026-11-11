@php
    $phones = ['201228602122', '201289155883', '201289154294'];
    $fmt = fn($p) => optional($p->published_at ?? $p->created_at)
        ->locale('ar')
        ->translatedFormat('j F Y');
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>المدونة | كوما تيك</title>
    <meta name="description"
        content="مقالات ونصائح من كوما تيك في تطوير المواقع والمتاجر الإلكترونية وتطبيقات الجوال والتسويق الرقمي وإعلانات جوجل.">
    <meta name="robots" content="{{ $q !== '' ? 'noindex, follow' : 'index, follow' }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="color-scheme" content="light only">
    <link rel="canonical" href="{{ route('blog.index') }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('blog.index') }}">
    <meta property="og:title" content="المدونة | كوما تيك">
    <meta property="og:description" content="مقالات ونصائح في التطوير والتسويق الرقمي من فريق كوما تيك.">
    <meta property="og:image" content="https://comma-tech.online/images/logo.jpg">
    <meta property="og:locale" content="ar_AR">

    <link rel="icon" type="image/png" href="{{ asset('images/logo-mark.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-mark.png') }}">

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

        @keyframes bl-comma {

            0%,
            100% {
                transform: translateY(0) rotate(0)
            }

            40% {
                transform: translateY(-.16em) rotate(-10deg)
            }

            60% {
                transform: translateY(0) rotate(0)
            }
        }

        .bl-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: .28;
            animation: bl-blob 18s ease-in-out infinite
        }

        .bl-grid {
            position: absolute;
            inset: 0;
            opacity: .55;
            background-image: radial-gradient(rgba(0, 104, 253, .25) 1.2px, transparent 1.5px);
            background-size: 30px 30px;
            -webkit-mask-image: radial-gradient(ellipse 70% 80% at 50% 30%, #000 20%, transparent 75%);
            mask-image: radial-gradient(ellipse 70% 80% at 50% 30%, #000 20%, transparent 75%);
            animation: bl-grid 26s linear infinite
        }

        .bl-comma {
            display: inline-block;
            transform-origin: 50% 90%;
            animation: bl-comma 2.8s ease-in-out infinite
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

        .bl-card:hover .bl-more svg {
            transform: translateX(-6px)
        }

        .bl-more svg {
            transition: transform .3s
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
            .bl-grid,
            .bl-comma {
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
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
                        aria-hidden="true">
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

        {{-- ===================== Hero ===================== --}}
        <section class="relative overflow-hidden bg-white">
            <div class="pointer-events-none absolute inset-0" aria-hidden="true">
                <span class="bl-blob"
                    style="top:-8rem;right:-6rem;width:26rem;height:26rem;background:#18E3B0"></span>
                <span class="bl-blob"
                    style="bottom:-10rem;left:15%;width:24rem;height:24rem;background:#04C4F4;animation-delay:-6s"></span>
                <span class="bl-grid"></span>
            </div>

            <div class="relative mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:py-20">
                <div class="max-w-3xl">
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-line bg-white px-3.5 py-1.5 text-[13px] font-medium text-ink/70">
                        <span class="h-2 w-2 rounded-full border-2 border-mint" aria-hidden="true"></span>
                        مدونة كوما تيك
                    </span>
                    <h1 class="mt-5 font-display text-4xl font-bold leading-[1.4] sm:text-5xl">
                        أفكار ونصائح تضع لمشروعك <span class="bl-comma text-brand">،</span><br>فاصلة نجاح
                    </h1>
                    <p class="mt-5 max-w-xl text-lg leading-9 text-ink/70">
                        مقالات عملية عن تطوير المواقع والمتاجر الإلكترونية وتطبيقات الجوال والتسويق الرقمي وإعلانات
                        جوجل، نكتبها من خبرة مشاريع حقيقية.
                    </p>

                    <form action="{{ route('blog.index') }}" method="get" role="search" class="mt-8 max-w-lg">
                        <label for="q" class="sr-only">ابحث في المقالات</label>
                        <div
                            class="flex h-14 items-center gap-3 rounded-full border border-line bg-white ps-5 pe-2 shadow-[0_18px_40px_-26px_rgba(14,23,38,.35)] focus-within:border-brand">
                            <svg class="h-5 w-5 shrink-0 text-ink/40" fill="none" stroke="currentColor"
                                stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="11" cy="11" r="6.5" />
                                <path stroke-linecap="round" d="m20 20-3.8-3.8" />
                            </svg>
                            <input id="q" name="q" type="search" value="{{ $q }}"
                                placeholder="ابحث عن مقال..."
                                class="h-full min-w-0 flex-1 bg-transparent text-[15px] outline-none placeholder:text-ink/40">
                            <button type="submit"
                                class="inline-flex h-10 items-center rounded-full bg-brand px-6 text-sm font-semibold text-white hover:bg-brand-dark">
                                بحث
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        {{-- ===================== Posts ===================== --}}
        <section class="bg-mist py-16 sm:py-20">
            <div class="mx-auto max-w-6xl px-4 sm:px-6">

                @if ($q !== '')
                    <div class="mb-10 flex flex-wrap items-center justify-between gap-3" data-reveal>
                        <p class="text-lg text-ink/70">
                            نتائج البحث عن <strong class="font-semibold text-ink">«{{ $q }}»</strong>
                            ({{ $posts->count() }})
                        </p>
                        <a href="{{ route('blog.index') }}"
                            class="text-sm font-semibold text-brand hover:text-brand-dark">
                            عرض كل المقالات
                        </a>
                    </div>
                @endif

                @if ($posts->isEmpty())
                    <div class="mx-auto max-w-md rounded-3xl border border-line bg-white p-10 text-center" data-reveal>
                        <div
                            class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-brand-soft font-display text-3xl font-bold text-brand">
                            ،</div>
                        <h2 class="mt-5 font-display text-xl font-semibold">
                            {{ $q !== '' ? 'لا توجد نتائج مطابقة' : 'لا توجد مقالات بعد' }}
                        </h2>
                        <p class="mt-2 text-[15px] leading-8 text-ink/70">
                            {{ $q !== '' ? 'جرّب كلمات مختلفة أو تصفح كل المقالات.' : 'نجهز لك محتوى مفيداً، عد قريباً.' }}
                        </p>
                        @if ($q !== '')
                            <a href="{{ route('blog.index') }}"
                                class="mt-6 inline-flex h-11 items-center rounded-full bg-brand px-6 text-sm font-semibold text-white hover:bg-brand-dark">
                                كل المقالات
                            </a>
                        @endif
                    </div>
                @else
                    {{-- كل المقالات --}}
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($posts as $post)
                            <article
                                class="bl-card group flex flex-col overflow-hidden rounded-3xl border border-line bg-white"
                                data-reveal style="--d:{{ ($loop->index % 3) * 0.1 }}s">
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="relative block aspect-[16/10] overflow-hidden bg-brand-soft" tabindex="-1"
                                    aria-hidden="true">
                                    @if ($post->image_url)
                                        <img src="{{ $post->image_url }}"
                                            alt="{{ $post->alt_text ?: $post->title }}"
                                            class="absolute inset-0 h-full w-full object-cover"
                                            loading="{{ $loop->index < 3 ? 'eager' : 'lazy' }}">
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
                                            datetime="{{ optional($post->published_at ?? $post->created_at)->toDateString() }}">{{ $fmt($post) }}</time>
                                        <span class="h-1 w-1 rounded-full bg-mint" aria-hidden="true"></span>
                                        <span>{{ $post->reading_time }} د قراءة</span>
                                    </div>
                                    <h2 class="mt-3 font-display text-lg font-semibold leading-8">
                                        <a href="{{ route('blog.show', $post->slug) }}"
                                            class="hover:text-brand">{{ $post->title }}</a>
                                    </h2>
                                    <p class="mt-2 line-clamp-3 text-[15px] leading-8 text-ink/70">
                                        {{ $post->excerpt }}</p>
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                        class="bl-more mt-auto inline-flex items-center gap-2 pt-5 text-sm font-semibold text-brand hover:text-brand-dark">
                                        اقرأ المزيد
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 12H5m6-6-6 6 6 6" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

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
            data-wa-text="مرحباً كوما تيك، أرغب في الاستفسار عن خدماتكم" target="_blank" rel="noopener"
            class="fab fab-wa" aria-label="تواصل معنا عبر واتساب">
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

            // شريط التقدم + ظل الهيدر
            const header = document.getElementById('top');
            const progress = document.getElementById('progress');
            let ticking = false;

            function onScroll() {
                const max = document.documentElement.scrollHeight - innerHeight;
                progress.style.transform = 'scaleX(' + (max > 0 ? Math.min(scrollY / max, 1) : 0) + ')';
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
