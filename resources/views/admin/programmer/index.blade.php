@extends('layouts.admin2')

@section('content')
<div class="navbar-breadcrumb">
                  <h5 class="mb-0">Programmer</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Programmer</li>
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
                              <h4 class="card-title">List Programmer</h4>
                           </div>
                           
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table id="example" class="table table-responsive-md table-striped text-center">
                                 <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Programmer</th>
                                    <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name}}</td>
                                <td>
                                <a name="" id="" class="btn btn-primary"
                                        href="{{ route('admin.programmer.show', $user->id) }}" role="button">
                                        <i class="ri-eye-fill mr-2"></i>Show</a>
                                </td>
                                @endforeach
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