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

        <div class="axil-post-list-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="col-lg-12">
                            <div class="axil-banner mb--30">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="w-100" src="assets/images/add-banner/banner-03.png" alt="Banner Images">
                                    </a>
                                </div>
                            </div>
                        </div>
                        @foreach ($getPosts as $post)
                               <!-- Start Post List  -->
                        <div class="content-block post-list-view mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ route('post-details', $post->permalink) }}">
                                    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://ultranews.thesky9.com/vendor/core/core/base/images/placeholder.png' }}" alt="Post Images">
                                </a>
                            </div>
                            <div class="post-content">
                                <h4 class="title"><a href="{{ route('post-details', $post->permalink) }}">{{ $post->title }}</a></h4>
                                <p>{{ $post->description }}</p>
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="{{ route('author', $post->author_id) }}">
                                                    @php
                                                        $getAuthorInfo = \App\Models\User::where('id', $post->author_id)->first();
                                                    @endphp
                                                    <span class="hover-flip-item">
                                                        <span data-text="{{ $getAuthorInfo->name }}">{{ $getAuthorInfo->name }}</span>
                                                    </span>
                                                </a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li>{{ \Carbon\Carbon::parse($post->published_at)->format('M d, Y') }}</li>
                                                @php
                                                    $countComments = \App\Models\Comments::select('id')->where('post_id', $post->id)->count();
                                                    $getLikes = \App\Models\FavoritePosts::select('id')->where('post_id', $post->id)->count();
                                                @endphp
                                                <li>Likes {{ $getLikes }} <span class="fas fa-heart" style="color: wine!important;"></span></li>
                                                <li>Comments {{ $countComments }} <i class="fas fa-solid fa-comment"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Post List  -->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- End Post List Wrapper  -->


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



