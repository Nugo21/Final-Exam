@extends('layouts.base')

@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          @foreach($sliderPosts as $post)
          <div class="item">
            <img src="/storage/images/{{$post->id}}/{{$post->image_path}}" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>{{$post->category->title}}</span>
                </div>
                <a href="{{route('productDetails',$post->id)}}"><h4>{{$post->title}}</h4></a>
                <ul class="post-info">
                  <li><a href="#">{{$post->user->name}}</a></li>
                  <li><a href="#">{{$post->created_at}}</a></li>
                </ul>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <section class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-content">
              <div class="row">
                <div class="col-lg-8">
                  <span>Stand Blog HTML5 Template</span>
                  <h4>Creative HTML Template For Bloggers!</h4>
                </div>
                <div class="col-lg-4">
                  <div class="main-button">
                    <a rel="nofollow" href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                @foreach($lastPosts as $post)
                <div class="col-lg-12">
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
                      <p class="p"> {{$post->description}}</p>

                      <div class="post-options">
                        <div class="row">

                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#"> Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                {{$lastPosts->links()}}

              </div>
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
                      </ul>
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
                        <li><a href="{{route('categoryBlogs',$category->id)}}">- {{$category->title}}</a></li>
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
