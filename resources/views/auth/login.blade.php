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
		      	<h3 class="text-center mb-4">Have an account?</h3>
				<form action="{{route('login')}}" class="login-form" method="POST">
                    @csrf
		      		<div class="form-group">
		      			<input name="email" type="text" class="form-control rounded-left" placeholder="Username">
                          @error('email')
                            <span class="error-text" role="alert">{{ $message }}</span>
                         @enderror		      		
                    </div>
	            <div class="form-group">
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