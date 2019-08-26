@extends('layout.dashboard')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1>Dashboard</h1>
                      <!-- Content Row -->
                      @if($message=session('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif
@if($message=session('failed'))
<div class="alert alert-danger">
        {{ $message }}
    </div>
@endif
                      <div class="row">
            
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                                   {{$users->count()}}
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
            
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Users (Active)</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users->count()}}</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
            
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Permissions</div>
                                  <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$permissions->count()}}</div>
                                    </div>
                                    <div class="col">
                                      {{-- <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div> --}}
                                    </div>
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-universal-access fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
            
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Visitors</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$toal_visitors}}</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-list fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
            
            
                    </div>
                    <!-- /.container-fluid -->
            
                  </div>            
    
@endsection