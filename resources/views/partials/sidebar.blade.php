<nav class="pc-sidebar ">
    <div class="navbar-wrapper">
       <div class="m-header">
          <a href="{{ route('dashboard') }}" class="b-brand text-primary">
             <img src="/assets/images/logo/logo-black.png" class="img-fluid logo-lg" alt="logo">
          </a>
       </div>
       <div class="navbar-content">
          <div class="card pc-user-card">
             <div class="card-body">
                <div class="d-flex align-items-center">
                   <div class="flex-shrink-0"><img src="/dash/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-45 rounded-circle"></div>
                   <div class="flex-grow-1 ms-3 me-2">
                      <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                      <small>{{ Auth::user()->role }}</small>
                   </div>
                </div>
             </div>
          </div>
          <ul class="pc-navbar">
             <li class="pc-item pc-caption"><label>Navigation</label></li>
             <li class="pc-item pc-hasmenu">
                <a href="{{ route('dashboard') }}" class="pc-link">
                   <span class="pc-micon">
                      <svg class="pc-icon">
                         <use xlink:href="#custom-status-up"></use>
                      </svg>
                   </span>
                   <span class="pc-mtext">Dashboard</span>
                </a>
             </li>
             @if (Auth::user()->role == 'admin')
             <li class="pc-item pc-hasmenu">
                <a href="{{ route('posts.all') }}" class="pc-link">
                   <span class="pc-micon">
                      <svg class="pc-icon">
                         <use xlink:href="#custom-document"></use>
                      </svg>
                   </span>
                   <span class="pc-mtext">Posts</span> <span class="pc-arrow"></span>
                </a>
             </li>
             <li class="pc-item">
                <a href="{{ route('comments') }}" class="pc-link">
                   <span class="pc-micon">
                      <svg class="pc-icon">
                        <use xlink:href="#custom-message-2"></use>
                    </svg>
                   </span>
                   <span class="pc-mtext">Comments</span>
                </a>
             </li>
             @else
             <li class="pc-item pc-hasmenu">
                <a href="javascript:;" class="pc-link">
                   <span class="pc-micon">
                      <svg class="pc-icon">
                         <use xlink:href="#custom-document"></use>
                      </svg>
                   </span>
                   <span class="pc-mtext">Posts</span> <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                </a>
                <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="{{ route('posts.all') }}">Articles</a></li>
                    <li class="pc-item"><a class="pc-link" href="{{ route('posts.create') }}">Create Article</a></li>
                </ul>
             </li>
             @endif

          </ul>
       </div>
    </div>
 </nav>
