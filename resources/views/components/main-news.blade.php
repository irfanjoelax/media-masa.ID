<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                    @foreach ($main_news_blog as $mainNews)
                    <div class="position-relative overflow-hidden" style="height: 435px;">
                        <img class="img-fluid h-100" src="{{ asset('storage/'. $mainNews->image) }}"
                            style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white" href="{{ url('category/'. $mainNews->category->slug) }}">{{
                                    $mainNews->category->name }}</a>
                                <span class="px-2 text-white">/</span>
                                <span class="text-white">{{ $mainNews->date_published->diffForHumans() }}</span>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="{{ url('blog/'. $mainNews->slug) }}">
                                {{ $mainNews->title }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>