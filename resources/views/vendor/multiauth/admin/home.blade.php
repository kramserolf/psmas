@extends('multiauth::layouts.app')
@section('content')

@php($users = App\Models\User::where('app_status', 'pending')->latest()->get());
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.confirm')}}">Confirmed</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pending</li>
                  </ol>
            </nav>
                <!-- <div class="card-header"></div> -->
                <div class="card-body">
                    @include('multiauth::message')
                    <!-- You are logged in to {{ config('multiauth.prefix') }} side! -->
                    <table class="table table-bordered table-hover" id="appointment">
                        <thead class="thead-light text-center">
                            <th>Name</th>
                            <th>Address</th>
                            <th>Appointment Type</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead> 
                        <tbody>
                            @foreach ($users as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ $row->app_type }}</td>
                                <td>{{ $row->app_date }}</td>
                                <td>{{ $row->app_status }}</td>
                                <td class="text-center">
                                    <button class="confirm btn btn-success btn-sm" id="{{$row->id}}">confirm</button>
                                    <button class="confirm btn btn-info btn-sm">review</button></td>
                                
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
//    $(document).ready(function() {
//     $('#appointment').DataTable();
// } );
    // confirm appointment
    $(document).on('click', '.confirm', function(event){
      event.preventDefault();
      var id = $(this).attr('id');
      var ok = confirm('Are you sure you want confirm this alumni?');
      if (ok == true) {
        $.ajax({
          url: "/admin/home/"+id,
          success:function(data){
           alert("Success.");
            location.reload(true);
          }
        });
      }
     })
</script>

@endsection