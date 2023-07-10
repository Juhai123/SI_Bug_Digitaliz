@extends('layouts.programmer1')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Edit Profile</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                     </ul>
                  </nav>
               </div>
        @endsection

        @section('content1')
        <div id="content-page" class="content-page">
            <div class="container-fluid">
            @if($message = Session::get('message'))
                           <br>
                           <div class="col-md-12 col-md-1 col-mb-0">
                           <div class="alert alert-success" role="alert">
            <div class="iq-alert-icon ">
            <i class="icon" data-icon="S"></i>
                              </div>
                <div class="iq-alert-text"><a class="alert-link">Success</a>
                <p class="text-secondary mb-0">{{$message}}</p></div>
                              <button type="button" class="btn btn-light" data-dismiss="alert" aria-label="Close">
                              <i class="ri-close-line"></i>
                              </button>

            </div>
                           </div>
            @endif
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-body p-0">
                           <div class="iq-edit-list">
                              <ul class="iq-edit-profile d-flex nav nav-pills">
                                 <li class="col-md-6 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                       Personal Information
                                    </a>
                                 </li>
                                 <li class="col-md-6 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                       Change Password
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="iq-edit-list-data">
                        <div class="tab-content">
                           <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                               <div class="iq-card">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Personal Information</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <form action="{{ route('programmer.profile.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                       <div class="form-group row align-items-center">
                                          <div class="col-md-12">
                                             <div class="profile-img-edit">
                                             @if(Auth::user()->image)
                                                <img src="{{asset('storage/'.Auth::user()->image)}}" class="profile-pic" alt="profile-pic">
                            @else
                            <img src="{{asset('sofbox-dashboard-lite/html/images/user/1.jpg')}}" class="profile-pic" alt="profile-pic">
                            @endif
                                                <div class="p-image">
                                                  <i class="ri-pencil-line upload-button"></i>
                                                  <input name="image" id="image" class="file-upload" type="file" value="{{$users->image ?? ''}}" accept="image/*"/>
                                               </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class=" row align-items-center">
                                          <div class="form-group col-sm-6">
                                             <label for="">Name:</label>
                                             <input type="text" name="name" class="form-control" id="" value="{{ $users->name ?? '' }}" >
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="">Email:</label>
                                             <input type="text" name="email" class="form-control" id="" value="{{$users->email ?? ''}}">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="">Phone:</label>
                                             <input name="phone" type="text" class="form-control" id="" value="{{$users->phone ?? ''}}">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="">Job:</label>
                                             <input type="text" name="job" class="form-control" id="" value="{{$users->job ?? ''}}">
                                          </div>
                                          <div class="form-group col-sm-12">
                                             <label>Address:</label>
                                             <textarea class="form-control" name="address" rows="5" value="{{$users->address ?? ''}}" style="line-height: 22px;">{{$users->address ?? ''}}
                                             </textarea>
                                          </div>
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                               <div class="iq-card">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Change Password</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <form action="{{ route('programmer.profile.password.update') }}" method="POST">
                 @csrf
                                       <div class="form-group">
                                          <label for="cpass">Current Password:</label>
                                          <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                             <input name="old_password" type="Password" class="form-control @error('old_password') is-invalid @enderror"
                                                id="old_password" value="">
                                                @error('current_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                          </div>
                                       <div class="form-group">
                                          <label for="npass">New Password:</label>
                                          <input name="password" type="Password" class="form-control @error('password') is-invalid @enderror"
                                                id="password"  value="">
                                                @error('new_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                       </div>
                                       <div class="form-group">
                                          <label for="vpass">Verify Password:</label>
                                             <input name="password_confirmation" type="Password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation" value="">
                                             @error('verify password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancle</button>
                                    </form>
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
