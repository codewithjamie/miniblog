@extends('layouts.master')
@section('title', "All Comments")
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
                      <li class="breadcrumb-item"><a href="javascript: void(0)">Comments</a></li>
                      <li class="breadcrumb-item" aria-current="page">All</li>
                   </ul>
                </div>
                <div class="col-md-12">
                   <div class="page-header-title">
                      <h2 class="mb-0">Comments</h2>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- [ breadcrumb ] end --><!-- [ Main Content ] start -->
       <div class="col-xl-12 col-md-12">
        <div class="card">
           <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <h5>Comments</h5>
              {{-- <div><a href="{{  route('posts.create') }}" class="btn btn-primary"> <span class="fas fa-plus"></span> Create Posts</a></div> --}}
            </div>
           </div>
           <div class="card-body table-border-style">
              <div class="table-responsive">
                 <table class="table">
                    <thead>
                       <tr class="border-bottom-danger">
                          <th>#</th>
                          <th>Post Title</th>
                          <th>Content</th>
                          <th>Author</th>
                          <th>Created At</th>
                          <th></th>
                       </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($getCommentList as $listComment)
                        <tr class="border-bottom-warning">
                            <td>{{ $i++ }}</td>
                            <td>
                                @php
                                    $getPost = \App\Models\Posts::where('id', $listComment->post_id)->first();
                                @endphp
                                {{ $getPost->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($listComment->comment, 50) }}</td>
                            <td>
                                @php
                                    $getAuthor = \App\Models\User::where('id', $listComment->author_id)->first();
                                @endphp
                                {{ $getAuthor->name }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($listComment->created_at)->toFormattedDateString() }}</td>
                            <td>
                              <a href="{{ route('comment.delete', $listComment->id) }}"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="delete comment"><i class="fas fa-trash text-danger"></i></a>
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
       <!-- [ Main Content ] end -->
    </div>
 </div>
@endsection
