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

                     <li class="{{ Request()->routeIs('programmer.index') ? 'active' : '' }}">
                        <a href="{{ route('programmer.index') }}">
                           <i class="ri-home-4-line"></i><span>Dashboard</span></a>
                           </li class="nav-item">
                            <!-- End Dashboard -->

                           <li class="iq-menu-title"><i class="ri-separator"></i><span>Menu</span></li>

                     <li class="{{ Request()->routeIs('programmer.task.*') ? 'active' : '' }}">
                        <a href="{{ route('programmer.task.index') }}">
                           <i class="fa light fa-code"></i><span>Task</span></a>
                     </li> <!-- End Task -->

                     <li class="{{ Request()->routeIs('programmer.historytask.*') ? 'active' : '' }}">
                        <a href="{{ route('programmer.historytask.index') }}" >
                        <i class="fa fa-history"></i><span>History Task</span></a>
                     </li> <!-- End History Task -->

                    

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
                        
                        @include('programmer.dashboard1')
                        
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
                                 @include('layouts.profile2')
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
     @include('layouts.footer1')
   </body>
</html>
