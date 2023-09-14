@extends('layouts.web')

@section('title', $blog->title)

@section('meta-tag')
<meta property="og:title" content="{{ $blog->title }}">
<meta property="og:description" content="{{ $blog->content }}">
<meta property="og:image" content="{{ asset('storage/'. $blog->image) }}">
<meta property="og:url" content="{{ url('blog/'. $blog->slug) }}">
@endsection

@section('extra-style')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6502b86395430c0012210bbe&product=sop' async='async'></script>
@endsection

@section('content')
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="{{ asset('storage/'. $blog->image) }}" style="object-fit: cover;">
                    <div class="overlay position-relative bg-light">
                        <div class="mb-3">
                            <a href="{{ url('category/'. $blog->category->slug) }}">{{ $blog->category->name }}</a>
                            <span class="px-1">/</span>
                            <span>{{ $blog->created_at->diffForHumans() }}</span>
                            <span class="px-1">/</span>
                            <span>{{ $blog->hit }} views</span>
                        </div>
                        <div>
                            <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                        </div>

                        <div class="my-4">
                            {!! $blog->content !!}
                        </div>

                        <!-- ShareThis BEGIN --><div class="sharethis-inline-reaction-buttons"></div><!-- ShareThis END -->
                    </div>
                </div>
                <!-- News Detail End -->
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
                        <h3 class="m-0">Serupa</h3>
                    </div>
                    @foreach ($blog_serupa as $serupa)
                    <div class="d-flex mb-3">
                        <img src="{{ asset('storage/'. $serupa->image) }}" style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a href="{{ url('category/'. $serupa->category->slug) }}">{{ $serupa->category->name }}</a>
                                <span class="px-1">/</span>
                                <span>{{ $serupa->created_at->diffForHumans() }}</span>
                            </div>
                            <a class="h6 m-0" href="{{ url('blog/'. $serupa->slug) }}">{{ $serupa->title }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Popular News End -->

                <!-- Tags Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Tags</h3>
                    </div>
                    <div class="d-flex flex-wrap m-n1">
                        @foreach ($blog->tags as $tag)
                        <a href="{{ url('tag/'. $tag->slug) }}" class="btn btn-sm btn-outline-secondary m-1">
                            {{ $tag->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
@endsection
