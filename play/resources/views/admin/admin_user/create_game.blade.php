@extends('admin.layout.master')                

@section('main_content')

<!-- Select2 -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Epin Generate
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Game</li>
      </ol>
    </section>


     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-md-12">
           <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Create Game</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
               {{--  <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button> --}}
              </div>
              <!-- /. tools -->
              <form class="col s12" method="post" action="{{url('/')}}/admin/add_game" data-parsley-validate="">
                 @include('admin.layout._operation_status')
              {{ csrf_field() }}

              
              <div class="row" style="margin-top: 20px">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date</label> <br>
                     <input id="date" name="date" type="text" class="form-control" placeholder="Enter date in dd-mm-yyyy format" required="true">
                  </div>
                </div>
              </div>
    
        <div class="row" style="margin-top: 20px">
                <div class="col-md-6">
              <div class="form-group">
                <label>Session</label>
                <select name="session" id="session" class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true">
                   
                   
                  
                  <option value="morning">morning</option>

                   <option value="noon">noon</option>
                  
                 
                </select>
              </div>
              </div>
            </div>


              <div class="row" style="margin-top: 20px">
                <div class="col-md-6">
              <div class="form-group">
                <label>Status</label>
                <select name="status" id="status" class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true">
                   
                   
                  
                  <option value="active">active</option>

                   <option value="inactive">inactive</option>

                    <option value="complete">complete</option>
                  
                 
                </select>
              </div>
              </div>
            </div>


           

             
              <div class="row" style="margin-top: 20px">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="submit" class="btn cyan waves-effect waves-light right" id="submit" name="submit">
                  </div>
                </div>
              </div>
              </form>
            </div>
        </div>   
        </div>
       
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
   
  </div>
  <!-- /.content-wrapper -->
 
 

@stop 