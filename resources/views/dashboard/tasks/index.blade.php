@extends('layouts.dashboard')
    @section('page-title', 'All')

    @section('styles')
         <!-- DataTables -->
         <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
         <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        
    @endsection
    @section('scripts')
            <!-- DataTables -->
        <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        {{-- <script>
            $(function(){
                  $("#example1").DataTable({
                  "responsive": true,
                  "autoWidth": false,
                });
      
                $('.delBtn').click(function(e){
                   __confirmAction('Are You Sure ?', 'Porfolio will be deleted').then(function(reason){
                    //  user really wants to delete the post
      
                        var slug = $(this).data('slug');
                      // $(this).data('slug'); for jQuery or  this.dataset.slug (is for javascript)
      
      
                        axios.delete(`/admin/porfolios/${slug}`).then(function(response){
                          //all clear
      
                          window.location.reload();
      
                        }).catch(function(error){
                          // error occured
                          console.log(Error); 
      
                        });
                  
      
                    }.bind(this)).catch(function(reason){});
                   
                });
            })

        </script> --}}
    @endsection

    @section('content')
        
                <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tasks</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tasks</li>
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


                <section class="content">

                    <!-- Default box -->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Tasks</h3>
                        <div class="card-header d-flex justify-content-between no-pseudo-content">
                            <a href="{{route('dashboard.tasks.create')}}"  style="margin-left: 1000px" class="btn btn-sm btn-primary">Create</a>
                        </div>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        S/N
                                    </th>
                                    <th style="width: 20%">
                                        Title
                                    </th>
                                    <th style="width: 20%">
                                        Assigned to
                                    </th>
                                    <th style="width: 10%">
                                        Client
                                    </th>
                                    <th style="width: 10%">
                                       Deadline
                                    </th>
                                    <th style="width: 8%">
                                        Status
                                    </th>
                                    <th style="width: 20%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $idx => $task)
                                    
                                    <tr>
                                        <td> {{$idx + 1}}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->user->full_name }}</td>
                                        <td>{{ $task->client->company_name }}</td>
                                        <td>{{ $task->deadline }}</td>
                                        <td>
                                           
                                        @switch($task->status)
                                            @case('waiting client')
                                                <span class="badge badge-success">Waiting Client</span>
                                                @break
                                            @case('closed')
                                                    <span class="badge badge-danger">Closed</span>
                                                @break
                                            @case('blocked')
                                                    <span class="badge badge-secondary">Blocked</span>
                                                @break
                                            @case('pending')
                                                    <span class="badge badge-light">Pending</span>
                                                @break
                                            @case('in progress')
                                                    <span class="badge badge-warning">In Progress</span>
                                                @break
                                            @default
                                                <span class="badge badge-primary">Open</span>
                                        @endswitch

                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="{{ route('dashboard.tasks.show', $task) }}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{route('dashboard.tasks.edit', $task)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            
                            </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
              
                  </section>
                <!-- /.content -->


            </div>
            <!-- /.content-wrapper -->
        
    @endsection

    