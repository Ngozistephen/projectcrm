@extends('layouts.dashboard')

    @section('page-title', 'EDIT')

@section('scripts')
    <script src="/js/custom/fix-custom-file-select.js"></script>
    <!-- Summernote -->
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    {{-- is for data range picker --}}
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <!-- date-range-picker -->
    <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Select2 -->
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

    {{-- <script>

      //Date range picker
      const el = $('input[name="dates"]').daterangepicker();
     

      console.log(el)
    </script> --}}

    {{-- <script>
        //Initialize Select2 Elements
      $('.select2').select2()
    </script> --}}

    <script>
      $(function () {
        //Add text editor
        $('#description').summernote({
          placeholder: 'write your content here',
          focus:true,
          minHeight:100
        });
       
        $('#description').summernote('code','');

      })
    </script>
    
    {{-- <script>
      $('#createPorfolioForm').submit(function(e){
          e.preventDefault();
          $('#formErrs').remove();
          var formData = new FormData(this);

          // for the data picker
          const dates = $('input[name="dates"]').val().split('-');
          // sliptting the two dates
          const startdate = dates[0].trim();
          const enddate = dates[1].trim();

          var content = $('#compose-textarea').summernote('code');

          formData.delete('dates');
        //  deleting the dates and getting the enddate and startdate
          formData.append('content', content);
          formData.append('startDate', startdate);
          formData.append('endDate', enddate);

          axios.post("{{route('admin.porfolios.store')}}", formData).then(function(response){
            // request successful, the post was saved.
            window.location.reload();
            // passing true inside the reload will wipe out all the data in the post or live it empty.

          }).catch(function(error){
            // an errror has occurred
      
            if(error.response){
           

              var response = error.response;
              if(response.status == 422){
                  var errs = Object.values(response.data.errors)
                              .reduce(function(acc, val){
                                  return acc.concat(val);
                              },[]);
                  var ul = $('<ul></ul>').addClass('list-unstyled alert alert-danger').attr({id: 'formErrs'})
                  for(var err of errs){
                      var li = $('<li></li>').text(err)
                      ul.append(li);
                  }
                  $('#createPorfolioForm').prepend(ul);
              }
            }else{
              var ul = $('<ul></ul>').addClass('list-unstyled alert alert-danger').attr({id: 'formErrs'});
              var li = $('<li></li>').text('An unexpected error has occured please try again later');
              ul.append(li);
              $('#createPorfolioForm').prepend(ul);
            } 
          });
      });
      fixCustomFileSelectLabel('featuredImgInput'); 
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
                <h1>Create Project</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('dashboard.projects.index')}}">Home</a></li>
                  <li class="breadcrumb-item active">Create Projects</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
       
        <form action="{{route('dashboard.projects.update', $project)}}" method="POST">
           @csrf
           <section class="content">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Your Project</h3>
      
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Project Title</label>
                      <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="description" class="required">Project Description</label>
                      <textarea id="description" name="description"  class="form-control" rows="4">{{ old('description',  $project->description) }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="client_id">Assigned Client</label>
                        <select class="form-control {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                            {{-- @foreach($clients as $id => $entry)
                                <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $project->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }} </option>
                            @endforeach --}}
                        </select>
                      </div>
                  
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-md-6">
                <div class="card card-secondary">
                  <div class="card-header">
                    
      
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                        <label for="user_id">Assigned User</label>
                        <select class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                            {{-- @foreach($users as $id => $entry)
                                <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $project->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }} </option>
                            @endforeach --}}
                        </select>

                        
                      </div>

                    <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select class="form-control custom-select">
                        <option selected disabled>Select one</option>
                        <option>In Progress</option>
                        <option>Canceled</option>
                        <option>Blocked</option>
                        <option>Completed</option>
                        <option>Open</option>
                    </select>
                    </div>
                      
                    <div class="form-group">
                      <label for="deadline">Deadline</label>
                      <input class="form-control {{ $errors->has('deadline') ? 'is-invalid' : '' }}" type="date" name="deadline" id="deadline" value="{{ old('deadline',  $project->deadline) }}">
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Porject" class="btn btn-success float-right">
              </div>
            </div>
          </section>
        </form>
        <!-- /.content -->

    </div>
      <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>In the Year:</b> 2022
      </div>
      <strong>Ngozi Stephen: Helped Man<a href="#">StephenDev</a>.</strong> By His Grace I am What I am
    </footer>
  
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    
     
@endsection