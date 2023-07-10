@extends('layouts.admin2')
@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Programmer</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Programmer</li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
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
                              <h4 class="card-title">List Project Programmer</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                 <i class="ri-more-2-fill"></i>
                                 </span>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="text-left ml-4 mt-2">
                           <a href="{{ route('admin.programmer.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table table-bordered table-responsive-md table-striped text-center">
                                 <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bug Name</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($task as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->bug->name }}</td>
                                <td>{{ $task->bug->project->project_name }}</td>
                                <td>{{ $task->bug->status}}</td>
                               
                               
                                @endforeach
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