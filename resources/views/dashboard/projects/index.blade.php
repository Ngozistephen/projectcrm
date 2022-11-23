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


                <section class="content">

                    <!-- Default box -->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Projects</h3>
                        <div class="card-header d-flex justify-content-between no-pseudo-content">
                            <a href="{{route('dashboard.projects.create')}}"  style="margin-left: 1000px" class="btn btn-sm btn-primary">Create</a>
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
                                @foreach ($projects as $idx => $project)
                                    
                                    <tr>
                                        <td> {{$idx + 1}}</td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->user->full_name }}</td>
                                        <td>{{ $project->client->company_name }}</td>
                                        <td>{{ $project->deadline }}</td>
                                        <td>
                                           
                                        @switch($project->status)
                                            @case('completed')
                                                <span class="badge badge-success">Completed</span>
                                                @break
                                            @case('cancelled')
                                                    <span class="badge badge-danger">Cancelled</span>
                                                @break
                                            @case('blocked')
                                                    <span class="badge badge-secondary">Blocked</span>
                                                @break
                                            @case('in progress')
                                                    <span class="badge badge-warning">In Progress</span>
                                                @break
                                            @default
                                                <span class="badge badge-primary">Open</span>
                                        @endswitch

                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="{{ route('dashboard.projects.show', $project) }}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{route('dashboard.projects.edit', $project)}}">
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
                        {{ $projects->withQueryString()->links() }}
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
              
                  </section>
                <!-- /.content -->


            </div>
            <!-- /.content-wrapper -->
        
    @endsection

    