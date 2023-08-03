@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Dashboard</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                     </ul>
                  </nav>
               </div>
        @endsection

        @section('content1')
        <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">

               @if(Session::has('message'))
      <script>
        $(document).ready(function() {
          toastr.success("{{ Session::get('message') }}");
        });
      </script>
      @endif
               <!-- @if($message = Session::get('message'))
                           <br>
                           <div class="col-md-12 col-md-1 col-mb-0">
                           <div class="alert text-white bg-info" role="alert">
                <div class="iq-alert-text"><b>{{$message}} {{Auth::user()->name}}!</b>
                <p class="text-white mb-0">Selamat Datang di Sistem Informasi Bug Reporting Digitaliz</p></div>

            </div>
                           </div>
            @endif -->
                     <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden bg-cobalt-blue">
                        <div class="iq-card-body pb-0">
                              <div class="text-right mb-4">
                           <div class="rounded-circle iq-card-icon iq-bg-primary">
                           <a name="" id="" href="{{ route('admin.programmer.index') }}">
                           <i class="ri-user-add-line" aria-hidden="true"></i></a>
                              </div>
                           <span class="float-left line-height-2">Programmers
                              <h2 class="text-white text-left"><span class="counter">{{count($programmers)}}</span></h2>
                           </span>
                              </div>
                        </div>
                     </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden bg-cobalt-blue">
                        <div class="iq-card-body pb-0">
                              <div class="text-right mb-4">
                           <div class="rounded-circle iq-card-icon iq-bg-primary">
                           <a name="" id="" href="{{ route('admin.bug.index') }}">
                           <i class="las la-bug" aria-hidden="true"></i></a>
                           </div>
                           <span class="float-left line-height-2">Bug Handle
                              <h2 class="text-white text-left"><span class="counter">{{count($bugs)}}</span></h2>
                           </span>
                              </div>
                        </div>
                     </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden bg-cobalt-blue">
                        <div class="iq-card-body pb-0">
                              <div class="text-right mb-4">
                           <div class="rounded-circle iq-card-icon iq-bg-primary">
                           <a name="" id="" href="{{ route('admin.project.index') }}">
                           <i class="ri-stack-line" aria-hidden="true"></i></a>
                           </div>
                           <span class="float-left line-height-2">Project
                              <h2 class="text-white text-left"><span class="counter">{{count($project)}}</span></h2>
                           </span>
                              </div>
                        </div>
                     </div>
                     </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden bg-cobalt-blue">
                        <div class="iq-card-body pb-0">
                              <div class="text-right mb-4">
                           <div class="rounded-circle iq-card-icon iq-bg-primary">
                           <a name="" id="" href="#">
                           <i class="ri-code-s-slash-line" aria-hidden="true"></i></a>
                           </div>
                           <span class="float-left line-height-2">Task
                              <h2 class="text-white text-left"><span class="counter">{{count($task)}}</span></h2>
                           </span>
                              </div>
                        </div>
                     </div>
                     </div>
               </div>
               
                     <div class="row">
                     <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden bg-cobalt-blue">
                        <div class="iq-card-body pb-0">
                              <div class="text-right mb-4">
                           <div class="rounded-circle iq-card-icon iq-bg-primary">
                           <a name="" id="" href="{{ route('admin.bugs_walking.index') }}">
                           <i class="ri-checkbox-multiple-fill" aria-hidden="true"></i></a>
                           </div>
                           <span class="float-left line-height-2">Task Walking
                              <h2 class="text-white text-left"><span class="counter">{{count($task_walk)}}</span></h2>
                           </span>
                              </div>
                        </div>
                     </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden bg-cobalt-blue">
                        <div class="iq-card-body pb-0">
                              <div class="text-right mb-4">
                           <div class="rounded-circle iq-card-icon iq-bg-primary">
                           <a name="" id="" href="{{ route('admin.instansi.index') }}">
                           <i class="ri-building-line" aria-hidden="true"></i></a>
                           </div>
                           <span class="float-left line-height-2">Instansi
                              <h2 class="text-white text-left"><span class="counter">{{count($instansi)}}</span></h2>
                           </span>
                              </div>
                        </div>
                     </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden bg-cobalt-blue">
                        <div class="iq-card-body pb-0">
                              <div class="text-right mb-4">
                           <div class="rounded-circle iq-card-icon iq-bg-primary">
                           <a name="" id="" href="{{ route('admin.user.index') }}">
                           <i class="ri-group-line" aria-hidden="true"></i></a>
                           </div>
                           <span class="float-left line-height-2">Total Users
                              <h2 class="text-white text-left"><span class="counter">{{count($user)}}</span></h2>
                           </span>
                              </div>
                        </div>
                     </div>
                     </div>
               </div>
           
        <!-- end card 1 -->
        
            <div class="row">
            <div class="col-md-12 col-lg-9">
            <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Data Bug</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="row">
                              <div class="col-sm-12">
                              <div class="table-responsive">
                              <table id="example" class="table table-responsive-md table-striped text-center">
                                 <thead>
                                    <tr>
                                       <th class="text-center">No</th>
                                       <th class="text-center">Bug Name</th>
                                       <th class="text-center">Project Name</th>
                                       <th class="text-center">Status</th>
                                       <th class="text-center">Progress</th>
                                       <th class="text-center">Priority</th>
                                    </tr>
                                    
                                    <tbody>
                                    @php
                                    $nomor = 1 + (($bugs->currentPage() - 1) * $bugs->perPage());
                                    @endphp
                                    @foreach($bugs as $bug)
                                    <tr>
                                       <td>{{$nomor++}}</td>
                                       <td>{{ $bug->name }}</td>
                                       <td>{{ $bug->project->project_name}}</td>
                                        <td> 
                                          @if ($bug->status == 'PENDING')
                                        <div class="badge badge-pill badge-warning">Pending</div>
                                    @elseif($bug->status == 'ON PROGRESS')
                                        <div class="badge badge-pill badge-primary">On Progress</div>
                                    @elseif($bug->status == 'DONE')
                                        <div class="badge badge-pill badge-info">Done</div>
                                    @elseif($bug->status == 'VERIFICATION')
                                        <div class="badge badge-pill badge-success">Verification</div>
                                    @endif</td>
                                <td>{{ $bug->progress }}</td>
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
                                </tr>
                                @endforeach
                                    </tbody>
                                   
                                 </thead>
                              </table>
                              {{$bugs->links()}}
                              </div>
                              </div>
                           </div>
                        </div>
            </div>
            </div>
            
                 <!-- end bug -->
               <div class="col-md-12 col-lg-3">
                  <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Programmers</h4>
                           </div>
                        </div>
                     <div class="iq-card-body">
                        <div class="">
                        <div class="iq-todo-right">
                                 <form class="position-relative">
                                 </form>
                                 <div class="iq-todo-friendlist mt-0">
                                    <ul class="suggestions-lists m-0 p-0">
                                    @foreach ($programmers as $programmer)
                                       <li class="d-flex mb-2 align-items-center">
                                       
                                          <div class="user-img img-fluid">
                                          @if(Auth::user()->image)
                        <img src="{{asset('storage/'.Auth::user()->image)}}" alt="story-img" class="rounded-circle avatar-40">
                            @else
                            <img src="{{asset('sofbox-dashboard-lite/html/images/user/01.jpg')}}" alt="story-img" class="rounded-circle avatar-40">
                            @endif
                                             <!-- <img src="{{asset('sofbox-dashboard-lite/html/images/user/01.jpg')}}" alt="story-img" 
                                             class="rounded-circle avatar-40"> -->
                                          </div>
                                          <div class="media-support-info ml-3">
                                             <tr>
                                             <td>
                                             <h6>{{$programmer->name}}</h6></td>
                                            <td>
                                             <p class="mb-0">{{$programmer->job}}</p></td>
                                          </div>
                                          </tr>
                                         
                                       </li>
                                       @endforeach 
                                    </ul>
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

        