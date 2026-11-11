@php
    $phones = ['201228602122', '201289155883', '201289154294'];
    $faqs = [
        [
            'كم يستغرق تنفيذ الموقع أو التطبيق؟',
            'يختلف الوقت حسب حجم المشروع وعدد الصفحات والخصائص المطلوبة. بعد أن نفهم متطلباتك نعطيك جدولاً زمنياً واضحاً لكل مرحلة قبل أن نبدأ.',
        ],
        [
            'هل الموقع يدعم اللغة العربية بالكامل؟',
            'نعم. نصمم واجهات عربية من اليمين لليسار بخطوط واضحة، ويمكن إضافة لغات أخرى مثل الإنجليزية إذا احتاج مشروعك ذلك.',
        ],
        [
            'هل أستطيع تعديل محتوى الموقع بنفسي؟',
            'نعم. نزود الموقع بلوحة تحكم بسيطة تمكنك من تعديل النصوص والصور والمنتجات والمقالات دون الحاجة إلى مبرمج.',
        ],
        [
            'هل تقدمون دعماً بعد إطلاق المشروع؟',
            'نعم. نتابع المشروع بعد الإطلاق ونصلح أي مشكلة تظهر، ونطوره بإضافة خصائص جديدة كلما احتجت إلى ذلك.',
        ],
        [
            'هل يمكن تطوير موقع قائم بدلاً من بناء موقع جديد؟',
            'غالباً نعم. نراجع الموقع الحالي أولاً، ثم نقترح عليك التحسين أو إعادة البناء حسب حالته وأهدافك.',
        ],
        [
            'كيف تبدأ إعلانات جوجل وما الذي أحتاجه؟',
            'نحتاج أن نعرف نشاطك والمنطقة التي تستهدفها وميزانيتك الشهرية. بعدها نختار الكلمات المفتاحية وننشئ الحملة ونتابع نتائجها ونحسنها بشكل مستمر.',
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <script>
        document.documentElement.classList.add('js');
        // تفعيل طبقة الحركة فقط لو المستخدم ما طلبش تقليل الحركة
        if (!matchMedia('(prefers-reduced-motion: reduce)').matches) document.documentElement.classList.add('fx-on');
    </script>
    <noscript>
        <style>
            #loader {
                display: none !important
            }
        </style>
    </noscript>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>كوما تيك | حلول رقمية وبرمجية تصنع الفرق</title>
    <meta name="description"
        content="كوما تيك شركة متخصصة في تطوير المواقع والمتاجر الإلكترونية وتطبيقات الجوال والحلول البرمجية المخصصة والحملات الإعلانية الرقمية. نحول الأفكار إلى منتجات رقمية قابلة للنمو.">
    <meta name="keywords"
        content="تصميم مواقع, تطوير متاجر إلكترونية, تطبيقات جوال, حلول برمجية, تسويق رقمي, كوما تيك, comma tech">
    <meta name="author" content="كوما تيك | Comma Tech">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#ffffff">
    <meta name="color-scheme" content="light only">
    <link rel="canonical" href="https://comma-tech.online/">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://comma-tech.online/">
    <meta property="og:title" content="كوما تيك | حلول رقمية وبرمجية تصنع الفرق">
    <meta property="og:description"
        content="نحول الأفكار إلى منتجات رقمية قابلة للنمو: مواقع، متاجر إلكترونية، تطبيقات جوال، وحلول برمجية مخصصة.">
    <meta property="og:image" content="https://comma-tech.online/images/logo.jpg">
    <meta property="og:locale" content="ar_AR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="كوما تيك | حلول رقمية وبرمجية تصنع الفرق">
    <meta name="twitter:description"
        content="نحول الأفكار إلى منتجات رقمية قابلة للنمو: مواقع، متاجر إلكترونية، تطبيقات جوال، وحلول برمجية مخصصة.">
    <meta name="twitter:image" content="https://comma-tech.online/images/logo.jpg">

    <link rel="icon" type="image/png" href="{{ asset('images/logo-mark.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-mark.png') }}">

    @verbatim
        <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"Organization","name":"كوما تيك","alternateName":"Comma Tech","url":"https://comma-tech.online/","logo":"https://comma-tech.online/images/logo.jpg","description":"شركة متخصصة في تطوير المواقع والمتاجر الإلكترونية وتطبيقات الجوال والحلول البرمجية المخصصة والحملات الإعلانية الرقمية.","email":"comma.tech.dev@gmail.com","telephone":["+201228602122","+201289155883","+201289154294"],"sameAs":["https://www.facebook.com/profile.php?id=61592640578793","https://www.instagram.com/commatech7","https://x.com/commaTechc79c","https://www.tiktok.com/@comma2026","https://www.snapchat.com/add/commatech26"]}
    </script>
    @endverbatim

    <script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => collect($faqs)->map(fn ($f) => ['@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]]])->all()], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600&family=Readex+Pro:wght@500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css'])

    {{-- =====================================================================
         طبقة الحركة والتأثيرات (FX) — إضافية فوق app.css ولا تعدّل عليه
         كل الكلاسات هنا بتبدأ بـ fx- عشان ما تتعارضش مع الموجود
         ===================================================================== --}}
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

        /* ---------- Keyframes ---------- */
        @keyframes fx-blob {

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

        @keyframes fx-float {

            0%,
            100% {
                transform: translateY(0) rotate(0)
            }

            50% {
                transform: translateY(-12px) rotate(4deg)
            }
        }

        @keyframes fx-float-b {

            0%,
            100% {
                transform: translateY(0) rotate(0)
            }

            50% {
                transform: translateY(14px) rotate(-5deg)
            }
        }

        @keyframes fx-rise {
            0% {
                transform: translateY(0) rotate(0);
                opacity: 0
            }

            10%,
            85% {
                opacity: .2
            }

            100% {
                transform: translateY(-720px) rotate(40deg);
                opacity: 0
            }
        }

        @keyframes fx-bubble {
            0% {
                transform: translateY(0) scale(.6);
                opacity: 0
            }

            15% {
                opacity: .8
            }

            100% {
                transform: translateY(-460px) scale(1.25);
                opacity: 0
            }
        }

        @keyframes fx-grid-move {
            to {
                background-position: 30px 30px
            }
        }

        @keyframes fx-grad {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        @keyframes fx-pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 104, 253, .5)
            }

            80%,
            100% {
                box-shadow: 0 0 0 16px rgba(0, 104, 253, 0)
            }
        }

        @keyframes fx-dot {
            0% {
                box-shadow: 0 0 0 0 rgba(24, 227, 176, .6)
            }

            70%,
            100% {
                box-shadow: 0 0 0 10px rgba(24, 227, 176, 0)
            }
        }

        @keyframes fx-num {
            0% {
                box-shadow: 0 0 0 6px #fff, 0 0 0 6px rgba(4, 196, 244, .55)
            }

            70%,
            100% {
                box-shadow: 0 0 0 6px #fff, 0 0 0 22px rgba(4, 196, 244, 0)
            }
        }

        @keyframes fx-wiggle {

            0%,
            100% {
                transform: rotate(0)
            }

            20% {
                transform: rotate(-14deg)
            }

            40% {
                transform: rotate(12deg)
            }

            60% {
                transform: rotate(-8deg)
            }

            80% {
                transform: rotate(5deg)
            }
        }

        @keyframes fx-ring-phone {

            0%,
            14%,
            100% {
                transform: rotate(0)
            }

            3% {
                transform: rotate(-16deg)
            }

            6% {
                transform: rotate(14deg)
            }

            9% {
                transform: rotate(-10deg)
            }

            12% {
                transform: rotate(7deg)
            }
        }

        @keyframes fx-comma {

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

        @keyframes fx-travel {
            0% {
                right: 0;
                opacity: 0
            }

            8%,
            92% {
                opacity: 1
            }

            100% {
                right: 100%;
                opacity: 0
            }
        }

        @keyframes fx-shimmer {
            0% {
                background-position: 200% 0
            }

            100% {
                background-position: -200% 0
            }
        }

        @keyframes fx-sweep {

            0%,
            55% {
                left: -60%
            }

            100% {
                left: 130%
            }
        }

        @keyframes fx-spin {
            to {
                transform: rotate(360deg)
            }
        }

        @keyframes fx-dash {
            to {
                stroke-dashoffset: 0
            }
        }

        @keyframes fx-faq {
            from {
                opacity: 0;
                transform: translateY(-8px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes fx-drop {
            from {
                transform: translateY(-100%);
                opacity: 0
            }

            to {
                transform: none;
                opacity: 1
            }
        }

        @keyframes fx-menu {
            from {
                opacity: 0;
                transform: translateY(-10px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes fx-fab-in {
            from {
                opacity: 0;
                transform: translateX(-90px) scale(.5)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes fx-ring-wa {
            0% {
                box-shadow: 0 10px 24px -8px rgba(0, 0, 0, .35), 0 0 0 0 rgba(37, 211, 102, .55)
            }

            70%,
            100% {
                box-shadow: 0 10px 24px -8px rgba(0, 0, 0, .35), 0 0 0 18px rgba(37, 211, 102, 0)
            }
        }

        @keyframes fx-ring-call {
            0% {
                box-shadow: 0 10px 24px -8px rgba(0, 0, 0, .35), 0 0 0 0 rgba(0, 104, 253, .5)
            }

            70%,
            100% {
                box-shadow: 0 10px 24px -8px rgba(0, 0, 0, .35), 0 0 0 18px rgba(0, 104, 253, 0)
            }
        }

        @keyframes fx-nudge {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-3px)
            }
        }

        /* ---------- حركات الظهور عند التمرير ---------- */
        @keyframes fx-up {
            from {
                opacity: 0;
                transform: translateY(42px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes fx-blur {
            from {
                opacity: 0;
                transform: translateY(26px);
                filter: blur(10px)
            }

            to {
                opacity: 1;
                transform: none;
                filter: blur(0)
            }
        }

        @keyframes fx-left {
            from {
                opacity: 0;
                transform: translateX(-64px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes fx-right {
            from {
                opacity: 0;
                transform: translateX(64px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes fx-zoom {
            from {
                opacity: 0;
                transform: scale(.86) translateY(26px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes fx-flip {
            from {
                opacity: 0;
                transform: perspective(900px) rotateX(-26deg) translateY(34px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes fx-pop {
            from {
                opacity: 0;
                transform: scale(.6) translateY(18px)
            }

            60% {
                opacity: 1;
                transform: scale(1.05)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        [data-fx]:not(.fx-in) {
            opacity: 0
        }

        [data-fx].fx-in {
            animation-duration: .9s;
            animation-timing-function: cubic-bezier(.2, .8, .2, 1);
            animation-delay: var(--d, 0s);
            animation-fill-mode: both;
            animation-iteration-count: 1;
        }

        [data-fx="up"].fx-in {
            animation-name: fx-up
        }

        [data-fx="blur"].fx-in {
            animation-name: fx-blur
        }

        [data-fx="left"].fx-in {
            animation-name: fx-left
        }

        [data-fx="right"].fx-in {
            animation-name: fx-right
        }

        [data-fx="zoom"].fx-in {
            animation-name: fx-zoom
        }

        [data-fx="flip"].fx-in {
            animation-name: fx-flip
        }

        [data-fx="pop"].fx-in {
            animation-name: fx-pop
        }

        /* ---------- الهيدر والقوائم ---------- */
        .fx-on.ready #top {
            animation: fx-drop .8s cubic-bezier(.2, .8, .2, 1) backwards
        }

        .fx-logo img {
            transition: transform .45s cubic-bezier(.2, .8, .2, 1)
        }

        .fx-logo:hover img:first-child {
            transform: rotate(-10deg) scale(1.1)
        }

        .fx-link {
            position: relative
        }

        .fx-link::after {
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

        .fx-link:hover::after,
        .fx-link.active::after {
            transform: scaleX(1)
        }

        .fx-link.active {
            color: #0068FD
        }

        #mobileMenu:not(.hidden) {
            animation: fx-menu .3s ease
        }

        #mobileMenu:not(.hidden) a {
            animation: fx-menu .45s cubic-bezier(.2, .8, .2, 1) backwards
        }

        #mobileMenu:not(.hidden) a:nth-child(2) {
            animation-delay: .06s
        }

        #mobileMenu:not(.hidden) a:nth-child(3) {
            animation-delay: .12s
        }

        #mobileMenu:not(.hidden) a:nth-child(4) {
            animation-delay: .18s
        }

        /* ---------- الأزرار ---------- */
        [data-magnet] {
            transition: transform .2s ease-out, background-color .2s, color .2s, border-color .2s, box-shadow .2s
        }

        .fx-pulse {
            animation: fx-pulse 2.4s ease-out infinite
        }

        /* ---------- Hero ---------- */
        .fx-aurora {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0
        }

        .fx-par {
            position: absolute;
            inset: 0;
            transform: translate3d(0, calc(var(--sy, 0) * var(--s, .1) * 1px), 0)
        }

        .fx-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: .32;
            animation: fx-blob 18s ease-in-out infinite
        }

        .fx-grid {
            position: absolute;
            inset: 0;
            opacity: .55;
            background-image: radial-gradient(rgba(0, 104, 253, .25) 1.2px, transparent 1.5px);
            background-size: 30px 30px;
            -webkit-mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000 20%, transparent 75%);
            mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000 20%, transparent 75%);
            animation: fx-grid-move 26s linear infinite
        }

        .fx-glow {
            position: absolute;
            inset: 0;
            background: radial-gradient(520px circle at var(--mx, 72%) var(--my, 28%), rgba(4, 196, 244, .17), transparent 60%)
        }

        .fx-comma-p {
            position: absolute;
            bottom: -3rem;
            font-family: 'Readex Pro', sans-serif;
            font-weight: 700;
            line-height: 1;
            color: #0068FD;
            opacity: 0;
            animation: fx-rise linear infinite
        }

        .fx-comma-p:nth-child(3n) {
            color: #18E3B0
        }

        .fx-comma-p:nth-child(3n+1) {
            color: #04C4F4
        }

        .fx-comma {
            display: inline-block;
            transform-origin: 50% 90%;
            animation: fx-comma 2.8s ease-in-out infinite
        }

        .fx-tilt-wrap {
            perspective: 1100px
        }

        .fx-tilt {
            transform: rotateY(calc(var(--rx, 0) * 1deg)) rotateX(calc(var(--ry, 0) * 1deg));
            transition: transform .3s ease-out;
            transform-style: preserve-3d
        }

        .fx-orb {
            position: absolute;
            z-index: 2;
            display: grid;
            place-items: center;
            width: 3.1rem;
            height: 3.1rem;
            border-radius: 1rem;
            background: #fff;
            color: #0068FD;
            border: 1px solid rgba(14, 23, 38, .08);
            box-shadow: 0 18px 30px -14px rgba(14, 23, 38, .35);
            animation: fx-float var(--dur, 6s) ease-in-out infinite;
            animation-delay: var(--dl, 0s)
        }

        .fx-orb.alt {
            animation-name: fx-float-b
        }

        .fx-orb svg {
            width: 1.5rem;
            height: 1.5rem
        }

        .fx-skel {
            background-image: linear-gradient(90deg, transparent, rgba(255, 255, 255, .85), transparent);
            background-size: 200% 100%;
            animation: fx-shimmer 2.2s linear infinite
        }

        .fx-chip {
            transition: transform .25s, border-color .25s, color .25s, box-shadow .25s
        }

        .fx-chip:hover {
            transform: translateY(-3px);
            border-color: #0068FD;
            color: #0068FD;
            box-shadow: 0 10px 20px -12px rgba(0, 104, 253, .5)
        }

        .fx-dot {
            animation: fx-dot 2.6s ease-out infinite
        }

        /* ---------- البطاقات ---------- */
        .fx-card {
            position: relative;
            isolation: isolate;
            transition: transform .4s cubic-bezier(.2, .8, .2, 1), box-shadow .4s, border-color .4s
        }

        .fx-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 50px -26px rgba(0, 104, 253, .45);
            border-color: rgba(0, 104, 253, .4)
        }

        .fx-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
            opacity: 0;
            transition: opacity .3s;
            background: radial-gradient(360px circle at var(--mx, 50%) var(--my, 50%), rgba(4, 196, 244, .15), transparent 55%)
        }

        .fx-card:hover::before {
            opacity: 1
        }

        .fx-clip {
            overflow: hidden
        }

        .fx-gradient {
            background-size: 220% 220%;
            animation: fx-grad 10s ease infinite
        }

        .fx-soft {
            position: absolute;
            z-index: -1;
            border-radius: 50%;
            background: rgba(255, 255, 255, .13);
            pointer-events: none;
            animation: fx-float 7s ease-in-out infinite
        }

        .fx-ico {
            animation: fx-float 5.5s ease-in-out infinite;
            animation-delay: var(--dl, 0s)
        }

        .fx-card:hover .fx-ico {
            animation: fx-wiggle .8s ease
        }

        .fx-sheen {
            position: relative;
            overflow: hidden
        }

        .fx-sheen::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: -60%;
            width: 40%;
            transform: skewX(-18deg);
            pointer-events: none;
            background: linear-gradient(100deg, transparent, rgba(4, 196, 244, .16), transparent);
            animation: fx-sweep 6s ease-in-out infinite
        }

        .fx-sheen>div {
            transition: transform .3s
        }

        .fx-sheen>div:hover {
            transform: translateX(-8px)
        }

        .fx-li {
            transition: transform .3s cubic-bezier(.2, .8, .2, 1)
        }

        .fx-li:hover {
            transform: translateX(-8px)
        }

        .fx-li h3 {
            transition: color .25s
        }

        .fx-li:hover h3 {
            color: #0068FD
        }

        .fx-ring {
            animation: fx-dot 2.8s ease-out infinite;
            animation-delay: var(--dl, 0s)
        }

        .fx-h2 {
            position: relative;
            padding-bottom: .9rem
        }

        .fx-h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            inset-inline-start: 0;
            width: 3.5rem;
            height: 4px;
            border-radius: 99px;
            background: linear-gradient(90deg, #18E3B0, #04C4F4, #1B6DF0);
            transform: scaleX(0);
            transform-origin: 100% 50%;
            transition: transform .8s cubic-bezier(.2, .8, .2, 1) .35s
        }

        .fx-h2.fx-seen::after {
            transform: scaleX(1)
        }

        .fx-live .fx-draw path {
            stroke-dasharray: 26;
            stroke-dashoffset: 26
        }

        .fx-live .fx-seen .fx-draw path {
            animation: fx-dash .7s ease .4s forwards
        }

        .fx-ads {
            position: relative;
            overflow: hidden
        }

        .fx-ads>*:not(.fx-orbit) {
            position: relative;
            z-index: 1
        }

        .fx-orbit {
            position: absolute;
            top: -6rem;
            left: -6rem;
            width: 18rem;
            height: 18rem;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(34px);
            background: conic-gradient(rgba(24, 227, 176, .4), rgba(4, 196, 244, .06), rgba(0, 104, 253, .4), rgba(24, 227, 176, .4));
            animation: fx-spin 14s linear infinite
        }

        /* ---------- Marquee ---------- */
        .fx-marquee-rev .marquee-track {
            animation-direction: reverse
        }

        .marquee:hover .marquee-track {
            animation-play-state: paused
        }

        .fx-pill {
            transition: transform .25s, color .25s, border-color .25s, box-shadow .25s
        }

        .fx-pill:hover {
            transform: translateY(-4px) scale(1.04);
            color: #0068FD;
            border-color: #0068FD;
            box-shadow: 0 14px 24px -14px rgba(0, 104, 253, .5)
        }

        /* ---------- المنهجية ---------- */
        .fx-track {
            position: absolute;
            left: 6%;
            right: 6%;
            top: 1.75rem;
            height: 2px;
            pointer-events: none
        }

        .fx-travel {
            position: absolute;
            top: 50%;
            width: 14px;
            height: 14px;
            margin-top: -7px;
            border-radius: 50%;
            background: radial-gradient(circle, #fff 10%, #18E3B0 40%, #04C4F4);
            box-shadow: 0 0 14px 4px rgba(4, 196, 244, .55);
            animation: fx-travel 4.5s linear infinite
        }

        .fx-num {
            animation: fx-num 3s ease-out infinite;
            animation-delay: var(--dl, 0s);
            transition: transform .3s
        }

        .fx-num:hover {
            transform: scale(1.12) rotate(-6deg)
        }

        /* ---------- FAQ ---------- */
        .fx-faq summary {
            transition: color .25s
        }

        .fx-faq summary:hover {
            color: #0068FD
        }

        .fx-faq[open]>p {
            animation: fx-faq .4s ease both
        }

        /* ---------- CTA ---------- */
        .fx-bubble {
            position: absolute;
            bottom: -40px;
            z-index: -1;
            border-radius: 50%;
            background: rgba(255, 255, 255, .38);
            pointer-events: none;
            animation: fx-bubble linear infinite
        }

        .fx-soc {
            animation: fx-float 5s ease-in-out infinite
        }

        /* ---------- Footer ---------- */
        footer li>a {
            display: inline-block;
            transition: transform .25s, color .25s
        }

        footer li>a:hover {
            transform: translateX(-6px)
        }

        /* ---------- الأزرار العائمة ---------- */
        .fx-on .fab-wa {
            animation: fx-fab-in .9s cubic-bezier(.2, .9, .3, 1.3) 1.8s backwards, fx-ring-wa 2.6s ease-out 3s infinite
        }

        .fx-on .fab-call {
            animation: fx-fab-in .9s cubic-bezier(.2, .9, .3, 1.3) 2.1s backwards, fx-ring-call 2.6s ease-out 3.4s infinite
        }

        .fx-on .fab-wa svg {
            animation: fx-wiggle 5s ease-in-out 4s infinite
        }

        .fx-on .fab-call svg {
            animation: fx-ring-phone 5s ease-in-out 6.5s infinite
        }

        .fx-top {
            position: fixed;
            right: 1rem;
            bottom: calc(1.25rem + env(safe-area-inset-bottom, 0px));
            z-index: 40;
            display: grid;
            place-items: center;
            width: 3rem;
            height: 3rem;
            border: 0;
            border-radius: 50%;
            cursor: pointer;
            color: #0068FD;
            background: conic-gradient(#0068FD calc(var(--p, 0) * 1%), #E3E8F0 0);
            box-shadow: 0 10px 24px -10px rgba(14, 23, 38, .4);
            opacity: 0;
            transform: translateY(20px) scale(.8);
            pointer-events: none;
            transition: opacity .3s, transform .3s
        }

        .fx-top::before {
            content: "";
            position: absolute;
            inset: 3px;
            border-radius: 50%;
            background: #fff
        }

        .fx-top svg {
            position: relative;
            width: 1.2rem;
            height: 1.2rem
        }

        .fx-top.show {
            opacity: 1;
            transform: none;
            pointer-events: auto
        }

        .fx-top.show:hover {
            transform: translateY(-4px)
        }

        .fx-top.show:hover svg {
            animation: fx-nudge .8s ease-in-out infinite
        }

        /* ---------- تقليل الحركة ---------- */
        @media (prefers-reduced-motion: reduce) {

            .fx-blob,
            .fx-grid,
            .fx-comma-p,
            .fx-comma,
            .fx-orb,
            .fx-ico,
            .fx-dot,
            .fx-ring,
            .fx-num,
            .fx-travel,
            .fx-soc,
            .fx-pulse,
            .fx-skel,
            .fx-sheen::after,
            .fx-orbit,
            .fx-bubble,
            .fx-soft,
            .fx-gradient {
                animation: none !important
            }

            .fx-card,
            .fx-pill,
            .fx-li,
            .fx-chip,
            .fx-tilt,
            [data-magnet] {
                transition: none !important
            }
        }
    </style>
</head>

<body class="bg-paper text-ink antialiased">

    {{-- ===================== شاشة التحميل ===================== --}}
    <div id="loader" role="status" aria-live="polite">
        <div class="flex flex-col items-center">
            <div class="loader-stage">
                <span class="loader-ring"></span>
                <span class="loader-ring" style="animation-delay:.6s"></span>
                <img src="{{ asset('images/logo-mark.png') }}" alt="" class="loader-mark" width="96"
                    height="74">
            </div>
            <img src="{{ asset('images/logo-wordmark.png') }}" alt="comma_tech" class="loader-word" width="176"
                height="24">
            <div class="loader-track"><span class="loader-bar"></span></div>
            <span class="sr-only">جارٍ تحميل الصفحة...</span>
        </div>
    </div>

    {{-- ===================== Navbar ===================== --}}
    <header id="top" class="sticky top-0 z-50 border-b border-line bg-white/90 backdrop-blur">
        <div id="progress"
            class="absolute inset-x-0 top-0 h-[3px] origin-right scale-x-0 bg-gradient-to-l from-mint via-[#04C4F4] to-brand"
            aria-hidden="true"></div>
        <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6">

            <a href="{{ url('/') }}" class="fx-logo flex items-center gap-2.5" aria-label="كوما تيك - الرئيسية">
                <img src="{{ asset('images/logo-mark.png') }}" alt="" class="h-9 w-auto" width="47"
                    height="36">
                <img src="{{ asset('images/logo-wordmark.png') }}" alt="comma_tech" class="h-4 w-auto sm:h-5"
                    width="146" height="20">
            </a>

            <nav class="hidden items-center gap-8 text-[15px] font-medium md:flex" aria-label="التنقل الرئيسي">
                <a href="{{ url('/') }}" class="fx-link text-brand">الرئيسية</a>
                <a href="#about" class="fx-link text-ink/70 hover:text-brand">من نحن</a>
                <a href="#services" class="fx-link text-ink/70 hover:text-brand">خدماتنا</a>
                <a href="{{ route('blog.index') }}" class="fx-link text-ink/70 hover:text-brand">المدونة</a>
                <a href="#contact" class="fx-link text-ink/70 hover:text-brand">اتصل بنا</a>
            </nav>

            <div class="flex items-center gap-2">
                <a href="tel:+{{ $phones[0] }}" data-random-call
                    class="hidden h-10 w-10 place-items-center rounded-full border border-line text-ink/70 hover:border-brand hover:text-brand sm:grid"
                    aria-label="اتصل بنا">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372a1.125 1.125 0 0 0-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97a1.125 1.125 0 0 0 .417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                </a>
                <a href="https://wa.me/{{ $phones[0] }}" data-random-wa data-magnet target="_blank"
                    rel="noopener"
                    class="fx-pulse inline-flex h-10 items-center rounded-full bg-brand px-5 text-sm font-semibold text-white hover:bg-brand-dark">
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
                <a href="{{ url('/') }}" class="py-3 text-brand">الرئيسية</a>
                <a href="#about" class="py-3 text-ink/80">من نحن</a>
                <a href="#services" class="py-3 text-ink/80">خدماتنا</a>
                <a href="#contact" class="py-3 text-ink/80">اتصل بنا</a>
            </nav>
        </div>
    </header>

    <main>

        {{-- ===================== Hero ===================== --}}
        <section class="hero relative overflow-hidden bg-white">

            {{-- خلفية متحركة: شفق + نقاط + فواصل طايرة --}}
            <div class="fx-aurora" aria-hidden="true">
                <div class="fx-par" style="--s:.14"><span class="fx-blob"
                        style="top:-8rem;right:-6rem;width:30rem;height:30rem;background:#18E3B0"></span></div>
                <div class="fx-par" style="--s:-.08"><span class="fx-blob"
                        style="bottom:-10rem;left:20%;width:26rem;height:26rem;background:#04C4F4;animation-delay:-6s"></span>
                </div>
                <div class="fx-par" style="--s:.2"><span class="fx-blob"
                        style="top:30%;left:-8rem;width:24rem;height:24rem;background:#1B6DF0;opacity:.22;animation-delay:-11s"></span>
                </div>
                <span class="fx-grid"></span>
                <span class="fx-glow"></span>
                @foreach ([[8, 34, 14, 0], [22, 22, 17, 3], [37, 48, 19, 6], [52, 26, 15, 1.5], [66, 40, 18, 8], [78, 20, 13, 4], [90, 36, 16, 10], [15, 18, 20, 12], [60, 52, 21, 5]] as [$left, $size, $dur, $delay])
                    <span class="fx-comma-p"
                        style="left:{{ $left }}%;font-size:{{ $size }}px;animation-duration:{{ $dur }}s;animation-delay:-{{ $delay }}s">،</span>
                @endforeach
            </div>

            <img src="{{ asset('images/logo-mark.png') }}" alt="" aria-hidden="true"
                class="drift pointer-events-none absolute -left-24 top-1/2 w-[34rem] -translate-y-1/2 select-none opacity-[.09] sm:-left-16 sm:w-[44rem]">

            <div
                class="relative mx-auto grid max-w-6xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:py-24">

                <div>
                    <h1 style="--d:.1s"
                        class="hero-anim font-display text-4xl font-bold leading-[1.4] sm:text-5xl lg:text-[3.2rem]">
                        كل فكرة ناجحة تحتاج <span class="fx-comma text-brand">،</span><br>فاصلة تحولها إلى إنجاز حقيقي
                    </h1>
                    <p style="--d:.3s" class="hero-anim mt-6 font-display text-xl font-semibold text-brand">
                        نصمم ونبني لك <span id="rotator" class="rotator">موقعاً احترافياً</span>
                    </p>
                    <p style="--d:.45s" class="hero-anim mt-4 max-w-xl text-lg leading-9 text-ink/70">
                        في <strong class="font-semibold text-ink">كوما تيك</strong>، نحول الأفكار إلى منتجات رقمية
                        مصممة لتعمل بكفاءة وتنمو مع نجاحك. نطور المواقع والمتاجر الإلكترونية وتطبيقات الجوال والحلول
                        البرمجية المخصصة، ونبني حملات رقمية تصل بعلامتك إلى جمهورها المناسب.
                    </p>
                    <div style="--d:.6s" class="hero-anim mt-9 flex flex-wrap gap-3">
                        <a href="https://wa.me/{{ $phones[0] }}" data-random-wa data-magnet target="_blank"
                            rel="noopener"
                            class="fx-pulse shine shine-auto inline-flex h-12 items-center rounded-full bg-brand px-8 text-base font-semibold text-white shadow-sm hover:bg-brand-dark">
                            ابدأ مشروعك الآن
                        </a>
                        <a href="#services" data-magnet
                            class="shine inline-flex h-12 items-center rounded-full border border-line bg-white px-8 text-base font-semibold hover:border-brand hover:text-brand">
                            اكتشف خدماتنا
                        </a>
                    </div>
                    <ul style="--d:.75s"
                        class="hero-anim mt-8 flex flex-wrap gap-2 text-[13px] font-medium text-ink/70">
                        @foreach (['مواقع إلكترونية', 'متاجر إلكترونية', 'تطبيقات الجوال', 'حلول برمجية', 'تسويق رقمي'] as $chip)
                            <li
                                class="fx-chip flex items-center gap-2 rounded-full border border-line bg-white px-3.5 py-1.5">
                                <span class="fx-dot h-2 w-2 rounded-full border-2 border-mint"
                                    style="animation-delay:{{ $loop->index * 0.35 }}s"
                                    aria-hidden="true"></span>{{ $chip }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- مجسم: نافذة متصفح + نتائج الإعلانات + أيقونات طايرة --}}
                <div style="--d:.4s" class="hero-anim relative mx-auto w-full max-w-md lg:max-w-none"
                    aria-hidden="true">
                    <div class="fx-tilt-wrap">
                        <div class="fx-tilt" id="tilt">
                            <div
                                class="float-slow rounded-2xl border border-line bg-white shadow-[0_20px_50px_-20px_rgba(14,23,38,.25)]">
                                <div class="flex items-center gap-1.5 border-b border-line px-4 py-3">
                                    <span class="h-2.5 w-2.5 rounded-full bg-line"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-line"></span>
                                    <span class="h-2.5 w-2.5 rounded-full bg-line"></span>
                                    <span class="mr-3 h-5 flex-1 rounded-md bg-mist" dir="ltr"></span>
                                </div>
                                <div class="space-y-5 p-6">
                                    <div class="h-5 w-2/3 rounded bg-ink"></div>
                                    <div class="space-y-2">
                                        <div class="fx-skel h-3 w-full rounded bg-line"></div>
                                        <div class="fx-skel h-3 w-5/6 rounded bg-line" style="animation-delay:-.6s">
                                        </div>
                                    </div>
                                    <div
                                        class="fx-pulse flex h-9 w-32 items-center justify-center rounded-full bg-brand text-xs font-semibold text-white">
                                        اطلب الآن</div>

                                    <div class="rounded-xl bg-mist p-4">
                                        <div
                                            class="mb-3 flex items-center justify-between text-xs font-medium text-ink/60">
                                            <span>زيارات من الحملات الرقمية</span>
                                            <span class="rounded-full bg-mint/25 px-2 py-0.5 text-ink">Google
                                                Ads</span>
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

                    {{-- أيقونات طايرة حوالين المجسم --}}
                    <span class="fx-orb" style="top:-1.5rem;right:-.6rem;--dur:6.5s">
                        <svg fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 8h16l-1.5 10a2 2 0 0 1-2 1.7h-9a2 2 0 0 1-2-1.7L4 8Z" />
                            <path stroke-linecap="round" d="M8 8V6a4 4 0 0 1 8 0v2" />
                        </svg>
                    </span>
                    <span class="fx-orb alt" style="bottom:2.5rem;left:-1.4rem;--dur:7.5s;--dl:-2s">
                        <svg fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                            <rect x="7" y="2.5" width="10" height="19" rx="2.4" />
                            <path stroke-linecap="round" d="M11 18.2h2" />
                        </svg>
                    </span>
                    <span class="fx-orb" style="top:42%;right:-1.6rem;--dur:8s;--dl:-4s">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 8l-4 4 4 4M16 8l4 4-4 4M14 5l-4 14" />
                        </svg>
                    </span>
                    <span class="fx-orb alt" style="bottom:-1.3rem;right:28%;--dur:6s;--dl:-1s">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 17l6-6 4 4 8-8M15 7h6v6" />
                        </svg>
                    </span>
                </div>
            </div>
        </section>

        {{-- ===================== About: لماذا كوما تيك ===================== --}}
        <section id="about" class="bg-mist py-20">
            <div class="mx-auto grid max-w-6xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:gap-16">

                <div class="order-2 lg:order-1">
                    <h2 class="font-display text-3xl font-bold leading-snug sm:text-4xl">لماذا كوما تيك؟</h2>
                    <p class="mt-4 max-w-xl text-lg leading-9 text-ink/70">
                        لأننا لا نتعامل مع المشروع كصفحة أو تطبيق فقط، بل نبنيه كحل رقمي يخدم أهداف عملك اليوم ويستعد
                        لنموه غداً.
                    </p>

                    <ul class="mt-9 space-y-7">
                        @foreach ([['وضوح وتواصل مستمر', 'نوضح لك مراحل التنفيذ والتحديثات والتفاصيل المهمة لتكون دائماً على اطلاع بما يحدث في مشروعك.'], ['تقنية قابلة للتوسع', 'نبني الأنظمة بهندسة منظمة تسمح بإضافة الخصائص والتطوير مستقبلاً دون إعادة بناء المشروع من الصفر.'], ['جودة والتزام', 'نضع خطة واضحة للتنفيذ ونختبر المشروع قبل الإطلاق لضمان أفضل مستوى من الجودة والاستقرار.']] as [$title, $text])
                            <li class="fx-li flex gap-4">
                                <span
                                    class="fx-ring mt-1 grid h-8 w-8 shrink-0 place-items-center rounded-full border-[3px] border-mint"
                                    style="--dl:{{ $loop->index * 0.5 }}s" aria-hidden="true">
                                    <span class="h-2 w-2 rounded-full bg-brand"></span>
                                </span>
                                <div>
                                    <h3 class="font-display text-base font-semibold">{{ $title }}</h3>
                                    <p class="mt-1 text-[15px] leading-7 text-ink/70">{{ $text }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <dl
                    class="fx-sheen order-1 rounded-3xl border border-line bg-white p-6 shadow-[0_24px_50px_-34px_rgba(0,104,253,.35)] sm:p-8 lg:order-2">
                    @foreach ([['+40', 'مشروعاً تم تنفيذه وتطويره'], ['100%', 'حلول مخصصة وفق احتياجات المشروع'], ['24/7', 'دعم ومتابعة مستمرة بعد الإطلاق'], ['1 → ∞', 'نبدأ من الفكرة ونبني حلولاً قابلة للنمو']] as [$num, $label])
                        <div class="flex items-center gap-5 py-5 {{ $loop->last ? '' : 'border-b border-line' }}">
                            <dt class="w-24 shrink-0 bg-gradient-to-l from-[#0068FD] to-[#00C9E0] bg-clip-text font-display text-2xl font-bold text-transparent sm:w-28 sm:text-3xl"
                                dir="ltr">{{ $num }}</dt>
                            <dd class="text-[15px] font-medium text-ink/70">{{ $label }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </section>

        {{-- ===================== Services ===================== --}}
        <section id="services" class="py-20">
            <div class="mx-auto max-w-6xl px-4 sm:px-6">
                <div class="max-w-2xl">
                    <h2 class="font-display text-3xl font-bold leading-snug sm:text-4xl">حلول رقمية متكاملة لعملك</h2>
                    <p class="mt-4 text-lg leading-8 text-ink/70">
                        نبدأ بفهم احتياجك، ثم نصمم ونطور الحل المناسب ليكون سريعاً، آمناً، قابلاً للتوسع ومصمماً حول
                        أهداف مشروعك.
                    </p>
                </div>

                <div class="mt-12 grid gap-5 md:grid-cols-3">

                    {{-- 1: الخدمة الرئيسية (بطاقة أكبر بتدرج اللوجو) --}}
                    <article
                        class="fx-card fx-clip fx-gradient flex flex-col rounded-3xl bg-gradient-to-br from-[#0A8DF0] to-[#0050D1] p-8 text-white sm:p-10 md:col-span-2">
                        <span class="fx-soft" style="top:-3rem;left:-2rem;width:11rem;height:11rem"
                            aria-hidden="true"></span>
                        <span class="fx-soft"
                            style="bottom:-3.5rem;right:22%;width:8rem;height:8rem;animation-delay:-3s"
                            aria-hidden="true"></span>
                        <svg class="fx-ico h-10 w-10" fill="none" stroke="currentColor" stroke-width="1.6"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <rect x="3" y="4" width="18" height="14" rx="2" />
                            <path d="M3 9h18" />
                        </svg>
                        <h3 class="mt-6 font-display text-2xl font-semibold">تصميم وتطوير المواقع</h3>
                        <p class="mt-3 max-w-xl leading-8 text-white/90">
                            مواقع احترافية سريعة ومتجاوبة، مصممة لتقديم تجربة استخدام ممتازة، مع بنية تقنية قوية وتهيئة
                            لمحركات البحث SEO.
                        </p>
                        <a href="https://wa.me/{{ $phones[0] }}" data-random-wa data-magnet
                            data-wa-text="أرغب في تصميم موقع إلكتروني" target="_blank" rel="noopener"
                            class="shine mt-8 inline-flex h-11 w-fit items-center rounded-full bg-white px-6 text-sm font-semibold text-brand hover:bg-brand-soft">
                            اطلب موقعك
                        </a>
                    </article>

                    {{-- 2: المتاجر --}}
                    <article class="fx-card rounded-3xl border border-line bg-white p-8">
                        <svg class="fx-ico h-9 w-9 text-brand" style="--dl:-1s" fill="none" stroke="currentColor"
                            stroke-width="1.6" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 8h16l-1.5 10a2 2 0 0 1-2 1.7h-9a2 2 0 0 1-2-1.7L4 8Z" />
                            <path stroke-linecap="round" d="M8 8V6a4 4 0 0 1 8 0v2" />
                        </svg>
                        <h3 class="mt-5 font-display text-xl font-semibold">المتاجر الإلكترونية</h3>
                        <p class="mt-3 text-[15px] leading-8 text-ink/70">متاجر متكاملة مع بوابات الدفع والشحن وإدارة
                            المنتجات والمخزون، وتجربة شراء مصممة لتحويل الزائر إلى عميل.</p>
                    </article>

                    {{-- 3: التطبيقات --}}
                    <article class="fx-card rounded-3xl border border-line bg-white p-8">
                        <svg class="fx-ico h-9 w-9 text-brand" style="--dl:-2s" fill="none" stroke="currentColor"
                            stroke-width="1.6" viewBox="0 0 24 24" aria-hidden="true">
                            <rect x="7" y="2.5" width="10" height="19" rx="2.4" />
                            <path stroke-linecap="round" d="M11 18.2h2" />
                        </svg>
                        <h3 class="mt-5 font-display text-xl font-semibold">تطبيقات الجوال</h3>
                        <p class="mt-3 text-[15px] leading-8 text-ink/70">تطبيقات iOS وAndroid تجمع بين الأداء العالي
                            والتصميم العصري وتجربة الاستخدام السلسة التي تقرب منتجك من عملائك.</p>
                    </article>

                    {{-- 4: الحملات --}}
                    <article class="fx-card rounded-3xl border border-line bg-white p-8">
                        <svg class="fx-ico h-9 w-9 text-brand" style="--dl:-3s" fill="none" stroke="currentColor"
                            stroke-width="1.6" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 15V9l6-4v14l-6-4Z" />
                            <path stroke-linecap="round" d="M14 6.5c2 1 2 10 0 11M17 4c3.2 2.4 3.2 13.6 0 16" />
                        </svg>
                        <h3 class="mt-5 font-display text-xl font-semibold">الحملات الإعلانية الرقمية</h3>
                        <p class="mt-3 text-[15px] leading-8 text-ink/70">حملات مبنية على البيانات وتحليل الجمهور،
                            للوصول للعملاء المناسبين وتحقيق أفضل عائد من ميزانيتك الإعلانية.</p>
                        <a href="https://wa.me/{{ $phones[0] }}" data-random-wa
                            data-wa-text="أرغب في إطلاق حملة إعلانية رقمية" target="_blank" rel="noopener"
                            class="mt-5 inline-block text-sm font-semibold text-brand hover:text-brand-dark">ابدأ
                            حملتك</a>
                    </article>

                    {{-- 5: الحلول المخصصة --}}
                    <article class="fx-card rounded-3xl border border-line bg-white p-8 md:col-span-1">
                        <svg class="fx-ico h-9 w-9 text-brand" style="--dl:-4s" fill="none" stroke="currentColor"
                            stroke-width="1.6" viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="12" cy="12" r="3.2" />
                            <path stroke-linecap="round"
                                d="M12 3v2.4M12 18.6V21M21 12h-2.4M5.4 12H3M18 6l-1.6 1.6M7.6 16.4 6 18M18 18l-1.6-1.6M7.6 7.6 6 6" />
                        </svg>
                        <h3 class="mt-5 font-display text-xl font-semibold">الحلول البرمجية المخصصة</h3>
                        <p class="mt-3 text-[15px] leading-8 text-ink/70">أنظمة ولوحات تحكم وأدوات داخلية مصممة خصيصاً
                            لطبيعة عملك، تساعدك على أتمتة العمليات ورفع الكفاءة وتقليل الوقت والتكاليف.</p>
                    </article>
                </div>
            </div>
        </section>

        {{-- ===================== What every project includes ===================== --}}
        <section class="bg-mist py-20">
            <div class="mx-auto grid max-w-6xl gap-12 px-4 sm:px-6 lg:grid-cols-3">
                <div>
                    <h2 class="font-display text-3xl font-bold leading-snug sm:text-4xl">كل مشروع معنا يشمل</h2>
                    <p class="mt-4 text-lg leading-8 text-ink/70">أساسيات لا نعتبرها إضافات، لأن نجاح أي منتج رقمي يبدأ
                        منها.</p>
                </div>

                <ul class="grid gap-x-10 sm:grid-cols-2 lg:col-span-2">
                    @foreach ([['تصميم متجاوب', 'يعمل بكفاءة على الجوال والتابلت والكمبيوتر بتجربة واحدة متناسقة.'], ['سرعة تحميل', 'صور وملفات محسّنة حتى لا يغادر الزائر قبل أن تظهر الصفحة.'], ['تهيئة لمحركات البحث', 'عناوين ووصف وبنية صحيحة تساعد جوجل على فهم موقعك وأرشفته.'], ['أمان وحماية', 'تأمين الموقع ونماذجه وبيانات عملائك وفق أفضل الممارسات.'], ['لوحة تحكم سهلة', 'تعدّل المحتوى والمنتجات بنفسك دون الرجوع إلى مبرمج.'], ['دعم عربي كامل', 'واجهات من اليمين لليسار ومحتوى عربي، مع إمكانية إضافة لغات أخرى.']] as [$title, $text])
                        <li class="fx-li flex gap-4 border-t border-line py-6">
                            <span
                                class="fx-ring mt-1 grid h-7 w-7 shrink-0 place-items-center rounded-full border-[3px] border-mint"
                                style="--dl:{{ $loop->index * 0.4 }}s" aria-hidden="true">
                                <span class="h-1.5 w-1.5 rounded-full bg-brand"></span>
                            </span>
                            <div>
                                <h3 class="font-display text-base font-semibold">{{ $title }}</h3>
                                <p class="mt-1 text-[15px] leading-7 text-ink/70">{{ $text }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        {{-- ===================== Google Ads spotlight ===================== --}}
        <section id="ads" class="py-20">
            <div class="mx-auto grid max-w-6xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:gap-16">
                <div>
                    <h2 class="font-display text-3xl font-bold leading-snug sm:text-4xl">إعلانات جوجل التي تجلب عملاء،
                        لا زيارات فقط</h2>
                    <p class="mt-4 max-w-xl text-lg leading-9 text-ink/70">
                        الموقع الجيد يحتاج من يصل إليه. نبني حملاتك على كلمات يبحث بها عملاؤك فعلاً، ونقيس ما يهم نشاطك:
                        المكالمات والرسائل والطلبات، وليس عدد النقرات وحده.
                    </p>

                    <dl class="mt-8 space-y-5">
                        @foreach ([['حملات البحث', 'يظهر إعلانك في اللحظة التي يبحث فيها العميل عن خدمتك أو منتجك.'], ['حملات العرض ويوتيوب', 'تذكّر الزوار بعلامتك وتصل إلى جمهور جديد مهتم بمجالك.'], ['إعلانات التسوق', 'تعرض منتجات متجرك بصورها وأسعارها مباشرة في نتائج جوجل.']] as [$title, $text])
                            <div>
                                <dt class="font-display text-base font-semibold">{{ $title }}</dt>
                                <dd class="mt-1 text-[15px] leading-7 text-ink/70">{{ $text }}</dd>
                            </div>
                        @endforeach
                    </dl>

                    <a href="https://wa.me/{{ $phones[0] }}" data-random-wa data-magnet
                        data-wa-text="أرغب في إطلاق حملة إعلانية على جوجل" target="_blank" rel="noopener"
                        class="shine mt-9 inline-flex h-12 items-center rounded-full bg-brand px-8 text-base font-semibold text-white hover:bg-brand-dark">
                        ابدأ حملتك
                    </a>
                </div>

                <div class="fx-ads rounded-3xl bg-brand-soft p-8 sm:p-10">
                    <span class="fx-orbit" aria-hidden="true"></span>
                    <h3 class="font-display text-xl font-semibold">ما الذي نتابعه لك؟</h3>
                    <ul class="mt-6 space-y-4 text-[15px]">
                        @foreach (['عدد المكالمات والرسائل والطلبات الناتجة عن الإعلان', 'تكلفة كل عميل محتمل مقارنة بميزانيتك', 'الكلمات المفتاحية التي تجلب نتائج وتلك التي تهدر المال', 'أداء الإعلان حسب المدينة والجهاز والوقت'] as $item)
                            <li class="flex items-start gap-3">
                                <svg class="fx-draw mt-1 h-5 w-5 shrink-0 text-brand" fill="none"
                                    stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                <span class="leading-7 text-ink/80">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <p class="mt-7 border-t border-brand/15 pt-6 text-[15px] leading-7 text-ink/70">
                        ونرسل لك تقريراً دورياً بلغة واضحة يشرح ما أنفقته وما حققته وما سنغيره في الفترة القادمة.
                    </p>
                </div>
            </div>
        </section>

        {{-- ===================== Technologies ===================== --}}
        <section class="overflow-hidden bg-mist py-16">
            <div class="mx-auto max-w-6xl px-4 sm:px-6">
                <h2 class="font-display text-2xl font-bold leading-snug sm:text-3xl">التقنيات التي نعمل بها</h2>
                <p class="mt-3 leading-8 text-ink/70">نختار الأدوات التي تناسب مشروعك، لا الأكثر رواجاً.</p>
            </div>

            @php $techs = ['Laravel', 'PHP', 'React', 'TypeScript', 'Inertia.js', 'Tailwind CSS', 'MySQL', 'Google Ads', 'Google Analytics', 'SEO']; @endphp
            <div class="marquee mt-10" dir="ltr">
                <div class="marquee-track">
                    @foreach ([false, true] as $hidden)
                        <ul class="flex shrink-0 gap-3 pr-3"
                            @if ($hidden) aria-hidden="true" @endif>
                            @foreach ($techs as $tech)
                                <li
                                    class="fx-pill rounded-full border border-line bg-white px-6 py-3 font-display text-base font-medium">
                                    {{ $tech }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>

            {{-- صف تاني بيتحرك في الاتجاه المعاكس --}}
            <div class="marquee fx-marquee-rev mt-4" dir="ltr" aria-hidden="true">
                <div class="marquee-track">
                    @foreach ([false, true] as $hidden)
                        <ul class="flex shrink-0 gap-3 pr-3">
                            @foreach (array_reverse($techs) as $tech)
                                <li
                                    class="fx-pill rounded-full border border-line bg-white px-6 py-3 font-display text-base font-medium">
                                    {{ $tech }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===================== Process ===================== --}}
        <section id="process" class="py-20">
            <div class="mx-auto max-w-6xl px-4 sm:px-6">
                <div class="max-w-2xl">
                    <h2 class="font-display text-3xl font-bold leading-snug sm:text-4xl">من الفكرة إلى الإطلاق</h2>
                    <p class="mt-4 text-lg leading-8 text-ink/70">
                        نعمل بمنهجية واضحة تقلل المخاطر وتضمن أن كل مرحلة من مراحل المشروع تخدم الهدف النهائي.
                    </p>
                </div>

                <ol class="relative mt-14 grid gap-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">
                    <span
                        class="absolute inset-x-[6%] top-7 draw-line hidden h-0.5 bg-gradient-to-l from-brand/40 via-[#04C4F4]/40 to-mint/50 lg:block"
                        aria-hidden="true"></span>
                    {{-- نقطة مضيئة بتجري على خط المنهجية --}}
                    <span class="fx-track hidden lg:block" aria-hidden="true"><i class="fx-travel"></i></span>
                    @foreach ([['الفهم والتحليل', 'نفهم فكرتك وأهدافك ونحلل احتياجات المستخدم والسوق لتحديد أفضل اتجاه للمشروع.'], ['التخطيط والتصميم', 'نحدد هيكل المشروع ونصمم تجربة المستخدم والواجهات بما يناسب علامتك التجارية.'], ['التطوير والاختبار', 'نحول التصميم إلى منتج حقيقي مع اختبار الأداء والأمان وتجربة الاستخدام قبل الإطلاق.'], ['الإطلاق والتطوير', 'نطلق المشروع ونتابع أداءه ونوفر الدعم والتطوير المستمر لمواكبة احتياجات عملك.']] as $i => [$title, $text])
                        <li class="relative">
                            <span
                                class="fx-num relative z-10 grid h-14 w-14 place-items-center rounded-full border-[3px] border-[#04C4F4] bg-white font-display text-base font-bold text-brand shadow-[0_0_0_6px_#fff]"
                                style="--dl:{{ $i * 0.7 }}s"
                                dir="ltr">{{ sprintf('%02d', $i + 1) }}</span>
                            <h3 class="mt-5 font-display text-lg font-semibold">{{ $title }}</h3>
                            <p class="mt-2 text-[15px] leading-7 text-ink/70">{{ $text }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>

        {{-- ===================== Audience ===================== --}}
        <section class="bg-mist py-20">
            <div class="mx-auto grid max-w-6xl gap-12 px-4 sm:px-6 lg:grid-cols-5">
                <div class="lg:col-span-2">
                    <h2 class="font-display text-3xl font-bold leading-snug sm:text-4xl">لمن نعمل؟</h2>
                    <p class="mt-4 text-lg leading-8 text-ink/70">
                        نخدم عملاء في مصر ودول الخليج، من صاحب الفكرة الأولى إلى الشركة التي تريد تطوير حضورها الرقمي.
                    </p>
                </div>

                <ul class="lg:col-span-3">
                    @foreach ([['الشركات الناشئة', 'حضور رقمي سريع بتكلفة مدروسة، وقابل للنمو حين يكبر نشاطك.'], ['الشركات والمؤسسات', 'موقع رسمي يعكس مكانتك، وأنظمة داخلية تختصر الوقت وتنظم العمل.'], ['أصحاب المتاجر', 'متجر إلكتروني جاهز للبيع، وإعلانات تجلب له مشترين فعليين.'], ['أصحاب الأفكار والمشاريع', 'نساعدك على تحويل الفكرة إلى منتج رقمي واضح قبل أن تستثمر في تنفيذه.']] as [$title, $text])
                        <li
                            class="fx-li flex flex-col gap-1 border-t border-line py-6 sm:flex-row sm:items-baseline sm:gap-8">
                            <h3 class="font-display text-lg font-semibold sm:w-48 sm:shrink-0">{{ $title }}
                            </h3>
                            <p class="text-[15px] leading-8 text-ink/70">{{ $text }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        {{-- ===================== FAQ ===================== --}}
        <section id="faq" class="py-20">
            <div class="mx-auto grid max-w-6xl gap-12 px-4 sm:px-6 lg:grid-cols-5">
                <div class="lg:col-span-2">
                    <h2 class="font-display text-3xl font-bold leading-snug sm:text-4xl">الأسئلة الشائعة</h2>
                    <p class="mt-4 text-lg leading-8 text-ink/70">
                        لم تجد إجابة سؤالك؟ <a href="https://wa.me/{{ $phones[0] }}" data-random-wa
                            target="_blank" rel="noopener"
                            class="font-semibold text-brand hover:text-brand-dark">اسألنا مباشرة عبر واتساب</a>.
                    </p>
                </div>

                <div class="lg:col-span-3">
                    @foreach ($faqs as [$q, $a])
                        <details class="fx-faq group border-t border-line py-5 last:border-b"
                            @if ($loop->first) open @endif>
                            <summary
                                class="flex cursor-pointer list-none items-center justify-between gap-6 font-display text-base font-semibold [&::-webkit-details-marker]:hidden">
                                {{ $q }}
                                <svg class="h-5 w-5 shrink-0 text-brand transition-transform group-open:rotate-45"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" d="M12 5v14M5 12h14" />
                                </svg>
                            </summary>
                            <p class="mt-3 max-w-2xl text-[15px] leading-8 text-ink/70">{{ $a }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===================== CTA ===================== --}}
        <section class="px-4 pb-20 sm:px-6">
            <div
                class="relative isolate gradient-move mx-auto max-w-6xl overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#18E3B0] via-[#04C4F4] to-[#1B6DF0] px-6 py-16 text-center sm:px-12">
                <span
                    class="float-slow pointer-events-none absolute -right-10 -top-16 -z-10 h-56 w-56 rounded-full bg-white/25 blur-2xl"
                    aria-hidden="true"></span>
                <span
                    class="float-slow pointer-events-none absolute -bottom-20 -left-10 -z-10 h-64 w-64 rounded-full bg-white/20 blur-2xl"
                    style="animation-delay:-3s" aria-hidden="true"></span>

                {{-- فقاقيع طالعة --}}
                @foreach ([[8, 18, 9, 0], [20, 10, 12, 2], [34, 24, 10, 5], [48, 12, 13, 1], [62, 20, 11, 6], [76, 14, 9, 3], [88, 22, 12, 7]] as [$left, $size, $dur, $delay])
                    <span class="fx-bubble"
                        style="left:{{ $left }}%;width:{{ $size }}px;height:{{ $size }}px;animation-duration:{{ $dur }}s;animation-delay:-{{ $delay }}s"
                        aria-hidden="true"></span>
                @endforeach

                <h2 class="font-display text-3xl font-bold leading-snug text-[#04141A] sm:text-5xl sm:leading-snug">
                    لديك فكرة؟<br>لنضع لها فاصلة.
                </h2>
                <p class="mx-auto mt-4 max-w-xl text-base font-medium leading-8 text-[#04141A]/80 sm:text-lg">
                    أخبرنا عن مشروعك، وسنساعدك في تحويل الفكرة إلى خطة واضحة وحل رقمي قابل للتنفيذ والنمو.
                </p>

                <div class="mt-8 flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
                    <a href="https://wa.me/{{ $phones[0] }}" data-random-wa data-magnet target="_blank"
                        rel="noopener"
                        class="shine inline-flex h-12 items-center justify-center rounded-full bg-ink px-8 text-base font-semibold text-white hover:bg-black">
                        تواصل معنا عبر واتساب
                    </a>
                    <a href="mailto:comma.tech.dev@gmail.com" data-magnet
                        class="shine inline-flex h-12 items-center justify-center rounded-full bg-white/90 px-8 text-base font-semibold text-ink hover:bg-white">
                        راسلنا عبر البريد
                    </a>
                </div>

                <ul class="mt-8 flex justify-center gap-2.5">
                    @foreach ([['Facebook', 'https://www.facebook.com/profile.php?id=61592640578793', 'M15 8.5h2V5.2h-2c-2.2 0-3.5 1.4-3.5 3.6v2.1H9.5v3.2h2V22h3.2v-7.9h2.4l.4-3.2h-2.8V8.9c0-.6.3-.9 1-.9Z'], ['Instagram', 'https://www.instagram.com/commatech7', null], ['X', 'https://x.com/commaTechc79c', 'M4 4l16 16M20 4 4 20'], ['TikTok', 'https://www.tiktok.com/@comma2026', 'M14 3.5c.6 2 2.1 3.3 4.2 3.5v2.6a6.7 6.7 0 0 1-4.2-1.5v6.4a5 5 0 1 1-4.3-5v2.7a2.3 2.3 0 1 0 1.7 2.3V3.5H14Z'], ['Snapchat', 'https://www.snapchat.com/add/commatech26', 'M12 3.5c2.4 0 4 1.9 3.9 4.4l-.1 2c1 .1 1.4-.5 1.6-.5.4 0 .8.3.8.7 0 .6-1 .9-1 1.3 0 .3.7 1.1 2 1.4.3 0 .5.6.1.9-.3.3-1 .5-1.8.7-.1.3 0 .8-.3 1-.4.2-1.3 0-2 .3-.6.3-1.1 1.3-3.2 1.3s-2.6-1-3.2-1.3c-.7-.3-1.6-.1-2-.3-.3-.2-.2-.7-.3-1-.8-.2-1.5-.4-1.8-.7-.4-.3-.2-.9.1-.9 1.3-.3 2-1.100 2-1.400 0-.4.4-.7.8-.7.2 0 .6.6 1.600.5l-.1-2C8 5.400 9.600 3.500 12 3.500Z']] as [$name, $href, $path])
                        <li class="fx-soc" style="animation-delay:-{{ $loop->index * 0.8 }}s">
                            <a href="{{ $href }}" target="_blank" rel="noopener"
                                aria-label="{{ $name }}"
                                class="grid h-11 w-11 place-items-center rounded-xl bg-white/90 text-ink transition hover:-translate-y-0.5 hover:bg-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    @if ($path)
                                        <path d="{{ $path }}" />
                                    @else
                                        <rect x="3.5" y="3.5" width="17" height="17" rx="5" />
                                        <circle cx="12" cy="12" r="3.6" />
                                        <circle cx="16.6" cy="7.4" r=".9" fill="currentColor"
                                            stroke="none" />
                                    @endif
                                </svg>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

    </main>

    {{-- ===================== Footer ===================== --}}
    <footer id="contact" class="border-t border-line bg-white">
        <div class="mx-auto grid max-w-6xl gap-12 px-4 py-16 sm:px-6 md:grid-cols-3">

            <div>
                <a href="{{ url('/') }}" class="fx-logo flex items-center gap-2.5" aria-label="كوما تيك">
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
                    <li><a href="#about" class="hover:text-brand">من نحن</a></li>
                    <li><a href="#services" class="hover:text-brand">خدماتنا</a></li>
                    <li><a href="#process" class="hover:text-brand">كيف نعمل؟</a></li>
                    <li><a href="#faq" class="hover:text-brand">الأسئلة الشائعة</a></li>
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

    {{-- ===================== أزرار عائمة: واتساب واتصال (رقم عشوائي من الأرقام الثلاثة) ===================== --}}
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

    {{-- زرار العودة للأعلى مع حلقة تقدم التمرير --}}
    <button id="toTop" type="button" class="fx-top" aria-label="العودة للأعلى">
        <svg fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <script>
        (() => {
            const html = document.documentElement;
            const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
            const finePointer = matchMedia('(pointer: fine)').matches;

            // ---------- شاشة التحميل ----------
            const loader = document.getElementById('loader');
            const t0 = performance.now(),
                MIN = 1300;
            let finished = false;

            function finish() {
                if (finished) return;
                finished = true;
                const wait = Math.max(0, MIN - (performance.now() - t0));
                setTimeout(() => {
                    loader.classList.add('done');
                    html.classList.add('ready');
                    setTimeout(() => loader.remove(), 900);
                }, wait);
            }
            if (reduce) {
                html.classList.add('ready');
                loader.remove();
                finished = true;
            } else if (document.readyState === 'complete') finish();
            else addEventListener('load', finish);
            setTimeout(finish, 5000); // أمان: لا تعلق الصفحة أبداً

            // ---------- أزرار الاتصال وواتساب بأرقام عشوائية ----------
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

            // ---------- قائمة الجوال ----------
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

            // ---------- شريط التقدم + ظل الهيدر + زرار الأعلى + تمييز القسم الحالي ----------
            const header = document.getElementById('top');
            const progress = document.getElementById('progress');
            const toTop = document.getElementById('toTop');
            const hero = document.querySelector('.hero');
            const spyLinks = [...document.querySelectorAll('#top nav a[href^="#"]')];
            const spyIds = ['about', 'services', 'ads', 'process', 'faq', 'contact'];
            const spyMap = {
                about: '#about',
                services: '#services',
                contact: '#contact'
            };
            let ticking = false;

            function onScroll() {
                const max = document.documentElement.scrollHeight - innerHeight;
                const ratio = max > 0 ? Math.min(scrollY / max, 1) : 0;
                progress.style.transform = 'scaleX(' + ratio + ')';
                header.classList.toggle('scrolled', scrollY > 10);

                toTop.style.setProperty('--p', (ratio * 100).toFixed(1));
                toTop.classList.toggle('show', scrollY > 700);

                // باراالاكس للخلفية (على الهيرو بس)
                if (hero && scrollY < hero.offsetHeight + 200) hero.style.setProperty('--sy', scrollY);

                // تمييز رابط القسم الحالي في الـ navbar
                let current = null;
                spyIds.forEach(id => {
                    const s = document.getElementById(id);
                    if (s && s.getBoundingClientRect().top < innerHeight * 0.35) current = id;
                });
                const href = current ? spyMap[current] : null;
                spyLinks.forEach(a => a.classList.toggle('active', !!href && a.getAttribute('href') === href));

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

            toTop.addEventListener('click', () => scrollTo({
                top: 0,
                behavior: reduce ? 'auto' : 'smooth'
            }));

            if (reduce) return;

            // ===================== من هنا: الحركات (مش بتشتغل مع تقليل الحركة) =====================
            html.classList.add('fx-live');

            // ---------- كلمات متبدلة في الهيرو ----------
            const rotator = document.getElementById('rotator');
            const words = ['موقعاً احترافياً', 'متجراً إلكترونياً', 'تطبيقاً للجوال', 'حملة إعلانية ناجحة',
                'نظاماً برمجياً مخصصاً'
            ];
            let wi = 0;
            setInterval(() => {
                wi = (wi + 1) % words.length;
                rotator.classList.remove('swap');
                void rotator.offsetWidth;
                rotator.textContent = words[wi];
                rotator.classList.add('swap');
            }, 2600);

            // ---------- ظهور العناصر عند التمرير (أنواع مختلفة من الحركة) ----------
            document.querySelectorAll('main section:not(.hero) h2').forEach(h => {
                if (!h.closest('.gradient-move')) h.classList.add('fx-h2');
            });

            const targets = [...document.querySelectorAll(
                    'main section:not(.hero) :is(h2, h2 + p, article, li, dl > div, details)')]
                .filter(el => !el.parentElement.closest('[data-fx]') && !el.closest('.marquee'));

            const variantOf = (el, idx) => {
                if (el.matches('h2')) return 'blur';
                if (el.matches('article')) return idx % 2 ? 'flip' : 'zoom';
                if (el.matches('dl > div')) return 'left';
                if (el.closest('#about ul')) return 'right';
                if (el.closest('ol')) return 'pop';
                return 'up';
            };
            const REVEAL_ANIMS = new Set(['fx-up', 'fx-blur', 'fx-left', 'fx-right', 'fx-zoom', 'fx-flip', 'fx-pop']);

            const io = new IntersectionObserver(entries => {
                entries.forEach(e => {
                    if (!e.isIntersecting) return;
                    const el = e.target;
                    io.unobserve(el);
                    el.classList.add('fx-in', 'fx-seen');

                    // بعد انتهاء الحركة نزيل الخصائص حتى لا تتعارض مع تأثيرات hover
                    const cleanup = () => {
                        el.removeAttribute('data-fx');
                        el.classList.remove('fx-in');
                        el.style.removeProperty('--d');
                    };
                    el.addEventListener('animationend', ev => {
                        if (ev.target === el && REVEAL_ANIMS.has(ev.animationName)) cleanup();
                    });
                    const delay = parseFloat(el.style.getPropertyValue('--d')) || 0;
                    setTimeout(cleanup, 2600 + delay * 1000);
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -6% 0px'
            });

            targets.forEach(el => {
                const idx = [...el.parentElement.children].indexOf(el);
                el.dataset.fx = variantOf(el, idx);
                el.style.setProperty('--d', (Math.min(idx, 5) * 0.1).toFixed(2) + 's');
                io.observe(el);
            });

            // خط المنهجية
            const line = document.querySelector('.draw-line');
            if (line) new IntersectionObserver((en, ob) => {
                if (en[0].isIntersecting) {
                    line.classList.add('in');
                    ob.disconnect();
                }
            }, {
                threshold: .4
            }).observe(line);

            // ---------- عدّاد الأرقام ----------
            const statsBox = document.querySelector('#about dl');
            if (statsBox) {
                const items = [...statsBox.querySelectorAll('dt')].map(dt => {
                    const m = dt.textContent.trim().match(/^(\+?)(\d+)(%?)$/);
                    return m ? {
                        dt,
                        pre: m[1],
                        end: +m[2],
                        post: m[3]
                    } : null;
                }).filter(Boolean);
                items.forEach(i => i.dt.textContent = i.pre + '0' + i.post);
                new IntersectionObserver((en, ob) => {
                    if (!en[0].isIntersecting) return;
                    ob.disconnect();
                    const dur = 1500,
                        start = performance.now();
                    (function tick(now) {
                        const t = Math.min((now - start) / dur, 1),
                            k = 1 - Math.pow(1 - t, 3);
                        items.forEach(i => i.dt.textContent = i.pre + Math.round(i.end * k) + i.post);
                        if (t < 1) requestAnimationFrame(tick);
                    })(start);
                }, {
                    threshold: .4
                }).observe(statsBox);
            }

            // ---------- أعمدة الرسم في الهيرو: تتحرك كأنها بيانات حية ----------
            const bars = [...document.querySelectorAll('.hero .bar')];
            if (bars.length) {
                const base = bars.map(b => parseFloat(b.style.height));
                let heroVisible = true;
                new IntersectionObserver(en => heroVisible = en[0].isIntersecting, {
                    threshold: .1
                }).observe(hero);
                setTimeout(() => {
                    bars.forEach(b => b.style.transition = 'height 1s cubic-bezier(.4,0,.2,1)');
                    setInterval(() => {
                        if (document.hidden || !heroVisible) return;
                        bars.forEach((b, i) => {
                            const last = i === bars.length - 1;
                            const v = last ? 84 + Math.random() * 14 : base[i] + (Math
                                .random() * 24 - 12);
                            b.style.height = Math.max(18, Math.min(96, v)).toFixed(0) + '%';
                        });
                    }, 2200);
                }, 2800);
            }

            // ---------- تأثيرات الماوس (للأجهزة اللي فيها ماوس بس) ----------
            if (finePointer) {
                // ضوء بيتبع الماوس + ميلان المجسم
                const tilt = document.getElementById('tilt');
                if (hero && tilt) {
                    hero.addEventListener('mousemove', e => {
                        const r = hero.getBoundingClientRect();
                        const px = (e.clientX - r.left) / r.width,
                            py = (e.clientY - r.top) / r.height;
                        hero.style.setProperty('--mx', (px * 100).toFixed(1) + '%');
                        hero.style.setProperty('--my', (py * 100).toFixed(1) + '%');
                        tilt.style.setProperty('--rx', ((px - .5) * 12).toFixed(2));
                        tilt.style.setProperty('--ry', ((.5 - py) * 9).toFixed(2));
                    }, {
                        passive: true
                    });
                    hero.addEventListener('mouseleave', () => {
                        tilt.style.setProperty('--rx', 0);
                        tilt.style.setProperty('--ry', 0);
                    });
                }

                // ضوء داخل بطاقات الخدمات بيتبع الماوس
                document.querySelectorAll('.fx-card').forEach(c => {
                    c.addEventListener('pointermove', e => {
                        const r = c.getBoundingClientRect();
                        c.style.setProperty('--mx', (e.clientX - r.left) + 'px');
                        c.style.setProperty('--my', (e.clientY - r.top) + 'px');
                    }, {
                        passive: true
                    });
                });

                // أزرار مغناطيسية
                document.querySelectorAll('[data-magnet]').forEach(el => {
                    el.addEventListener('mousemove', e => {
                        const r = el.getBoundingClientRect();
                        const x = (e.clientX - r.left - r.width / 2) * .22;
                        const y = (e.clientY - r.top - r.height / 2) * .35;
                        el.style.transform = 'translate(' + x.toFixed(1) + 'px,' + y.toFixed(1) + 'px)';
                    });
                    el.addEventListener('mouseleave', () => el.style.transform = '');
                });
            }
        })();
    </script>
</body>

</html>
