<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // المحتوى الأساسي للمقال
            $table->string('title'); // عنوان المقال الرئيسي
            $table->string('slug')->unique(); // الرابط الصديق لمحركات البحث (SEO Slug)
            $table->text('summary')->nullable(); // وصف مختصر/مقدمة للمقال
            $table->longText('content'); // المحتوى الكامل للمقال

            // الصور
            $table->string('featured_image'); // الصورة الرئيسية للمقال
            $table->json('gallery_images')->nullable(); // مجموعة صور إضافية (مخزنة كـ JSON)
            $table->string('alt_text')->nullable(); // النص البديل للصورة الرئيسية (مهم جداً للـ SEO)

            // بيانات الأرشفة وتحسين محركات البحث (SEO Settings)
            $table->string('meta_title')->nullable(); // عنوان المقال في نتائج البحث
            $table->text('meta_description')->nullable(); // وصف المقال في نتائج البحث
            $table->text('meta_keywords')->nullable(); // الكلمات المفتاحية
            $table->string('canonical_url')->nullable(); // رابط الـ Canonical لمنع التكرار

            // حالة النشر والتحكم
            $table->enum('status', ['draft', 'published'])->default('published'); // حالة المقال (مسودة / منشور)
            $table->timestamp('published_at')->nullable(); // تاريخ وقت النشر المجدول أو الفعلي
            $table->unsignedBigInteger('views_count')->default(0); // عدد المشاهدات
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
