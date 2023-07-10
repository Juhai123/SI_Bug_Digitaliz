@extends('layouts.admin')

@section('content')
<div class="pagetitle">
            <h1>Bug</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.html">Bug</a></li>
                    <li class="breadcrumb-item active">Add Instansi</li>
                </ol>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" name="" id="" href="{{ route('admin.instansi.index') }}">Back</a></div>
            </nav>
        </div>
        <section class="section">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Instansi</h4>
            <form action="{{ route('admin.instansi.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(@$instansi)
                    @method('PUT')
                @endif
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Instansi Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="instansi_name" 
                    id="" required aria-describedby="helpId" placeholder="Bug Name" value="{{ $instansi->instansi_name ?? '' }}">
                    {{-- if error validate --}}
                    @error('instansi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
                
            </form>
            
        </div>
    </div>
</section>
        @endsection