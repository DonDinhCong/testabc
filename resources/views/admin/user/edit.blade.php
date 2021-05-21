@extends('admin.layouts.app')
@section('content')
        <div class="card col-sm-12 col-xl-6">
            <div class="card-header">
                <h3 class="card-title">
                    Edit User
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name <span style="color:red">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $user->name }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Email <span style="color:red">*</span></label>
                        <input type="text" class="form-control" disabled value="{{ $user->email }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="1" {{ $user->gender == 1 ? 'checked' : '' }}>
                            <label class="form-check-label">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="0" {{ $user->gender == 0 ? 'checked' : '' }}>
                            <label class="form-check-label">Nữ</label>
                        </div>
                    </div>
                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Avatar </label>
                        @if ($user->image)
                            <div class="w-100 pb-2">
                                <img width="80px" src="{{ asset('images/' . $user->image) }}" alt="" />
                            </div>
                        @endif
                        <input class="w-100" type="file" name="image" value="" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <div class="form-group">
                        <label>Birthday <span style="color:red">*</span></label>
                        <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                            value="{{ $user->birthday }}">
                    </div>
                    @error('birthday')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Phone Number <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                            value="{{ $user->phone }}">
                    </div>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Address <span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            value="{{$user->address }}">
                    </div>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="custom-control col-6 custom-switch form-check mb-3">
                        <input type="checkbox" class="custom-control-input" id="switch1" name="role" value="2" {{ $user->role == 2 ? 'checked' : '' }}>
                        <label class="custom-control-label" for="switch1">Admin</label>
                    </div>
                    <button class="btn btn-primary mr-3" type="submit">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('users.index') }}">Quay Lại</a>
                </form>
            </div>
        </div>
@endsection
