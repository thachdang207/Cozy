@extends('layouts')
@section('content')
<div class="row mb-2">
    <div class="d-flex justify-content-end col-12 d-md-flex justify-content-md-end col-md-12">
        <form action="{{ route('users.create') }}">
            <button class="btn btn-info">Add criteria</button>
        </form>
    </div>
</div>
<div class="row mb-2">
    <div class="col-2">
        <select class="custom-select" id="fieldTable">
            <option style="font-size: 14px" value="name">Name</option>
            <option value="email">Email</option>
            <option value="department_id">Department</option>
            <option value="reason">Reason</option>
        </select>
    </div>
    <div class="col-4 offset-6 d-flex align-items-center">
        <input class="form-control" id="valueSearch" />
        <button class="btn btn-info ml-2" id="btnSearch" type="submit">Search</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-12">
        <table class="table table-bordered" id="historical-table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Department</th>
                    <th class="text-center">Reason</th>
                    <th class="text-center">Point</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Create at</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::asset('js/Admin/historical_criteria/index.js') }}"></script>
@endpush