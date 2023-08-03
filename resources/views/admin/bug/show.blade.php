@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Bug</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Bug</li>
                        <li class="breadcrumb-item active" aria-current="page">Show Bug</li>
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
                              <h4 class="card-title">Show Report Bug</h4>
                           </div>
                        </div>
                        <div class="text-left ml-4 mt-2">
                           <a href="{{ route('admin.bug.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $bug->name }} </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $bug->description }} </td>
                                </tr>
                                <tr>
                                    <th>File</th>
                                    <td>
                                        @if($bug->file)
                                        <img src="{{ asset('storage/'. $bug->file) }}" width="300px">
                                         @else
                                         N/A
                                         @endif
                                        </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>@if($bug->status =="PENDING")
                                    <span class="badge bg-success">{{$bug->status}}</span>
                                    @elseif($bug->status == "ON PROGRESS")
                                    <span class="badge bg-danger text-light">{{$bug->status}}</span>
                                    @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                </div>
   
    <!--card end show bug-->

     <!--card task-->
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Task</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                            <p><h5>Pilih user untuk ditambahkan di task diatas :</h5></p>
                            <form action="{{ $url }}" method="post">
                    @csrf
                    <input type="hidden" name="bug_id" value="{{ $bug->id }}">
                            <div class="form-group">
                            <select class="form-control mb-3" name="user_id" id="">
                                 <option disabled value="">Pilih Programmer</option>
                                 @foreach($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                                 @endforeach
                              </select>
                            </div>
                            <div class="text-end">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                            </form>
                        </div>
                     </div>
                    
                        <!-- end card task -->
                        
                        <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Daftar Task</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
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
                        <div class="table-responsive">
                           
                              <table class="table table-bordered table-responsive-md table-striped text-center">
                                 <thead>
                                    <tr>
                                       <th scope="col">No</th>
                                       <th scope="col">Programmer</th>
                                       <th scope="col">Status</th>
                                       <th scope="col">Start Date</th>
                                       <th scope="col">End Date</th>
                                       <th scope="col">Action</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach ($task as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->user->name}}</td>
                                <td>{{ $task->historytask->pluck('status')->implode(', ') }}</td>
                                <td>{{ $task->historytask->pluck('start')->implode(', ') }}</td>
                                <td>{{ $task->historytask->pluck('end')->implode(', ') }}</td>
                                <td>
                                 
                                <form method="POST" action="{{ route('admin.task.destroy', $task->id )}}" class="d-inline"  >
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger">

                </form>
               
                                </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                        </div>
                        </div>
 <!-- end task -->
                </div>
                </div>
            </div>
               </div>
            </div>
            @endsection
      


 <!-- <section>
        <div class="card">
            <div class="card-body md-4">
                <h5 class="card-title">Task</h5>
                <p><strong>Pilih user untuk ditambahkan di task diatas :</strong></p> -->
                 <!-- Left side columns -->
        <!-- <div class="col-lg-10">
          <div class="row">

                <form action="{{ $url }}" method="post">
                    @csrf
                    <input type="hidden" name="bug_id" value="{{ $bug->id }}">
                    <div class="form-group mt-3">
                    <select class="form-select"name="user_id" id="" >
                    <option disabled value="">Pilih Programmer</option>
                    @foreach ($users as $user)
                    
                    @endforeach
                    </select>
                    <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                   
                </div>
                </div>
                </form>

          </div>
        </div>
            </div>
        </div> 
              
    </section>
   
    <!--card end task-->

    