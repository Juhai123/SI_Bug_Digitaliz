@extends('layouts.programmer')

@section('content')
<div class="pagetitle">
            <h1>Task</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Task</li>
                </ol>
                
            </nav>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Task</h4>
                    <br>
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bug Name</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->bug->name }}</td>
                                <td> @if ($task->bug->file)
                                    <a href="{{asset('storage/'.$task->bug->file)}}" width="70px">File</a>
                                    @else
                                    N/A
                                    @endif
                                    
                                </td>
                                <td>
                                @if ($task->bug->status == 'PENDING')
                                        <span class="badge bg-primary text-light"
                                            style="font-size: 13px">{{ $task->bug->status }}</span>
                                    @elseif($task->bug->status == 'ON PROGRESS')
                                        <span class="badge bg-warning text-light"
                                            style="font-size: 13px">{{ $task->bug->status }}</span>
                                    @elseif($task->bug->status == 'DONE')
                                        <span class="badge bg-success text-light"
                                            style="font-size: 13px">{{ $task->bug->status }}</span>
                                    @elseif($task->bug->status == 'VERIFICATION')
                                        <span class="badge bg-danger text-light"
                                            style="font-size: 13px">{{ $task->bug->status }}</span>
                                    @endif</td>
                                </td>
                                <td>{{ $task->start }}</td>
                                <td>{{ $task->end }}</td>
                                <td>

                                    <!-- Modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#basicModal-{{ $task->id }}">Edit</a>
                                    </button>

                               <!-- Modal -->
<div class="modal fade" id="basicModal-{{ $task->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('programmer.task.update', $task->id) }}" method="post">
                            @csrf
                            @if (@$task)
                                @method('PUT')
                            @endif
                <div class="form-group mt-3">
                <label for="">Status</label>
                <select class="form-select" name="status" id="floatingSelect" aria-label="Floating label select example" value="{{ $task->bug->status ?? '' }}">
                        <option selected> -- Choose --</option>
                        <option value="pending">PENDING</option>
                        <option value="on progress">ON PROGRESS</option>
                        <option value="done">DONE</option>
                    </select>
                </div>
                
                <div class="form-group mt-3">
                <label for="">Progress</label>
                </div>

                
                     
                            <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            
                           
                        </form>
                   
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

            
        </section>
       
@endsection
