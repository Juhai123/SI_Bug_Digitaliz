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
                              <table id="example" class="table table-striped table-responsive-md text-center">
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
                                            <td>{{$task->bug->name}}</td>
                                            <td>
                                            
                                    @if ($task->status == 'PENDING')
                                        <div class="badge badge-pill badge-warning">Pending</div>
                                    @elseif($task->status == 'REVISION')
                                        <div class="badge badge-pill badge-secondary">Revision</div>
                                    @elseif($task->status == 'DONE')
                                        <div class="badge badge-pill badge-info">Done</div>
                                    @elseif($task->status == 'VERIFIED')
                                        <div class="badge badge-pill badge-success">Verification</div>
                                    @endif
                                            </td>
                                            <td>{{$task->end}}</td>
                                            <td>{{$task->information}}</td>
                                            
                                            <td>
                                            <a name="" id="" class="btn btn-primary" href="{{ route('programmer.historytask.show', $task->id) }}" role="button">
                                                <i class="ri-eye-fill mr-2"></i>Show</a>
                                            
                                                <button type="button" class="btn btn-success" data-toggle="modal" 
                                data-target="#exampleModal-{{ $task->id }}"><i class="la la-edit mr-2"></i>
                           Edit
                           </button>
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModal-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Edit History Task</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('programmer.historytask.update', $task->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                            @if (@$task)
                                @method('PUT')
                            @endif
                           
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <input type="hidden" name="bug_id" value="{{ $task->bug_id }}">
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <input type="hidden" name="user_id" value="{{ $task->user_id }}">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control mb-3" name="status" id="status" value="{{ $task->status ?? ''}}">
                                 <option selected >Select Status</option>
                                 <option value="PENDING" {{ $task->status == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                                 <option value="DONE" {{ $task->status == 'DONE' ? 'selected' : '' }}>Done</option>
                                  <!-- <option value="done">DONE</option>
                                  <option value="verification">VERIFICATION</option> -->
                              </select>
                            </div>
                            <div class="form-group">
        <label for="progress">Progress</label>
        <input type="range" name="progress" id="progress" min="0" max="100" step="1" class="form-control" value="{{ $task->bug->progress }}">
    </div>
    <div class="form-group" id="informationField" style="display: none;">
        <label for="information">Keterangan</label>
        <input type="text" name="information" id="information" class="form-control" value="{{ $task->bug->keterangan }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var statusSelect = document.getElementById('status');
    var informationField = document.getElementById('informationField');
    
    statusSelect.addEventListener('change', function() {
        if (statusSelect.value == 'DONE') {
            informationField.style.display = 'block';
        } else {
            informationField.style.display = 'none';
        }
    });
</script>
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
                             
                           </div>
                        </div>
                     </div>
                    </div>
               </div>
            </div>
</div>

                          
@endsection
       