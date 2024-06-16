@extends('layouts.master')
@section('title', "Create Post")
@section('content')
<div class="pc-container">
    <div class="pc-content">
       <!-- [ breadcrumb ] start -->
       <div class="page-header">
          <div class="page-block">
             <div class="row align-items-center">
                <div class="col-md-12">
                   <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('posts.all') }}">Posts</a></li>
                      <li class="breadcrumb-item" aria-current="page">Create</li>
                   </ul>
                </div>
                <div class="col-md-12">
                   <div class="page-header-title">
                      <h2 class="mb-0">Posts Add</h2>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- [ breadcrumb ] end --><!-- [ Main Content ] start -->
        <div class="container">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Posts Add</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Name">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" placeholder="Name" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="Name">Permalink  <span class="text-danger">*</span></label>
                                    <input type="text" name="permalink" value="{{ old('permalink') }}" class="form-control @error('permalink') is-invalid @enderror">
                                    <span class="text-muted">example: /my-post</span>
                                    @error('permalink')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="Name">Description</label>
                                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="Name">Content </label>
                                    <textarea name="content" class="form-control" rows="20">{{ old('content') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="dropify  @error('image') is-invalid @enderror" data-max-file-size-preview="3M" data-allowed-file-extensions="jpeg png jpg" data-default-file="https://ultranews.thesky9.com/vendor/core/core/base/images/placeholder.png" data-show-errors="true" data-errors-position="outside"  />
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #000000!important; color: #ffffff!important;">Publish Post</button>
                    </div>
                </div>

            </form>
        </div>
       <!-- [ Main Content ] end -->

       <div style="padding-bottom: 5%"></div>
    </div>
</div>
<br>
<div></div>
@endsection
