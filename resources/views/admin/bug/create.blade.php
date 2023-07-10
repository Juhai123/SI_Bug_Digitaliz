@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Bug</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Bug</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Bug</li>
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
                              <h4 class="card-title">Form Report Bug</h4>
                           </div>
                           </div>
                           <div class="text-left ml-4 mt-2">
                           <a href="{{ route('admin.bug.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                       
                        <div class="iq-card-body">
                           <form action="{{ route('admin.bug.store') }}" method="post" enctype="multipart/form-data" 
                           class="form-horizontal">
                            @csrf
                            @if(@$bug)
                            @method('PUT')
                            @endif
                          
                              <div class="form row">
                              <div class="col-md-6 mb-3">
                                 <label class="" for="">Name</label>
                                    <input type="text" name="name" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" id="name" placeholder="Bug Name" value="{{ $bug->name ?? '' }}">
                                    <div class="invalid-feedback">
        {{$errors->first('name')}}
    </div>
                                 </div>

                                 <div class="col-md-6 mb-3">
                                  <label class="" for="">Project</label>
                                 <select name="project_id" class="form-control {{$errors->first('project_id') ? 'is-invalid' : ''}}" id="">
                                 <option value="">Select Project</option>
                                 @foreach($projects as $project)
                                  <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                 @endforeach
                              </select>
                              <div class="invalid-feedback">
                              Invalid custom project feedback </div>
                              </div>
                             

                              <div class="col-md-6 mb-3">
                                <label class="" for="">File</label>
                              <div class="custom-file ">
                                    <input type="file" class="custom-file-input" name="file" id="file" value="{{ $bug->file ?? '' }}">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                 </div>
                              </div>

                              <div class="col-md-6 mb-3">
                              <label class="" for="">Priority</label>
                              <select name="priority" class="form-control {{$errors->first('priority') ? 'is-invalid' : ''}}" id="" value="{{$bug->priority ?? ''}}">
                                 <option value="" >Select Priority</option>
                                  <option value="low">LOW</option>
                                  <option value="medium">MEDIUM</option>
                                  <option value="high">HIGH</option>
                              </select>
                              <div class="invalid-feedback">
                              Invalid custom priority feedback </div>
                              </div>

                              <div class="col-md-6 mb-3">
                                  <label class="" for="">Description</label>
                                    <textarea class="form-control" name="description" id="" rows="4" placeholder="Input Description Bug">{{ $bug->description ?? ''}}</textarea>
                                  </div>
                                 
                              <!-- <div class="col-md-6 mb-3">
                              <label class="" for="">User</label>
                              <select name="user_id" class="form-control" id="">
                                 <option value="">Select User</option>
                                 @foreach($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                                 @endforeach
                              </select>
                              </div> -->
                             
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
                                 <!-- <div class="form-group row">
                                 <label class="control-label col-sm-2 align-self-center mb-0" for="">File:</label>
                                 <div class="col-sm-10">
                                 <div class="custom-file ">
                                    <input type="file" class="custom-file-input" name="file" id="file" value="{{ $bug->file ?? '' }}">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                 </div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="control-label col-sm-2 align-self-center mb-0" for="">Project:</label>
                                 <div class="col-sm-10">
                                 <select class="form-control mb-3" name="project_id" id="">
                                 <option disabled value="">Select Project</option>
                                 @foreach($projects as $project)
                                  <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                 @endforeach
                              </select>
                              </div>
                              </div>
                              <div class="form-group row">
                                 <label class="control-label col-sm-2 align-self-center mb-0" for="">User:</label>
                                 <div class="col-sm-10">
                                 <select class="form-control mb-3" name="user_id" id="">
                                 <option disabled value="">Select User</option>
                                 @foreach($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                                 @endforeach
                              </select>
                              </div>
                              </div>
                              <div class="form-group row">
                                 <label class="control-label col-sm-2 align-self-center mb-0" for="">Priority:</label>
                                 <div class="col-sm-10">
                                 <select class="form-control mb-3" name="priority" id="" value="{{$bug->priority ?? ''}}">
                                 <option selected >Select Priority</option>
                                  <option value="low">LOW</option>
                                  <option value="medium">MEDIUM</option>
                                  <option value="high">HIGH</option>
                              </select>
                                 </div>
                              </div> -->
                              

    <!-- <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Bug</h4>
            <form action="{{ route('admin.bug.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(@$bug)
                    @method('PUT')
                @endif
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="name" 
                    id="" required aria-describedby="helpId" placeholder="Bug Name" value="{{ $bug->name ?? '' }}">
                    {{-- if error validate --}}
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="description" id="" rows="3" placeholder="Description">{{ $bug->description ?? '' }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Foto/Video</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="file" name="file" value="{{ $bug->file ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Project Name</label>
                  <div class="col-sm-10">
                  <select class="form-select" name="project_id" id="" >
                    <option disabled value="">Select Project</option>
                    @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">User</label>
                  <div class="col-sm-10">
                  <select class="form-select" name="user_id" id="" >
                    <option disabled value="">Select User</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Priority</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="priority" aria-label="Default select example" value="{{ $bug->priority ?? '' }}">
                      <option selected></option>
                      <option value="low">LOW</option>
                      <option value="medium">MEDIUM</option>
                      <option value="high">HIGH</option>>
                    </select>
                  </div>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
                
            </form>
            
        </div>
    </div> -->

        @endsection