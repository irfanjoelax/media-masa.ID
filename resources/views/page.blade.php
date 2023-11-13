@extends('layouts.web')

@section('title', $page->title)

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
            <span class="breadcrumb-item" href="#">Page</span>
            <span class="breadcrumb-item active">{{ $page->title }}</span>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">{{ $page->title }}</h3>
                </div>

                <div class="my-4">
                    {!! $page->content !!}
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
                    @foreach ($blog_tranding as $tranding)
                    <div class="d-flex mb-3">
                        <img src="{{ asset('storage/'. $tranding->image) }}"
                            style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                            style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a href="{{ url('category/'. $tranding->category->slug) }}">{{ $tranding->category->name
                                    }}</a>
                                <span class="px-1">/</span>
                                <span>{{ $tranding->date_published->diffForHumans() }}</span>
                            </div>
                            <a class="h6 m-0" href="{{ url('blog/'. $tranding->slug) }}">{{ $tranding->title }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Popular News End -->
            </div>
        </div>
    </div>
</div>
@endsection