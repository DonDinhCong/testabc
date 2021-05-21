@extends('admin.layouts.app')
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            @include('layouts.flash-message')
            <h3 class="card-title">
                Add Images To Gallery And Choose Category
            </h3>
        </div>
        <div class="card-body row">
            <div class="form-group col-sm-12 col-xl-9 pl-3">
                <div class="form-group">
                    <label class="mb-3">Add Image</label>
                    <form action="{{route('products.addImage')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input class="w-100" type="file" multiple name="gallery_image[]" id="addImageToGallery"
                        accept="image/x-png,image/gif,image/jpeg">
                        <input type="hidden" name="product_title" value="{{$product->product_title}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                    </form>
                </div>
                <div class="mt-3 pt-3 border-top form-group d-flex flex-wrap">
                    @foreach ($gallery as $row)
                        <div class="pr-3 pb-3 position-relative">
                            <img width="180px" height="180px" src="{{ asset('images/' . $row->gallery_image) }}" alt="">
                            <a style="top:2px; right:18px" data-action="{{ route('products.destroyImage', $row->id) }}"
                                class="btn btn-sm btn-danger position-absolute delete" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group col-sm-12 col-xl-3 border-left">
                <div class="pl-4">
                    <label class="mb-3">Choose Category </label>
                    <form id="chooseCate" action="{{ route('products.chooseCate') }}" method="post">
                        @csrf
                        @foreach ($cates as $row)
                            <div class="form-check">
                                <input class="form-check-input" name="cate_id[]" type="checkbox" value="{{ $row->id }}" @foreach ($product->mapCates as $mapRow) {{ $mapRow->cate_id == $row->id ? 'checked' : '' }} @endforeach>
                                <label class="form-check-label">{{ $row->cate_title }}</label>
                            </div>
                        @endforeach
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button class="btn btn-primary mt-3" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="border-top">
            <a class="btn btn-secondary my-3 ml-3" href="{{ route('products.index') }}">Quay Lại</a>
        </div>
    </div>
    @include('admin.layouts.modal')
@endsection