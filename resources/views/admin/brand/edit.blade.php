@extends('admin.layouts.app')
@section('content')
        <div class="card col-sm-12 col-xl-6">
            <div class="card-header">
                <h3 class="card-title">
                    Edit Brand
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('brands.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image <span style="color:red">*</span></label>
                        <div class="w-100 pb-2">
                            <img width="120px" src="{{ asset('images/' . $brand->brand_image) }}" alt="" />
                        </div>
                        <input class="w-100" type="file" name="brand_image" value="" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <div class="form-group">
                        <label>Title <span style="color:red">*</span></label>
                        <input type="text" name="brand_title" class="form-control @error('brand_title') is-invalid @enderror"
                            value="{{ $brand->brand_title }}">
                    </div>
                    @error('brand_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Description <span style="color:red">*</span></label>
                        <input type="text" name="brand_des" class="form-control @error('brand_des') is-invalid @enderror"
                            value="{{ $brand->brand_des }}">
                    </div>
                    @error('brand_des')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-primary mr-3" type="submit">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('brands.index') }}">Quay Lại</a>
                </form>
            </div>
        </div>
@endsection
