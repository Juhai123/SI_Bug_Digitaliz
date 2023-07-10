@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">User</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Manajemen User</li>
                        <li class="breadcrumb-item active" aria-current="page">Add User</li>
                     </ul>
                  </nav>
               </div>
        @endsection

        @section('content1')
        <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                    <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Form Add User</h4>
                           </div>
                        </div>
                        <div class="text-left ml-4 mt-2">
                           <a href="{{ route('admin.user.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                        <div class="iq-card-body">
                           <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data" 
                           class="form-horizontal">
                            @csrf
                            @if(@$user)
                            @method('PUT')
                            @endif
                          
                              <div class="form row">
                              <div class="col-md-6 mb-3">
                                 <label class="" for="">Name</label>
                                    <input type="text" name="name" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" id="" placeholder="Username" value="{{ $user->name ?? '' }}">
                                    <div class="invalid-feedback">
        {{$errors->first('name')}}
    </div>
                                  </div>
                                 <div class="col-md-6 mb-3">
                                 <label class="" for="">Email</label>
                                 <input type="text" name="email" class="form-control {{$errors->first('email') ? 'is-invalid' : ''}}" id="" placeholder="Email" value="{{ $user->email ?? '' }}">
                                 <div class="invalid-feedback">
        {{$errors->first('email')}}
    </div>
                                </div>
                                 <div class="col-md-6 mb-3">
                                  <label class="" for="">Phone</label>
                                  <input type="number" name="phone" class="form-control" id="" placeholder="Phone Number" value="{{ $user->phone ?? '' }}">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                  <label class="" for="">Job</label>
                                  <input type="text" name="job" class="form-control {{$errors->first('job') ? 'is-invalid' : ''}}" id="" placeholder="Job" value="{{ $user->job ?? '' }}">
                                  <div class="invalid-feedback">
        {{$errors->first('job')}}
    </div>
                                </div>
                                 <div class="col-md-6 mb-3">
                                  <label class="" for="">Password</label>
                                  <input type="password" name="password" class="form-control {{$errors->first('password') ? 'is-invalid' : ''}}" id=""  value="{{ $user->password ?? '' }}">
                                  <span id="passwordHelpInline" class="form-text">
                                   
                                  </span>
                                  <div class="invalid-feedback">
                              Invalid custom password feedback </div>
                                 </div>
                                 
                                 <div class="col-md-6 mb-3">
                                  <label class="" for="">Role</label>
                                  <select name="roles"  class="form-control {{$errors->first('roles') ? 'is-invalid' : ''}}" id="" >
                                  <option disabled value="">Select Roles</option>
                                    @foreach($roles as $rol)
                                    <option value="{{ $rol }}">{{ $rol }}</option>
                                    @endforeach
                                  </select>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                <label class="" for="">File</label>
                              <div class="custom-file ">
                                    <input type="file" class="custom-file-input" name="image" id="image" value="{{ $user->image ?? '' }}">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                 </div>
                              </div>
                              </div>
                                 <div class="text-end">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                           </form>
                        </div>
                     </div>
                    </div>
               </div>
            </div>
        </div>
        @endsection
        

          
                <!-- <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputText" name="email" id="" required aria-describedby="helpId" placeholder="Email User" value="{{old('email')}}">
                  </div>
                </div>
               
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="phone" id="" required aria-describedby="helpId" placeholder="Phone" value="{{old('phone')}}">
                    {{$errors->first('phone')}}
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Job</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="job" id="" required aria-describedby="helpId" placeholder="Job" value="{{old('job')}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputText" name="password" id="" required aria-describedby="helpId" placeholder="Your Password" value="{{old('password')}}">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                  <select class="form-select" name="role_id" id="" >
                    <option disabled value="">Select Role</option>
                    @foreach($roles as $role)
                   
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </form>
            
        </div>
    </div>
</section> -->
