@extends('adminlte::page')

@section('title', 'تعديل المقال')

@section('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- محرر النصوص Quill --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

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
            color: #fff !important;
            font-family: 'Cairo', sans-serif;
            font-weight: 800;
            letter-spacing: -.01em;
        }

        .post-scope,
        .post-scope * {
            font-family: 'Cairo', sans-serif;
            box-sizing: border-box;
        }

        /* ========== اللايأوت (جنب بعض) ========== */
        .post-scope .post-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 1.5rem;
            align-items: start;
        }

        .post-scope .seo-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 1.25rem;
        }

        @media (min-width: 900px) {
            .post-scope .post-grid {
                grid-template-columns: minmax(0, 2fr) minmax(0, 1fr);
            }

            .post-scope .side-col {
                position: sticky;
                top: 1rem;
            }
        }

        @media (min-width: 768px) {
            .post-scope .seo-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .post-scope .seo-grid .span-all {
                grid-column: 1 / -1;
            }
        }

        .post-scope .stack>*+* {
            margin-top: 1.25rem;
        }

        /* ========== الكروت ========== */
        .post-scope .glass {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(51, 65, 85, .6);
            border-radius: 1.25rem;
            background: linear-gradient(180deg, rgba(30, 41, 59, .55), rgba(15, 23, 42, .75));
            padding: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, .5), inset 0 1px 0 rgba(255, 255, 255, .04);
            backdrop-filter: blur(12px);
        }

        .post-scope .glass::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #6366f1, #8b5cf6, #10b981, transparent);
            opacity: .8;
        }

        .post-scope .card-title {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin: 0 0 1.25rem;
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
        }

        .post-scope .ico {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.25rem;
            height: 2.25rem;
            flex-shrink: 0;
            border-radius: .75rem;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff;
            box-shadow: 0 8px 16px -4px rgba(99, 102, 241, .5);
        }

        .post-scope .ico svg {
            width: 1.1rem;
            height: 1.1rem;
        }

        /* ========== الحقول ========== */
        .post-scope .lbl {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: .5rem;
            font-size: .85rem;
            font-weight: 600;
            color: #cbd5e1;
        }

        .post-scope .counter {
            font-size: .7rem;
            font-weight: 600;
            color: #64748b;
            direction: ltr;
        }

        .post-scope .hint {
            font-size: .7rem;
            font-weight: 600;
            color: #64748b;
        }

        .post-scope .fld {
            display: block;
            width: 100%;
            padding: .7rem 1rem;
            border: 1px solid #334155;
            border-radius: .85rem;
            background: rgba(2, 6, 23, .55);
            color: #f1f5f9;
            font-size: .95rem;
            line-height: 1.6;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .post-scope .fld:hover {
            border-color: #475569;
        }

        .post-scope .fld:focus {
            outline: none;
            border-color: #818cf8;
            background: rgba(2, 6, 23, .8);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, .22);
        }

        .post-scope .fld::placeholder {
            color: #64748b;
        }

        .post-scope textarea.fld {
            resize: vertical;
            min-height: 3rem;
        }

        .post-scope select.fld {
            appearance: none;
            -webkit-appearance: none;
            padding-inline-end: 2.5rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2394a3b8' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-size: 1.1rem;
            background-position: left .85rem center;
            cursor: pointer;
        }

        .post-scope select.fld option {
            background: #0f172a;
            color: #f1f5f9;
        }

        /* ========== محرر النصوص (Quill دارك) ========== */
        .post-scope .editor-wrap {
            overflow: hidden;
            border: 1px solid #334155;
            border-radius: .85rem;
            background: rgba(2, 6, 23, .55);
            transition: border-color .2s, box-shadow .2s;
        }

        .post-scope .editor-wrap:hover {
            border-color: #475569;
        }

        .post-scope .editor-wrap:focus-within {
            border-color: #818cf8;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, .22);
        }

        .post-scope .editor-wrap.has-error {
            border-color: #fb7185;
            box-shadow: 0 0 0 4px rgba(251, 113, 133, .2);
        }

        .post-scope .ql-toolbar.ql-snow {
            border: 0;
            border-bottom: 1px solid #334155;
            background: rgba(15, 23, 42, .9);
            padding: .6rem .75rem;
            direction: rtl;
        }

        .post-scope .ql-container.ql-snow {
            border: 0;
            font-family: 'Cairo', sans-serif;
            font-size: 1rem;
        }

        .post-scope .ql-editor {
            min-height: 320px;
            max-height: 560px;
            padding: 1rem 1.1rem;
            color: #f1f5f9;
            line-height: 1.9;
            direction: rtl;
            text-align: right;
        }

        .post-scope .ql-editor.ql-blank::before {
            right: 1.1rem;
            left: 1.1rem;
            color: #64748b;
            font-style: normal;
        }

        .post-scope .ql-editor blockquote {
            border-right: 4px solid #6366f1;
            border-left: 0;
            margin: .75rem 0;
            padding-right: 1rem;
            color: #cbd5e1;
        }

        .post-scope .ql-editor pre.ql-syntax {
            background: #020617;
            border: 1px solid #334155;
            border-radius: .6rem;
            color: #e2e8f0;
            direction: ltr;
            text-align: left;
        }

        .post-scope .ql-editor a {
            color: #818cf8;
        }

        .post-scope .ql-snow .ql-stroke {
            stroke: #cbd5e1;
        }

        .post-scope .ql-snow .ql-fill {
            fill: #cbd5e1;
        }

        .post-scope .ql-snow .ql-picker,
        .post-scope .ql-snow .ql-picker-label {
            color: #cbd5e1;
        }

        .post-scope .ql-snow.ql-toolbar button:hover,
        .post-scope .ql-snow.ql-toolbar .ql-picker-label:hover,
        .post-scope .ql-snow.ql-toolbar .ql-picker-item:hover {
            color: #818cf8;
        }

        .post-scope .ql-snow.ql-toolbar button:hover .ql-stroke,
        .post-scope .ql-snow.ql-toolbar button.ql-active .ql-stroke,
        .post-scope .ql-snow.ql-toolbar .ql-picker-label:hover .ql-stroke,
        .post-scope .ql-snow.ql-toolbar .ql-picker-label.ql-active .ql-stroke {
            stroke: #818cf8;
        }

        .post-scope .ql-snow.ql-toolbar button:hover .ql-fill,
        .post-scope .ql-snow.ql-toolbar button.ql-active .ql-fill,
        .post-scope .ql-snow.ql-toolbar .ql-picker-label:hover .ql-fill {
            fill: #818cf8;
        }

        .post-scope .ql-snow.ql-toolbar button.ql-active,
        .post-scope .ql-snow.ql-toolbar .ql-picker-label.ql-active {
            color: #818cf8;
        }

        .post-scope .ql-snow .ql-picker-options {
            background: #0f172a;
            border: 1px solid #334155 !important;
            border-radius: .6rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .5);
        }

        .post-scope .ql-snow .ql-tooltip {
            background: #0f172a;
            border: 1px solid #334155;
            border-radius: .6rem;
            color: #e2e8f0;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .5);
            z-index: 10;
        }

        .post-scope .ql-snow .ql-tooltip input[type=text] {
            background: #020617;
            border: 1px solid #334155;
            border-radius: .4rem;
            color: #f1f5f9;
        }

        /* ========== رفع الملفات ========== */
        .post-scope .fld-file {
            padding: .85rem;
            border-style: dashed;
            border-width: 2px;
            font-size: .85rem;
            color: #94a3b8;
            cursor: pointer;
        }

        .post-scope .fld-file:hover {
            border-color: #6366f1;
            background: rgba(99, 102, 241, .06);
        }

        .post-scope .fld-file::file-selector-button {
            margin-inline-end: .75rem;
            padding: .45rem 1rem;
            border: 0;
            border-radius: .6rem;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff;
            font-family: inherit;
            font-weight: 600;
            cursor: pointer;
            transition: filter .2s;
        }

        .post-scope .fld-file::file-selector-button:hover {
            filter: brightness(1.15);
        }

        .post-scope .preview {
            display: block;
            margin-bottom: .75rem;
            width: 100%;
            aspect-ratio: 16 / 9;
            object-fit: cover;
            border-radius: .85rem;
            border: 1px solid #334155;
            background: #0f172a;
        }

        .post-scope .thumbs {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            margin-top: .75rem;
        }

        .post-scope .thumbs img {
            width: 3.5rem;
            height: 3.5rem;
            object-fit: cover;
            border-radius: .6rem;
            border: 1px solid #334155;
        }

        /* ========== صور المعرض الحالية ========== */
        .post-scope .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: .5rem;
        }

        .post-scope .gallery-item {
            position: relative;
            display: block;
            overflow: hidden;
            aspect-ratio: 1 / 1;
            border: 1px solid #334155;
            border-radius: .75rem;
            background: #0f172a;
        }

        .post-scope .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s;
        }

        .post-scope .gallery-item:hover img {
            transform: scale(1.1);
        }

        .post-scope .gallery-item::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 60%, rgba(2, 6, 23, .5));
            opacity: 0;
            transition: opacity .2s;
        }

        .post-scope .gallery-item:hover::after {
            opacity: 1;
        }

        /* ========== شريط الحفظ ========== */
        .post-scope .save-bar {
            position: sticky;
            bottom: 1rem;
            z-index: 5;
            display: flex;
            justify-content: flex-end;
            margin-top: 1.5rem;
            padding: .85rem 1rem;
            border: 1px solid rgba(51, 65, 85, .7);
            border-radius: 1.1rem;
            background: rgba(2, 6, 23, .8);
            backdrop-filter: blur(12px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, .6);
        }

        .post-scope .btn-save {
            display: inline-flex;
            align-items: center;
            gap: .6rem;
            padding: .75rem 2.25rem;
            border: 0;
            border-radius: .85rem;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 10px 20px -5px rgba(99, 102, 241, .5);
            transition: transform .2s, box-shadow .2s;
        }

        .post-scope .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px -5px rgba(99, 102, 241, .7);
        }

        .post-scope .btn-save svg {
            width: 1.1rem;
            height: 1.1rem;
        }
    </style>
