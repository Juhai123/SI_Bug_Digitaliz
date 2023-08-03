@extends('layouts.programmer1')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Task</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Task</li>
                        <li class="breadcrumb-item active" aria-current="page">Show Task</li>
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
                              <h4 class="card-title">Show Task</h4>
                           </div>
                        </div>
                        <div class="text-left ml-4 mt-2">
                           <a href="{{ route('programmer.task.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table table-borderless">
                            <tbody>
                            <tr>
                                    <th>Bug Name</th>
                                    <td>{{ $tasks->bug->name }} </td>
                                </tr>
                                <tr>
                                    <th>File</th>
                                    <td>
                                    @if($tasks->bug->file)
                                        <img src="{{ asset('storage/'. $tasks->bug->file) }}" width="300px">
                                         @else
                                         N/A
                                         @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($tasks->bug->status =="PENDING")
                                    <span class="badge bg-primary text-light">{{$tasks->bug->status}}</span>
                                    @elseif($tasks->bug->status == "ON PROGRESS")
                                    <span class="badge bg-warning text-light">{{$tasks->bug->status}}</span>
                                    @elseif($tasks->bug->status == "DONE")
                                    <span class="badge bg-success text-light">{{$tasks->bug->status}}</span>
                                    @elseif($tasks->bug->status == "VERIFICATION")
                                    <span class="badge bg-danger text-light">{{$tasks->bug->status}}</span>
                                    @endif
                                </td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td>{{ $tasks->start }} </td>
                                </tr>
                                <tr>
                                    <th>End Date</th>
                                    <td>{{ $tasks->end }} </td>
                                </tr>
                                <tr>
                                <form action="{{ route('programmer.historytask.store', $tasks->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $tasks->id }}">
    <input type="hidden" name="bug_id" value="{{ $tasks->bug_id }}">
    <input type="hidden" name="task_id" value="{{ $tasks->id }}">
    <input type="hidden" name="user_id" value="{{ $tasks->user_id }}">
    <input type="hidden" name="status" value="{{ $tasks->status }}">
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Ambil Task</button>
    </div>
</form>

<!-- <form action="{{ route('programmer.coba.show', $tasks->id ) }}" method="post" enctype="multipart/form-data">
@csrf
                    
    <input type="hidden" name="id" value="{{ $tasks->id }}">
    <input type="hidden" name="bug_id" value="{{ $tasks->bug_id }}">
    <input type="hidden" name="task_id" value="{{ $tasks->id }}">
    <input type="hidden" name="user_id" value="{{ $tasks->user_id }}">
    <input type="hidden" name="status" value="{{ $tasks->status }}">
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Ambil Task</button>
    </div>
</form> -->



                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>


                </div>
                @endsection