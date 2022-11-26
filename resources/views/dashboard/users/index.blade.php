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
                            <h1>Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                    
                    <!-- /.card -->

                    <div style="margin-bottom: 10px;" class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="{{ route('dashboard.users.create') }}">
                                Create user
                            </a>
                        </div>
                    </div>
                
                    <div class="card">
                        <div class="card-header">Users list</div>
                
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <form action="{{ route('dashboard.users.index') }}" method="GET">
                                    <div class="form-group">
                                        <label for="deleted" class="col-form-label">Show deleted:</label>
                                            <select class="form-control" name="deleted" id="deleted" onchange="this.form.submit()">
                                                <option value="false" {{ request('deleted') == 'false' ? 'selected' : '' }}>No</option>
                                                <option value="true" {{ request('deleted') == 'true' ? 'selected' : '' }}>Yes</option>
                                            </select>
                                    </div>
                                </form>
                            </div>
                
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    @if ($withDeleted)
                                        <th>Deleted at</th>
                                    @endif
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </td>
                                        @if ($withDeleted)
                                            <td>{{ $user->deleted_at ?? 'Not deleted' }}</td>
                                        @endif
                                        <td>
                                           
                                            <a class="btn btn-info btn-sm" href="{{route('dashboard.tasks.edit', $user)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form action="{{ route('dashboard.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>
                                                {{-- <input type="submit" class="btn btn-sm btn-danger" value="Delete"> --}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                
                            {{ $users->withQueryString()->links() }}
                        </div>
                    </div>
              
                  </section>
                <!-- /.content -->


            </div>
            <!-- /.content-wrapper -->
        
    @endsection

    