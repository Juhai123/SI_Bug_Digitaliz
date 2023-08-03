@extends('layouts.programmer1')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">History Task</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">History Task</li>
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
                              <h4 class="card-title">History Task</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                 <i class="ri-more-2-fill"></i>
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table  class="table table-striped table-responsive-md text-center">
                                 <thead>
                                    <tr>
                                       <th class="text-center">No</th>
                                       <th class="text-center">Bug Name</th>
                                       <th class="text-center">Status</th>
                                       <th class="text-center">End Date</th>
                                       <th class="text-center">Keterangan</th>
                                       <th class="text-center">Action</th>
                                    </tr>
                                    <tbody>
                                    @foreach($tasks as $task)
                                    
                                        <tr>
                                         <td>{{$loop->iteration}}</td>
                                         
                                          <td>{{ $task->bug->name }}</td>


                                          
                                        </tr>
                                      
                                      @endforeach
                                    </tbody>
                                 </thead>
                              </table>
                           </div>
                        </div>
                     </div>
                    </div>
               </div>
            </div>
</div>
@endsection