@extends('layouts.pic_project1')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Dashboard</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                           <div class="rounded-circle iq-card-icon iq-bg-primary"><i class="ri-stack-line" aria-hidden="true"></i></div>
                           <span class="float-left line-height-2">Report Bug
                              <h2 class="text-white text-left"><span class="counter"></span></h2>
                           </span>
                              </div>
                        </div>
                     </div>
                     </div>
                     <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden bg-cobalt-blue">
                        <div class="iq-card-body pb-0">
                              <div class="text-right mb-4">
                           <div class="rounded-circle iq-card-icon iq-bg-primary"><i class="las la-bug" aria-hidden="true"></i></div>
                           <span class="float-left line-height-2">Total Project Bug
                              <h2 class="text-white text-left"><span class="counter"></span></h2>
                           </span>
                              </div>
                        </div>
                     </div>
                     </div>
                 
               </div>
            </div>
</div>

@endsection