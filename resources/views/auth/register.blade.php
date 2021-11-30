@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-2" src="{!! url('images/psm_logo.png') !!}" alt="" width="72" height="57">
        
        <h4 class="h5 mb-3 fw-normal">Registration and Appointment</h4>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required="required" autofocus>
            <label for="floatingName">Name</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="date" class="form-control" name="bday" value="{{ old('bday') }}" placeholder="bday" required="required" autofocus>
            <label for="floatingName">Birthday</label>
            @if ($errors->has('bday'))
                <span class="text-danger text-left">{{ $errors->first('bday') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <!-- <input type="text" class="form-control" name="status" value="{{ old('status') }}" placeholder="status" required="required" autofocus> -->
            <select name="status" class="form-control" type="text" value="{{ old('status') }}" id="stats" placeholder="status" required="required" autofocus>
                <option value="">Please select option</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Separated">Separated</option>
                <option value="Widowed">Widowed</option>
            </select>
            <label for="floatingName">Status</label>
            @if ($errors->has('status'))
                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="address" required="required" autofocus>
            <label for="floatingName">Address</label>
            @if ($errors->has('address'))
                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <!-- <input type="text" class="form-control" name="status" value="{{ old('status') }}" placeholder="status" required="required" autofocus> -->
            <select name="app_type" class="form-control" type="text" value="{{ old('app_type') }}" id="stats" placeholder="app_type" required="required" autofocus>
                <option value="">Please select option</option>
                <option value="Marriage">Marriage</option>
                <option value="Christening">Christening</option>
                <option value="Deceased">Deceased</option>
            </select>
            <label for="floatingName">Appointment Type</label>
            @if ($errors->has('app_type'))
                <span class="text-danger text-left">{{ $errors->first('app_type') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="{{ Carbon::now()->addMonth()}} " class="form-control" name="app_date" value="{{ old('app_date') }}" placeholder="app_date" required="required" autofocus>
            <label for="floatingName">Appointment Date</label>
            @if ($errors->has('app_date'))
                <span class="text-danger text-left">{{ $errors->first('app_date') }}</span>
            @endif
        </div>
        

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        
        @include('auth.partials.copy')
    </form>
@endsection
