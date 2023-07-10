@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Bugs Walking</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Bugs Walking</li>
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
                              <h4 class="card-title">Data Bugs Walking</h4>
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
                                    <a class="dropdown-item" name="priority" autofocus value=""><i class="ri-printer-fill mr-2"></i>Progress</a>
                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Priority</a>
                                 </div>
                              </div>
                           </div>
                        </div> -->
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
                                       <th scope="col">No</th>
                                       <th scope="col">Bug Name</th>
                                       <th scope="col">Status</th>
                                       <th scope="col">Start</th>
                                       <th scope="col">End</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 @foreach($historytasks as $historytask)
                                 <tbody>
                                 <td>{{ $loop->iteration}}</td>
                                 <td>{{ $historytask->bug->name}}</td>
                                 <td>
                                 @if ($historytask->status == 'PENDING')
                                        <div class="badge badge-pill badge-warning">Pending</div>
                                    @elseif($historytask->status == 'ON PROGRESS')
                                        <div class="badge badge-pill badge-primary">On Progress</div>
                                    @elseif($historytask->status == 'DONE')
                                        <div class="badge badge-pill badge-info">Done</div>
                                    @elseif($historytask->status == 'VERIFICATION')
                                        <div class="badge badge-pill badge-success">Verification</div>
                                    @endif
                                 </td>
                                 <td>{{ $historytask->start }}</td>
                                 <td>{{ $historytask->end }}</td>
                                 <td>
                                
<div class="d-flex justify-content-sm-center">
<form action="{{route('admin.bugs_walking.verification.update',  $historytask->id) }}" method="POST" class="d-inline">
    @csrf
    @method('PATCH')
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check-circle-o mr-2"></i> Verifikasi
    </button>
</form>
<div class="iq-card-header-toolbar d-flex align-items-center">
<div class="dropdown">
            <span class="dropdown-toggle text-primary" id="dropdownMenuButton41" data-toggle="dropdown">
                <i class="ri-more-2-line"></i>
            </span>
            <div class="dropdown-menu dropdown-menu-right" style="">
                <form action="{{ route('admin.bugs_walking.update', $historytask->id) }}" method="post" class="dropdown-item">
                            @csrf
                            @if (@$historytask)
                                @method('PUT')
                            @endif
                            <input type="hidden" name="id" value="{{ $historytask->id }}">
                            <button type="submit" class="btn btn-light">
        <i class="ri-user-unfollow-line mr-2"></i> Tolak
    </button>
                            
                      </form>
            </div>
        </div>
</div>
    
</div>

                                 </td>
                        </tbody>
                        @endforeach
                    </table>
                  
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

        