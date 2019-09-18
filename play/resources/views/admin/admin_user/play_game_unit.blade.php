@extends('admin.layout.master')                

@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Select Amount for Number
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

              <h3 class="box-title">Select Number for amount</h3>

              <!-- tools box -->
              <div class="pull-right box-tools">
               {{--  <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button> --}}
              </div>
              <!-- /. tools -->
              <form id="form" name="form" class="col s12" method="post" action="{{url('/')}}/admin/game_play" data-parsley-validate="">
              {{ csrf_field() }}
               @include('admin.layout._operation_status')
               <span id="error_total_amount" style="float: center; color:red"> </span>

              <div class="row" style="margin-top: 20px">




                   <div class="col-md-6">
                     <div class="form-group has-feedback">
                      <label>Available Balance</label>
                       <input id="wallet_balance" name="wallet_balance" value="{{$wallet_balance}}" readonly  class="form-control" type="text" required="true">
                      <span class="glyphicon glyphicon-ruble form-control-feedback"></span>
                    </div>
                  </div>



              <div class="col-md-6">
                <div class="form-group has-feedback">
              <label>Unit (1 Unit is 100 Rs)</label>
               <input id="unit" onchange="check_amount()" name="unit" class="form-control" placeholder="Enter amount between package" type="text" required="true">
              <span class="glyphicon glyphicon-ruble form-control-feedback"></span>
            </div>
          </div>
    
    
  

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

    <div class="col-md-6">
       <div class="form-group has-feedback">
        <label>Your Selected Number is</label>
         <input id="selected" name="selected" value="{{$_GET['selected']}}" readonly  class="form-control" type="text" required="true">
        <span class="glyphicon glyphicon-ruble form-control-feedback"></span>
      </div>
    </div>

      <input id="package" name="package" class="form-control" type="hidden" required="true" disabled>
      
      <input id="game_id" name="game_id" value="{{$_GET['game_id']}}" class="form-control" type="hidden" required="true">

      <!--  <input id="game_id" name="game_id" value="{{$_GET['game_id']}}" class="form-control" type="hidden" required="true" disabled> -->
    
    
          
                
      <div class="col-md-12">
            <div class="form-group has-feedback">
               <input type="submit"  class="btn btn-block btn-success" id="submit" name="submit">
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
       
       if(unit<1)
       {
          document.getElementById('package').value = '';
          alert('amount is lower than 1');
         
         document.getElementById('amount').value = '';
       }

      else if(unit < 100)
      {
        
         document.getElementById('package').value = 'CSPL';

         document.getElementById('amount').value = unit*100;

      }

      

      else if(unit > 100)
      {
        document.getElementById('package').value = ''
         
         document.getElementById('amount').value = '';
          alert('amount is greater than package');
      }



  }
</script>

    <script type="text/javascript">
    $(document).ready(function()
    {
      $("#form").submit(function()
      {
        var wallet_amt = $('#wallet_balance').val();
        var withdrawl_amt      = $('#amount').val();
       
        
        if(parseInt(withdrawl_amt)<'20')
        {
          $('#error_total_amount').text('Withdrawl Amount Should be greater than min $20 and max $200000');
          
          return false;
        }
        else if(parseInt(wallet_amt)<parseInt(withdrawl_amt))
        { 
          $('#error_total_amount').text('Amount should not grater than total amount');
          return false;
        }
        
        
        else if(parseInt(withdrawl_amt)>'200000')
        { 
          $('#error_total_amount').text('Daily Withdrawl Limit is Max $200000 and min $20');
          return false;
        }
        else 
        {
          $('#error_total_amount').text('');
        }
      });
    });
  </script>

@stop 