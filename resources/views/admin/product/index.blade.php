@extends('admin.layouts.app')
@section('content')
    <div class="card">
        @include('layouts.flash-message')
        <div class="card-header">
            <h2 class="card-title">Categories</h2>
            <a class="btn btn-success float-right" href="{{ route('products.create') }}">Create</a>
        </div>
        <div class="card-body">
            <form id="submitDon" action="{{ route('products.index') }}" class="row mb-3" method="get">
                <div class="pl-2">
                    <select class="form-control selectDon" name="perPage">
                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
                        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                    </select>
                </div>
                <div class="input-group col-6">
                    <input type="search" class="form-control rounded" placeholder="Search..." name="search"
                        value="{{ $search }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>

            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th>ID </th>
                        <th>Avatar </th>
                        <th>Title </th>
                        <th>Code </th>
                        <th>Brand </th>
                        <th>Categories </th>
                        <th>Price </th>
                        <th>Guarantee</th>
                        <th>Quantity </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>
                                <img width="200px" src="{{ asset('images/'.$row->product_avatar) }}"/>
                            </td>
                            <td>{{ $row->product_title }}</td>
                            <td>{{ $row->product_code }}</td>
                            <td>{{ $row->brand->brand_title }}</td>
                            <td>
                                @foreach ($row->mapCates as $mapCate)
                                    <p>{{ $mapCate->cate->cate_title }}</p>
                                @endforeach 
                            </td>
                            <td>{{ $row->product_price }} VND</td>
                            <td>{{ $row->product_guarantee }} Month</td>
                            <td>{{ $row->product_quantity }}</td>
                            <td>
                                <a class="btn btn-warning text-white" href="{{ route('products.edit', $row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a data-action="{{ route('products.destroy', $row->id) }}" class="btn btn-danger delete"
                                    data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ml-3">
            {{ $products->appends(['search' => $search, 'perPage' => $perPage])->links() }}
        </div>
    </div>
    @include('admin.layouts.modal')
@endsection
