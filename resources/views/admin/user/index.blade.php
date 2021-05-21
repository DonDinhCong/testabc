@extends('admin.layouts.app')
@section('content')
    <div class="card col-sm-12 col-xl-10">
        @include('layouts.flash-message')
        <div class="card-header">
            <h2 class="card-title">Users</h2>
            <a class="btn btn-success float-right" href="{{ route('users.create') }}">Create</a>
        </div>
        <div class="card-body">
            <form id="submitDon" action="{{ route('users.index') }}" class="row mb-3" method="get">
                <div class="pl-2">
                    <select class="form-control selectDon" name="perPage">
                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
                        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                    </select>
                </div>
                <div class="pl-2">
                    <select class="form-control selectDon" name="role">
                        <option value="">Select Role</option>
                        <option value="2" {{ $role == 2 ? 'selected' : '' }}>Admin</option>
                        <option value="1" {{ $role == 1 ? 'selected' : '' }}>User</option>
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
                        <th>Name </th>
                        <th>Email </th>
                        <th>Phone </th>
                        <th>Role </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>
                                @if ($row->role == 2)
                                    Admin
                                @elseif ($row->role == 1)
                                    User
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('users.show', $row->id) }}"><i
                                        class="fas fa-info-circle"></i></a>
                                <a class="btn btn-warning text-white" href="{{ route('users.edit', $row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a data-action="{{ route('users.destroy', $row->id) }}" class="btn btn-danger delete"
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
            {{ $users->appends(['search' => $search, 'perPage' => $perPage, 'role' => $role])->links() }}
        </div>
    </div>
    @include('admin.layouts.modal')
@endsection
