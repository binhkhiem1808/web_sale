@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create new product</h1>

        <form method="POST" action="{{ url('admin/product/create') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" class="form-control">
            </div>

            <div class="form-floating mb-3">
                <label id="content">Content</label>
                <textarea class="form-control" name="content" style="height: 100px"></textarea>
            </div>
            {{-- @foreach ($products as $item) --}}
            <div class="mb-3">
                <label for="feature_image_path" class="form-control">Ảnh sản phẩm</label>
                <input type="file" name="feature_image_path" class="form-control-file">
                {{-- <img src="{{ asset('storage/' .$item->feature_image_path.'/'.$item->feature_image_name)}}" alt=""> --}}
            </div>
            {{-- @endforeach --}}
{{-- 
            <div class="mb-3">
                <label for="image_path" class="form-label">Ảnh chi tiết</label>
                <input type="file" name="image_path[]" class="form-control">
            </div> --}}

            <div class="mb-3">
                <label for="category_id" class="form-label">Chọn danh mục sản phẩm</label>
                <select class="form-select select-category" name="category_id">
                    <option value="0">Chọn danh mục mới</option>
                    {!! $htmlOption !!}
                </select>
            </div>
            {{-- <div class="mb-3">
                <label for="">Tag</label>
                <select name="tags[]" class="form-control select-tag-choose" multiple="multiple">
                    
                </select>
            </div> --}}


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('cssSelect')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ url('js/selectCreate.js') }}"></script>
@endpush
