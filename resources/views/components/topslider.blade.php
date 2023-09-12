<div class="container-fluid py-3">
    <div class="container">
        <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
            @foreach ($top_slider_blog as $topslider)
            <div class="d-flex">
                <img src="{{ asset('storage/'. $topslider->image) }}" style="width: 80px; height: 80px; object-fit: cover;">
                <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                    <a class="text-secondary font-weight-semi-bold" href="{{ url('blog/'. $topslider->slug) }}">
                        {{ $topslider->title }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
