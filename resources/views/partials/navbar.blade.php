<header class="header axil-header  header-light header-sticky ">
    <div class="header-wrap">
       <div class="row justify-content-between align-items-center">
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
             <div class="logo">
                <a href="/">
                <img class="dark-logo" src="assets/images/logo/logo-black.png" alt="Blogar logo">
                <img class="light-logo" src="assets/images/logo/logo-white2.png" alt="Blogar logo">
                </a>
             </div>
          </div>
          <div class="col-xl-6 d-none d-xl-block">
             <div class="mainmenu-wrapper">
                <nav class="mainmenu-nav">
                   <!-- Start Mainmanu Nav -->
                   <ul class="mainmenu">
                      <li class="menu-item">
                         <a href="/">Home</a>
                      </li>
                      <li class="menu-item-has-children megamenu-wrapper">
                         <a href="javascript:;">Posts</a>
                         <ul class="megamenu-sub-menu">
                            <li class="megamenu-item">
                               <!-- Start Verticle Menu  -->
                               <div class="axil-vertical-nav-content">
                                  <!-- Start One Item  -->
                                  <div class="axil-vertical-inner tab-content" id="tab1" style="display: block;">
                                     <div class="axil-vertical-single">
                                        <div class="row">
                                            @php
                                                $getLimitedPosts = \App\Models\Posts::latest()->take(4)->get();
                                            @endphp
                                           <!-- Start Post List  -->
                                           @foreach($getLimitedPosts as $limitedPost)
                                           <div class="col-lg-3">
                                              <div class="content-block image-rounded">
                                                 <div class="post-thumbnail mb--20">
                                                    <a href="{{ route('post-details', $limitedPost->permalink) }}">
                                                    <img class="w-100" src="{{ $limitedPost->image ? asset('storage/' . $limitedPost->image) : 'https://ultranews.thesky9.com/vendor/core/core/base/images/placeholder.png' }}" alt="Post Images">
                                                    </a>
                                                 </div>
                                                 <div class="post-content">
                                                    <h5 class="title"><a href="{{ route('post-details', $limitedPost->permalink) }}">India may require online shops to hand</a></h5>
                                                 </div>
                                              </div>
                                           </div>
                                           @endforeach
                                           <!-- End Post List  -->
                                        </div>
                                     </div>
                                  </div>
                                  <!-- End One Item  -->
                               </div>
                               <!-- End Verticle Menu  -->
                            </li>
                         </ul>
                      </li>
                      <li class="menu-item">
                         <a href="/authors">Authors</a>
                      </li>
                   </ul>
                   <!-- End Mainmanu Nav -->
                </nav>
             </div>
          </div>
          <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
             <div class="header-search text-end d-flex align-items-center">
                <form class="header-search-form d-sm-block d-none" method="POST" action="{{ route('search-post') }}">
                    @csrf
                   <div class="axil-search form-group">
                      <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                      <input type="text" name="query" class="form-control" placeholder="Search">
                   </div>
                </form>
                <div class="mobile-search-wrapper d-sm-none d-block">
                   <button class="search-button-toggle"><i class="fal fa-search"></i></button>
                   <form class="header-search-form" method="POST" action="{{ route('search-post') }}">
                    @csrf
                      <div class="axil-search form-group">
                         <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                         <input type="text" name="query" class="form-control" placeholder="Search">
                      </div>
                   </form>
                </div>
                <ul class="metabar-block">
                    <li>
                        @auth
                            <a href="{{ route('dashboard') }}">
                                <img src="assets/images/others/author.png" alt="Author Images">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                        @else
                            <a href="/login">Login</a>
                        @endif
                    </li>
                </ul>
                <!-- Start Hamburger Menu  -->
                <div class="hamburger-menu d-block d-xl-none">
                   <div class="hamburger-inner">
                      <div class="icon"><i class="fal fa-bars"></i></div>
                   </div>
                </div>
                <!-- End Hamburger Menu  -->
             </div>
          </div>
       </div>
    </div>
 </header>
