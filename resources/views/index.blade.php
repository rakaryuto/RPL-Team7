@extends('layouts.app')

@section('navbuttons')
<div class="nav-left collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav text-center">
        <li class="nav-item">
            <a href="#landing" class="nav-link">HOME</a>
        </li>
        <li class="nav-item">
            <a href="#testimonials" class="nav-link">ABOUT US</a>
        </li>
        <li class="nav-item">
            <a href="#menu" class="nav-link">MENU</a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<section id="landing">
    <div class="banner container">
        <div class="row content">
            <div class="col-lg-6 textbox justify-content-center">
                <h2>KOPIKIMO</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos nobis ea qui animi recusandae,
                    molestias quas ratione quod debitis. Voluptate modi exercitationem harum in. Doloremque ut ea ipsa
                    repellendus neque.</p>
                <button> GO TO SHOP</button>
            </div>
            <div class="imgbox col-lg-6 text-center">
                <img src="{{ asset('asset/Photo.svg') }}" alt="" srcset="">
            </div>
            <div class="contact">
                <a href="" class="whatsapp">
                    <img src="{{ asset('asset/WhatsApp.svg') }}" alt="" srcset="">
                </a>
                <a href="https://www.instagram.com/officialkopikimo/" class="instagram">
                    <img src="{{ asset('asset/Vector (1).svg') }}" alt="" srcset="">
                </a>
                <a href="" class="twitter">
                    <img class="twitter-img" src="{{ asset('asset/Vector (2).svg') }}" alt="" srcset="">
                </a>
            </div>
        </div>
    </div>
</section>

<section id="testimonials">
    <div class="container">
        <div class="headline">
            <h3>TESTIMONIALS</h3>
        </div>
        <div class="content">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner carousel-testi">
                    <div class="carousel-item active justify-content-center text-center align-items-center">
                        <p class="d-block w-100">"RASA DARI BIJI KOPI NYA KERASA BANGET, DITAMBAH DENGAN GULA ARENNYA
                            NGASIH TEKSTUR MANIS YANG GA TERLALU BERLEBIHAN TAPI MASIH BISA MEMBERIKAN RASA ENAK YANG
                            PAS BANGET."</p>
                    </div>
                    <div class="carousel-item justify-content-center text-center align-items-center">
                        <p class="d-block w-100">"RASA DARI BIJI KOPI NYA KERASA BANGET, DITAMBAH DENGAN GULA ARENNYA
                            NGASIH TEKSTUR MANIS YANG GA TERLALU BERLEBIHAN TAPI MASIH BISA MEMBERIKAN RASA ENAK YANG
                            PAS BANGET."</p>
                    </div>
                    <div class="carousel-item justify-content-center text-center align-items-center">
                        <p class="d-block w-100">"RASA DARI BIJI KOPI NYA KERASA BANGET, DITAMBAH DENGAN GULA ARENNYA
                            NGASIH TEKSTUR MANIS YANG GA TERLALU BERLEBIHAN TAPI MASIH BISA MEMBERIKAN RASA ENAK YANG
                            PAS BANGET."</p>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

<section id="menu">
    <div class="container">
        <h3>Beverages</h3>

        <div class="row menu-bar baverages">
            @foreach ($coffees as $item)
            <div class="card col-lg-3 col-md-4 col-sm-4" style="width: 18rem;">
                <img src="{{ asset('asset/Photo.svg') }}" class="card-img-top" alt="..." style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <p>Stock : {{ $products->where('coffee_id', $item->id)->sum('stock') }}</p>
                    <a href="/product/{{ $item->id }}" class="btn btn-primary">BUY</a>
                </div>
            </div>
            @endforeach
        </div>

</section>
@endsection