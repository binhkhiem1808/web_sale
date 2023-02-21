@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Create new category</h1>

        <form method="POST" action="{{ url('admin/categories/create')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục sản phẩm</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">Chọn danh mục sản phẩm</label>
                <select class="form-select" name="parent_id">
                    <option value="0">Chọn danh mục mới</option>
                    {!! $htmlOption  !!}
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
