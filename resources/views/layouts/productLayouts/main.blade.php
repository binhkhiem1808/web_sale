@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3 style="font-weight: bold">Categories</h3>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">
                    <div class="navbar-nav w-100">
                        <a href="{{ url("user/product/index") }}" class="nav-item nav-link">All</a>
                        @foreach ($categories as $item)
                            <a href="{{ url("user/product/{$item->id}/watch") }}"
                                class="nav-item nav-link">{{ $item->name }}</a>
                        @endforeach

                    </div>
                    
                </nav>
            </div>
            <div class="col-md-9 products">


                @foreach ($product as $item)
                <?php 
                    // echo is_integer((int)$item->products->pluck('category_id')); 

                    // str_split($)

                    // dd(strlen($products));

                    // dd($category->id == (int)$item->products->implode('category_id',', '));
                ?>
                {{-- @for ($product = 0; $product < strlen($products); $product++)
                    @if ($category->id == $item->products->pluck('category_id')[$product]) --}}
                        <a href="{{url("user/product/{$item->id}/watch/{$item->id}/detail")}}">
                                
                                                            <div class="card">
                                                                <img src="{{ asset('storage/' . $item->feature_image_path . '/' . $item->feature_image_name) }}"
                                                                    class="card-img-top" alt="">
                                                                    {{-- <img src="{{asset('img/event01.jpg')}}" alt=""> --}}
                                                                <div class="card-body">
                                                                    <h5 class="card-title">CHANEL</h5>
                                                                    <p class="card-text">{{$item->name}}</p>
                                                                    <p class="card-text">Size: M</p>
                                                                    <h6 class="card-text">${{$item->price}}</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                    
                    {{-- @endif
                    @endfor --}}
                    
                @endforeach
                {{-- @endfor --}}

            </div>
        </div>
        <div class="col-md-12 display-flex-center">
            {{-- {{ $product->links() }} --}}
        </div>
    </div>
@endsection

@push('cssProductIndex')
    <link rel="stylesheet" href="{{ url('assets/userProduct.css') }}">
@endpush
