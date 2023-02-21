@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1 style="font-size: 40px">Result of search...</h1>
            
            <div class="col-md-12 products">
                @foreach ($data as $item)
            <a href="">

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
                {{-- @endfor --}}
                
            </div>
        </div>
        <div class="col-md-12 display-flex-center">
            {{ $data->links() }}
        </div>
        <div class="pt-5">
            <h6 class="mb-0">
                <a href="{{url('/user/product/index')}}" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Back
                    to shop</a>
            </h6>
        </div>
    </div>
@endsection

@push('cssProductIndex')
    <link rel="stylesheet" href="{{ url('assets/userProduct.css') }}">
@endpush
