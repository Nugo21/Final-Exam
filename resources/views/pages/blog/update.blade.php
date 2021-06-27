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
					<div class="login-wrap p-4 p-md-5">
		      	<!-- <div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div> -->
				<form action="{{route('update',$post->id)}}" class="login-form" method="POST" enctype='multipart/form-data'>
                    @csrf
                    {{method_field('PUT')}}
		      	<div class="form-group">
                      <label> Title</label>
		      			<input name="title" value="{{$post->title}}" type="text" class="form-control rounded-left" placeholder="Title">
                          @error('title')
                            <span class="error-text" role="alert">{{ $message }}</span>
                         @enderror		      		
                    </div>
	            <div class="form-group">
                <label>Description</label>
	              <input name="description" value="{{$post->description}}" type="text" class="form-control rounded-left" placeholder="Description">
                  @error('description')
                            <span class="error-text" role="alert">{{ $message }}</span>
                  @enderror
	            </div>
                <!-- <div class="form-group">
                <label>Text</label>
	              <input name="text" type="password" class="form-control rounded-left" placeholder="Description">
                  @error('description')
                            <span class="error-text" role="alert">{{ $message }}</span>
                  @enderror
	            </div> -->
                <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control" id="exampleFormControlSelect2">
                <option selected ></option>
                    @foreach($categories as $category)
                      <option {{$post->category->id==$category->id?"selected":""}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category')
                            <span class="error-text" role="alert">{{ $message }}</span>
                @enderror

                </div>

                <div class="form-group">
                <label>Text</label>
                <textarea  class="ckeditor form-control" id="exampleFormControlTextarea1" rows="3" name="text">{!!$post->text!!}</textarea>
                @error('text')
                            <span class="error-text" role="alert">{{ $message }}</span>
                @enderror
               </div>
               <div class="form-group">
                   <input type="file" name="image"/>
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