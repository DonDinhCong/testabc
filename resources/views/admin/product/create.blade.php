@extends('admin.layouts.app')
@section('content')
    <div class="card mb-3 col-sm-12 col-xl-9">
        <div class="card-header">
            <h3 class="card-title">
                Create Product
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group mr-4">
                            <label>Brand <span style="color:red">*</span></label>
                            <select class="form-control" name="brand_id">
                                <option value="">Select Brand</option>
                                @foreach ($brands as $row)
                                    <option value="{{ $row->id }}">{{ $row->brand_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('brand_id')
                            <div class="alert alert-danger mr-4">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="form-group ml-4">
                            <label>Avatar <span style="color:red">*</span></label>
                            <input class="w-100" type="file" name="product_avatar" accept="image/x-png,image/gif,image/jpeg" value="{{ old('product_avatar') }}">
                        </div>
                        @error('product_avatar')
                            <div class="alert alert-danger ml-4">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Title <span style="color:red">*</span></label>
                    <input type="text" name="product_title"
                        class="form-control @error('product_title') is-invalid @enderror"
                        value="{{ old('product_title') }}">
                </div>
                @error('product_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Description </label>
                    <input type="text" name="product_des" class="form-control @error('product_des') is-invalid @enderror"
                        value="{{ old('product_des') }}">
                </div>
                @error('product_des')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-sm-12 col-xl-6 pr-4">
                        <div class="form-group">
                            <label>Code <span style="color:red">*</span></label>
                            <input type="text" name="product_code"
                                class="form-control @error('product_code') is-invalid @enderror"
                                value="{{ old('product_code') }}">
                        </div>
                        @error('product_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Gender <span style="color:red">*</span></label><br>
                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="product_gender" value="1"
                                    {{ old('product_gender') == 1 ? 'checked' : '' }}>
                                <label class="form-check-label">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="product_gender" value="2"
                                    {{ old('product_gender') == 2 ? 'checked' : '' }}>
                                <label class="form-check-label">Nữ</label>
                            </div>
                        </div>
                        @error('product_gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Size <span style="color:red">*</span></label>
                            <input type="number" name="product_size" min="10" max="50"
                                class="form-control @error('product_size') is-invalid @enderror"
                                value="{{ old('product_size') }}">
                        </div>
                        @error('product_size')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Color <span style="color:red">*</span></label>
                            <input type="text" name="product_color"
                                class="form-control @error('product_color') is-invalid @enderror"
                                value="{{ old('product_color') }}">
                        </div>
                        @error('product_color')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Guarantee (month)</label>
                            <input type="number" name="product_guarantee" min="12" max="99"
                                class="form-control @error('product_guarantee') is-invalid @enderror"
                                value="{{ old('product_guarantee') == null ? 12 : old('product_guarantee') }}">
                        </div>
                        @error('product_guarantee')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Price (Vnd)<span style="color:red">*</span></label>
                            <input type="number" name="product_price" min="0" max="999999999"
                                class="form-control @error('product_price') is-invalid @enderror"
                                value="{{ old('product_price') }}">
                        </div>
                        @error('product_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-xl-6 pl-4">
                        <div class="form-group">
                            <label>Origin <span style="color:red">*</span></label>
                            <input type="text" name="product_origin"
                                class="form-control @error('product_origin') is-invalid @enderror"
                                value="{{ old('product_origin') }}">
                        </div>
                        @error('product_origin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Band material <span style="color:red">*</span></label>
                            <input type="text" name="product_band"
                                class="form-control @error('product_band') is-invalid @enderror"
                                value="{{ old('product_band') }}">
                        </div>
                        @error('product_band')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Glass material <span style="color:red">*</span></label>
                            <input type="text" name="product_glass"
                                class="form-control @error('product_glass') is-invalid @enderror"
                                value="{{ old('product_glass') }}">
                        </div>
                        @error('product_glass')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Case material <span style="color:red">*</span></label>
                            <input type="text" name="product_case"
                                class="form-control @error('product_case') is-invalid @enderror"
                                value="{{ old('product_case') }}">
                        </div>
                        @error('product_case')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Quantity warehouse</label>
                            <input type="number" name="product_quantity" min="0" max="999"
                                class="form-control @error('product_quantity') is-invalid @enderror"
                                value="{{ old('product_quantity') == null ? 0 : old('product_quantity') }}">
                        </div>
                        @error('product_quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <button class="btn btn-primary mr-3" type="submit">Choose Category And Add Gallery</button>
                <a class="btn btn-secondary" href="{{ route('products.index') }}">Quay Lại</a>
            </form>
        </div>
    </div>
@endsection
