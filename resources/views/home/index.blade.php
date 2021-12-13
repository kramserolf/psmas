@extends('layouts.app-master')

@section('content')

    <div class="bg-light p-5 rounded">
        @auth
        
        <h1>{{auth()->user()->app_status}}</h1>
        <p class="lead">Your appointment status for {{auth()->user()->app_date}}({{auth()->user()->app_type}}).</p>
        <!-- <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" role="button">View more tutorials here &raquo;</a> -->
        @endauth

        @guest
        <h4>SAINT JOSESPH THE WORKER PARISH AND SHRINE</h4>
        <p class="lead"> Please register or login to view your apppointment status.</p>
        @endguest
    </div>
@endsection
