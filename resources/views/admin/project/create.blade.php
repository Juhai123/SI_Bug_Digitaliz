@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Project</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Project</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Project</li>
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
                              <h4 class="card-title">Form Add Project</h4>
                           </div>
                        </div>
                        <div class="text-left ml-4 mt-2">
                           <a href="{{ route('admin.project.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                           
                        <div class="iq-card-body">
                       
                           <form action="{{ route('admin.project.store')}}" method="post" enctype="multipart/form-data" 
                           class="form-horizontal">
                            @csrf
                            @if(@$project)
                            @method('PUT')
                            @endif
                          
                              <div class="form row">
                                 <div class="col-md-6 mb-3">
                                  <label class="" for="">Instansi</label>
                                 <select class="form-control" name="instansi_id" id="">
                                 <option disabled value="">Select Instansi</option>
                                 @foreach($instansis as $instansi)
                                  <option value="{{ $instansi->id }}">{{ $instansi->instansi_name }}</option>
                                 @endforeach
                              </select>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label class="" for="">Project Name</label>
                                    <input type="text" name="project_name" class="form-control" id="name" placeholder="Project Name" value="{{ $project->project_name ?? '' }}">
                                 </div>
                              <div class="col-md-6 mb-3">
                              <label class="" for="">Link</label>
                                    <input type="text" name="link" class="form-control" id="" placeholder="Input link" value="{{ $project->link ?? '' }}">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                  <label class="" for="">PIC</label>
                                 <select class="form-control" name="user_id" id="">
                                 <option disabled value="">Select PIC</option>
                                 @foreach($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                                 @endforeach
                              </select>
                              </div>

                              </div>
                              <div class="text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
                           </form>
                        </div>
                     </div>
                    </div>
               </div>
              </div>
        </div>
        @endsection
        
        

            <!-- <h4 class="card-title">Form Project</h4>
            <form action="{{ route('admin.project.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(@$project)
                    @method('PUT')
                @endif

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Instansi</label>
                  <div class="col-sm-10">
                  <select class="form-select" name="instansi_id" id="" >
                    <option disabled value="">Select Instansi</option>
                    @foreach($instansis as $instansi)
                    <option value="{{ $instansi->id }}">{{ $instansi->instansi_name }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Project Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="project_name" 
                    id="" required aria-describedby="helpId" placeholder="Project Name" value="{{ $project->name ?? '' }}">
                    {{-- if error validate --}}
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Link</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="link" 
                    id="" required aria-describedby="helpId" placeholder="Input Link" value="{{ $project->link ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">PIC</label>
                  <div class="col-sm-10">
                  <select class="form-select" name="user_id" id="" >
                    <option disabled value="">Select PIC</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
               
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
                
            </form>
            
        </div>
    </div>
</section> -->
        