@extends('layouts.app')

@section('content')
<form action="" method="post" action="{{url('/user/update-cart')}}">
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px; width: 100%">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            {{-- <h6 class="mb-0 text-muted">3 items</h6> --}}
                                        </div>
                                        <hr class="my-4" />

                                        @php
                                            $total = 0;
                                        @endphp
{{-- @dd($products == null) --}}
                                        @if ($products != null)
                                            {{-- dd($user->products) --}}
                                            @foreach ($products as $product)
                                            @php
                                                
                                                $price = $product->price;
                                                $priceEnd = $price * $carts[$product->id];
                                                $total += $priceEnd;
                                            @endphp
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="{{ asset('storage/' . $product->feature_image_path . '/' . $product->feature_image_name) }}"
                                                            class="img-fluid rounded-3" alt="">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h4 class="text-black mb-0">{{ $product->name }}</h4>
                                                        <h6 class="text-muted">[ CHANEL x Clothing ][ CHANEL x Tops ][
                                                            CHANEL x Cropped ]</h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>

                                                        <input id="form1" min="0" name="num_product[{{$product->id}}]" value="{{$carts[$product->id]}}"
                                                            type="number" class="form-control form-control-sm" />

                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0">$ {{ $priceEnd }}</h6>
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        {{-- <a href="#!" class="text-muted">Delete</a> --}}
                                                        <a href="{{url("user/cart/delete/{$product->id}")}}"
                                                            onclick="confirm('Are you sure to delete this product?')"
                                                            class="btn btn-danger">Delete</a>
                                                        
                                                    </div>
                                                </div>

                                                <hr class="my-4" />
                                            @endforeach
                                            <input type="submit" value="Update Cart" formaction="{{url("/user/update-cart")}}" class="btn btn-dark btn-block btn-lg"
                                                data-mdb-ripple-color="dark" />
                                                
                                            @csrf
                                        @else
                                            <h1 style="text-align: center">None of Product</h1>
                                        @endif
                                        {{-- @for ($i = 0; $i < 5; $i++)


                                        {{-- @endfor --}}









                                        <div class="pt-5">
                                            <h6 class="mb-0">
                                                <a href="{{url('/user/product/index')}}" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Back
                                                    to shop</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5" style="background-color: #eae8e8;">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4" />

                                        {{-- <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">items 3</h5>
                                            <h5>€ 132.00</h5>
                                        </div> --}}
                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5>$ {{number_format($total)}}</h5>
                                        </div>

                                        <h5 class="text-uppercase mb-3">Shipping</h5>

                                        {{-- <div class="mb-4 pb-2">
                                            <select class="select">
                                                <option value="1">Standard-Delivery- €5.00</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                                <option value="4">Four</option>
                                            </select>
                                        </div> --}}

                                        <div class="mb-5">
                                            <input type="text" name="name" placeholder="Enter your name">
                                        </div>

                                        <div class="mb-5">
                                            <input type="text" name="phone" placeholder="Enter your phone">
                                        </div>

                                        <div class="mb-5">
                                            <input type="text" name="address" placeholder="Enter your address">
                                        </div>

                                        <div class="mb-5">
                                            <input type="text" name="email" placeholder="Enter your email">
                                        </div>

                                        <div class="mb-5">
                                            <textarea name="note" placeholder="Enter your note"></textarea>
                                        </div>

                                        <hr class="my-4" />

                                        {{-- <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5>$ {{number_format($total)}}</h5>
                                        </div> --}}

                                        <button type="submit" class="btn btn-dark btn-block btn-lg"
                                            data-mdb-ripple-color="dark">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection


@push('cart')
    <link rel="stylesheet" href="{{ url('assets/cart.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
@endpush
