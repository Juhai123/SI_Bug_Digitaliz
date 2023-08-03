@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Manajemen User</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Manajemen User</li>
                        <li class="breadcrumb-item active" aria-current="page">Show User</li>
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
                              <h4 class="card-title">Detail User</h4>
                           </div>
                        </div>
                        <div class="text-left ml-4 mt-2">
                           <a href="{{ route('admin.user.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $users->name }} </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $users->description }} </td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>@if($users->image)
                                        <img src="{{ asset('storage/'. $users->image) }}" width="128px">
                                         @else
                                         No Image
                                         @endif
                                        </td>
                                </tr>
                                <tr>
                                    <th>Job</th>
                                    <td>{{$users->job}}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{$users->roles[0]->name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                    </div>
               </div>
            </div>
        </div>
        @endsection


    