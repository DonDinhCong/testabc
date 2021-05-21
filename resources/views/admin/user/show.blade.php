@extends('admin.layouts.app')
@section('content')
    @include('layouts.flash-message')
    <div class="card col-sm-12 col-xl-6 pb-3">
        <div class="card-header">
            <h2 class="card-title">User Infor</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                @if($user->image)  
                    <img src="{{asset('images/' . $user->image)}}" alt="">   
                @endif
            </div>
            <div class="form-group">
                <label>Name: </label>
                <strong>{{ $user->name }}</strong>
            </div>
            <div class="form-group">
                <label>Gender: </label>
                <strong>{{ $user->gender == 1 ? 'Nam' : 'Nữ' }}</strong>
            </div>
            <div class="form-group">
                <label>Birthday: </label>
                <strong>{{ $user->birthday }}</strong>
            </div>
            <div class="form-group">
                <label>Email: </label>
                <strong>{{ $user->email }}</strong>
            </div>
            <div class="form-group">
                <label>Phone Number: </label>
                <strong>{{ $user->phone }}</strong>
            </div>
            <div class="form-group">
                <label>Address: </label>
                <strong>{{ $user->address }}</strong>
            </div>
        </div>
        <div class="ml-3">
            <a class="btn btn-info" href="{{ route('users.edit', $user->id) }}">Chỉnh sửa</a>
            <a class="btn btn-secondary ml-3" href="{{ route('users.index') }}">Quay Lại</a>
        </div>
    </div>
    @include('admin.layouts.modal')
@endsection
