<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category/{slug}', function ($slug) {
    $data['category'] = Category::where('slug', $slug)
        ->firstOrFail();

    $data['list_blogs'] = Blog::with('category')
        ->where('category_id', $data['category']->id)
        ->latest()
        ->paginate(1);

    $data['trending_blogs'] = Blog::with('category')
        ->where('category_id', $data['category']->id)
        ->orderBy('date_published', 'DESC')
        ->limit(7)
        ->get();

    return view('category', $data);
});

Route::get('/blog/{slug}', function ($slug) {
    $blog = Blog::with('tags')->where('slug', $slug)
        ->firstOrFail();

    $blog->increment('hit', 1);

    $data['blog'] = $blog;
    $data['blog_serupa'] = Blog::where('id', '!=', $blog->id)
        ->where('category_id', $blog->category_id)
        ->take(7)
        ->get();

    return view('blog', $data);
});

Route::get('/page/{slug}', function ($slug) {
    $data['page'] = Page::where('slug', $slug)->firstOrFail();
    $data['blog_tranding'] = Blog::with('category')
        ->orderBy('date_published', 'DESC')
        ->limit(7)
        ->get();

    return view('page', $data);
});

Route::get('/search', function (Request $request) {
    $data['list_blogs'] = Blog::with('category')
        ->where('title', 'like', "%{$request->keyword}%")
        ->orderBy('date_published', 'DESC')
        ->limit(7)
        ->get();

    $data['blog_tranding'] = Blog::with('category')
        ->orderBy('hit', 'DESC')
        ->limit(7)
        ->get();

    return view('search', $data);
});
