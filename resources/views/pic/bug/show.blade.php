@extends('layouts.pic_project1')

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
                           <a href="{{ route('pic.bug.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left"></i>Back</a>
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
                    </div>
               </div>
            </div>
        </div>
        @endsection
    <!--card end show bug-->