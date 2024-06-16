<header class="pc-header">
    <div class="header-wrapper">
       <!-- [Mobile Media Block] start -->
       <div class="me-auto pc-mob-drp">
          <ul class="list-unstyled">
             <!-- ======= Menu collapse Icon ===== -->
             <li class="pc-h-item pc-sidebar-collapse"><a href="#" class="pc-head-link ms-0" id="sidebar-hide"><i class="ti ti-menu-2"></i></a></li>
             <li class="pc-h-item pc-sidebar-popup"><a href="#" class="pc-head-link ms-0" id="mobile-collapse"><i class="ti ti-menu-2"></i></a></li>
          </ul>
       </div>
       <!-- [Mobile Media Block end] -->
       <div class="ms-auto">
          <ul class="list-unstyled">
             <li class="dropdown pc-h-item header-user-profile">
                <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false"><img src="/dash/images/user/avatar-2.jpg" alt="user-image" class="user-avtar"></a>
                <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                   <div class="dropdown-header d-flex align-items-center justify-content-between">
                      <h5 class="m-0">Profile</h5>
                   </div>
                   <div class="dropdown-body">
                      <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                         <div class="d-flex mb-1">
                            <div class="flex-shrink-0"><img src="/dash/images/user/avatar-2.jpg" alt="user-image" class="user-avtar wid-35"></div>
                            <div class="flex-grow-1 ms-3">
                               <h6 class="mb-1">{{ Auth::user()->name }} 🖖</h6>
                               <span>{{ Auth::user()->username }}</span>
                            </div>
                         </div>
                         <hr class="border-secondary border-opacity-50">
                         <p class="text-span">Manage</p>
                         <a href="#" class="dropdown-item">
                            <span>
                               <svg class="pc-icon text-muted me-2">
                                  <use xlink:href="#custom-lock-outline"></use>
                               </svg>
                               <span>Change Password</span>
                            </span>
                         </a>
                         <hr class="border-secondary border-opacity-50">
                         <div class="d-grid mb-3">
                            <a class="btn btn-primary" href="{{ route('logout') }}">
                               <svg class="pc-icon me-2">
                                  <use xlink:href="#custom-logout-1-outline"></use>
                               </svg>
                               Logout
                            </a>
                        </div>
                      </div>
                   </div>
                </div>
             </li>
          </ul>
       </div>
    </div>
 </header>
