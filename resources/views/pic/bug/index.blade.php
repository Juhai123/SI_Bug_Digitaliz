@extends('layouts.pic_project1')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Bug</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Bug</li>
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
                              <h4 class="card-title">Data Bug</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                           <a href="{{ route('pic.bug.create')}}" class="btn btn-primary"><i class="ri-add-line mr-2"></i>Report Bug</a>
                              
                           </div>
                        </div>
                        <div class="iq-card-body">
                        <div class="table-responsive">
                        <div class="row justify-content-between">
                  
                        </div>
                              <table id="example" class="table table-responsive-md table-striped text-center mt-4">
                                 <thead>
                                    <tr>
                                       <th scope="col">No</th>
                                       <th scope="col">Bug Name</th>
                                       <th scope="col">Description</th>
                                       <th scope="col">File</th>
                                       <th scope="col">Status</th>
                                       <th scope="col">Progress</th>
                                       <th scope="col">Project Name</th>
                                       <th scope="col">Priority</th>
                                       <th scope="col">Action</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    @php
                                    $nomor = 1 + (($bugs->currentPage() - 1) * $bugs->perPage());
                                    @endphp
                                 @foreach ($bugs as $bug)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $bug->name }}</td>
                                <td>{{ $bug->description }}</td>
                                <td>@if ($bug->file)
                                        <a href="{{asset('storage/'.$bug->file)}}" width="70px">File</a>
                                        
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td> @if ($bug->status == 'PENDING')
                                        <div class="badge badge-pill badge-warning">Pending</div>
                                    @elseif($bug->status == 'ON PROGRESS')
                                        <div class="badge badge-pill badge-primary">On Progress</div>
                                    @elseif($bug->status == 'DONE')
                                        <div class="badge badge-pill badge-info">Done</div>
                                    @elseif($bug->status == 'VERIFICATION')
                                        <div class="badge badge-pill badge-success">Verification</div>
                                    @endif</td>
                                <td>{{ $bug->progress }}</td>
                                <td>{{ $bug->project->project_name}}</td>
                                <td>
                                    @if ($bug->priority == 'LOW')
                                        <i class="ri-checkbox-blank-circle-fill text-success"
                                            style="font-size: 13px"></i>
                                    @elseif ($bug->priority == 'MEDIUM')
                                        <i class="ri-checkbox-blank-circle-fill text-warning"
                                            style="font-size: 13px"></i>
                                    @elseif($bug->priority == 'HIGH')
                                        <i class="ri-checkbox-blank-circle-fill text-danger"
                                            style="font-size: 13px"></i>
                                    @endif
                                </td>
                                <td>
                                <a name="" id="" class="btn btn-success"
                                        href="{{ route('pic.bug.edit', $bug->id) }}" role="button">
                                        <i class="ri-pencil-fill mr-2"></i>Edit</a>

                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('pic.bug.show', $bug->id) }}" role="button">
                                        <i class="ri-eye-fill mr-2"></i>Show</a>
                                        
                                </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$bugs->links()}}
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

        