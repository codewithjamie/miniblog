@extends('layouts.frontend')
@section('title', "Home")
@section('content')
    <div class="main-wrapper">
        <!-- Navigation Header -->
        @include('partials.navbar')
        <!-- End Header -->

        <!-- Start Mobile Menu Area  -->
        @include('partials.mobile-nav')
        <!-- End Mobile Menu Area  -->



        <!-- Start Banner Area -->
        <div class="slider-area bg-color-grey">
            <div class="axil-slide slider-style-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-activation axil-slick-arrow">
                                <!-- Start Single Slide  -->
                                <div class="content-block">
                                    <!-- Start Post Thumbnail  -->
                                    <div class="post-thumbnail">
                                        <a href="javascript:;">
                                            <img src="/assets/images/post-images/gallery-post-01.jpg" alt="Post Images">
                                        </a>
                                    </div>
                                    <!-- End Post Thumbnail  -->
                                </div>
                                <!-- End Single Slide  -->

                                <!-- Start Single Slide  -->
                                <div class="content-block">
                                    <!-- Start Post Thumbnail  -->
                                    <div class="post-thumbnail">
                                        <a href="javascript:;">
                                            <img src="/assets/images/post-images/gallery-post-03.jpg" alt="Post Images">
                                        </a>
                                    </div>
                                    <!-- End Post Thumbnail  -->
                                </div>
                                <!-- End Single Slide  -->

                                <!-- Start Single Slide  -->
                                <div class="content-block">
                                    <!-- Start Post Thumbnail  -->
                                    <div class="post-thumbnail">
                                        <a href="javascript:;">
                                            <img src="/assets/images/post-images/gallery-post-02.jpg" alt="Post Images">
                                        </a>
                                    </div>
                                    <!-- End Post Thumbnail  -->
                                </div>
                                <!-- End Single Slide  -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->

        <div class="post-single-wrapper axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start Banner Area -->
                        <div class="banner banner-single-post post-formate post-layout axil-section-gapBottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Start Single Slide  -->
                                        <div class="content-block">
                                            <!-- Start Post Content  -->
                                            <div class="post-content">
                                                <h1 class="title">{{ $posts->title }}</h1>
                                                <!-- Post Meta  -->
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="post-author-avatar border-rounded">
                                                            <img src="assets/images/post-images/author/author-image-3.png" alt="Author Images">
                                                        </div>
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper" href="{{ route('author', $posts->author_id) }}">
                                                                    @php
                                                                        $getAuthorInfo = \App\Models\User::where('id', $posts->author_id)->first();
                                                                    @endphp
                                                                    <span class="hover-flip-item">
                                                                        <span data-text="{{ $getAuthorInfo->name }}">{{ $getAuthorInfo->name }}</span>
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">
                                                                <li>{{ \Carbon\Carbon::parse($posts->published_at)->format('M d, Y') }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Post Content  -->
                                        </div>
                                        <!-- End Single Slide  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Banner Area -->

                        <div class="axil-post-details">
                            <p class="has-medium-font-size">{{ $posts->description }}</p>
                            <figure class="wp-block-image">
                                <img src="{{ $posts->image ? asset('storage/' . $posts->image) : 'https://ultranews.thesky9.com/vendor/core/core/base/images/placeholder.png' }}" alt="Post Images">
                            </figure>
                            <p>{{ $posts->content}}</p>

                            <div class="social-share-block">
                                <div class="post-like">
                                    @auth
                                        <a href="{{ route('like-post', $posts->id) }}"><i class="fal fa-thumbs-up"></i><span>{{ $getLikes }} Like</span></a>
                                    @else
                                    <a href="javascript:;" onclick="alert('You can not react to this post. Please signup')"><i class="fal fa-thumbs-up"></i><span>{{ $getLikes }} Like</span></a>
                                    @endif
                                </div>
                            </div>

                            <!-- Start Author  -->
                            <div class="about-author">
                                <div class="media">
                                    <div class="thumbnail">
                                        <a href="#">
                                            <img src="assets/images/post-images/author/author-b1.png" alt="Author Images">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="author-info">
                                            <h5 class="title">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    @php
                                                        $getAuthorInfo = \App\Models\User::where('id', $posts->author_id)->first();
                                                    @endphp
                                                    <span class="hover-flip-item">
                                                        <span data-text="{{ $getAuthorInfo->name }}">{{ $getAuthorInfo->name }}</span>
                                                    </span>
                                                </a>
                                            </h5>
                                            <span class="b3 subtitle">Author</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Author  -->

                            <!-- Start Comment Form Area  -->
                            <div class="axil-comment-area">
                                <div class="axil-total-comment-post">
                                    <div class="title">
                                        <h4 class="mb--0">{{ $commentCount }}+ Comments</h4>
                                    </div>
                                </div>

                                <!-- Start Comment Respond  -->
                                <div class="comment-respond">
                                    <h4 class="title">Post a comment</h4>
                                    @auth
                                    <form action="{{ route('post-comment') }}" method="post" >
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                        <input type="hidden" name="author_id" value="{{ $posts->author_id }}">
                                        <div class="row row--10">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="message">Leave a Reply</label>
                                                    <textarea name="message" name="message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit cerchio">
                                                    <input name="submit" type="submit" id="submit" class="axil-button button-rounded" value="Post Comment">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @else
                                    <h4>You need to signup to leave a comment <a href="register" class="text-info text-underline">Sign up Now</a></h4>
                                    @endif

                                </div>
                                <!-- End Comment Respond  -->

                                <!-- Start Comment Area  -->
                                <div class="axil-comment-area">
                                    <h4 class="title">{{ $commentCount }} comments</h4>
                                    <ul class="comment-list">
                                        <!-- Start Single Comment  -->
                                        @foreach ($getComments as $comments)
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="single-comment">
                                                    <div class="comment-img">
                                                        <img src="assets/images/post-images/author/author-b2.png" alt="Author Images">
                                                    </div>
                                                    <div class="comment-inner">
                                                        <h6 class="commenter">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                @php
                                                                    $getCommentInfo = \App\Models\User::where('id', $comments->author_id)->first();
                                                                @endphp
                                                                <span class="hover-flip-item">
                                                                    <span data-text="{{ $getCommentInfo->name }}">{{ $getCommentInfo->name }}</span>
                                                                </span>
                                                            </a>
                                                        </h6>
                                                        <div class="comment-meta">
                                                            <div class="time-spent">{{ $comments->created_at->toFormattedDateString() }}</div>
                                                        </div>
                                                        <div class="comment-text">
                                                            <p class="b2">{{ $comments->comment }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        <!-- End Single Comment  -->

                                    </ul>
                                </div>
                                <!-- End Comment Area  -->
                            </div>
                            <!-- End Comment Form Area  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Post Single Wrapper  -->


        <!-- Start Footer Area  -->
        <div class="axil-footer-area axil-footer-style-1 footer-variation-2">

            <!-- Start Footer Top Area  -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-4">
                            <div class="logo">
                                <a href="/">
                                    <img class="dark-logo" src="/assets/images/logo/logo-black.png" alt="Logo Images">
                                    <img class="white-logo" src="/assets/images/logo/logo-white2.png" alt="Logo Images">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-8">
                            <!-- Start Post List  -->
                            <div class="d-flex justify-content-start mt_sm--15 justify-content-md-end align-items-center flex-wrap">
                                <h5 class="follow-title mb--0 mr--20">Follow Us</h5>
                                <ul class="social-icon color-tertiary md-size justify-content-start">
                                    <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <!-- End Post List  -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Footer Top Area  -->

            <!-- Start Copyright Area  -->
            {{-- <div class="copyright-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-md-8">
                            <div class="copyright-left">
                                <ul class="mainmenu justify-content-start">
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="javascript:;">
                                            <span class="hover-flip-item">
                                        <span data-text="Contact Us">Contact Us</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="javascript:;">
                                            <span class="hover-flip-item">
                                        <span data-text="Terms of Use">Terms of Use</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="javascript:;">
                                            <span class="hover-flip-item">
                                        <span data-text="AdChoices">AdChoices</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="javascript:;">
                                            <span class="hover-flip-item">
                                        <span data-text="Advertise with Us">Advertise with Us</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="javascript:;">
                                            <span class="hover-flip-item">
                                        <span data-text="Blogar Store">Blogar Store</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="copyright-right text-start text-md-end mt_sm--20">
                                <p class="b3">All Rights Reserved © {{ \Carbon\Carbon::now()->year }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- End Copyright Area  -->
        </div>
        <!-- End Footer Area  -->

        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

    </div>
@endsection



