@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-12">
                <a href="{{ url('admin/product/create') }}" class="btn btn-success m-3 float-right">Add Product</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hình ảnh</th>
                            {{-- <th scope="col">Danh mục</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>
                                    <img src="{{ asset('storage/' .$item->feature_image_path.'/'.$item->feature_image_name)}}" alt="">
                            </td>
                                {{-- <td>{{ $item->categories->name}}</td> --}}
                                <td>
                                    <a href="{{url("admin/product/{$item->id}/edit")}}" class="btn btn-warning">Update</a>
                                    <a href="javascript:void(0)" onclick="confirm('Are you sure to delete this product?') && document.getElementById('delete-' + {{$item->id}}).submit()" class="btn btn-danger">Delete</a>
                                    <form id="delete-{{$item->id}}" method="POST" action="{{ url("admin/product/{$item->id}")}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <div class="col-md-12">
                {{ $products->links() }}
        </div>
    </div>

    @endsection
    
    @push('cssProductIndex')
    <link rel="stylesheet" href="{{url('assets/productIndex.css')}}">
    @endpush
    