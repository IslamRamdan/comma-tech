@extends('adminlte::page')

@section('title', 'إدارة المدونة')

@section('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind بـ prefix وبدون preflight عشان ما يتعارضش مع Bootstrap بتاع AdminLTE --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            prefix: 'tw-',
            corePlugins: {
                preflight: false
            }
        }
    </script>

    <style>
        /* ========== دارك مود لمنطقة المحتوى ========== */
        .content-wrapper {
            background:
                radial-gradient(900px 400px at 100% -5%, rgba(99, 102, 241, .18), transparent 60%),
                radial-gradient(700px 400px at 0% 105%, rgba(16, 185, 129, .12), transparent 60%),
                #020617 !important;
        }

        .content-header h1 {
            margin: 0;
            color: #fff !important;
            font-family: 'Cairo', sans-serif;
            font-weight: 800;
            letter-spacing: -.01em;
        }

        .bl-btn-add {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .65rem 1.4rem;
            border: 0;
            border-radius: .85rem;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff !important;
            font-family: 'Cairo', sans-serif;
            font-weight: 700;
            text-decoration: none !important;
            box-shadow: 0 10px 20px -5px rgba(99, 102, 241, .5);
            transition: transform .2s, box-shadow .2s;
        }

        .bl-btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px -5px rgba(99, 102, 241, .7);
        }

        .bl-btn-add svg {
            width: 1.05rem;
            height: 1.05rem;
        }

        .bl-scope,
        .bl-scope * {
            font-family: 'Cairo', sans-serif;
            box-sizing: border-box;
        }

        /* ========== الكارت ========== */
        .bl-scope .bl-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(51, 65, 85, .6);
            border-radius: 1.25rem;
            background: linear-gradient(180deg, rgba(30, 41, 59, .55), rgba(15, 23, 42, .75));
            padding: 1.25rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, .5), inset 0 1px 0 rgba(255, 255, 255, .04);
            backdrop-filter: blur(12px);
        }

        .bl-scope .bl-card::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #6366f1, #8b5cf6, #10b981, transparent);
            opacity: .8;
        }

        /* ========== رسالة النجاح ========== */
        .bl-scope .bl-alert {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin-bottom: 1.25rem;
            padding: .9rem 1.1rem;
            border: 1px solid rgba(16, 185, 129, .35);
            border-radius: .9rem;
            background: rgba(16, 185, 129, .1);
            color: #6ee7b7;
            font-weight: 600;
        }

        .bl-scope .bl-alert svg {
            width: 1.25rem;
            height: 1.25rem;
            flex-shrink: 0;
        }

        /* ========== الجدول ========== */
        .bl-scope .bl-table-wrap {
            overflow-x: auto;
        }

        .bl-scope .bl-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 .6rem;
            color: #e2e8f0;
        }

        .bl-scope .bl-table thead th {
            padding: .5rem 1rem;
            border: 0;
            color: #94a3b8;
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .04em;
            text-align: right;
            white-space: nowrap;
        }

        .bl-scope .bl-table tbody tr {
            transition: transform .2s, box-shadow .2s;
        }

        .bl-scope .bl-table tbody td {
            padding: .85rem 1rem;
            border-top: 1px solid #1e293b;
            border-bottom: 1px solid #1e293b;
            background: rgba(2, 6, 23, .5);
            vertical-align: middle;
            transition: background .2s, border-color .2s;
        }

        .bl-scope .bl-table tbody td:first-child {
            border-right: 1px solid #1e293b;
            border-radius: 0 .9rem .9rem 0;
        }

        .bl-scope .bl-table tbody td:last-child {
            border-left: 1px solid #1e293b;
            border-radius: .9rem 0 0 .9rem;
        }

        .bl-scope .bl-table tbody tr:hover td {
            background: rgba(30, 41, 59, .7);
            border-color: #334155;
        }

        .bl-scope .bl-num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            border-radius: .6rem;
            background: rgba(99, 102, 241, .15);
            color: #a5b4fc;
            font-size: .85rem;
            font-weight: 700;
        }

        .bl-scope .bl-thumb {
            display: block;
            width: 56px;
            height: 56px;
            object-fit: cover;
            border: 1px solid #334155;
            border-radius: .85rem;
            background: #0f172a;
            box-shadow: 0 6px 14px rgba(0, 0, 0, .4);
        }

        .bl-scope .bl-title {
            max-width: 340px;
            color: #fff;
            font-weight: 700;
            line-height: 1.5;
        }

        .bl-scope .bl-slug {
            display: inline-block;
            max-width: 260px;
            overflow: hidden;
            padding: .25rem .65rem;
            border-radius: .5rem;
            background: rgba(51, 65, 85, .4);
            color: #94a3b8;
            font-family: ui-monospace, SFMono-Regular, Menlo, monospace !important;
            font-size: .8rem;
            direction: ltr;
            text-overflow: ellipsis;
            white-space: nowrap;
            vertical-align: middle;
        }

        /* ========== الحالة ========== */
        .bl-scope .bl-badge {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            padding: .3rem .8rem;
            border-radius: 999px;
            font-size: .8rem;
            font-weight: 700;
        }

        .bl-scope .bl-badge::before {
            content: "";
            width: .45rem;
            height: .45rem;
            border-radius: 50%;
            background: currentColor;
        }

        .bl-scope .bl-badge.is-success {
            background: rgba(16, 185, 129, .12);
            color: #34d399;
            box-shadow: inset 0 0 0 1px rgba(16, 185, 129, .3);
        }

        .bl-scope .bl-badge.is-secondary {
            background: rgba(148, 163, 184, .1);
            color: #94a3b8;
            box-shadow: inset 0 0 0 1px rgba(148, 163, 184, .25);
        }

        /* ========== أزرار التحكم ========== */
        .bl-scope .bl-actions {
            display: flex;
            align-items: center;
            gap: .5rem;
            white-space: nowrap;
        }

        .bl-scope .bl-actions form {
            margin: 0;
        }

        .bl-scope .bl-act {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .4rem .85rem;
            border: 1px solid transparent;
            border-radius: .65rem;
            font-size: .82rem;
            font-weight: 700;
            text-decoration: none !important;
            cursor: pointer;
            transition: background .2s, transform .2s, border-color .2s;
        }

        .bl-scope .bl-act svg {
            width: .95rem;
            height: .95rem;
        }

        .bl-scope .bl-act:hover {
            transform: translateY(-1px);
        }

        .bl-scope .bl-act.edit {
            background: rgba(56, 189, 248, .1);
            border-color: rgba(56, 189, 248, .3);
            color: #7dd3fc !important;
        }

        .bl-scope .bl-act.edit:hover {
            background: rgba(56, 189, 248, .2);
        }

        .bl-scope .bl-act.del {
            background: rgba(244, 63, 94, .1);
            border-color: rgba(244, 63, 94, .3);
            color: #fda4af;
        }

        .bl-scope .bl-act.del:hover {
            background: rgba(244, 63, 94, .2);
        }

        /* ========== الـ Pagination ========== */
        .bl-scope .bl-pager {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
        }

        .bl-scope .pagination {
            display: flex;
            flex-wrap: wrap;
            gap: .35rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .bl-scope .page-link {
            display: block;
            min-width: 2.3rem;
            padding: .45rem .8rem;
            border: 1px solid #334155 !important;
            border-radius: .65rem !important;
            background: rgba(2, 6, 23, .5);
            color: #cbd5e1;
            font-weight: 600;
            text-align: center;
            transition: background .2s, border-color .2s, color .2s;
        }

        .bl-scope .page-link:hover {
            background: rgba(99, 102, 241, .15);
            border-color: #6366f1 !important;
            color: #fff;
        }

        .bl-scope .page-item.active .page-link {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-color: transparent !important;
            color: #fff;
            box-shadow: 0 6px 14px -3px rgba(99, 102, 241, .5);
        }

        .bl-scope .page-item.disabled .page-link {
            opacity: .4;
            pointer-events: none;
        }
    </style>
@stop

@section('content_header')
    <div class="tw-flex tw-flex-wrap tw-items-center tw-justify-between tw-gap-3">
        <h1>إدارة المقالات والمدونة</h1>
        <a href="{{ route('admin.posts.create') }}" class="bl-btn-add">
            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            إضافة مقال جديد
        </a>
    </div>
@stop

@section('content')
    <div class="bl-scope">
        <div class="bl-card">
            @if (session('success'))
                <div class="bl-alert">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bl-table-wrap">
                <table class="bl-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الصورة</th>
                            <th>العنوان</th>
                            <th>الرابط (Slug)</th>
                            <th>الحالة</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td><span class="bl-num">{{ $loop->iteration }}</span></td>
                                <td>
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" class="bl-thumb"
                                        alt="">
                                </td>
                                <td>
                                    <div class="bl-title">{{ $post->title }}</div>
                                </td>
                                <td><span class="bl-slug">{{ $post->slug }}</span></td>
                                <td>
                                    <span
                                        class="bl-badge {{ $post->status == 'published' ? 'is-success' : 'is-secondary' }}">
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="bl-actions">
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> تعديل
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذا المقال؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> حذف
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bl-pager">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@stop
