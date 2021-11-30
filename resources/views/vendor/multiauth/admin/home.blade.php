@extends('multiauth::layouts.app')
@section('content')

@php($users = App\Models\User::where('app_status', 'pending')->latest()->get());
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>
                <div class="card-body">
                    @include('multiauth::message')
                    <!-- You are logged in to {{ config('multiauth.prefix') }} side! -->
                    <table class="table table-bordered table-hover" id="alumni">
                        <thead class="thead-light">
                            <th>Name</th>
                            <th>Address</th>
                            <th>Appointment Type</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                        </thead> 
                        <tbody>
                            @foreach ($users as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ $row->app_type }}</td>
                                <td>{{ $row->app_date }}</td>
                                <td>{{ $row->app_status }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection