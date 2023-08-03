@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">History</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">History</li>
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
                              <h4 class="card-title">History User</h4>
                           </div>
                          
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table table-responsive-md table-striped text-center">
                                 <thead>
                                    <tr>
                                       <th class="text-center">No</th>
                                       <th class="text-center">Date</th>
                                       <th class="text-center">User</th>
                                       <th class="text-center">Activity</th>
                                       <th class="text-center">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                  @foreach ($logs as $log)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$log->created_at}}</td>
                                    <td>{{$log->causer->name}}</td>
                                    <td>{{$log->description}}</td>
                                    <td>
                                         <!-- Button trigger modal -->
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter-{{ $log->id }}">
                           <i class="ri-delete-bin-6-fill mr-2"></i>Delete
                           </button>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalCenter-{{ $log->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <form class="d-inline" action="{{ route('admin.history.destroy', [$log->id]) }}" method="POST">

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
                           </div>
                        </div>
                     </div>
                    </div>
               </div>
            </div>
        </div>

@endsection