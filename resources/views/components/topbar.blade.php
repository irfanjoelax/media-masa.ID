<div class="container-fluid">
    <div class="row align-items-center text-white px-lg-5" style="background-color: #1E0FEE">
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-between">
                <div class="bg-gray text-white text-center py-2" style="width: 100px;">Trending</div>
                <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                    style="width: calc(100% - 100px); padding-left: 90px;">
                    @foreach ($blogsTrending as $trending)
                    <div class="text-truncate"><a class="text-white" href="{{ url('blog/'. $trending->slug) }}">{{
                            $trending->title }}</a></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 text-right d-none d-md-block">
            <span class="dateDisplay"></span>
        </div>
    </div>
    <div class="row align-items-center py-2 px-lg-5">
        <div class="col-lg-4">
            <a href="" class="navbar-brand d-none d-lg-block">
                <img src="{{ asset('img/logo-ada-putihnya.png') }}" width="300" alt="Logo">
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <img class="img-fluid" src="{{ asset('img/banner-23-11-2023.jpg') }}" alt="Banner">
        </div>
    </div>
</div>