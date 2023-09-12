@extends('layouts.web')

@section('title', 'Kategori')

@section('content')
    {{-- <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">{{ $category->name }}</h3>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                @foreach ($popular_blogs as $popBlog)
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="{{ asset('storage/'. $popBlog->image) }}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="{{ url('category/'. $popBlog->category->slug) }}">{{ $popBlog->category->name }}</a>
                            <span class="px-1 text-white">/</span>
                            <span class="text-white">{{ $popBlog->created_at->diffForHumans() }}</span>
                        </div>
                        <a class="h5 m-0 text-white" href="{{ url('blog/'. $popBlog->slug) }}">{{ $popBlog->title }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured News Slider End --> --}}

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                <span class="breadcrumb-item" href="#">Category</span>
                <span class="breadcrumb-item active">{{ $category->name }}</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">{{ $category->name }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @foreach ($list_blogs as $listBlog)
                            <div class="d-flex mb-3">
                                <img src="{{ asset('storage/'. $listBlog->image) }}" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="{{ url('category/'. $listBlog->category->slug) }}">{{ $listBlog->category->name }}</a>
                                        <span class="px-1">/</span>
                                        <span>{{ $listBlog->created_at->diffForHumans() }}</span>
                                    </div>
                                    <a class="h5 m-0" href="{{ url('blog/'. $listBlog->slug) }}">{{ $listBlog->title }}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">
                    <!-- Ads Start -->
                    <div class="mb-3 pb-3">
                        <img class="img-fluid" src="{{ asset('img/ads-example.jpeg') }}" alt="">
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tranding</h3>
                        </div>
                        @foreach ($trending_blogs as $trendBlog)
                        <div class="d-flex mb-3">
                            <img src="{{ asset('storage/'. $trendBlog->image) }}" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="{{ url('category/'. $trendBlog->category->slug) }}">{{ $trendBlog->category->name }}</a>
                                    <span class="px-1">/</span>
                                    <span>{{ $trendBlog->created_at->diffForHumans() }}</span>
                                </div>
                                <a class="h6 m-0" href="{{ url('blog/'. $trendBlog->slug) }}">{{ $trendBlog->title }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                    {{-- <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tags</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($tags as $tag)
                            <a href="{{ url('tag/'. $tag->slug) }}" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                            @endforeach
                        </div>
                    </div> --}}
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
