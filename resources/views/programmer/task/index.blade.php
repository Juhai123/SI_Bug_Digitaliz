@extends('layouts.programmer1')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Task</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Task</li>
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
                              <h4 class="card-title">Data Task</h4>
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
                              <table id="example" class="table table-responsive-md table-striped text-center" >
                                 <thead>
                                    <tr>
                                       <th class="text-center">No</th>
                                       <th class="text-center">Bug Name</th>
                                       <th class="text-center">File</th>
                                       <th class="text-center">Status</th>
                                       <th class="text-center">Start Date</th>
                                       <th class="text-center">End Date</th>
                                       <th class="text-center">Action</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                
                                 @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->bug->name}}</td>
                                <td> @if ($task->bug->file)
                                    <a href="{{asset('storage/'.$task->bug->file)}}" width="70px">File</a>
                                    @else
                                    N/A
                                    @endif
                                    
                                </td>
                                <td>
                                @if ($task->bug->status == 'PENDING')
                                        <div class="badge badge-pill badge-warning">Pending</div>
                                    @elseif($task->bug->status == 'ON PROGRESS')
                                        <div class="badge badge-pill badge-primary">On Progress</div>
                                    @elseif($task->bug->status == 'DONE')
                                        <div class="badge badge-pill badge-info">Done</div>
                                    @elseif($task->bug->status == 'VERIFICATION')
                                        <div class="badge badge-pill badge-success">Verification</div>
                                    @endif</td>
                                </td>
                                <td>{{ $task->start }}</td>
                                <td>{{ $task->end }}</td>
                                <td>
                               
                                    <a name="lihat" id="showButton" class="btn btn-primary"
                                        href="{{ route('programmer.task.show', $task->id) }}" role="button"><i class="fa fa-eye"></i>Ambil</a>
                                       
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" 
                                data-target="#exampleModal-{{ $task->id }}"><i class="fa fa-eye mr-2"></i>
                           Ambil
                           </button>
                           <!-- Modal -->
                           <!-- <div class="modal fade" id="exampleModal-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Show Task</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('programmer.historytask.store', $task->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <input type="hidden" name="bug_id" value="{{ $task->bug_id }}">
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <input type="hidden" name="user_id" value="{{ $task->user_id }}">
                            <input type="hidden" name="status" value="{{ $task->status }}">
                            <div class="form-group">
                                <div class="text-left">
                                <label for="">Bug Name : </label>
                                {{ $task->bug->name }}
                                <input hidden type="text" name="name" value="{{ $task->bug->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-left">
                                <label for="">Status : </label>
                                
                                <select hidden name="status" class="form-control" id="" value="{{$task->bug->status ?? ''}}">
                                 <option value="" >Select Status</option>
                                  <option value="pending">PENDING</option>
                                  <option value="on progress">ON PROGRESS</option>
                                  <option value="done">DONE</option>
                                  <option value="verification">VERIFICATION</option>
                              </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary mt-3">Ambil Task</button>
                            </div>
                                    </form>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div> --> 
                           <!-- end edit -->
                           
                                     
                           
                        
              
                                    <!-- <form method="POST" action="{{ route('programmer.task.destroy', $task->id )}}" class="d-inline">
                    @csrf
                    @if (@$task)
                                @method('delete')
                            @endif
                    <button type="submit" name="tolak" id="deleteButton" class="btn btn-danger" value="Delete" >
                        <i class="fa fa-trash"></i>Delete</button>
                </form>
                -->
                                           <!-- Button trigger modal -->
                                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter-{{ $task->id }}">
                           <i class="ri-delete-bin-6-fill mr-2"></i>Delete
                           </button>
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModalCenter-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure delete this task?{{$task->bug->name}}</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <span>All data will be lose</span>
                                    </div>
                                    <div class="modal-footer">
                                    <form class="d-inline" action="{{ route('programmer.task.destroy', [$task->id]) }}" method="POST">

                                        @csrf

                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="submit" value="Delete" class="btn btn-danger">
                                        
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
                  
                  




