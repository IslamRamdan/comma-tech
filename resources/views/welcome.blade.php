<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>كوما تيك | تصميم وبرمجة المواقع وإعلانات جوجل</title>
    <meta name="description"
        content="كوما تيك شركة متخصصة في تصميم وبرمجة المواقع الإلكترونية وإدارة حملات إعلانات جوجل لعملاء في مصر والخليج.">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-mark.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600&family=Readex+Pro:wght@500;600;700&display=swap"
        rel="stylesheet">

    {{--
        للتشغيل السريع نستخدم Tailwind عبر CDN.
        في الإنتاج: استخدم Vite (@vite(['resources/css/app.css','resources/js/app.js']))
        وانقل إعدادات theme.extend أدناه إلى tailwind.config.js
    --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink: '#0E1726', // نص أساسي (لون كلمة comma في اللوجو)
                        paper: '#FFFFFF', // الخلفية
                        mist: '#F3F6FB', // خلفيات الأقسام البديلة
                        line: '#E1E8F2', // الحدود
                        brand: {
                            DEFAULT: '#0068FD',
                            dark: '#0050D1',
                            soft: '#E6F0FF'
                        }, // أزرق اللوجو
                        mint: '#05F9BC', // أخضر نعناعي من تدرج اللوجو
                    },
                    fontFamily: {
                        display: ['"Readex Pro"', 'sans-serif'],
                        body: ['"IBM Plex Sans Arabic"', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: "IBM Plex Sans Arabic", sans-serif;
        }

        .font-display {
            font-family: "Readex Pro", "IBM Plex Sans Arabic", sans-serif;
        }

        :focus-visible {
            outline: 3px solid #0068FD;
            outline-offset: 3px;
            border-radius: 6px;
        }

        [id] {
            scroll-margin-top: 5.5rem;
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto !important;
            }

            * {
                transition: none !important;
            }
        }

        /* حركة واحدة فقط: ارتفاع أعمدة المخطط في الهيرو عند تحميل الصفحة */
        @keyframes grow {
            from {
                transform: scaleY(.15);
            }

            to {
                transform: scaleY(1);
            }
        }

        .bar {
            transform-origin: bottom;
            animation: grow .9s cubic-bezier(.2, .8, .2, 1) both;
        }

        @media (prefers-reduced-motion: reduce) {
            .bar {
                animation: none;
            }
        }
    </style>
</head>

<body class="bg-paper text-ink antialiased">

    {{-- ===================== Navbar ===================== --}}
    <header class="sticky top-0 z-50 border-b border-line bg-white/90 backdrop-blur">
        <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6">

            <a href="{{ url('/') }}" class="flex items-center gap-2.5" aria-label="كوما تيك - الرئيسية">
                <img src="{{ asset('images/logo-mark.png') }}" alt="" class="h-9 w-auto" width="47"
                    height="36">
                <img src="{{ asset('images/logo-wordmark.png') }}" alt="comma_tech" class="h-4 w-auto sm:h-5"
                    width="146" height="20">
            </a>

            <nav class="hidden items-center gap-8 text-[15px] font-medium md:flex" aria-label="التنقل الرئيسي">
                <a href="{{ url('/') }}" class="text-brand">الرئيسية</a>
                <a href="#about" class="text-ink/70 hover:text-brand">من نحن</a>
                <a href="#services" class="text-ink/70 hover:text-brand">خدماتنا</a>
                <a href="#blog" class="text-ink/70 hover:text-brand">المدونة</a>
                <a href="#contact" class="text-ink/70 hover:text-brand">اتصل بنا</a>
            </nav>

            <div class="flex items-center gap-2">
                <a href="tel:+201228602122"
                    class="hidden h-10 w-10 place-items-center rounded-full border border-line text-ink/70 hover:border-brand hover:text-brand sm:grid"
                    aria-label="اتصل بنا">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372a1.125 1.125 0 0 0-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97a1.125 1.125 0 0 0 .417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                </a>
                <a href="https://wa.me/201228602122" target="_blank" rel="noopener"
                    class="inline-flex h-10 items-center rounded-full bg-brand px-5 text-sm font-semibold text-white hover:bg-brand-dark">
                    تواصل واتساب
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
                <a href="{{ url('/') }}" class="py-3 text-brand">الرئيسية</a>
                <a href="#about" class="py-3 text-ink/80">من نحن</a>
                <a href="#services" class="py-3 text-ink/80">خدماتنا</a>
                <a href="#blog" class="py-3 text-ink/80">المدونة</a>
                <a href="#contact" class="py-3 text-ink/80">اتصل بنا</a>
            </nav>
        </div>
    </header>

    <main>

        {{-- ===================== Hero ===================== --}}
        <section class="relative overflow-hidden bg-white">
            {{-- شعار الشركة كبيرًا وخافتًا في الخلفية: عنصر الهوية المميز للصفحة --}}
            <img src="{{ asset('images/logo-mark.png') }}" alt="" aria-hidden="true"
                class="pointer-events-none absolute -left-24 top-1/2 w-[34rem] -translate-y-1/2 select-none opacity-[.09] sm:-left-16 sm:w-[44rem]">

            <div class="relative mx-auto grid max-w-6xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:py-24">

                <div>
                    <h1 class="font-display text-4xl font-bold leading-[1.35] sm:text-5xl lg:text-[3.4rem]">
                        نبني موقعك،<br>ونوصله لعملائك على جوجل
                    </h1>
                    <p class="mt-6 max-w-xl text-lg leading-8 text-ink/70">
                        نصمم ونبرمج المواقع الإلكترونية، ونُدير حملات إعلانات جوجل، لتتحول زيارات موقعك إلى طلبات
                        حقيقية.
                    </p>
                    <div class="mt-9 flex flex-wrap gap-3">
                        <a href="https://wa.me/201228602122" target="_blank" rel="noopener"
                            class="inline-flex h-12 items-center rounded-full bg-brand px-8 text-base font-semibold text-white shadow-sm hover:bg-brand-dark">
                            ابدأ مشروعك الآن
                        </a>
                        <a href="#services"
                            class="inline-flex h-12 items-center rounded-full border border-line bg-white px-8 text-base font-semibold hover:border-brand hover:text-brand">
                            استعرض خدماتنا
                        </a>
                    </div>
                    <p class="mt-6 text-sm text-ink/60">استشارة أولية مجانية، ورد خلال ساعات العمل.</p>
                </div>

                {{-- مجسم: نافذة متصفح + نتائج الإعلانات --}}
                <div class="relative mx-auto w-full max-w-md lg:max-w-none" aria-hidden="true">
                    <div class="rounded-2xl border border-line bg-white shadow-[0_20px_50px_-20px_rgba(15,27,51,.25)]">
                        <div class="flex items-center gap-1.5 border-b border-line px-4 py-3">
                            <span class="h-2.5 w-2.5 rounded-full bg-line"></span>
                            <span class="h-2.5 w-2.5 rounded-full bg-line"></span>
                            <span class="h-2.5 w-2.5 rounded-full bg-line"></span>
                            <span class="mr-3 h-5 flex-1 rounded-md bg-mist" dir="ltr"></span>
                        </div>
                        <div class="space-y-5 p-6">
                            <div class="h-5 w-2/3 rounded bg-ink"></div>
                            <div class="space-y-2">
                                <div class="h-3 w-full rounded bg-line"></div>
                                <div class="h-3 w-5/6 rounded bg-line"></div>
                            </div>
                            <div
                                class="flex h-9 w-32 items-center justify-center rounded-full bg-brand text-xs font-semibold text-white">
                                اطلب الآن</div>

                            <div class="rounded-xl bg-mist p-4">
                                <div class="mb-3 flex items-center justify-between text-xs font-medium text-ink/60">
                                    <span>زيارات من إعلانات جوجل</span>
                                    <span class="rounded-full bg-mint/25 px-2 py-0.5 text-ink">Google Ads</span>
                                </div>
                                <div class="flex h-24 items-end gap-2" dir="ltr">
                                    @foreach ([30, 42, 38, 55, 64, 78, 92] as $i => $h)
                                        <div class="bar flex-1 rounded-t {{ $loop->last ? 'bg-brand' : 'bg-brand/30' }}"
                                            style="height: {{ $h }}%; animation-delay: {{ $i * 70 }}ms">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===================== About ===================== --}}
        <section id="about" class="bg-mist py-20">
            <div class="mx-auto grid max-w-6xl gap-12 px-4 sm:px-6 lg:grid-cols-5">
                <div class="lg:col-span-2">
                    <h2 class="font-display text-3xl font-bold leading-snug sm:text-4xl">من نحن</h2>
                    <p class="mt-4 text-lg leading-8 text-ink/70">
                        شركة تقنية تعمل مع عملاء في مصر ودول الخليج.
                    </p>
                </div>

                <div class="lg:col-span-3">
                    <p class="max-w-2xl text-lg leading-9 text-ink/80">
                        كوما تيك متخصصة في تصميم وبرمجة المواقع الإلكترونية وإدارة الحملات الإعلانية على جوجل.
                        نبدأ كل مشروع بفهم نشاطك وجمهورك، ثم نبني موقعًا عربيًا واضحًا وسريعًا، ونربطه بحملات يمكن قياس
                        نتائجها.
                    </p>

                    <dl
                        class="mt-10 grid gap-px overflow-hidden rounded-2xl border border-line bg-line sm:grid-cols-3">
                        <div class="bg-white p-6">
                            <dt class="font-display text-base font-semibold">واجهات عربية أولًا</dt>
                            <dd class="mt-2 text-sm leading-7 text-ink/65">تصميم من اليمين لليسار ومتوافق مع شاشات
                                الجوال.</dd>
                        </div>
                        <div class="bg-white p-6">
                            <dt class="font-display text-base font-semibold">كود منظم</dt>
                            <dd class="mt-2 text-sm leading-7 text-ink/65">برمجة بـ Laravel سهلة التطوير والصيانة
                                لاحقًا.</dd>
                        </div>
                        <div class="bg-white p-6">
                            <dt class="font-display text-base font-semibold">نتائج قابلة للقياس</dt>
                            <dd class="mt-2 text-sm leading-7 text-ink/65">تقارير واضحة توضح ما أنفقته وما حققته حملتك.
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>

        {{-- ===================== Services ===================== --}}
        <section id="services" class="py-20">
            <div class="mx-auto max-w-6xl px-4 sm:px-6">
                <div class="max-w-2xl">
                    <h2 class="font-display text-3xl font-bold leading-snug sm:text-4xl">خدماتنا</h2>
                    <p class="mt-4 text-lg leading-8 text-ink/70">خدمتان نتقنهما: موقع يمثل شركتك، وإعلانات تجلب له
                        الزوار.</p>
                </div>

                <div class="mt-12 grid gap-6 lg:grid-cols-5">

                    {{-- الخدمة 1: بطاقة رئيسية أكبر --}}
                    <article
                        class="flex flex-col rounded-3xl bg-gradient-to-br from-[#0A8DF0] to-[#0050D1] p-8 text-white sm:p-10 lg:col-span-3">
                        <svg class="h-10 w-10" fill="none" stroke="currentColor" stroke-width="1.6"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25A2.25 2.25 0 0 1 5.25 3h13.5A2.25 2.25 0 0 1 21 5.25Z" />
                        </svg>
                        <h3 class="mt-6 font-display text-2xl font-semibold">تصميم وتطوير المواقع الإلكترونية</h3>
                        <p class="mt-3 max-w-xl leading-8 text-white/85">
                            مواقع شركات ومتاجر ولوحات تحكم، بتصميم يعكس هويتك وبرمجة مخصصة تناسب احتياجك.
                        </p>
                        <ul class="mt-6 grid gap-3 text-[15px] sm:grid-cols-2">
                            @foreach (['تصميم متجاوب مع كل الشاشات', 'برمجة بـ Laravel', 'لوحة تحكم لإدارة المحتوى', 'تهيئة لمحركات البحث (SEO)'] as $item)
                                <li class="flex items-center gap-2">
                                    <svg class="h-5 w-5 shrink-0 text-mint" fill="none" stroke="currentColor"
                                        stroke-width="2.2" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="https://wa.me/201228602122?text={{ urlencode('أرغب في تصميم موقع إلكتروني') }}"
                            target="_blank" rel="noopener"
                            class="mt-8 inline-flex h-11 w-fit items-center rounded-full bg-white px-6 text-sm font-semibold text-brand hover:bg-brand-soft">
                            اطلب موقعك
                        </a>
                    </article>

                    {{-- الخدمة 2 --}}
                    <article class="flex flex-col rounded-3xl border border-line bg-white p-8 sm:p-10 lg:col-span-2">
                        <svg class="h-10 w-10 text-brand" fill="none" stroke="currentColor" stroke-width="1.6"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                        </svg>
                        <h3 class="mt-6 font-display text-2xl font-semibold">إعلانات جوجل والتسويق الرقمي</h3>
                        <p class="mt-3 leading-8 text-ink/70">
                            حملات بحث وعرض مبنية على كلمات يبحث عنها عملاؤك فعلًا، مع متابعة وتحسين مستمر للنتائج.
                        </p>
                        <ul class="mt-6 space-y-3 text-[15px]">
                            @foreach (['إعداد وإدارة حملات Google Ads', 'اختيار الكلمات المفتاحية والجمهور', 'تتبع المكالمات والطلبات', 'تقرير دوري بالنتائج'] as $item)
                                <li class="flex items-center gap-2">
                                    <svg class="h-5 w-5 shrink-0 text-brand" fill="none" stroke="currentColor"
                                        stroke-width="2.2" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="https://wa.me/201228602122?text={{ urlencode('أرغب في إطلاق حملة إعلانية على جوجل') }}"
                            target="_blank" rel="noopener"
                            class="mt-8 inline-flex h-11 w-fit items-center rounded-full border border-brand px-6 text-sm font-semibold text-brand hover:bg-brand-soft">
                            ابدأ حملتك
                        </a>
                    </article>
                </div>
            </div>
        </section>

        {{-- ===================== Latest Blog Posts ===================== --}}
        <section id="blog" class="bg-mist py-20">
            <div class="mx-auto max-w-6xl px-4 sm:px-6">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div class="max-w-2xl">
                        <h2 class="font-display text-3xl font-bold leading-snug sm:text-4xl">أحدث المقالات</h2>
                        <p class="mt-4 text-lg leading-8 text-ink/70">نصائح عملية في تصميم المواقع والإعلانات والسيو.
                        </p>
                    </div>
                    <a href="{{ url('/blog') }}" class="text-sm font-semibold text-brand hover:text-brand-dark">كل
                        المقالات</a>
                </div>

                <div class="mt-10 grid gap-6 md:grid-cols-3">
                    @forelse ($posts as $post)
                        <article
                            class="group flex flex-col rounded-2xl border border-line bg-white p-6 transition hover:border-brand">
                            <div class="flex items-center gap-3 text-xs text-ink/60">
                                <span
                                    class="rounded-full bg-brand-soft px-3 py-1 font-medium text-brand">{{ $post['category'] }}</span>
                                <time
                                    datetime="{{ $post['date'] }}">{{ \Carbon\Carbon::parse($post['date'])->locale('ar')->translatedFormat('j F Y') }}</time>
                            </div>
                            <h3 class="mt-4 font-display text-lg font-semibold leading-8">
                                <a href="{{ url('/blog/' . $post['slug']) }}"
                                    class="hover:text-brand">{{ $post['title'] }}</a>
                            </h3>
                            <p class="mt-3 flex-1 text-[15px] leading-7 text-ink/70">{{ $post['excerpt'] }}</p>
                            <a href="{{ url('/blog/' . $post['slug']) }}"
                                class="mt-5 text-sm font-semibold text-brand"
                                aria-label="اقرأ المقال: {{ $post['title'] }}">اقرأ المقال</a>
                        </article>
                    @empty
                        <p
                            class="col-span-full rounded-2xl border border-dashed border-line bg-white p-10 text-center text-ink/60">
                            لا توجد مقالات منشورة بعد. سننشر أول مقال قريبًا.
                        </p>
                    @endforelse
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
                    نصمم ونبرمج المواقع الإلكترونية ونُدير إعلانات جوجل لعملائنا في مصر والخليج.
                </p>
            </div>

            <div>
                <h2 class="font-display text-base font-semibold">روابط سريعة</h2>
                <ul class="mt-4 space-y-3 text-[15px] text-ink/70">
                    <li><a href="{{ url('/') }}" class="hover:text-brand">الرئيسية</a></li>
                    <li><a href="#about" class="hover:text-brand">من نحن</a></li>
                    <li><a href="#services" class="hover:text-brand">خدماتنا</a></li>
                    <li><a href="#blog" class="hover:text-brand">المدونة</a></li>
                </ul>
            </div>

            <div>
                <h2 class="font-display text-base font-semibold">تواصل معنا</h2>
                <ul class="mt-4 space-y-3 text-[15px]">
                    <li>
                        <a href="mailto:comma.tech.dev@gmail.com" class="text-ink/80 hover:text-brand"
                            dir="ltr">comma.tech.dev@gmail.com</a>
                    </li>
                    @foreach (['201228602122', '201289155883', '201289154294'] as $phone)
                        <li>
                            <a href="tel:+{{ $phone }}" class="text-ink/80 hover:text-brand"
                                dir="ltr">+{{ $phone }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="border-t border-line">
            <p class="mx-auto max-w-6xl px-4 py-5 text-sm text-ink/60 sm:px-6">
                © {{ date('Y') }} كوما تيك. جميع الحقوق محفوظة.
            </p>
        </div>
    </footer>

    <script>
        // قائمة الجوال
        const btn = document.getElementById('menuBtn');
        const menu = document.getElementById('mobileMenu');
        btn.addEventListener('click', () => {
            const open = menu.classList.toggle('hidden') === false;
            btn.setAttribute('aria-expanded', open);
        });
        menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
            menu.classList.add('hidden');
            btn.setAttribute('aria-expanded', false);
        }));
    </script>
</body>

</html>
