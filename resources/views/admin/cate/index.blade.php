@extends('admin.layouts.app')
@section('content')
    <div class="card col-sm-12 col-xl-10">
        @include('layouts.flash-message')
        <div class="card-header">
            <h2 class="card-title">Categories</h2>
            <a class="btn btn-success float-right" href="{{ route('cates.create') }}">Create</a>
        </div>
        <div class="card-body">
            <form id="submitDon" action="{{ route('cates.index') }}" class="row mb-3" method="get">
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
                        <th>Display </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cates as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>
                                <img width="200px" src="{{ asset('images/'.$row->cate_image) }}"/>
                            </td>
                            <td>{{ $row->cate_title }}</td>
                            <td>
                                <form action="{{ route('cates.updateStatus', $row->id) }}" method="post">
                                    @csrf
                                    <div class="custom-control col-6 custom-switch form-check mx-auto">
                                        <input type="checkbox" class="custom-control-input status" id="switch{{$row->id}}" name="cate_status" value="1" {{$row->cate_status == 1 ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="switch{{$row->id}}"></label>
                                    </div>
                                </form> 
                            </td>
                            <td>
                                <a class="btn btn-warning text-white" href="{{ route('cates.edit', $row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a data-action="{{ route('cates.destroy', $row->id) }}" class="btn btn-danger delete"
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
            {{ $cates->appends(['search' => $search, 'perPage' => $perPage])->links() }}
        </div>
    </div>
    @include('admin.layouts.modal')
@endsection
