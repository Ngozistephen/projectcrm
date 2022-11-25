@extends('layouts.dashboard')

    @section('page-title', 'CREATE')

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
        $('#compose-textarea').summernote({
          placeholder: 'write your content here',
          focus:true,
          minHeight:100
        });
       
        $('#compose-textarea').summernote('code','');

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
                <h1>User Information</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">Home</a></li>
                  <li class="breadcrumb-item active">Create User</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    

        <form action="{{route('dashboard.users.store')}}" method="POST">
           @csrf
          <section class="content">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">User Information</h3>
      
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label class="required" for="contact_name">Name</label>
                      <input type="text" id="contact_name" name="contact_name" class="form-control" value="{{ old('contact_name') }}" required>
                    </div>
                    <div class="form-group">
                      <label class="required" for="contact_email">Email</label>
                      <input type="text" id="contact_email" name="contact_email" class="form-control" value="{{ old('contact_email') }}" required>
                    </div>
                    <div class="form-group">
                      <label class="required" for="contact_phone_number">Phone Number</label>
                      <input type="text" id="contact_phone_number" name="contact_phone_number" class="form-control" value="{{ old('contact_phone_number') }}" required>
                    </div>
                
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-md-6">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Company Information</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                    
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label class="required" for="company_name">Company Name</label>
                      <input type="text" id="company_name" name="company_name" class="form-control" value="{{ old('company_name') }}" required>
                    </div>
                    <div class="form-group">
                      <label class="required" for="company_address">Company Address</label>
                      <input type="text" id="company_address" name="company_address" class="form-control" value="{{ old('company_address') }}" required>
                    </div>
                    <div class="form-group">
                      <label class="required" for="company_city">Company City</label>
                      <input type="text" id="company_city" name="company_city" class="form-control" value="{{ old('company_city') }}" required>
                    </div>
                    <div class="form-group">
                      <label class="required" for="company_zip">Company Zip</label>
                      <input type="text" id="company_zip" name="company_zip" class="form-control" value="{{ old('company_zip') }}" required>
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
                <input type="submit" value="Save" class="btn btn-success float-right">
              </div>
            </div>
          </section>
        </form>
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