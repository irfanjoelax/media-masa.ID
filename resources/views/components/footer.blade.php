<div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('img/logo-text.png') }}" width="200" alt="Logo">
            </a>
            <p>Jalan Rapak Indah Gang Ramadhan No.127 Balikpapan, Kalimantan Timur</p>
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $Facebook }}"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $Instagram }}"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $Youtube }}"><i class="fab fa-youtube"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $Whatsapp }}"><i class="fab fa-whatsapp"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $Email }}"><i class="fas fa-envelope-open-text"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Categories</h4>
            <div class="d-flex flex-wrap m-n1">
                @foreach ($categories as $category)
                <a href="{{ url('category/'. $category->slug) }}" class="btn btn-sm btn-outline-primary m-1">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Tags</h4>
            <div class="d-flex flex-wrap m-n1">
                @foreach ($tags as $tag)
                <a href="{{ url('tag/'. $tag->slug) }}" class="btn btn-sm btn-outline-primary m-1">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Quick Links</h4>
            <div class="d-flex flex-column justify-content-start">
                @foreach ($pages as $page)
                <a class="text-secondary mb-2" href="{{ url('page/'. $page->slug) }}"><i class="fa fa-angle-right text-dark mr-2"></i>
                    {{ $page->title }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
