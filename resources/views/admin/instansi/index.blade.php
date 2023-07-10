@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Instansi</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Instansi</li>
                     </ul>
                  </nav>
               </div>
        @endsection

        @section('content1')
        <div id="content-page" class="content-page">
            <div class="container-fluid">
               <!-- <div class="row">
                    <div class="col-sm-12">
                     <div class="iq-card">
                     
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">List Instansi</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                           <button type="button" class="btn btn-primary" data-toggle="modal" 
                                data-target="#exampleModal"><i class="ri-add-line mr-2"></i>
                           Add Instansi
                           </button>
                           <!-- Modal -->
                           <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Add Instansi</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('admin.instansi.store') }}" method="post">
                            @csrf
                            @if (@$instansi)
                                @method('PUT')
                            @endif
                            
                            <div class="form-group">
                                <label for="">Instansi Name</label>
                                <input type="text" class="form-control" id="inputText" name="instansi_name" id="" 
                                placeholder="Instansi Name"  value="{{ $instansi->instansi_name ?? ''}}">
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                                    </div>
                                   
                                 </div>
                              </div>
                           </div>
                             
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                           <div class="row justify-content-between">
                        <div class="col-sm-6 col-md-3">
                        <div class="iq-todo-page">
                           <form method="GET" class="position-relative">
                              <div class="form-group mb-0">
                                 <input type="search" name="search" class="form-control todo-search" 
                                 id="exampleInputEmail002"  placeholder="Search" autofocus value="{{$search}}">
                                 <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                              </div>
                           </form>
                           
                        </div>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                 <div class="col-sm-12 col-md-12">
                                 <div class="user-list-files d-flex float-right">
                                    <a href="javascript:void();" class="fa fa-filter">
                                       Filter
                                     </a>
                                   </div>
                                 </div>
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" name="progress" autofocus value=""><i class="ri-printer-fill mr-2"></i>Progress</a>
                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Priority</a>
                                 </div>
                              </div>
                           </div>
                        </div>
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
                              <table class="table table-responsive-md table-striped text-center mt-4">
                                 <thead>
                                    <tr>
                                <th scope="col">No</th>
                                <th scope="col">Instansi Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                    @php
                                    $nomor = 1 + (($instansis->currentPage() - 1) * $instansis->perPage());
                                    @endphp
                            @foreach ($instansis as $instansi)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $instansi->instansi_name }}</td>
                                <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" 
                                data-target="#exampleModal-{{ $instansi->id }}"><i class="la la-edit mr-2"></i>
                           Edit
                           </button> -->
                           <!-- Modal -->
                           <!-- <div class="modal fade" id="exampleModal-{{ $instansi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Edit Instansi</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('admin.instansi.update', $instansi->id) }}" method="post">
                            @csrf
                            @if (@$instansi)
                                @method('PUT')
                            @endif
                            <input type="hidden" name="instansi_name" value="{{ $instansi->id }}">
                            <div class="form-group">
                                <label for="">Instansi Name</label>
                                <input type="text" class="form-control"  name="instansi_name" id="" value="{{ $instansi->instansi_name ?? ''}}">
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                                    </div>
                                    <div class="modal-footer d-none">
                                       <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                 </div>
                              </div>
                           </div> -->
                           <!-- end edit -->
                           <!-- Button trigger modal -->
                           <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter-{{ $instansi->id }}">
                           <i class="ri-delete-bin-6-fill mr-2"></i>Delete
                           </button> -->
                          <!-- Modal -->
                          <!-- <div class="modal fade" id="exampleModalCenter-{{ $instansi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h6 class="modal-title"><b>Are you sure delete this table?</b></h6>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                    <span>All data will be lose</span>
                    </div>
                    <div class="modal-footer">
                    <form class="d-inline" action="{{ route('admin.instansi.destroy', [$instansi->id]) }}" method="POST">

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
                          </td>
                               
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                       {{$instansis->links()}}
                   </div>
               </div>
                        </div>
                       </div> -->

                       <div class="row">
            <div class="col-md-12 col-lg-9">
            <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Data Instansi</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="row">
                              <div class="col-sm-12">
                              <div class="table-responsive">
                              <table id="example" class="table table-responsive-md table-striped text-center">
                                 <thead>
                                    <tr>
                                       <th class="text-center">No</th>
                                       <th class="text-center">Instansi Name</th>
                                       <th class="text-center">Priority</th>
                                    </tr>
                                    
                                    <tbody>
                                    @php
                                    $nomor = 1 + (($instansis->currentPage() - 1) * $instansis->perPage());
                                    @endphp
                                    @foreach($instansis as $instansi)
                                    <tr>
                                       <td>{{$nomor++}}</td>
                                       <td>{{ $instansi->instansi_name }}</td>
                                     <td>
                                     <button type="button" class="btn btn-success" data-toggle="modal" 
                                data-target="#exampleModal-{{ $instansi->id }}"><i class="la la-edit mr-2"></i>
                           Edit
                           </button>
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModal-{{ $instansi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Edit Instansi</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('admin.instansi.update', $instansi->id) }}" method="post">
                            @csrf
                            @if (@$instansi)
                                @method('PUT')
                            @endif
                            <input type="hidden" name="instansi_name" value="{{ $instansi->id }}">
                            <div class="form-group">
                                <label for="">Instansi Name</label>
                                <input type="text" class="form-control"  name="instansi_name" id="" value="{{ $instansi->instansi_name ?? ''}}">
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                                    </div>
                                    <div class="modal-footer d-none">
                                       <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end edit -->
                           <!-- Button trigger modal -->
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter-{{ $instansi->id }}">
                           <i class="ri-delete-bin-6-fill mr-2"></i>Delete
                           </button>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalCenter-{{ $instansi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h6 class="modal-title"><b>Are you sure delete this table?</b></h6>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                    <span>All data will be lose</span>
                    </div>
                    <div class="modal-footer">
                    <form class="d-inline" action="{{ route('admin.instansi.destroy', [$instansi->id]) }}" method="POST">

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
                                     </td>
                                </tr>
                                @endforeach
                                    </tbody>
                                   
                                 </thead>
                              </table>
                              {{$instansis->links()}}
                              </div>
                              </div>
                           </div>
                        </div>
            </div>
            </div>
            
                 <!-- end bug -->
               <div class="col-md-12 col-lg-3">
                  <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add Instansi</h4>
                           </div>
                        </div>
                     <div class="iq-card-body">
                        <div class="">
                        <div class="iq-todo-right">
                        <form action="{{ route('admin.instansi.store') }}" method="post" enctype="multipart/form-data" class="position-relative">
                @csrf
                @if(@$instansi)
                @endif
                <div class="row mb-1">
                  <label for="" class="col-sm-12 col-form-label">Instansi Name</label>
                  <div class="col-sm-12">
                    <input type="text" name="instansi_name" class="form-control {{$errors->first('instansi_name') ? 'is-invalid' : ''}}" id="instansi_name" 
                     placeholder="Instansi Name" value="{{ $instansi->instansi_name ?? '' }}">
                     <div class="invalid-feedback">
        {{$errors->first('instansi_name')}}
    </div>
                  </div>
                </div>
                <div class="iq-card-body mt-0">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                
            </form>
                                 
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </div>
            </div>
        @endsection

                                  