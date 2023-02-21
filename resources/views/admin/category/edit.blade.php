@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Update Category</h1>

        <form method="POST" action="{{ url("admin/categories/{$category->id}")}}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">Chọn danh mục sản phẩm</label>
                <select class="form-select" name="parent_id">
                    <option value="0">Chọn danh mục mới</option>
                    {!! $htmlOption  !!}
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update category</button>
        </form>
    </div>
@endsection
