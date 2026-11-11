@extends('layouts.app')

@section('title', 'خدمات شركة كوما تيك')

@section('content')
    <h2 class="text-3xl font-bold mb-4 text-center">خدماتنا</h2>
    <div class="grid md:grid-cols-2 gap-8">
        <div class="p-6 border rounded-lg hover:shadow-lg transition">
            <h3 class="text-2xl font-semibold mb-3">تصميم وبرمجة المواقع</h3>
            <p>نصمم ونبرمج مواقع احترافية متوافقة مع محركات البحث وتعمل بأفضل أداء على جميع الأجهزة.</p>
        </div>
        <div class="p-6 border rounded-lg hover:shadow-lg transition">
            <h3 class="text-2xl font-semibold mb-3">إعلانات جوجل الرقمية</h3>
            <p>نُدير حملات إعلانات جوجل لتحقيق أعلى عائد استثمار وجذب عملاء مستهدفين.</p>
        </div>
    </div>
@endsection
