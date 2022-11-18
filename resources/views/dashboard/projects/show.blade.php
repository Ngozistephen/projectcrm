@extends('layouts.dashboard')
    @section('page-title', 'SHOW')
   

    @section('content')
        
                <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Projects</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                            </ol>
                        </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                {{-- <section class="content">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between no-pseudo-content">
                                <h3 class="card-title">Manage Client</h3>
                                <a href="{{route('dashboard.clients.create')}}"  style="margin-left: 1000px" class="btn btn-sm btn-primary">Create</a>
                            </div>
                                <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 20px">S/N</th>
                                    <th style="width: 100px">Company</th>
                                    <th style="width: 200px">ZIP</th>
                                    <th style="width: 100px">Address</th>
                                    <th style="width: 50px">Status</th>
                                    <th style="width: 100px">Action</th>
                                
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $idx => $client)
                                        
                                        <tr>
                                            <td>{{$idx + 1}}</td>
                                            <td>{{$client->company_name}}</td>
                                            <td>{{$client->company_zip}}</td>
                                            <td>{{$client->company_address}}</td>
                                        
                                            
                                            <td>
                                                @if ($porfolio->published_at)
                                                         <span class="badge badge-success">published</span>   
                                                 @else 
                                                        <span class="badge badge-dark">unpublished</span>
                                                @endif 
                                            </td>
                                            <td>
                                                <a title ="Preview" href="{{route('admin.porfolios.preview', ['slug'=> $porfolio->slug])}}" class="btn  btn-sm btn-primary previewModalBtn"><i class ="fas fa-eye"></i></a>
                                                <a title ="Edit" href="{{route('dashboard.clients.edit', $client)}}" class="btn btn-sm btn-warning"><i class ="fas fa-edit"></i></a>
                                                <button  data-slug="{{$client->slug}}" title ="Delete" type="button" class="delBtn btn btn-sm btn-danger"><i class ="fas fa-trash"></i></button>
                                            </td>
                                        
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <!-- /.card -->
                            
                        
                </section> --}}


                 <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Projects Detail</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Estimated budget</span>
                        <span class="info-box-number text-center text-muted mb-0">2300</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Total amount spent</span>
                        <span class="info-box-number text-center text-muted mb-0">2000</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Estimated project duration</span>
                        <span class="info-box-number text-center text-muted mb-0">20 <span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <h4>Assigned user</h4>
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                          <span class="username">
                            <a href="#">{{ $project->user->full_name }}</a>
                          </span>

                          <span class="description">Shared publicly - 7:45 PM today</span>
                        </div>
                        
                       

                        <p class="mb-0">
                            <b class="d-block">{{ $project->user->email }}</b>
                        </p>
                        <p class="mb-0">
                            <b class="d-block">{{ $project->user->phone_number }}</b>
                        </p>
                        <!-- /.user-block -->

                        <p>
                            {{ $project->description }}
                        </p>
  
                        <p>
                          <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                        </p>
                      </div>
  
                      
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                <h3 class="text-primary"><i class="fas fa-paint-brush"></i>{{ $project->client->contact_name }}</h3>
                    <p class="mb-0">{{ $project->client->contact_email }}</p>
                    <p>{{ $project->client->contact_phone_number }}</p>

                <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                <br>
                <div class="text-muted">
                  <p class="text-sm">
                    <b class="d-block">{{ $project->client->company_name }}</b>
                  </p>
                  <p class="text-sm">{{ $project->client->company_address }}
                    <b class="d-block"></b>
                  </p>
                  <p class="text-sm">{{ $project->client->company_city }}, {{ $project->client->zip }}
                    <b class="d-block"></b>
                  </p>
                 
                </div>
  
                <h5 class="mt-5 text-muted">Project files</h5>
                <ul class="list-unstyled">
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                  </li>
                </ul>
                <div class="text-center mt-5 mb-3">
                  <a href="#" class="btn btn-sm btn-primary">Add files</a>
                  <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
  
    </section>
      <!-- /.content -->


            </div>
            <!-- /.content-wrapper -->
        
@endsection

    