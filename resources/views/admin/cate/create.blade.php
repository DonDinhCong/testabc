@extends('admin.layouts.app')
@section('content')
    <div class="card col-sm-12 col-xl-6 mb-3">
        <div class="card-header">
            <h3 class="card-title">
                Create Category
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cates.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Image <span style="color:red">*</span></label>
                    <input class="w-100" type="file" name="cate_image" accept="image/x-png,image/gif,image/jpeg">
                </div>
                @error('cate_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Title <span style="color:red">*</span></label>
                    <input type="text" name="cate_title" class="form-control @error('cate_title') is-invalid @enderror"
                        value="{{ old('cate_title') }}">
                </div>
                @error('cate_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-primary mr-3" type="submit">Submit</button>
                <a class="btn btn-secondary" href="{{ route('cates.index') }}">Quay Lại</a>
            </form>
        </div>
    </div>
@endsection
