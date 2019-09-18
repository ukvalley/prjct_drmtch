@extends('admin.layout.master')                

@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Fund
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Fund</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
           <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Add Fund</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
               {{--  <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button> --}}
              </div>
              <!-- /. tools -->
              <form class="col s12" method="post" action="{{url('/')}}/admin/add_unit_request" data-parsley-validate="">
              {{ csrf_field() }}
               @include('admin.layout._operation_status')
              <div class="row" style="margin-top: 20px">
              <div class="col-md-6">
               <div class="form-group has-feedback">
        <label>Unit</label>
         <input id="unit" onchange="check_amount()" name="unit" class="form-control" placeholder="1 Unit= 100 Rs" type="text" required="true">
        <span class="glyphicon glyphicon-ruble form-control-feedback"></span>
      </div>
    </div>
    
    
    <!--  <div class="col-md-6">
       <div class="form-group has-feedback">
        <label>Plan</label>
            <select id="plan" name="plan"  class="form-control" type="text" required="true">
             <?php
                    $plans = \DB::table('plan1')->get();
                    ?>
             @foreach($plans as $key=>$value)
                      <option value="{{$value->name}}">{{$value->name}}</option>
            @endforeach
            </select>
      </div>
    </div> -->

   <!--  <div class="col-md-6">
       <div class="form-group has-feedback">
        <label>GST Amount</label>
         <input id="gst_amt" name="gst_amt" readonly  class="form-control" type="text" required="true">
        <span class="glyphicon glyphicon-ruble form-control-feedback"></span>
      </div>
    </div>-->

    <div class="col-md-6">
       <div class="form-group has-feedback">
        <label>Amount</label>
         <input id="amount" name="amount" readonly  class="form-control" type="text" required="true">
        <span class="glyphicon glyphicon-ruble form-control-feedback"></span>
      </div>
    </div>
    <?php $user = Sentinel::check(); ?>
     <div class="col-md-6">
       <div class="form-group has-feedback">
        <label>Use Id</label>
         <input id="userid" name="userid" value="{{$user->email or ''}}" readonly  class="form-control" type="text" required="true">
        <span class="glyphicon glyphicon-ruble form-control-feedback"></span>
      </div>
    </div>

    <script src="https://easebuzz.in/link/api"></script>

   
    
    <?php  
      $admin = \DB::table('users')->where(['email'=>"admin"])->first(); ?>


    
    <!-- <div class="col-md-6">
       <div class="form-group has-feedback">
        <label>Btc Address: {{$admin->ifsc}}</label>
    
        <span class="glyphicon glyphicon-ruble form-control-feedback"></span>
      </div>
    </div> -->
    
    <div class="col-md-6">
       <div class="form-group has-feedback">
        <label>Package</label>
         <input id="package" name="package" class="form-control" type="text" required="true" disabled>
        <span class="glyphicon glyphicon-ruble form-control-feedback"></span>
      </div>
    </div>
    
    
    
    
    
     <div class="col-md-6">
       <div class="form-group has-feedback">
        <label>Bank Details</label>
         <pre>DreamTouch Online Play India Ltd
              Kotak Mahindra Bank
              Account Number : 2913482874
              IFSC: KKBK0000131</pre>
      </div>
    </div>
                
   <div class="col-md-12">
       <div class="form-group has-feedback">
        
           <a href="upi://pay?pn=DreamTouch+Online+Play+India+Ltd&pa=2913482874@KKBK0000131.ifsc.npci&mam=0.01&tn=1"><h1 class="btn btn-block btn-success">Pay Online</h1></a>
      </div>
    </div>   
    
     <div class="col-md-6">
       <div class="form-group has-feedback">
        <label>Enter Transaction Number Or UTR Number</label>
         <input id="utr" name="utr" class="form-control" type="text" required="true">
        <span class="glyphicon glyphicon-ruble form-control-feedback"></span>
      </div>
    </div>
                
                
      <div class="col-md-12">
            <div class="form-group has-feedback">
               <input type="submit" value="Submit"  class="btn btn-block btn-success" id="submit" name="submit">
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
  
  
  <!-- jQuery 3 -->
<script src="{{url('/')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('/')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{url('/')}}/plugins/iCheck/icheck.min.js"></script>
<script src="{{url('/')}}/bower_components/parsley.js"></script>

<script type="text/javascript">
   function check()
    {
       
       var value = $('#amount').val();
       $.ajax({
              url: "{{'https://blockchain.info/tobtc'}}",
              type: 'GET',
              data: {
                _method: 'GET',
                currency:'USD',
                value: value
               
                _token:  '{{ csrf_token() }}'
              },
              
            success: function(response)
            {
              
                $('#btc').text(response);
                
              
            }
            });
    }
</script>



 <script type="text/javascript">

   function check_amount()
    {
      
      var unit = $('#unit').val();
       var package =$('#package').val();
       
       if(unit<10)
       {
          document.getElementById('package').value = '';
          alert('Unit is lower than 10');
         
         document.getElementById('amount').value = '';
       }

      else if(unit < 1000)
      {
        
        document.getElementById('package').value = 'CSPL';
         
         document.getElementById('amount').value = unit*100;

      }

      

      else if(unit > 1000)
      {
        document.getElementById('package').value = ''
         
         document.getElementById('amount').value = '';
          alert('Unit is greater than package');
      }



  }
</script>

@stop 