@extends('layouts.programmer1')

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
               <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden bg-cobalt-blue">
                        <div class="iq-card-body pb-0">
                              <div class="text-right mb-4">
                           <div class="rounded-circle iq-card-icon iq-bg-primary">
                              <a name="" id="" href="{{ route('programmer.task.index') }}">
                              <i class="fa fa-code"></i></a>
                           
                        </div>
                           <span class="float-left line-height-2">Total Task
                              <h2 class="text-white text-left"><span class="counter">{{count($tasks)}}</span></h2>
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
                           <a name="" id="" href="{{ route('programmer.historytask.index') }}">
                           <div data-icon="&#xe034;" class="icon"></div></a>
                           </div>
                           <span class="float-left line-height-2">Task Pending
                              <h2 class="text-white text-left"><span class="counter">{{$pending}}</span></h2>
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
                           <a name="" id="" href="{{ route('programmer.historytask.index') }}">
                           <i class="fa fa-spinner" aria-hidden="true"></i></a>
                              </div>
                           <span class="float-left line-height-2">Task Progress
                              <h2 class="text-white text-left"><span class="counter">{{$on_progress}}</span></h2>
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
                           <a name="" id="" href="{{ route('programmer.historytask.index') }}">
                           <i class="fa fa-check-circle-o"></i></a>
                           </div>
                           <span class="float-left line-height-2">Task Verification
                              <h2 class="text-white text-left"><span class="counter">{{$verification}}</span></h2>
                           </span>
                              </div>
                        </div>
                     </div>
                     </div>
               </div>
            </div>
        </div>
        @endsection

        @section('content2')
        @include('programmer.dashboard1')
        @endsection