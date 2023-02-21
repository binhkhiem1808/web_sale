@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('admin/categories/create') }}" class="btn btn-success m-3 float-right">Add category</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Product</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    @if ($item->products()->exists())
                                        {{ $item->products->pluck('category_id')}}
                                        {{-- <img src="{{ asset('storage/' .$item->products->implode('feature_image_path',', ').'/'.$item->products->implode('feature_image_name',', '))}}" alt=""> --}}
                                    {{-- {{ <img src="{{ asset('storage/' .$item->products->feature_image_path.'/'.$item->products->feature_image_name)}}" alt="">}} --}}
                                        
                                        {{-- {{ $item->products->}} --}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url("admin/categories/{$item->id}/edit")}}" class="btn btn-warning">Update</a>
                                    <a href="javascript:void(0)" onclick="confirm('Are you sure to delete this category?') && document.getElementById('delete-' + {{$item->id}}).submit()" class="btn btn-danger">Delete</a>
                                    <form id="delete-{{$item->id}}" method="POST" action="{{ url("admin/categories/{$item->id}")}}">
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
        {{-- <div class="col-md-12">
            {{ $categories->links() }}
        </div> --}}
    </div>

@endsection
