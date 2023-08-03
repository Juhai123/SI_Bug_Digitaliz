<!doctype html>
<html lang="en">
   @include('layouts.header1')
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
            <div class="loader">
               <div class="cube">
                  <div class="sides">
                     <div class="top"></div>
                     <div class="right"></div>
                     <div class="bottom"></div>
                     <div class="left"></div>
                     <div class="front"></div>
                     <div class="back"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="{{asset('sofbox-dashboard-lite/html/index.html')}}">
               <img src="{{asset('sofbox-dashboard-lite/html/images/logo.png')}}" class="img-fluid" alt="">
               </a>
               <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                     <div class="line-menu half start"></div>
                     <div class="line-menu"></div>
                     <div class="line-menu half end"></div>
                  </div>
               </div>
            </div>
            <div class="text-left ml-5"><h4 class="mt-1">SI Bug Reporting</h4></div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">

                     <li class="{{ Request()->routeIs('admin.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.index') }}">
                           <i class="ri-home-4-line"></i><span>Dashboard</span></a>
                           </li class="nav-item">
                            <!-- End Dashboard -->
                            <li class="iq-menu-title"><i class="ri-separator"></i><span>Menu</span></li>
                     <li class="{{ Request()->routeIs('admin.bug.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.bug.index') }}">
                           <i class="las la-bug"></i><span>Bug</span></a>
                     </li> <!-- End Bug -->

                     <li class="{{ Request()->routeIs('admin.bugs_walking.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.bugs_walking.index') }}">
                    <i class="ri-checkbox-multiple-fill"></i>
                    <span>Tasks Walking</span>
                    </a>
                    </li><!-- End Bugs Walking Nav -->

                     <li class="{{ Request()->routeIs('admin.project.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.project.index') }}">
                    <i class="ri-stack-line"></i><span>Project</span> </a>
                      </li><!-- End Project Nav -->

                    <li class="{{ Request()->routeIs('admin.instansi.*') ? 'active' : '' }}">
                     <a href="{{ route('admin.instansi.index') }}">
                        <i class="ri-building-line"></i>
                        <span>Instansi</span></a>
                    </li><!-- End Project Nav -->

                    <li class="{{ Request()->routeIs('admin.programmer.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.programmer.index') }}">
                        <i class="ri-user-add-line"></i>
                        <span>Programmer</span></a>
                    </li><!-- End Programmer Nav -->

                    <li class="{{ Request()->routeIs('admin.user.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.user.index') }}">
                    <i class="ri-group-line"></i>
                    <span>Manajemen User</span>
                    </a>
                    </li><!-- End Manajemen User Nav -->

                    <li class="{{ Request()->routeIs('admin.history.*') ? 'active' : '' }}"">
                        <a href="{{ route('admin.history.index') }}">
                        <i class="icon" data-icon="Z"></i>
                    <span>History</span>
                     </a>
                    </li><!-- End History Nav -->
                    
                    
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="index.html" class="logo">
                     <img src="{{asset('sofbox-dashboard-lite/html/images/logo.png')}}" class="img-fluid" alt="">
                     <span>SI Bug Reporting</span>
                     </a>
                  </div>
               </div>
               @yield('content')
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="line-menu half start"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu half end"></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item">
                           <a class="search-toggle iq-waves-effect" href="#"><i class="ri-search-line"></i></a>
                           <form action="#" class="search-box">
                              <input type="text" class="text search-input" placeholder="Type here to search..." />
                           </form>
                        </li>
                        @php
$notifications = Auth::user()->unreadNotifications;
@endphp
<li class="nav-item">
                           <a href="#" class="search-toggle iq-waves-effect">
                              <i class="ri-notification-2-line"></i>
                              @if (Auth::User()->unreadNotifications->count())
                              <span class="bg-danger dots"></span>
                              @endif
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card iq-card-block iq-card-stretch iq-card-height shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-danger p-3">
                                       <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">{{Auth::User()->unreadNotifications->count()}}</small></h5>
                                    </div>
                                    
                                    <ul class="suggestions-lists m-0 p-0">
                                    @if (Auth::user()->roles('admin'))    
                                          @forelse ($notifications as $notification)
                                    <li class="iq-sub-card" href="#" >
                                    
                                       <div class="media align-items-center">
                                       <div class="">
                                             
                                          </div>
                                          <div class="media-body ml-1">
                                             <h6 class="mb-0 ">{{ $notification->data['title'] }}</h6>
                                             <small class="float-right font-size-11"><b>{{ $notification->created_at->diffForHumans()}}</b></small>
                                             <small class="font-size-10 mb-0">You have task new, please check now. {{ $notification->data['message'] }} : {{ $notification->data['0'] }}</small>
                                          </div>
                                          
                                          </div>
                                          @if ($loop->last)
                            <a href="{{route('admin.markNotification')}}" id="mark-all" class="text-center font-size-12">
                                Mark all as read
                            </a>
                        @endif
                    @empty
                        <a  id="" class="text-center font-size-13 ml-5">
                        There are no new notification
                            </a>
                    @endforelse
                    @else
                        You're logged in!
                    @endif
                                      
                                    </li>
                                    </ul>
                                    
                                 </div>
                              </div>
                           </div>
                        </li>
                       
                        <li class="nav-item iq-full-screen"><a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                     </ul>
                  </div>
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect bg-white text-white">
                        @if(Auth::user()->image)
                        <img src="{{asset('storage/'.Auth::user()->image)}}" class="img-fluid rounded-circle" alt="user">
                            @else
                            <img src="{{asset('sofbox-dashboard-lite/html/images/user/1.jpg')}}" class="img-fluid rounded-circle" alt="user">
                            @endif
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card iq-card-block iq-card-stretch iq-card-height shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello {{Auth::user()->name}}</h5>
                                    <span class="text-white font-size-12">{{Auth::user()->job}}</span>
                                 </div>
                                 @include('layouts.profile')
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="iq-bg-danger iq-sign-btn" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"

                                    role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         @yield('content1')
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
       <!-- Footer -->
 <footer class="bg-white iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <ul class="list-inline mb-0">
                     <li class="list-inline-item"><a href="{{asset('sofbox-dashboard-lite/html/privacy-policy.html')}}">Privacy Policy</a></li>
                     <li class="list-inline-item"><a href="{{asset('sofbox-dashboard-lite/html/terms-of-service.html')}}">Terms of Use</a></li>
                  </ul>
               </div>
               <div class="col-lg-6 text-right">
                  Copyright 2020 <a href="#">Sofbox</a> All Rights Reserved.
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->
     @include('layouts.footer1')
   </body>
</html>
