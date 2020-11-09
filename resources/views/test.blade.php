@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if( Gate::check('isAdmin') || Gate::check('isUser') )
                    <div class="btn btn-success btn-lg">
                        You have Admin Access
                    </div>
                    @endif
                    @if(Gate::check('isUser'))
                    <div class="btn btn-info btn-lg">
                        You have User Access
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection