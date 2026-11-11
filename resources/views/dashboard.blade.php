@extends('adminlte::page')

@section('title', 'لوحة التحكم - كوما تيك')

@section('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ========== دارك مود لمنطقة المحتوى ========== */
        .content-wrapper {
            background:
                radial-gradient(900px 400px at 100% -5%, rgba(99, 102, 241, .18), transparent 60%),
                radial-gradient(700px 400px at 0% 105%, rgba(16, 185, 129, .12), transparent 60%),
                #020617 !important;
        }

        .content-header h1 {
            color: #fff !important;
            font-family: 'Cairo', sans-serif;
            font-weight: 800;
            letter-spacing: -.01em;
        }

        .content-header .breadcrumb {
            background: transparent;
            font-family: 'Cairo', sans-serif;
        }

        .content-header .breadcrumb a {
            color: #818cf8;
        }

        .content-header .breadcrumb-item.active,
        .content-header .breadcrumb-item+.breadcrumb-item::before {
            color: #64748b;
        }

        .dash-scope,
        .dash-scope * {
            font-family: 'Cairo', sans-serif;
            box-sizing: border-box;
        }

        /* ========== أساسيات ========== */
        .dash-scope .dash-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(51, 65, 85, .6);
            border-radius: 1.25rem;
            background: linear-gradient(180deg, rgba(30, 41, 59, .55), rgba(15, 23, 42, .75));
            padding: 1.4rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, .5), inset 0 1px 0 rgba(255, 255, 255, .04);
            backdrop-filter: blur(12px);
        }

        .dash-scope .dash-card.accent::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #6366f1, #8b5cf6, #10b981, transparent);
            opacity: .8;
        }

        .dash-scope .dash-title {
            display: flex;
            align-items: center;
            gap: .7rem;
            margin: 0 0 1.25rem;
            color: #fff;
            font-size: 1.05rem;
            font-weight: 700;
        }

        .dash-scope .dash-title .dot {
            width: .4rem;
            height: 1.3rem;
            border-radius: 99px;
            background: linear-gradient(180deg, #6366f1, #8b5cf6);
        }

        .dash-scope .gap-section {
            margin-top: 1.5rem;
        }

        /* ========== بانر الترحيب ========== */
        .dash-scope .welcome {
            display: flex;
            align-items: center;
            gap: 1.1rem;
            padding: 1.4rem 1.6rem;
            border: 1px solid rgba(99, 102, 241, .35);
            border-radius: 1.25rem;
            background:
                radial-gradient(500px 200px at 0% 0%, rgba(16, 185, 129, .18), transparent 70%),
                linear-gradient(135deg, rgba(99, 102, 241, .22), rgba(15, 23, 42, .8));
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, .5);
        }

        .dash-scope .welcome .w-ico {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3rem;
            height: 3rem;
            flex-shrink: 0;
            border-radius: 1rem;
            background: linear-gradient(135deg, #10b981, #14b8a6);
            color: #fff;
            font-size: 1.25rem;
            box-shadow: 0 10px 20px -5px rgba(16, 185, 129, .5);
        }

        .dash-scope .welcome p {
            margin: 0;
            color: #6ee7b7;
            font-size: 1.1rem;
            font-weight: 700;
            line-height: 1.7;
        }

        /* ========== كروت الإحصائيات ========== */
        .dash-scope .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 1.1rem;
        }

        .dash-scope .stat {
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: transform .25s, border-color .25s, box-shadow .25s;
        }

        .dash-scope .stat:hover {
            transform: translateY(-4px);
            border-color: rgba(129, 140, 248, .5);
            box-shadow: 0 30px 50px -15px rgba(0, 0, 0, .6);
        }

        .dash-scope .stat .s-ico {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3.2rem;
            height: 3.2rem;
            flex-shrink: 0;
            border-radius: 1rem;
            color: #fff;
            font-size: 1.3rem;
        }

        .dash-scope .s-ico.indigo {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            box-shadow: 0 10px 20px -5px rgba(99, 102, 241, .55);
        }

        .dash-scope .s-ico.emerald {
            background: linear-gradient(135deg, #10b981, #14b8a6);
            box-shadow: 0 10px 20px -5px rgba(16, 185, 129, .55);
        }

        .dash-scope .s-ico.amber {
            background: linear-gradient(135deg, #f59e0b, #f97316);
            box-shadow: 0 10px 20px -5px rgba(245, 158, 11, .55);
        }

        .dash-scope .s-ico.sky {
            background: linear-gradient(135deg, #0ea5e9, #38bdf8);
            box-shadow: 0 10px 20px -5px rgba(14, 165, 233, .55);
        }

        .dash-scope .stat .s-label {
            color: #94a3b8;
            font-size: .82rem;
            font-weight: 600;
        }

        .dash-scope .stat .s-value {
            color: #fff;
            font-size: 1.9rem;
            font-weight: 800;
            line-height: 1.2;
        }

        .dash-scope .stat .s-sub {
            color: #64748b;
            font-size: .72rem;
            font-weight: 600;
        }

        /* ========== شبكات الأقسام ========== */
        .dash-scope .two-col {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 1.25rem;
        }

        @media (min-width: 992px) {
            .dash-scope .two-col.wide-left {
                grid-template-columns: minmax(0, 2fr) minmax(0, 1fr);
            }

            .dash-scope .two-col.even {
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            }
        }

        /* ========== رسم الأعمدة ========== */
        .dash-scope .bars {
            display: flex;
            align-items: flex-end;
            gap: .9rem;
            height: 210px;
            padding-top: 1.4rem;
        }

        .dash-scope .bar-col {
            display: flex;
            flex: 1;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            height: 100%;
            gap: .5rem;
        }

        .dash-scope .bar-val {
            color: #cbd5e1;
            font-size: .78rem;
            font-weight: 700;
        }

        .dash-scope .bar {
            width: 100%;
            max-width: 56px;
            min-height: 6px;
            border-radius: .7rem .7rem .3rem .3rem;
            background: linear-gradient(180deg, #818cf8, #6366f1 60%, #4f46e5);
            box-shadow: 0 8px 18px -6px rgba(99, 102, 241, .6);
            transition: filter .2s, transform .2s;
        }

        .dash-scope .bar.is-zero {
            background: #1e293b;
            box-shadow: none;
        }

        .dash-scope .bar-col:hover .bar {
            filter: brightness(1.2);
            transform: scaleY(1.03);
        }

        .dash-scope .bar-lbl {
            color: #64748b;
            font-size: .75rem;
            font-weight: 600;
        }

        /* ========== دائرة الـ SEO ========== */
        .dash-scope .donut-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.1rem;
        }

        .dash-scope .donut {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            box-shadow: 0 0 40px -8px rgba(99, 102, 241, .5);
        }

        .dash-scope .donut::after {
            content: "";
            position: absolute;
            inset: 14px;
            border-radius: 50%;
            background: #0b1226;
        }

        .dash-scope .donut .d-num {
            position: absolute;
            inset: 0;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.9rem;
            font-weight: 800;
            direction: ltr;
        }

        .dash-scope .legend {
            width: 100%;
            display: grid;
            gap: .5rem;
        }

        .dash-scope .legend-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #cbd5e1;
            font-size: .85rem;
            font-weight: 600;
        }

        .dash-scope .legend-row .k {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
        }

        .dash-scope .legend-row .k i {
            width: .6rem;
            height: .6rem;
            border-radius: 50%;
        }

        /* ========== القوائم ========== */
        .dash-scope .list {
            display: grid;
            gap: .6rem;
        }

        .dash-scope .row-item {
            display: flex;
            align-items: center;
            gap: .9rem;
            padding: .7rem .85rem;
            border: 1px solid #1e293b;
            border-radius: .95rem;
            background: rgba(2, 6, 23, .5);
            transition: background .2s, border-color .2s;
        }

        .dash-scope .row-item:hover {
            background: rgba(30, 41, 59, .7);
            border-color: #334155;
        }

        .dash-scope .row-thumb {
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            object-fit: cover;
            border: 1px solid #334155;
            border-radius: .75rem;
            background: #0f172a;
        }

        .dash-scope .row-main {
            flex: 1;
            min-width: 0;
        }

        .dash-scope .row-title {
            overflow: hidden;
            color: #fff;
            font-weight: 700;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dash-scope .row-meta {
            color: #64748b;
            font-size: .75rem;
            font-weight: 600;
        }

        .dash-scope .rank {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 1.9rem;
            height: 1.9rem;
            flex-shrink: 0;
            border-radius: .6rem;
            background: rgba(99, 102, 241, .15);
            color: #a5b4fc;
            font-size: .8rem;
            font-weight: 800;
        }

        .dash-scope .meter {
            height: 6px;
            margin-top: .45rem;
            overflow: hidden;
            border-radius: 99px;
            background: #1e293b;
        }

        .dash-scope .meter span {
            display: block;
            height: 100%;
            border-radius: 99px;
            background: linear-gradient(90deg, #6366f1, #10b981);
        }

        .dash-scope .views-pill {
            flex-shrink: 0;
            color: #7dd3fc;
            font-size: .8rem;
            font-weight: 700;
        }

        .dash-scope .badge-st {
            flex-shrink: 0;
            padding: .2rem .65rem;
            border-radius: 99px;
            font-size: .72rem;
            font-weight: 700;
        }

        .dash-scope .badge-st.ok {
            background: rgba(16, 185, 129, .12);
            color: #34d399;
            box-shadow: inset 0 0 0 1px rgba(16, 185, 129, .3);
        }

        .dash-scope .badge-st.draft {
            background: rgba(148, 163, 184, .1);
            color: #94a3b8;
            box-shadow: inset 0 0 0 1px rgba(148, 163, 184, .25);
        }

        .dash-scope .edit-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            flex-shrink: 0;
            border-radius: .6rem;
            background: rgba(56, 189, 248, .1);
            color: #7dd3fc !important;
            transition: background .2s;
        }

        .dash-scope .edit-link:hover {
            background: rgba(56, 189, 248, .22);
        }

        .dash-scope .empty {
            padding: 1.5rem;
            border: 1px dashed #334155;
            border-radius: .95rem;
            color: #64748b;
            font-weight: 600;
            text-align: center;
        }

        /* ========== كارت التنقل السريع ========== */
        .dash-scope .quick {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1.25rem;
            background:
                radial-gradient(400px 160px at 100% 0%, rgba(14, 165, 233, .22), transparent 70%),
                linear-gradient(180deg, rgba(30, 41, 59, .55), rgba(15, 23, 42, .75));
        }

        .dash-scope .quick .q-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .dash-scope .quick .q-ico {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3.4rem;
            height: 3.4rem;
            border-radius: 1.1rem;
            background: linear-gradient(135deg, #0ea5e9, #38bdf8);
            color: #fff;
            font-size: 1.4rem;
            box-shadow: 0 10px 20px -5px rgba(14, 165, 233, .55);
        }

        .dash-scope .quick h3 {
            margin: 0;
            color: #fff;
            font-size: 1.3rem;
            font-weight: 800;
        }

        .dash-scope .quick p {
            margin: .15rem 0 0;
            color: #94a3b8;
            font-weight: 600;
        }

        .dash-scope .quick .q-btn {
            display: inline-flex;
            align-items: center;
            gap: .6rem;
            padding: .7rem 1.5rem;
            border-radius: .9rem;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff !important;
            font-weight: 700;
            text-decoration: none !important;
            box-shadow: 0 10px 20px -5px rgba(99, 102, 241, .5);
            transition: transform .2s, box-shadow .2s;
        }

        .dash-scope .quick .q-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px -5px rgba(99, 102, 241, .7);
        }
    </style>
@stop

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>لوحة التحكم الرئيسية</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">لوحة التحكم</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    @php
        // ===== إحصائيات المدونة (من جدول posts) =====
        $totalPosts = \App\Models\Post::count();
        $publishedPosts = \App\Models\Post::where('status', 'published')->count();
        $draftPosts = \App\Models\Post::where('status', 'draft')->count();
        $totalViews = (int) \App\Models\Post::sum('views_count');
        $monthPosts = \App\Models\Post::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        // مقالات بيانات الـ SEO فيها مكتملة (Meta Title + Meta Description)
        $seoComplete = \App\Models\Post::whereNotNull('meta_title')
            ->where('meta_title', '!=', '')
            ->whereNotNull('meta_description')
            ->where('meta_description', '!=', '')
            ->count();

        $seoPercent = $totalPosts ? (int) round(($seoComplete / $totalPosts) * 100) : 0;
        $publishedPercent = $totalPosts ? (int) round(($publishedPosts / $totalPosts) * 100) : 0;

        $recentPosts = \App\Models\Post::latest()->take(5)->get();
        $topPosts = \App\Models\Post::orderByDesc('views_count')->take(5)->get();
        $maxViews = max(1, (int) $topPosts->max('views_count'));

        // المقالات خلال آخر 6 أشهر
        $months = collect(range(5, 0))->map(function ($i) {
            $d = now()->startOfMonth()->subMonths($i);
            return [
                'label' => $d->copy()->locale('ar')->translatedFormat('M'),
                'count' => \App\Models\Post::whereYear('created_at', $d->year)
                    ->whereMonth('created_at', $d->month)
                    ->count(),
            ];
        });
        $maxMonth = max(1, (int) $months->max('count'));
    @endphp

    <div class="dash-scope">

        {{-- الترحيب --}}
        <div class="welcome">
            <span class="w-ico"><i class="fas fa-check"></i></span>
            <p>أهلاً بك يا فندم! لقد سجلت دخولك بنجاح إلى لوحة التحكم الخاصة بشركة كوما تيك (Comma Tech).</p>
        </div>

        {{-- كروت الإحصائيات --}}
        <div class="stats-grid gap-section">
            <div class="dash-card stat">
                <span class="s-ico indigo"><i class="fas fa-newspaper"></i></span>
                <div>
                    <div class="s-label">إجمالي المقالات</div>
                    <div class="s-value dash-num" data-val="{{ $totalPosts }}">{{ $totalPosts }}</div>
                    <div class="s-sub">{{ $monthPosts }} هذا الشهر</div>
                </div>
            </div>

            <div class="dash-card stat">
                <span class="s-ico emerald"><i class="fas fa-circle-check"></i></span>
                <div>
                    <div class="s-label">المقالات المنشورة</div>
                    <div class="s-value dash-num" data-val="{{ $publishedPosts }}">{{ $publishedPosts }}</div>
                    <div class="s-sub">{{ $publishedPercent }}% من الإجمالي</div>
                </div>
            </div>

            <div class="dash-card stat">
                <span class="s-ico amber"><i class="fas fa-file-pen"></i></span>
                <div>
                    <div class="s-label">المسودات</div>
                    <div class="s-value dash-num" data-val="{{ $draftPosts }}">{{ $draftPosts }}</div>
                    <div class="s-sub">في انتظار النشر</div>
                </div>
            </div>

            <div class="dash-card stat">
                <span class="s-ico sky"><i class="fas fa-eye"></i></span>
                <div>
                    <div class="s-label">إجمالي المشاهدات</div>
                    <div class="s-value dash-num" data-val="{{ $totalViews }}">{{ $totalViews }}</div>
                    <div class="s-sub">على كل المقالات</div>
                </div>
            </div>
        </div>

        {{-- الرسم + الـ SEO --}}
        <div class="two-col wide-left gap-section">
            <div class="dash-card accent">
                <h4 class="dash-title"><span class="dot"></span>المقالات خلال آخر 6 أشهر</h4>
                <div class="bars">
                    @foreach ($months as $m)
                        <div class="bar-col">
                            <span class="bar-val">{{ $m['count'] }}</span>
                            <div class="bar {{ $m['count'] ? '' : 'is-zero' }}"
                                style="height: {{ $m['count'] ? max(8, round(($m['count'] / $maxMonth) * 100)) : 3 }}%">
                            </div>
                            <span class="bar-lbl">{{ $m['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="dash-card accent">
                <h4 class="dash-title"><span class="dot"></span>اكتمال بيانات الـ SEO</h4>
                <div class="donut-wrap">
                    <div class="donut"
                        style="background: conic-gradient(#6366f1 0 {{ $seoPercent }}%, #1e293b {{ $seoPercent }}% 100%)">
                        <span class="d-num">{{ $seoPercent }}%</span>
                    </div>
                    <div class="legend">
                        <div class="legend-row">
                            <span class="k"><i style="background:#6366f1"></i>مقالات مكتملة</span>
                            <span>{{ $seoComplete }}</span>
                        </div>
                        <div class="legend-row">
                            <span class="k"><i style="background:#334155"></i>تحتاج استكمال</span>
                            <span>{{ max(0, $totalPosts - $seoComplete) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- أحدث المقالات + الأكثر مشاهدة --}}
        <div class="two-col even gap-section">
            <div class="dash-card accent">
                <h4 class="dash-title"><span class="dot"></span>أحدث المقالات</h4>
                <div class="list">
                    @forelse ($recentPosts as $post)
                        <div class="row-item">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" class="row-thumb" alt="">
                            <div class="row-main">
                                <div class="row-title">{{ $post->title }}</div>
                                <div class="row-meta">{{ $post->created_at->format('Y-m-d') }}</div>
                            </div>
                            <span class="badge-st {{ $post->status == 'published' ? 'ok' : 'draft' }}">
                                {{ $post->status == 'published' ? 'منشور' : 'مسودة' }}
                            </span>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="edit-link">
                                <i class="fas fa-pen"></i>
                            </a>
                        </div>
                    @empty
                        <div class="empty">لا توجد مقالات بعد</div>
                    @endforelse
                </div>
            </div>

            <div class="dash-card accent">
                <h4 class="dash-title"><span class="dot"></span>الأكثر مشاهدة</h4>
                <div class="list">
                    @forelse ($topPosts as $post)
                        <div class="row-item">
                            <span class="rank">{{ $loop->iteration }}</span>
                            <div class="row-main">
                                <div class="row-title">{{ $post->title }}</div>
                                <div class="meter"><span
                                        style="width: {{ round((($post->views_count ?? 0) / $maxViews) * 100) }}%"></span>
                                </div>
                            </div>
                            <span class="views-pill"><i class="fas fa-eye"></i>
                                {{ number_format($post->views_count ?? 0) }}</span>
                        </div>
                    @empty
                        <div class="empty">لا توجد مقالات بعد</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- مربع التنقل السريع لإدارة المقالات والأرشفة --}}
        <div class="dash-card quick gap-section">
            <div class="q-info">
                <span class="q-ico"><i class="fas fa-blog"></i></span>
                <div>
                    <h3>المقالات</h3>
                    <p>إدارة المدونة وأرشفة محركات البحث (SEO)</p>
                </div>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="q-btn">
                الدخول للمقالات <i class="fas fa-arrow-circle-left"></i>
            </a>
        </div>
    </div>
@stop

@section('js')
    <script>
        // عدّاد متحرك للأرقام
        document.querySelectorAll('.dash-num').forEach(function(el) {
            var target = parseInt(el.dataset.val, 10) || 0;
            if (target === 0) return;
            var duration = 900;
            var start = null;
            el.textContent = '0';

            function step(ts) {
                if (!start) start = ts;
                var p = Math.min((ts - start) / duration, 1);
                var eased = 1 - Math.pow(1 - p, 3);
                el.textContent = Math.round(target * eased).toLocaleString('en-US');
                if (p < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
        });
    </script>
@stop
