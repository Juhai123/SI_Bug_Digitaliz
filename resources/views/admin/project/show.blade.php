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
                              <h4 class="card-title">Show Project</h4>
                           </div>
                        </div>
                        <div class="text-left ml-4 mt-2">
                           <a href="{{ route('admin.project.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table table-borderless">
                            <tbody>
                            <tr>
                                    <th>Instansi</th>
                                    <td>{{ $project->instansi->instansi_name }} </td>
                                </tr>
                                <tr>
                                    <th>Project Name</th>
                                    <td>{{ $project->project_name }} </td>
                                </tr>
                                <tr>
                                    <th>Link</th>
                                    <td>{{ $project->link }} </td>
                                </tr>
                                <tr>
                                    <th>PIC</th>
                                    <td>{{ $project->user->name }} </td>
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

    