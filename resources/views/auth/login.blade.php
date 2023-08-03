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
        <!-- Sign in Start -->
        <section class="sign-in-page bg-white">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 align-self-center">
                        <div class="sign-in-from">
                            <div class="col-md-12 text-center mb-2">
                           <img src="{{asset('sofbox-dashboard-lite/html/images/logo.png')}}" 
                           class="img-fluid rounded" alt="user" width="200" height="100"></div>
                           <div class="text-center">
                            <h3 class="mb-0">Sistem Informasi Bug Reporting</h3>
                            <h5>Digitaliz</h5></div>
                            <!-- <h1 class="mb-0">Sign in</h1>
                            <p>Enter your email and password to login</p> -->
                            <form class="mt-4" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <div class="input-group has-validation">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror mb-0" 
                                    id="exampleInputEmail1" placeholder="Enter email" value="{{old('email')}}" required>
                                    <div class="invalid-feedback">Please enter your email.</div>
                                    </div>
                                    @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>

                                <!-- <a href="#" class="float-right">Forgot password?</a> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror mb-0" 
                                    id="exampleInputPassword1" placeholder="Password" value="{{old('password')}}" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>

                                <div class="d-inline-block w-100">
                                    <!-- <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                        
                                    </div> -->
                                    <button type="submit" class="btn btn-primary float-right">Sign in</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="sign-in-detail text-white" style="background: url('sofbox-dashboard-lite/html/images/login/2.jpg') no-repeat 0 0; background-size: cover;">
                            <a class="sign-in-logo mb-5" href="#"></a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="{{asset('sofbox-dashboard-lite/html/images/login/1.png')}}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Admin Management</h4>
                                    <p>The main available features can determine the priority of bugs based on their severity level and provide task notifications to programmers.</p>
                                </div>
                                <div class="item">
                                    <img src="{{asset('sofbox-dashboard-lite/html/images/login/1.png')}}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">PIC Project Management</h4>
                                    <p>PIC can check the status of reported projects.</p>
                                </div>
                                <div class="item">
                                    <img src="{{asset('sofbox-dashboard-lite/html/images/login/1.png')}}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Programmer Management</h4>
                                    <p>It can send task completion notifications to the programmers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      @include('layouts.footer1')
   </body>
</html>