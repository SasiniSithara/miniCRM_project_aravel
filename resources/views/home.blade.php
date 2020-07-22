@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                {{ __('You are logged in!') }}
                <br>
                <br>
                <br>
                {{ __('Menu') }}
                <br>
                <!-- Go to employee and company pages -->
                 <a href="{{ url('/createcompany') }}">Company</a>
                <br>
                <a href="{{ url('/createemployee') }}">Employee</a>
                <br>
                <!-- <a href="{{ url('/createdatatable') }}">Sample datatable</a> -->
             </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
