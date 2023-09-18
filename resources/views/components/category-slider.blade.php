<div class="container-fluid">
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">{{ $category->name }}</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    @foreach ($category->blogs->take(4)->sortByDesc('created_at') as $blog)
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="{{ asset('storage/'. $blog->image) }}" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="{{ url('category/'. $blog->category->slug) }}">{{  $blog->category->name }}</a>
                                <span class="px-1">/</span>
                                <span>{{ $blog->created_at->diffForHumans() }}</span>
                            </div>
                            <a class="h5 m-0" href="{{ url('blog/'. $blog->slug) }}">{{ $blog->title }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
