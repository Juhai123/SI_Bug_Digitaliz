@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Profile</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                     </ul>
                  </nav>
               </div>
        @endsection

        @section('content1')

        <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body profile-page p-0">
                           <div class="profile-header">
                              <div class="cover-container">
                                 <img src="{{asset('sofbox-dashboard-lite/html/images/page-img/profile-bg.jpg')}}" alt="profile-bg" class="rounded img-fluid w-100"> 
                                 <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                    <li><a href="javascript:void();"><i class="ri-pencil-line"></i></a></li>
                                 </ul>
                              </div>
                              <div class="profile-info p-4">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                       <div class="user-detail pl-5">
                                          <div class="d-flex flex-wrap align-items-center">
                                             <div class="profile-img pr-4">
                                             @if(Auth::user()->image)
                        <img src="{{asset('storage/'.Auth::user()->image)}}" alt="profile-img" class="avatar-130 img-fluid">
                            @else
                            <img src="{{asset('sofbox-dashboard-lite/html/images/user/1.jpg')}}" alt="profile-img" class="avatar-130 img-fluid">
                            @endif
                                             </div>
                                             <div class="profile-detail d-flex align-items-center">
                                                <h3>{{Auth::user()->name}}</h3>
                                                <p class="m-0 pl-3"> - {{Auth::user()->job}}</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                       <ul class="nav nav-pills d-flex align-items-end float-right profile-feed-items p-0 m-0">
                                          <li>
                                             <a class="nav-link" data-toggle="pill" href="#profile-profile">profile</a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="row">
                        <div class="col-lg-8 profile-center">
                           <div class="tab-content">
                              <div class="tab-pane fade" id="profile-profile" role="tabpanel">
                                 <div class="iq-card iq-card-block iq-card-stretch">
                                    <div class="iq-card-header d-flex justify-content-between">
                                       <div class="iq-header-title">
                                          <h4 class="card-title">Profile</h4>
                                       </div>
                                    </div>
                                    <div class="iq-card-body">
                                       <div class="user-detail text-center">
                                          <div class="user-profile">
                                             @if(Auth::user()->image)
                        <img src="{{asset('storage/'.Auth::user()->image)}}" alt="profile-img" class="avatar-130 img-fluid">
                            @else
                            <img src="{{asset('sofbox-dashboard-lite/html/images/user/1.jpg')}}" alt="profile-img" class="avatar-130 img-fluid">
                            @endif
                                          </div>
                                          <div class="profile-detail mt-3">
                                             <h3 class="d-inline-block">{{Auth::user()->name}}</h3>
                                             <p class="d-inline-block pl-3"> - {{Auth::user()->job}}</p>
                                             <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="iq-card iq-card-block iq-card-stretch">
                                    <div class="iq-card-header d-flex justify-content-between">
                                       <div class="iq-header-title">
                                          <h4 class="card-title">About User</h4>
                                       </div>
                                    </div>
                                    <div class="iq-card-body">
                                      <div class="user-bio">
                                          <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping cake wafer.</p>
                                      </div>
                                      <div class="mt-2">
                                       <h6>Joined:</h6>
                                       <p>{{Auth::user()->created_at->format('d-m-Y')}}</p>
                                      </div>
                                      <div class="mt-2">
                                       <h6>Lives:</h6>
                                       <p>{{Auth::user()->address}}</p>
                                      </div>
                                      <div class="mt-2">
                                       <h6>Email:</h6>
                                       <p><a href="">{{Auth::user()->email}}</a></p>
                                      </div>
                                      <div class="mt-2">
                                       <h6>Contact:</h6>
                                       <p><a href="">{{Auth::user()->phone}}</a></p>
                                      </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 profile-right">
                           <div class="iq-card iq-card-block iq-card-stretch">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">About</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <div class="about-info m-0 p-0">
                                    <div class="row">
                                       <div class="col-12"><p>Bug reporting websites are designed to simplify the process of identufy bugs</p></div>
                                       <div class="col-3">Email:</div>
                                       <div class="col-9"><a href="{{Auth::user()->email}}">{{Auth::user()->email}}</a></div>
                                       <div class="col-3">Phone:</div>
                                       <div class="col-9"><a href="{{Auth::user()->phone}}">{{Auth::user()->phone}}</a></div>
                                       <div class="col-3">Location:</div>
                                       <div class="col-9">Indonesia</div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                          
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      @endsection