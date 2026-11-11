<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'slug' => ['nullable', 'string', 'max:255', 'unique:posts,slug'],

        ]);

        $data = $request->except(['featured_image', 'gallery_images']);
        // $data['slug'] = Str::slug($request->title);
        $data['slug'] = $this->makeSlug($request->input('slug') ?: $request->input('title'));

        // رفع الصورة الرئيسية
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        // رفع مجموعة الصور (Gallery)
        if ($request->hasFile('gallery_images')) {
            $gallery = [];
            foreach ($request->file('gallery_images') as $image) {
                $gallery[] = $image->store('posts/gallery', 'public');
            }
            $data['gallery_images'] = $gallery;
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'تم إضافة المقال بنجاح');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'slug' => ['nullable', 'string', 'max:255', \Illuminate\Validation\Rule::unique('posts', 'slug')->ignore($post->id)],
        ]);

        $data = $request->except(['featured_image', 'gallery_images']);
        $data['slug'] = $request->filled('slug')
            ? $this->makeSlug($request->input('slug'), $post->id)
            : $post->slug;

        if ($request->hasFile('featured_image')) {
            // حذف القديمة إذا أردت
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        if ($request->hasFile('gallery_images')) {
            $gallery = $post->gallery_images ?? [];
            foreach ($request->file('gallery_images') as $image) {
                $gallery[] = $image->store('posts/gallery', 'public');
            }
            $data['gallery_images'] = $gallery;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'تم تحديث المقال بنجاح');
    }

    public function destroy(Post $post)
    {
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'تم حذف المقال بنجاح');
    }

    public function inde(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $posts = Post::published()
            ->when($q !== '', fn($query) => $query->where(
                fn($w) => $w->where('title', 'like', "%{$q}%")
                    ->orWhere('summary', 'like', "%{$q}%")
            ))
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        return view('blogs', compact('posts', 'q'));
    }
    public function show(Post $post)
    {
        // return $post;
        abort_unless(
            $post->status === 'published'
                && (! $post->published_at || $post->published_at->lte(now())),
            404
        );

        $post->increment('views_count');

        $related = Post::published()
            ->where('id', '!=', $post->id)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        return view('show', compact('post', 'related'));
    }

    /**
     * توليد slug فريد (يدعم العربي)
     *
     * @param string   $text      النص الأساسي (slug مكتوب أو العنوان)
     * @param int|null $ignoreId  id المقال الحالي (للتعديل) عشان ما يعتبرش نفسه مكرر
     */
    private function makeSlug(string $text, ?int $ignoreId = null): string
    {
        $text = preg_replace('/[\x{064B}-\x{065F}\x{0670}\x{0640}]/u', '', $text); // تشكيل وتطويل
        $base = trim(preg_replace('/[^\p{L}\p{N}]+/u', '-', mb_strtolower($text)), '-');
        $base = $base !== '' ? $base : 'post';

        $slug = $base;
        $i = 2;

        while (
            \App\Models\Post::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
