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
        <li class="active">Edit Game</li>
      </ol>
    </section>


     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-md-12">
           <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Edit Game</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
               {{--  <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button> --}}
              </div>



               <h1>Selection List</h1>
      <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Number</th>
                  <th>Count</th>
                  <td>Amount</td>
                  
                  
                  
                
                </tr>
                </thead>
                <tbody>
                  @foreach($selcted_number_data as $key=>$value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->selected_number or 'NA'}}</td>   
                    <td>{{$value->count or 'NA'}}</td>
                    <?php 

                     $number_amount = \DB::table('selected_numbers')->select('amount')->where(['game_id'=>$value->game_id])->where(['selected_number'=>$value->selected_number])->get();

                     $amount = 0;
                     foreach ($number_amount as $key => $value) {

                      $amount = $amount+ $value->amount;
                       # code...
                     }


                     ?>
                      <td>{{$amount or 'NA'}}</td>
                  
                    
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->



              <!-- /. tools -->
              <form class="col s12" method="post" action="{{url('/')}}/admin/game_edit" data-parsley-validate="">
                 @include('admin.layout._operation_status')
              {{ csrf_field() }}

               <input type="hidden" id="id" name="id" value="{{$_GET['id']}}">

              
              <div class="row" style="margin-top: 20px">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date</label> <br>
                     <input id="date" name="date" value="{{$data->date}}" type="text" class="form-control" placeholder="Enter date in dd-mm-yyyy format" required="true">
                  </div>
                </div>
              </div>
    
        <div class="row" style="margin-top: 20px">
                <div class="col-md-6">
              <div class="form-group">
                <label>Session</label>
                <select name="session" id="session"  class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true">
                   
                   
                  <option selected value="{{$data->session}}">Current: {{$data->session}}</option>
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
                   
                   
                  <option selected value="{{$data->game_status}}">Current: {{$data->game_status}}</option>
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

            @if($data->winner1==null)
              <form  class="col s12" method="post" action="{{url('/')}}/admin/winner1" data-parsley-validate="">
                  
                  {{ csrf_field() }}
            
                 

         <div class="box-header with-border">
              <h3 class="box-title">Enter Winner one Number</h3>
          </div> 

          <div class="box-body">
        <input type="hidden" id="id" name="id" value="{{$_GET['id']}}">
          
         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Winner One Number</label>
             <input id="winner1" name="winner1" value="" class="form-control" placeholder="" type="text" required="true">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
        </div>
            


         <div class="col-md-12">
            <div class="form-group has-feedback">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div>
          </div>

        </div>

      </form>

      @endif


         @if($data->winner2==null)
              <form  class="col s12" method="post" action="{{url('/')}}/admin/winner2" data-parsley-validate="">
                  
                  {{ csrf_field() }}
            
                 

         <div class="box-header with-border">
              <h3 class="box-title">Enter Winner two Number</h3>
          </div> 

          <div class="box-body">
        <input type="hidden" id="id" name="id" value="{{$_GET['id']}}">
          
         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Winner two Number</label>
             <input id="winner2" name="winner2" value="" class="form-control" placeholder="" type="text" required="true">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
        </div>
            


         <div class="col-md-12">
            <div class="form-group has-feedback">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div>
          </div>

        </div>

      </form>
      @endif

       @if($data->winner3==null)


              <form  class="col s12" method="post" action="{{url('/')}}/admin/winner3" data-parsley-validate="">
                  
                  {{ csrf_field() }}
            
                 

         <div class="box-header with-border">
              <h3 class="box-title">Enter Winner three Number</h3>
          </div> 

          <div class="box-body">
       
           <input type="hidden" id="id" name="id" value="{{$_GET['id']}}">
         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Winner three Number</label>
             <input id="winner3" name="winner3" value="" class="form-control" placeholder="" type="text" required="true">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
        </div>
            


         <div class="col-md-12">
            <div class="form-group has-feedback">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div>
          </div>

        </div>

      </form>

      @endif

      <?php 

          $winner_data = $user_data= \DB::table('transaction')->where(['game_id'=>$_GET['id']])->get();


      ?>
      <h1>Winner List</h1>
      <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Date</th>
                  <th>User ID</th>
                  <th>Amount</th>
                  <th>Winning position</th>
                  
                
                </tr>
                </thead>
                <tbody>
                  @foreach($winner_data as $key=>$value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->date or 'NA'}}</td>   
                    <td>{{$value->reciver_id or 'NA'}}</td>   
                    <td>{{$value->amount or 'NA'}}</td>   
                    <td>{{$value->winning_no or 'NA'}}</td>   
                  
                    
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

       



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