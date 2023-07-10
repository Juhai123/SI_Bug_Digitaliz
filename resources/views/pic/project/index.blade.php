@extends('layouts.pic_project1')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Project</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Project</li>
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
                              <h4 class="card-title">Data Project</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              
                           </div>
                        </div>
                        <div class="iq-card-body">
                        <div class="table-responsive">
                        <div class="row justify-content-between">
                        <!-- <div class="col-sm-6 col-md-3">
                        <div class="iq-todo-page">
                           
                           
                        </div>
                        </div> -->
                        <!-- <div class="iq-card-header-toolbar d-flex align-items-center">
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
                           </div> -->

                        </div>
                              <table id="example" class="table table-responsive-md table-striped text-center mt-4">
                                 <thead>
                                    <tr>
                                       <th scope="col">No</th>
                                       <th scope="col">Project Name</th>
                                       <th scope="col">Status</th>
                                       <th scope="col">Description</th>
                                       <th scope="col">Start Date</th>
                                       <th scope="col">End Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                
                                 @foreach ($bugs as $bug)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $bug->project->project_name}}</td>
                                <td> @if ($bug->status == 'PENDING')
                                        <div class="badge badge-pill badge-warning">Pending</div>
                                    @elseif($bug->status == 'ON PROGRESS')
                                        <div class="badge badge-pill badge-primary">On Progress</div>
                                    @elseif($bug->status == 'DONE')
                                        <div class="badge badge-pill badge-info">Done</div>
                                    @elseif($bug->status == 'VERIFICATION')
                                        <div class="badge badge-pill badge-success">Verification</div>
                                    @endif</td>
                                <td>{{ $bug->description }}</td>
                               <td></td>
                               <td></td>
                                
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
            </div>
</div>
         

        @endsection