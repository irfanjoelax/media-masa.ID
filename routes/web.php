<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
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
        ->limit(10)
        ->get();

    $data['trending_blogs'] = Blog::with('category')
        ->where('category_id', $data['category']->id)
        ->orderBy('hit', 'DESC')
        ->limit(7)
        ->get();

    // $data['tags'] = Tag::orderBy('name')->get();

    return view('category', $data);
});

Route::get('/blog/{slug}', function ($slug) {
    $data['blog'] = Blog::where('slug', $slug)
        ->firstOrFail();

    // $data['list_blogs'] = Blog::with('category')
    //     ->where('category_id', $data['category']->id)
    //     ->latest()
    //     ->limit(10)
    //     ->get();

    // $data['trending_blogs'] = Blog::with('category')
    //     ->where('category_id', $data['category']->id)
    //     ->orderBy('hit', 'DESC')
    //     ->limit(7)
    //     ->get();

    // $data['tags'] = Tag::orderBy('name')->get();

    return view('blog', $data);
});
