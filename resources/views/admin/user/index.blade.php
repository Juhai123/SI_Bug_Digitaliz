@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Manajemen User</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Manajemen User</li>
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
                              <h4 class="card-title">Daftar User</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="{{ route('admin.user.create')}}" class="btn btn-primary"><i class="ri-add-line mr-2"></i>Add User</a>
                              
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                          
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
                              <table id="example" class="table table-responsive-md table-striped text-center mt-4">
                                 <thead>
                                    <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Job</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                    @php
                                    $nomor = 1 + (($users->currentPage() - 1) * $users->perPage());
                                    @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>@if ($user->image)
                                        <a href="{{asset('storage/'.$user->image)}}" width="70px">File</a>
                                        
                                    @else
                                        N/A
                                    @endif
                                </td>
                                    <td>{{ $user->job }}</td>
                                    
                                    <td>{{ $user->roles[0]->name }}</td>
                                  

                                    <td>
                                        <a name="" id="" role="button" class="btn btn-success"
                                        href="{{ route('admin.user.edit', $user->id) }}">
                                        <i class="la la-edit mr-2"></i>Edit</a>
                                        
                                        <a name="" id="" role="button" class="btn btn-primary"
                                        href=" {{ route('admin.user.show', $user->id) }}">
                                        <i class="ri-eye-fill mr-2"></i>Show</a>


                                           <!-- Button trigger modal -->
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter-{{ $user->id }}">
                           <i class="ri-delete-bin-6-fill mr-2"></i>Delete
                           </button>
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModalCenter-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure delete this user?{{$user->name}}</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <span>All data will be lose</span>
                                    </div>
                                    <div class="modal-footer">
                                    <form class="d-inline" action="{{ route('admin.user.destroy', [$user->id]) }}" method="POST">

                                        @csrf

                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="submit" value="Delete" class="btn btn-danger">
                                        
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                     </div>
                    </div>
                </div>
            </div>
        </div>
        
        @endsection