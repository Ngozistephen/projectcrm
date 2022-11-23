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
        <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-header">
                        <h5 class="m-0">Client</h5>
                      </div>
      
                      <div>
                        <div class="text-primary">{{ $task->client->contact_name }}</div>
                        <p class="mb-0">{{ $task->client->contact_email }}</p>
                        <p>{{ $task->client->contact_phone_number }}</p>
                      </div>
      
                        <div>
                            <p class="mb-0">{{ $task->client->company_name }}</p>
                            <p class="mb-0">{{ $task->client->company_address }}</p>
                            <p class="mb-0">{{ $task->client->company_city }}, {{ $task->client->company_zip }}</p>
                        </div>
                    </div>
                  </div>
      
                  <div class="card card-primary card-outline">
                    <div class="card-body">
                      <h5 class="card-title">{{ $task->title }}</h5>
      
                      <p class="card-text">
                        <p>{{ $task->description }}</p>
                      </p>
                        <div class="card-footer">
                            <p class="mb-0">Created at {{ $task->created_at->format('M d, Y H:m') }}</p>
                            <p class="mb-0">Updated at {{ $task->updated_at->format('M d, Y H:m') }}</p>
                        </div>
                    </div>
                  </div><!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="m-0">Assigned user</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $task->user->full_name }}</p>
                        <p class="mb-0">{{ $task->user->email }}</p>
                        <p class="mb-0">{{ $task->user->phone_number }}</p>
                    </div>
                  </div>
      
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h5 class="m-0">{{ $task->title }}</h5>
                    </div>
                    <div class="card-body">
                      <h6 class="card-title"></h6>
      
                      <p class="card-text">{{ $task->description }}</p>
                      <p class="mb-0">Created at {{ $task->created_at->format('M d, Y H:m') }}</p>
                        <p class="mb-0">Updated at {{ $task->updated_at->format('M d, Y H:m') }}</p>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">Information</div>
        
                        <div class="card-body">
                            <p class="mb-0">Deadline {{ $task->deadline }}</p>
                            <p class="mb-0">Created at {{ $task->created_at->format('M d, Y') }}</p>
                            <p class="mb-0">Status {{ ucfirst($task->status) }}</p>
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.col-md-6 -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        
       
  
    </section>
      <!-- /.content -->


            
        
@endsection

    

    