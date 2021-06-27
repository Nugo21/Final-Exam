@extends('layouts.base')

@section('content')
<div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <!-- <h4>My Blogs</h4> -->
                <h2>My Blogs</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->


    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                  @if(count($posts)<1)
                  No Blogs

                  @endif
                  @foreach($posts as $post)
                <div class="col-lg-6">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="/storage/images/{{$post->id}}/{{$post->image_path}}" alt="">
                    </div>
                    <div class="down-content">
                      <span>{{$post->category->title}}</span>
                      <a href="{{route('productDetails',$post->id)}}"><h4>{{$post->title}}</h4></a>
                      <ul class="post-info">
                        <li><a href="#">{{$post->user->name}}</a></li>
                        <li><a href="#">{{$post->created_at}}</a></li>
                      </ul>
                               <p class="p">{{$post->description}}</p>
                    
                      <div class="post-options">
                        <div class="row">
                          <div class="col-lg-12">
                            <ul class="post-tags">
                              <li><button onclick="window.location.href='{{route('updateBlog',$post->id)}}'" class="btn btn-info">Update</button></li>
                              <li>
                              <form id="delete-form" method="POST" action="{{route('deleteBlog',$post->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                   <button onclick="confirmDelete()"  type="button" class="btn btn-danger">Delete</button>
                             </form>
                                </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              {{$posts->links()}}

            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                      <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                      @foreach($latestPosts as $post)
                        <li><a href="{{route('productDetails',$post->id)}}">
                          <h5>{{$post->title}}</h5>
                          <span>{{$post->created_at}}</span>
                        </a></li>
                        @endforeach
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                      @foreach($categories as $category)
                        <li><a href="#">- {{$category->title}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">PSD</a></li>
                        <li><a href="#">Responsive</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection