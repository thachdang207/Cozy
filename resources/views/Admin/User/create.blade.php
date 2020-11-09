@extends('layouts')

@section('title','6.2')
@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <form action="{{ route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            <div class="form-group">
                <label>Name</label>
                <div class="input-group flex-nowrap">
                    <input class="form-control @error('name') is-invalid @enderror" placeholder="Dang Van A" name="name" value="{{ old('name') }}">

                </div>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Address</label>
                <div class="input-group flex-nowrap">
                    <input class="form-control @error('full_address') is-invalid @enderror" placeholder="House no - Street name - Province " name="full_address" value="{{ old('full_address') }}">

                </div>
                @error('full_address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <div class="input-group flex-nowrap">
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="dangvana@gmail.com" name="email" value="{{ old('email') }}">
                </div>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="d-flex">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="*********" name="password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="d-flex">Confirm password</label>
                <input class="form-control @error('confirm_password') is-invalid @enderror" type="password" placeholder="*********" name="confirm_password">
                @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="d-flex">Phone number</label>
                <input class="form-control @error('phone_number') is-invalid @enderror" placeholder="0789654123" name="phone_number" value="{{ old('phone_number') }}">
                @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <div class="d-flex align-items-center">
                        <input type="radio" id="male" name="gender" value="1" checked>
                        <label for="male" class="mb-0"><span>&nbsp;Male</span></label>
                    </div>
                    <div class="d-flex align-items-center ml-3">
                        <input type="radio" id="female" name="gender" value="2">
                        <label for="female" class="mb-0"><span>&nbsp;Female</span></label>
                    </div>

                </div>
            </div>
            <div class="form-group d-flex w-100">
                <div class="w-50 pl-0 mr-1">
                    <label class="d-flex">Birthday</label>
                    <input class="form-control @error('birthday') is-invalid @enderror" type="date" placeholder="0789654123" name="birthday" value="{{ old('birthday') }}">
                    @error('birthday')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-50 pr-0">
                    <label>Department</label>
                    <div class="input-group flex-nowrap">
                        <select class="custom-select" id="department_id" name="department_id">
                            @foreach($departments as $department)
                            <option value="{{$department['id']}}">{{$department['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info" id="submit">Register </button>
        </form>
    </div>
</div>
@stop