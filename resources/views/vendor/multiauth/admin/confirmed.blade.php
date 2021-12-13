@extends('multiauth::layouts.app')
@section('content')

@php($users = App\Models\User::where('app_status', 'Approved')->latest()->get());
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active" active-current="page">Approved</li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Pending</li>
                  </ol>
            </nav>
                <!-- <div class="card-header"></div> -->
                <div class="card-body">
                    @include('multiauth::message')
                    <!-- You are logged in to {{ config('multiauth.prefix') }} side! -->
                    <table class="table table-bordered table-hover" id="approved">
                        <thead class="thead-light text-center">
                            <th>Name</th>
                            <th>Address</th>
                            <th>Appointment Type</th>
                            <th>Appointment Date</th>
                        </thead> 
                        <tbody>
                            @foreach ($users as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ $row->app_type }}</td>
                                <td>{{ $row->app_date }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript"> 
     $(document).ready(function() {
        $('#approved').DataTable();
    });
</script>
@endsection