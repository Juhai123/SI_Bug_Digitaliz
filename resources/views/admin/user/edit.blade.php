@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Manajemen User</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Manajemen User</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                              <h4 class="card-title">Edit User</h4>
                           </div>
                        </div>
                        <div class="text-left ml-4 mt-2">
                           <a href="{{ route('admin.user.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                        <div class="iq-card-body">
                           <form action="{{ route('admin.user.update', [$users->id])}}" method="post" enctype="multipart/form-data" 
                           class="form-horizontal">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                              <div class="form row">
                              <div class="col-md-6 mb-3">
                                 <label class="" for="">Name</label>
                                    <input type="text" name="name" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" id="name" placeholder="Bug Name" value="{{ $users->name ?? '' }}">
                                    <div class="invalid-feedback">
        {{$errors->first('name')}}
    </div>
                                 </div>
                              <div class="col-md-6 mb-3">
                                 <label class="" for="">Email</label>
                                    <input type="email" name="email" class="form-control {{$errors->first('email') ? 'is-invalid' : ''}}" id="" value="{{ $users->email ?? '' }}">
                                    <div class="invalid-feedback">
        {{$errors->first('email')}}
    </div>
                                 </div>

                                 <div class="col-md-6 mb-3">
                                <label class="" for="">File</label>
                              <div class="custom-file ">
                                    <input type="file" class="custom-file-input" name="image" id="image" value="{{ $users->image ?? '' }}">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                 </div>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="" for="">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="" value="{{ $users->phone ?? '' }}">
                                 </div>
                              <div class="col-md-6 mb-3">
                                 <label class="" for="">Address</label>
                                    <textarea class="form-control" name="address" id="" value="{{ $users->address ?? '' }}" rows="3"></textarea>
                                 </div>
                              <div class="col-md-6 mb-3">
                                 <label class="" for="">Job</label>
                                    <input type="text" name="job" class="form-control {{$errors->first('job') ? 'is-invalid' : ''}}" id="" value="{{ $users->job ?? '' }}">
                                    <div class="invalid-feedback">
        {{$errors->first('job')}}
    </div>
                                 </div>

                                  </div>
                                  <div class="text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
                           </form>
                          </div>
                     </div>
                    </div>
               </div>
            </div>
        </div>
        @endsection
