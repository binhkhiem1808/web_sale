@extends('layouts.app')

@section('content')
    <div id="detail" class="container">
        <div class="row">
            <div id="productImg" class="col-md-7">
                <img src="{{ asset('storage/' . $product->feature_image_path . '/' . $product->feature_image_name) }}"
                    class="card-img-top" alt="">
            </div>

            <div class="col-md-5 information">
                <h1>{{ $product->name }}</h1>
                <p class="sales">[ CHANEL x Clothing ][ CHANEL x Tops ][ CHANEL x Cropped ]</p>
                <h6>${{ number_format($product->price) }}</h6>
                <p class="description">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit
                    clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea
                    nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et
                    rebum kasd rebum.</p>
                <form method="POST" action="{{ url('/user/add-cart') }}">
                    <input style="width: 70px; height: 40px" class="text-center" type="number" name="num_product"
                        value="1" id="">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    {{-- <div class="buy"> --}}
                    {{-- <a href="" class="buyNow">Buy Now</a> --}}
                    <button class="btn-danger addToCard">Add To Cart</button>
                    {{-- </div> --}}
                    @csrf
                </form>
            </div>
        </div>

        <div class="row">
            <div class="desc">
                <h3>Product Description</h3>
                <p>Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt
                    ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est
                    lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum..Volup erat ipsum
                    diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore
                    clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam
                    sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.Volup erat ipsum diam elitr rebum
                    et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna
                    lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet
                    at lorem et eirmod ipsum diam et rebum kasd rebum.</p>
            </div>
        </div>
    </div>
        <div class="container">

            <div class="row">
                <div class="title" style="    text-align: center;
                margin-top: 64px;
                text-transform: uppercase;
                letter-spacing: 18px;
                margin-bottom: 10px; 
                margin-bottom: 30px;">
                    <h1>Related Product</h1>
                </div>
            </div>

            <div class="row">
                
                @foreach ($productRelative as $item)
                <div class="col-md-3">
                        <a href="{{ url("user/product/{$item->id}/watch/{$item->id}/detail") }}">

                            <div class="card">
                                <img src="{{ asset('storage/' . $item->feature_image_path . '/' . $item->feature_image_name) }}"
                                    class="card-img-top" alt="">
                                {{-- <img src="{{asset('img/event01.jpg')}}" alt=""> --}}
                                <div class="card-body">
                                    <h5 class="card-title">CHANEL</h5>
                                    <p class="card-text">{{ $item->name }}</p>
                                    <p class="card-text">Size: M</p>
                                    <h6 class="card-text">${{ $item->price }}</h6>
                                </div>
                            </div>
                        </a>

                    
                    </div>                            
                        @endforeach
                </div>


            
        </div>

    </div>
@endsection


@push('detail')
    <link rel="stylesheet" href="{{ url('assets/detail.css') }}">
@endpush
