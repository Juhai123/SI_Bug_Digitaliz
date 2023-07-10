@extends('layouts.admin2')

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
                           <a href="{{ route('admin.project.create')}}" class="btn btn-primary"><i class="ri-add-line mr-2"></i>Add Project</a>
                           </div>
                        </div>

                        <div class="iq-card-body">
                           <div class="table-responsive">
                           <!-- <div class="row justify-content-between">
                       
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
                        </div> -->
                        <!-- @if(Session::has('success'))
                           <div class="alert alert-success" role="alert">
                              {{Session::get('success')}}
                           </div>
                           @endif -->
                           
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
                                <th class="text-center">Instansi</th>
                                <th class="text-center">Project Name</th>
                                <th class="text-center">Link</th>
                                <th class="text-center">PIC</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                    @php
                                    $nomor = 1 + (($projects->currentPage() - 1) * $projects->perPage());
                                    @endphp
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $project->instansi->instansi_name}}</td>
                                <td>{{ $project->project_name }}</td>
                                <td>{{ $project->link }}</td>
                                <td>{{ $project->user->name }}</td>
                                <td>
                                <a name="" id="" class="btn btn-success"
                                        href="{{ route('admin.project.edit', $project->id) }}" role="button">
                                        <i class="la la-edit mr-2"></i>Edit</a>

                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('admin.project.show', $project->id) }}" role="button">
                                        <i class="ri-eye-fill mr-2"></i>Show</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$projects->links()}}
                </div>
            </div>
            </div>
                  </div>
               </div>
            </div>
</div>
         
    
        @endsection
        