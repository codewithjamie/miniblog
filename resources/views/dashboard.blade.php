@extends('layouts.master')
@section('title', "Home")
@section('content')
<div class="pc-container">
    <div class="pc-content">
       <!-- [ breadcrumb ] start -->
       <div class="page-header">
          <div class="page-block">
             <div class="row align-items-center">
                <div class="col-md-12">
                   <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                   </ul>
                </div>
                <div class="col-md-12">
                   <div class="page-header-title">
                      <h2 class="mb-0">Dashboard</h2>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- [ breadcrumb ] end -->
       <div class="row">
          <!-- [ sample-page ] start -->
          <div class="col-lg-4 col-md-6">
             <div class="card">
                <div class="card-body">
                   <div class="row align-items-center">
                      <div class="col-8">
                         <h3 class="mb-1">{{ $postsCount }}</h3>
                         <p class="text-muted mb-0">All Posts</p>
                      </div>
                      <div class="col-4 text-end"><i class="ti ti-file-text text-secondary f-36"></i></div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-4 col-md-6">
             <div class="card">
                <div class="card-body">
                   <div class="row align-items-center">
                      <div class="col-8">
                         <h3 class="mb-1">{{ $commentsCount  }}</h3>
                         <p class="text-muted mb-0">Comments</p>
                      </div>
                      <div class="col-4 text-end"><i class="ti ti-message text-danger f-36"></i></div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-4 col-md-6">
             <div class="card">
                <div class="card-body">
                   <div class="row align-items-center">
                      <div class="col-8">
                         <h3 class="mb-1">{{ $favoriteCounts }}</h3>
                         <p class="text-muted mb-0">Favourited Posts</p>
                      </div>
                      <div class="col-4 text-end"><i class="ti ti-heart text-success f-36"></i></div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-12 col-lg-12">
             <div class="card">
                <div class="card-body">
                   <div class="d-flex align-items-center justify-content-between mb-3">
                      <h5 class="mb-0">Posts</h5>
                   </div>
                    <div class="border rounded p-3 my-3">
                        @foreach ($getPosts as $posts)
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0"><img src="{{ asset('storage/' . $posts->image) }}" alt="user-image" class="avtar rounded-circle wid-45 hei-45"></div>
                                <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0">
                                    {{ \Illuminate\Support\Str::limit($posts->description, 100) }}
                                </h6>
                                <small class="text-muted">@ableprodevelop</small>
                                </div>
                                <div class="dropdown">
                                <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti ti-chevron-down f-18"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item text-info" href="#">
                                        View Post
                                    </a>
                                    <a class="dropdown-item text-danger" href="{{ route('posts.delete', $posts->id) }}">
                                        Delete Post
                                    </a>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                   <div class="d-grid">
                        <a class="btn btn-primary text-white" href="{{  route('posts.create') }}">
                            Got a brilliant idea? <span class="fas fa-solid fa-lightbulb" style="color: gold!important"></span>?
                            Create a post
                        </a>
                    </div>
                </div>
             </div>
          </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
 </div>
@endsection
