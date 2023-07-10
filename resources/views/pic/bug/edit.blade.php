@extends('layouts.pic_project1')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Bug</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Bug</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Bug</li>
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
                              <h4 class="card-title">Edit Report Bug</h4>
                           </div>
                        </div>
                        <div class="text-left ml-4 mt-2">
                           <a href="{{ route('pic.bug.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
                           </div>
                        <div class="iq-card-body">
                           <form action="{{ route('pic.bug.update', [$bug->id])}}" method="post" enctype="multipart/form-data" 
                           class="form-horizontal">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                              <div class="form row">
                              <div class="col-md-6 mb-3">
                                 <label class="" for="">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Bug Name" value="{{ $bug->name ?? '' }}">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                  <label class="" for="">Project</label>
                                 <select class="form-control" name="project_id" id="">
                                 <option disabled value="">Select Project</option>
                                 @foreach($projects as $project)
                                  <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                 @endforeach
                              </select>
                              </div>

                              <div class="col-md-6 mb-3">
                                <label class="" for="">File</label>
                              <div class="custom-file ">
                                    <input type="file" class="custom-file-input" name="file" id="file" value="{{ $bug->file ?? '' }}">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                 </div>
                              </div>

                              <div class="col-md-6 mb-3">
                              <label class="" for="">Status</label>
                              <select class="form-control mb-3" name="status" id="" value="{{$bug->status ?? ''}}">
                                 <option selected >Select Status</option>
                                  <option value="pending">PENDING</option>
                                  <option value="on progress">ON PROGRESS</option>
                                  <option value="done">DONE</option>
                                  <option value="verification">VERIFICATION</option>
                              </select>
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
                <!-- <input type="hidden" value="PUT" name="_method">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="name" id="" required aria-describedby="helpId" placeholder="Bug Name" value="{{ $bug->name ?? '' }}">
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
                  <label for="" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="image" name="file" value="{{ $bug->file ?? '' }}">
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
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="status" aria-label="Default select example" value="{{ $bug->status ?? '' }}">
                      <option selected></option>
                      <option value="pending">PENDING</option>
                      <option value="on progress">ON PROGRESS</option>
                      <option value="done">DONE</option>
                      <option value="verification">VERIFICATION</option>
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
       