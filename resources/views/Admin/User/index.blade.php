@extends('layouts')
@section('content')
<div class="row mb-2">
    <div class="d-flex justify-content-end col-12 d-md-flex justify-content-md-end col-md-12">
        <form action="{{ route('users.create') }}">
            <button class="btn btn-info">Create Users</button>
        </form>
    </div>
</div>
<div class="row mb-2">
    <div class="col-2">
        <select class="custom-select" id="fieldTable">
            <option style="font-size: 14px" value="name">Name</option>
            <option value="full_address">Address</option>
            <option value="email">Email</option>
            <option value="phone_number">Phone number</option>
            <option value="department_id">Department</option>
        </select>
    </div>
    <div class="col-4 offset-6 d-flex align-items-center">
        <input class="form-control" id="valueSearch" />
        <button class="btn btn-info ml-2" id="btnSearch" type="submit">Search</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-12">
        <table class="table table-bordered" id="users-table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Birthday</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone number</th>
                    <th class="text-center">Department</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Updated At</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Users</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row mb-2 d-flex flex-column align-items-center " id="">
                    <form id="form" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" value="" name="id" id="id">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group flex-nowrap">
                                <input class="form-control @error('name') is-invalid @enderror" placeholder="Dang Van A" id="name" name="name" value="{{ old('name') }}">

                            </div>

                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <div class="input-group flex-nowrap">
                                <input class="form-control @error('full_address') is-invalid @enderror" placeholder="House no - Street name - Province " id="full_address" name="full_address" value="{{ old('full_address') }}">

                            </div>

                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group flex-nowrap">
                                <input class="form-control @error('email') is-invalid @enderror" placeholder="dangvana@gmail.com" id="email" name="email" value="{{ old('email') }}" disabled>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="d-flex">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="*********" name="password">

                        </div>
                        <div class="form-group">
                            <label class="d-flex">Confirm password</label>
                            <input class="form-control @error('confirm_password') is-invalid @enderror" type="password" placeholder="*********" name="confirm_password">

                        </div>
                        <div class="form-group">
                            <label class="d-flex">Phone number</label>
                            <input class="form-control @error('phone_number') is-invalid @enderror" placeholder="0789654123" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">

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
                                <input class="form-control @error('birthday') is-invalid @enderror" type="date" placeholder="0789654123" id="birthday" name="birthday" value="{{ old('birthday') }}">

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
                        <button type="submit" class="btn btn-info" id="update">Update </button>
                    </form>

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-success" id="btnOK" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="criteriaModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="setName"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row mb-2 d-flex flex-column align-items-center " id="">
                    <form id="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" value="" name="id" id="id">
                        <div class="form-group">
                            <label for="date_criteria">Date</label>
                            <input type="date" class="form-control" id="date_criteria" placeholder="Password">
                        </div>
                        @foreach($criteria as $criterion)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input checkbox" id="check{{$criterion['id']}}" name='checkbox[]' value="{{$criterion['id']}}">
                            <label class="form-check-label " for="check{{$criterion['id']}}">{{$criterion['name']}} ({{$criterion['point']}})</label>
                        </div>
                        @endforeach
                        <button class="btn btn-info" id="createCriteria">Add </button>
                    </form>

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-success" id="btnOK" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ URL::asset('js/Admin/users/index.js') }}"></script>
@endpush