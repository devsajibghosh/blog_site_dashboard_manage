
@extends('layouts.dashboard_master')

@section('content')

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1 class="text-success">Profile</h1>
        </div>
    </div>
</div>


<div class="row">

    {{-- name update area --}}
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Name Update</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.name',auth()->id()) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="name" name="name" placeholder="{{ auth()->user()->name }}" class="form-control mb-3">
                        <button class="btn btn-primary ">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- email update area --}}

    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Email Update</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.email',auth()->id()) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="email" name="email" placeholder="{{ auth()->user()->email }}" class="form-control mb-3">
                    </div>

                    <div class="mb-3">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                         @endif
                    </div>
                    
                    <button class="btn btn-primary ">update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Password Update</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.password',auth()->id()) }}" method="POST">
                    @csrf
                    <label class="form-label">Current Password</label>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="enter your current password">

                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror

                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="enter your new password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror

                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="enter your confirm password">

                    <button type="submit" class="btn btn-primary mt-2">update</button>
            </form>
            </div>
        </div>
    </div>

    {{-- image update --}}

    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Image Update</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.image',auth()->id()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="img mb-1">
                        <img src="{{ asset('uploads/profile') }}/{{auth()->user()->image}}" style="width: 50px; height:50px; border: 1px solid blue; border-radius:50px" >
                    </div>
                    <input type="file" class="form-control mb-2 @error('image')
                    is-invalid
                    @enderror" name="image">

                    {{-- error msg of image --}}
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                    <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- alret section --}}

@section('foter_content')

@if (session('update_success'))

<script>
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "{{ session('update_success') }}"
});
</script>

@endif

@endsection
