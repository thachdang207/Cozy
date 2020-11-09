@extends('layouts')

@section('title','6.2')
@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <form action="{{ route('criteria.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <div class="input-group flex-nowrap">
                    <input class="form-control @error('name') is-invalid @enderror" placeholder="Đi muộn" name="name" value="{{ old('name') }}">
                </div>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Point</label>
                <div class="input-group flex-nowrap">
                    <input class="form-control @error('point') is-invalid @enderror" placeholder="" name="point" value="{{ old('point') }}">
                </div>
                @error('point')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Description</label>
                <div class="input-group flex-nowrap" for="description">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" value="{{ old('description') }}"></textarea>
                </div>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-info" id="submit">Register </button>
        </form>
    </div>
</div>
@stop