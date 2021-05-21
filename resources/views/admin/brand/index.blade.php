@extends('admin.layouts.app')
@section('content')
    <div class="card col-sm-12 col-xl-10">
        @include('layouts.flash-message')
        <div class="card-header">
            <h2 class="card-title">Brands</h2>
            <a class="btn btn-success float-right" href="{{ route('brands.create') }}">Create</a>
        </div>
        <div class="card-body">
            <form id="submitDon" action="{{ route('brands.index') }}" class="row mb-3" method="get">
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
                        <th>Image </th>
                        <th>Title </th>
                        <th>Description </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>
                                <img width="80px" src="{{ asset('images/'.$row->brand_image) }}"/>
                            </td>
                            <td>{{ $row->brand_title }}</td>
                            <td>{{ $row->brand_des }}</td>
                            <td>
                                <a class="btn btn-warning text-white" href="{{ route('brands.edit', $row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a data-action="{{ route('brands.destroy', $row->id) }}" class="btn btn-danger delete"
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
            {{ $brands->appends(['search' => $search, 'perPage' => $perPage])->links() }}
        </div>
    </div>
    @include('admin.layouts.modal')
@endsection
