@extends('layouts.master')
@section('title', "All Posts")
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
                      <li class="breadcrumb-item"><a href="javascript: void(0)">Posts</a></li>
                      <li class="breadcrumb-item" aria-current="page">All</li>
                   </ul>
                </div>
                <div class="col-md-12">
                   <div class="page-header-title">
                      <h2 class="mb-0">Posts</h2>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- [ breadcrumb ] end --><!-- [ Main Content ] start -->
       @if (Auth::user()->role == 'admin')
       <div class="col-xl-12 col-md-12">
        <div class="card">
           <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <h5>Posts</h5>
              <div><a href="{{  route('posts.create') }}" class="btn btn-primary"> <span class="fas fa-plus"></span> Create Posts</a></div>
            </div>
           </div>
           <div class="card-body table-border-style">
              <div class="table-responsive">
                 <table class="table">
                    <thead>
                       <tr class="border-bottom-danger">
                          <th>#</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Author</th>
                          <th>Status</th>
                          <th>Published Date</th>
                          <th></th>
                       </tr>
                    </thead>
                    <tbody>
                        @php
                            $getPostsList = \App\Models\Posts::where('author_id', '!=', Auth::user()->id)->latest()->get();
                            $i = 1;
                        @endphp
                        @foreach ($getPostsList as $listPost)
                        <tr class="border-bottom-warning">
                            <td>{{ $i++ }}</td>
                            <td>{{ $listPost->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($listPost->description, 50) }}</td>
                            <td>
                                @php
                                    $getAuthor = \App\Models\User::where('id', $listPost->author_id)->first();
                                @endphp
                                {{ $getAuthor->name }}
                            </td>
                            <td>
                                @if ($listPost->status == 'published')
                                    <span class="badge text-bg-success">published</span>
                                @else
                                    <span class="badge text-bg-warning">unpublished</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($listPost->published_at)->toFormattedDateString() }}</td>
                            <td>
                              <a href="{{ route('posts.delete', $listPost->id) }}"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="delete post"><i class="fas fa-trash text-danger"></i></a>
                              {{-- <a href=""  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="tooltip on top"><i class=""></i></a> --}}
                            </td>
                         </tr>
                        @endforeach

                    </tbody>
                 </table>
              </div>
           </div>
        </div>
     </div>
       @else
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div><a href="{{  route('posts.create') }}" class="btn btn-primary"> <span class="fas fa-plus"></span> Create Posts</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-sm-6 col-lg-4 col-xxl-4">
                            <div class="card border">
                                <div class="card-body p-2">
                                    <div class="position-relative">
                                        <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://ultranews.thesky9.com/vendor/core/core/base/images/placeholder.png' }}" alt="Image" class="img-fluid w-100">
                                    </div>
                                    <ul class="list-group list-group-flush my-2">
                                        <li class="list-group-item px-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 me-2">
                                                    <h6 class="mb-1 f-w-600">{{ $post->title }}</h6>
                                                    <p class="mb-0 f-w-400" style="font-style: italic;">{{ $post->description }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    <a href="{{ route('posts.edit', $post->permalink) }}" class="btn btn-sm btn-outline-primary mb-2">Edit Post</a>
                                    <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-sm btn-danger mb-2">Delete Post</a>
                                </div>
                            </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
        </div>
       @endif
       <!-- [ Main Content ] end -->
    </div>
 </div>
@endsection
