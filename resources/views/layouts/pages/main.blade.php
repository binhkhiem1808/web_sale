@extends('layouts.app')


@section('content')
    <section>


        {{-- Slider --}}
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/img/slider01.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/img/slider02.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/img/slider001.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        {{-- New product --}}
        {{-- <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>New Product</h1>
                </div>
            </div>
        </div> --}}
    


        <div class="container">
            <div class="row">
                <div class="col-md-12 products">
                    @foreach ($products as $item)
                    <a href="{{url("user/product/{$item->id}/watch/{$item->id}/detail")}}">
        
                        <div class="card">
                            <img src="{{ asset('storage/' .$item->feature_image_path.'/'.$item->feature_image_name)}}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">CHANEL</h5>
                                <p class="card-text">{{$item->name}}</p>
                                <p class="card-text">Size: M</p>
                                <h6 class="card-text">$ {{$item->price}}</h6>
                                </div>
                            </div>
                    </a>
                        @endforeach
                </div>
            </div>
        </div>

        {{-- Events --}}


        <a href="https://www.purseblog.com/chanel/our-look-at-chanel-cruise-23-from-miami/" target="_blank" class="events">
            <h2 class="title">GARBRIELLE CHANEL</h2>
            <h3 class="subtitle">FASHION MANIFESTO EXHIBITION</h3>
            <p class="place">MITSUBISHI ICHIGOKAN MUSEUM, TOKYO</p>
            <p class="time">18.06.22 - 25.09.22</p>
        </a>


{{-- 
        <div id="special" class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Special Product</h1>
                </div>
            </div>
        </div> --}}


        {{-- <div class="container"> --}}
            <div class="gallery">
                <div class="img-box">
                    <h3>Sealary</h3>
                </div>
                <div class="img-box">
                    <h3>Madam</h3>
                </div>
                <div class="img-box">
                    <h3>Eva</h3>
                </div>
                <div class="img-box">
                    <h3>Umbrella</h3>
                </div>
                
            </div>
        {{-- </div> --}}

{{-- 
            <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End --> --}}


    {{-- Blog --}}

    
    <div id="special" class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Fashion Blog</h1>
            </div>
        </div>
    </div>

    <hr class="my-4" style="width: 44%;
    text-align: center;
    display: flex;
    justify-content: center;
    margin: auto; color: #000;">

    <div class="container">
        <div class="row">
            <a target="_blank" href="https://www.purseblog.com/chanel/at-chanel-its-all-about-color-for-pre-collection-spring-2023/" class="col-md-4 blog">
                <img src="https://static.purseblog.com/images/2023/01/Chanel-Pre-Spring-2023-510x383.jpg" alt="">
                <h3>At Chanel It’s All About Color for Pre-Collection Spring 2023</h3>
                <p>And the rumor mill is spinning with talks of a 2023 price increase.Today we’ve got a bit of good news and a bit of bad news, but let’s start with the good. A brand new Chanel collection has just dropped. Chanel Pre-Collection Spring 2023 is sure to delight.</p>
            </a>


            <a target="_blank" href="https://www.purseblog.com/chanel/is-chanel-on-its-way-to-becoming-the-new-hermes/" class="col-md-4 blog">
                <img src="https://static.purseblog.com/images/2022/12/Chanel-Cruise-BITW-7-of-51.jpg" alt="">
                <h3>Chanel Métiers d’Art 2023 is a Bold Ode to the Seventies</h3>
                <p> Chanel fans are captivated by the brand’s Pre-Fall presentation. Known as the Metiers d’Art collection, it celebrates Chanel artisans’ incredible skills and craftsmanship. It is one of the brand’s most anticipated collections of the year thanks to the often ornate details and many collector’s items that appear each season. </p>
            </a>


            <a target="_blank" href="https://www.purseblog.com/chanel/is-chanel-on-its-way-to-becoming-the-new-hermes/" class="col-md-4 blog">
                <img src="https://static.purseblog.com/images/2022/12/Chanel-Cruise-BITW-7-of-51.jpg" alt="">
                <h3>Is Chanel On Its Way to Becoming the New Hermès?</h3>
                <p>Chanel has been discussed from all angles recently. Whether through its much-critiqued price-hikes fast leaping out of the budgets of most buyers wishing to purchase the brand’s Holy Grail trifecta – the Classic Flap, the Reissue, and the Boy.</p>
            </a>
        </div>
    </div>

    


    </section>
@endsection


@push('cssProductIndex')
    {{-- <link rel="stylesheet" href="{{ url('assets/userProduct.css') }}"> --}}
@endpush


