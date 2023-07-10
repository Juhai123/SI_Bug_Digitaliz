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
                              <table class="table table-bordered table-responsive-md table-striped text-center">
                                 <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bug Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                    <tbody>
                                    </tbody>
                                    @foreach ($tasks as $task)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td scope="row">{{ $task->bug->name }}</td>
                                    <td scope="row">{{ $task->bug->description }}</td>
                                    <td scope="row">
                                    @if($task->status == "PENDING")
                                    <span class="badge bg-secondary">{{$task->status}}</span>
                                    @elseif($task->status == "WAITING APPROVAL")
                                    <span class="badge bg-primary">{{$task->status}}</span>
                                    @elseif($task->status == "APPROVED")
                                    <span class="badge bg-success">{{$task->status}}</span>
                                    @elseif($task->status == "REJECTED")
                                    <span class="badge bg-danger">{{$task->status}}</span>
                                    @endif
                                    </td>
                                    <td scope="row">
                                      <!-- Modal -->
                                      <button type="button" class="btn btn-success" data-toggle="modal" 
                                data-target="#exampleModal-{{ $task->id }}"><i class="la la-edit mr-2"></i>
                           Edit
                           </button>
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModal-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Edit Instansi</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('programmer.historytask.update', $task->id) }}" method="post">
                            @csrf
                            @if (@$task)
                                @method('PUT')
                            @endif
                            <div class="form-group mt-3">
                                <label for="">Bug Name</label>
                                <input type="text" name="name" class="form-control" required="" value="{{ $task->bug->name ?? '' }}">
                                </div>
                            <div class="form-group mt-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="" rows="3">{{ $task->bug->description ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-select" name="status" id="floatingSelect" aria-label="Floating label select example" 
                            value="{{ $task->status ?? '' }}">
                            <option selected> -- Choose --</option>
                            <option value="pending">PENDING</option>
                            <option value="waiting approved">WAITING APPROVAL</option>
                            <option value="approved">APPROVED</option>
                            <option value="rejected">REJECTED</option>
                            </select>
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
                                    </td>
                                </tr>
                                @endforeach
                              </table>
                           </div>
                        </div>
                     </div>
                    </div>
               </div>
            </div>
</div>
@endsection