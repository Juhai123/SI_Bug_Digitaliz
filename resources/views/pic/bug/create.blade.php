@extends('layouts.pic_project1')

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
                           <a href="{{ route('pic.bug.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                       
                        <div class="iq-card-body">
                           <form action="{{ route('pic.bug.store') }}" method="post" enctype="multipart/form-data" 
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