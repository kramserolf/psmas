@extends('multiauth::layouts.app')
@section('content')

@php($users = App\Models\User::where('app_status', 'pending')->latest()->get());


<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.confirm')}}">Approved</a></li>
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
                                    <!-- button trigger modal -->
                            
                                    <button type="button" class="confirm btn btn-success btn-sm" id="{{$row->id}}">confirm</button>
                                    <button type="button" class="review btn btn-info btn-sm"data-bs-toggle="modal" data-bs-target="#exampleModal">review</button>
                                </td>
                                    @endforeach
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Appointment Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body text-uppercase">
        <p hidden>ID: <strong>{{ $row->id }}</strong></p>
        <p>Name: <strong>{{ $row->name }}</strong></p>
        <p>Address: <strong>{{ $row->address }}</strong></p>
        <p>Appointment Type: <strong>{{ $row->app_type }}</strong></p>
        <p>Appointment Date: <strong>{{ $row->app_date }}</strong></p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Confirm</button> -->
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
 $(document).ready(function() {
        $('#appointment').DataTable();
    });
    // confirm alumni
    $(".confirm").click(function(e){
      e.preventDefault();
      var id = $(this).attr('id');
      var ok = confirm('Are you sure you want confirm this appointment?');
      if (ok == true) {
        $.ajax({
          url: "/admin/home/"+id,
          success:function(data){
            alert("Succcess.");
            location.reload(true);
          }
        });
      }
     })
</script>
@endsection