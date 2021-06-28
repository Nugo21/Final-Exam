@extends('layouts.base')

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section"></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <form action="{{route('register')}}" class="login-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="{{old('email')}}" type="text" class="form-control rounded-left" placeholder="Username">
                                @error('email')
                                <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="first_name" value="{{old('first_name')}}" type="text" class="form-control rounded-left" placeholder="First Name">
                                @error('first_name')
                                <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="last_name" value="{{old('last_name')}}" type="text" class="form-control rounded-left" placeholder="Last Name">
                                @error('last_name')
                                <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input name="country" value="{{old('country')}}" type="text" class="form-control rounded-left" placeholder="Country">
                                @error('country')
                                <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control rounded-left" placeholder="Password">
                                @error('password')
                                <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            @error('auth')
                            <span class="error-text" role="alert">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
