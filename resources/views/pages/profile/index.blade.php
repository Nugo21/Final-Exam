@extends('layouts.base')

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section"></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <p style="color:green;font-size: 17px">{{session('success')}}</p>
                    <div class="login-wrap p-4 p-md-5">
                        <h2>Update Profile</h2>
                        <br>
                        <!-- <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div> -->
                        <form action="{{route('updateProfile')}}" class="login-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label> Email</label>
                                <input disabled name="email" value="{{$user->email}}" type="text"
                                       class="form-control rounded-left" placeholder="First Name">
                                @error('email')
                                <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> First Name</label>
                                <input name="first_name" value="{{$user->profile?$user->profile->first_name:""}}"
                                       type="text" class="form-control rounded-left" placeholder="First Name">
                                @error('first_name')
                                <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="last_name" value="{{$user->profile?$user->profile->last_name:""}}"
                                       type="text" class="form-control rounded-left" placeholder="Last Name">
                                @error('last_name')
                                <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        <!-- <div class="form-group">
                <label>Text</label>
	              <input name="text" type="password" class="form-control rounded-left" placeholder="Description">
{{--                  @error('description')--}}
                        {{--                            <span class="error-text" role="alert">{{ $message }}</span>--}}
                        {{--                  @enderror--}}
                            </div> -->
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" value="{{$user->profile?$user->profile->phone:""}}" type="text"
                                       class="form-control rounded-left" placeholder="Phone">
                                @error('phone')
                                <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label>Country</label>
                                <input name="country" value="{{$user->profile?$user->profile->country:""}}" type="text"
                                       class="form-control rounded-left" placeholder="Phone">
                                @error('country')
                                <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