@stop

@section('content_header')
    <h1>تعديل المقال: {{ $post->title }}</h1>
@stop

@section('content')
    <div class="post-scope">

        @if ($errors->any())
            <div
                class="tw-mb-6 tw-rounded-xl tw-border tw-border-solid tw-border-rose-500/40 tw-bg-rose-500/10 tw-p-4 tw-text-sm tw-text-rose-300">
                <ul class="tw-list-disc tw-space-y-1 tw-pr-5 tw-m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="post-grid">

                {{-- العمود الرئيسي --}}
                <div class="glass stack">
                    <div class="card-title">
                        <span class="ico">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.4-9.4a2 2 0 112.8 2.8L11.8 15H9v-2.8l8.6-8.6z" />
                            </svg>
                        </span>
                    </div>

                    <div>
                        <label class="lbl">عنوان المقال</label>
                        <input type="text" name="title" class="fld" required
                            value="{{ old('title', $post->title) }}">
                    </div>

                    <div>
                        <label class="lbl">الرابط (Slug) <span class="hint">تغييره يكسر الروابط القديمة
                                للمقال</span></label>
                        <input type="text" name="slug" id="slug" class="fld" dir="auto"
                            placeholder="مثال: تصميم-موقع-احترافي" value="{{ old('slug', $post->slug) }}">
                    </div>

                    <div>
                        <label class="lbl">مقدمة / ملخص المقال</label>
                        <textarea name="summary" class="fld" rows="3">{{ old('summary', $post->summary) }}</textarea>
                    </div>

                    <div>
                        <label class="lbl">محتوى المقال الكامل</label>
                        <input type="hidden" name="content" id="content">
                        <div class="editor-wrap" id="editor_wrap">
                            <div id="editor"></div>
                        </div>
                    </div>
                </div>

                {{-- العمود الجانبي --}}
                <div class="side-col">
                    <div class="glass stack">
                        <div class="card-title">
                            <span class="ico">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 16l4.6-4.6a2 2 0 012.8 0L16 16m-2-2l1.6-1.6a2 2 0 012.8 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                        </div>

                        <div>
                            <label class="lbl">الصورة الرئيسية الحالية</label>
                            <img id="featured_preview" src="{{ asset('storage/' . $post->featured_image) }}" class="preview"
                                alt="">
                            <input type="file" name="featured_image" id="featured_image" class="fld fld-file"
                                accept="image/*">
                        </div>

                        @php
                            $existingGallery = is_array($post->gallery_images)
                                ? $post->gallery_images
                                : json_decode($post->gallery_images ?? '[]', true) ?? [];
                        @endphp

                        @if (count($existingGallery))
                            <div>
                                <label class="lbl">صور المعرض الحالية <span
                                        class="counter">{{ count($existingGallery) }}</span></label>
                                <div class="gallery-grid">
                                    @foreach ($existingGallery as $galleryImage)
                                        <a href="{{ asset('storage/' . $galleryImage) }}" target="_blank"
                                            class="gallery-item">
                                            <img src="{{ asset('storage/' . $galleryImage) }}" alt=""
                                                loading="lazy">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div>
                            <label class="lbl">إضافة صور جديدة للمعرض (Gallery)</label>
                            <input type="file" name="gallery_images[]" id="gallery_images" class="fld fld-file"
                                accept="image/*" multiple>
                            <div id="gallery_thumbs" class="thumbs"></div>
                        </div>

                        <div>
                            <label class="lbl">النص البديل للصورة (Alt Text للـ SEO)</label>
                            <input type="text" name="alt_text" class="fld"
                                value="{{ old('alt_text', $post->alt_text) }}">
                        </div>

                        <div>
                            <label class="lbl">الحالة</label>
                            <select name="status" class="fld">
                                <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>منشور
                                </option>
                                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>مسودة</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SEO --}}
            <section class="glass" style="margin-top:1.5rem">
                <h4 class="card-title">
                    <span class="ico">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                        </svg>
                    </span>
                    إعدادات الأرشفة وتحسين محركات البحث (SEO)
                </h4>

                <div class="seo-grid">
                    <div>
                        <label class="lbl">Meta Title <span class="counter" data-for="meta_title">0/60</span></label>
                        <input type="text" name="meta_title" id="meta_title" class="fld" dir="auto"
                            value="{{ old('meta_title', $post->meta_title) }}">
                    </div>

                    <div>
                        <label class="lbl">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="fld" dir="auto"
                            value="{{ old('meta_keywords', $post->meta_keywords) }}">
                    </div>

                    <div>
                        <label class="lbl">Canonical URL</label>
                        <input type="text" name="canonical_url" class="fld" dir="ltr"
                            value="{{ old('canonical_url', $post->canonical_url) }}">
                    </div>

                    <div class="span-all">
                        <label class="lbl">Meta Description <span class="counter"
                                data-for="meta_description">0/160</span></label>
                        <textarea name="meta_description" id="meta_description" class="fld" dir="auto" rows="2">{{ old('meta_description', $post->meta_description) }}</textarea>
                    </div>
                </div>
            </section>

            <div class="save-bar">
                <button type="submit" class="btn-save">
                    <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    تعديل وحفظ التغييرات
                </button>
            </div>
        </form>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        (function() {
            // محرر محتوى المقال
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            header: [2, 3, 4, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            color: []
                        }, {
                            background: []
                        }],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }],
                        [{
                            align: []
                        }],
                        [{
                            direction: 'rtl'
                        }],
                        ['blockquote', 'code-block', 'link'],
                        ['clean']
                    ]
                }
            });
            quill.root.setAttribute('dir', 'rtl');

            // تحميل المحتوى الحالي للمقال (أو القيمة القديمة بعد فشل الـ validation)
            var initialContent = @json(old('content', $post->content));
            if (initialContent) {
                quill.clipboard.dangerouslyPasteHTML(initialContent);
            }

            // مزامنة المحتوى مع الحقل المخفي قبل الإرسال (name="content")
            var form = document.querySelector('.post-scope form');
            var hidden = document.getElementById('content');
            var wrap = document.getElementById('editor_wrap');

            quill.on('text-change', function() {
                wrap.classList.remove('has-error');
            });

            form.addEventListener('submit', function(e) {
                var isEmpty = quill.getText().trim().length === 0;
                hidden.value = isEmpty ? '' : quill.root.innerHTML;

                // الحقل مطلوب زي ما كان required
                if (isEmpty) {
                    e.preventDefault();
                    wrap.classList.add('has-error');
                    wrap.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    quill.focus();
                }
            });
        })();

        (function() {
            // معاينة الصورة الرئيسية الجديدة (بتستبدل الحالية)
            var featured = document.getElementById('featured_image');
            var preview = document.getElementById('featured_preview');
            var originalSrc = preview.getAttribute('src');
            featured.addEventListener('change', function() {
                var f = this.files && this.files[0];
                preview.src = f ? URL.createObjectURL(f) : originalSrc;
            });

            // معاينة صور الـ Gallery الجديدة
            var gallery = document.getElementById('gallery_images');
            var thumbs = document.getElementById('gallery_thumbs');
            gallery.addEventListener('change', function() {
                thumbs.innerHTML = '';
                Array.prototype.forEach.call(this.files, function(f) {
                    var img = document.createElement('img');
                    img.src = URL.createObjectURL(f);
                    thumbs.appendChild(img);
                });
            });

            // عدادات الأحرف للـ SEO
            document.querySelectorAll('.counter[data-for]').forEach(function(c) {
                var input = document.getElementById(c.dataset.for);
                var max = parseInt(c.textContent.split('/')[1], 10);
                var update = function() {
                    var len = input.value.length;
                    c.textContent = len + '/' + max;
                    c.style.color = len > max ? '#fb7185' : (len > 0 ? '#34d399' : '#64748b');
                };
                input.addEventListener('input', update);
                update();
            });
        })();

        (function() {
            // تنظيف الـ Slug (مفيش توليد تلقائي من العنوان طالما فيه slug حالي، عشان ما نكسرش الرابط)
            var title = document.querySelector('input[name="title"]');
            var slug = document.getElementById('slug');
            var touched = slug.value.trim() !== '';

            function slugify(s) {
                return s
                    .replace(/[\u064B-\u065F\u0670\u0640]/g, '') // تشكيل وتطويل
                    .trim()
                    .toLowerCase()
                    .replace(/[^\p{L}\p{N}]+/gu, '-')
                    .replace(/^-+|-+$/g, '');
            }

            // لو مسحت الـ slug بالكامل، هيتولد من العنوان وانت بتكتب
            title.addEventListener('input', function() {
                if (!touched) slug.value = slugify(title.value);
            });

            slug.addEventListener('input', function() {
                touched = slug.value.trim() !== '';
            });

            slug.addEventListener('blur', function() {
                slug.value = slugify(slug.value);
            });
        })();
    </script>
@stop
