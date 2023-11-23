<div class="container-fluid p-0 mb-3">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
        <a href="" class="navbar-brand d-block d-lg-none">
            {{-- <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">Media</span>Masaid</h1> --}}
            <img src="{{ asset('img/logo-text.png') }}" width="150" alt="Logo">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link active">Beranda</a>

                @foreach ($categories as $menu)
                <a href="{{ url('category/'. $menu->slug) }}" class="nav-item nav-link">{{ $menu->name }}</a>
                @endforeach


                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="#" class="dropdown-item">Menu item 1</a>
                        <a href="#" class="dropdown-item">Menu item 2</a>
                        <a href="#" class="dropdown-item">Menu item 3</a>
                    </div>
                </div> --}}
            </div>
            <form action="{{ url('/search') }}" method="GET" class="input-group ml-auto"
                style="width: 100%; max-width: 300px;">
                <input type="search" name="keyword" class="form-control" placeholder="Search..">
                <div class="input-group-append">
                    <button class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </nav>
</div>