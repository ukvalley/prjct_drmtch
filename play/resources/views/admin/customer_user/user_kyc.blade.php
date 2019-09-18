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
            <li class="active">User KYC</li>
          </ol>
        </section>    

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
               <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>    

                  <h3 class="box-title">User KYC</h3>
                 
                 
                   
    
                  <?php  $user = Sentinel::check(); ?>

            <div class="box-header with-border">
              <h3 class="box-title">Aadhar Details</h3>
            </div>

            <div class="box-body">

              <form enctype="multipart/form-data" class="col s12" method="post" action="{{url('/')}}/admin/update_adhar_data" data-parsley-validate="">
                  
                  {{ csrf_field() }}
            
                  @include('admin.layout._operation_status')  

          <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Adhar Number</label>
            <input id="adhar_no" name="adhar_no" class="form-control" value="{{$user->adhar_no}}" placeholder="First Name" type="text" required="true">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        </div>

         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Name As Per Aadhar</label>
            <input id="adhar_name" name="adhar_name" class="form-control" value="{{$user->adhar_name}}" placeholder="Middle Name" type="text" required="true">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        </div>

         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Upload Adhar here</label>

            
            <input id="adhar_img" name="adhar_img" class="form-control"  type="file" required="true" accept="image/gif, image/jpeg, image/png" onchange="readURL(this);">
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
            <img id="blah" src="{{url('/')}}/public/images/{{$user->adhar_img}}" alt="your image" width="300px" />
          </div>
        </div>



         <div class="col-md-12">
            <div class="form-group has-feedback">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div>
          </div>

        </div>

      </form>

        

         </div>

         <form enctype="multipart/form-data" class="col s12" method="post" action="{{url('/')}}/admin/update_pan_data" data-parsley-validate="">
                  
                  {{ csrf_field() }}
            
                  @include('admin.layout._operation_status')

         <div class="box-header with-border">
              <h3 class="box-title">Enter Pan Details</h3>
          </div> 

          <div class="box-body">
       
          
         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Pan Card Number</label>
             <input id="pan_no" name="pan_no" value="{{$user->pan_no}}" class="form-control" placeholder="98xxxxxxxx" type="text" required="true">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
        </div>
            

          

       
        <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Name On Pan Card</label>
             <input id="pane_name" name="pan_name" value="{{$user->pan_name}}" class="form-control" placeholder="email@email.com" type="text" required="true">
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
             
          </div>
        </div>   

        <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Upload Pan Here</label>
            <input id="pan_img" name="pan_img" class="form-control"  type="file" required="true" accept="image/gif, image/jpeg, image/png" onchange="readURL1(this);">
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
            <img id="blah1" src="{{url('/')}}/public/images/{{$user->pan_img}}" alt="your image" width="300px" />
             
          </div>
        </div>


         <div class="col-md-12">
            <div class="form-group has-feedback">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div>
          </div>

        </div>

      </form>

        </div>



         <form enctype="multipart/form-data" class="col s12" method="post" action="{{url('/')}}/admin/update_bank_data" data-parsley-validate="">
                  
                  {{ csrf_field() }}
            
                  @include('admin.layout._operation_status')

         <div class="box-header with-border">
              <h3 class="box-title">Enter Bank Details</h3>
          </div> 

          <div class="box-body">

        <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>IFSC Code</label>
             <input id="ifsc" name="ifsc"  value="{{$user->ifsc}}" class="form-control" placeholder="Address" type="text" required="true">
              <span class="glyphicon glyphicon-globe form-control-feedback"></span>
          </div>
        </div>    

         


        <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Bank Name</label>
             <input id="bank_name" name="bank_name" value="{{$user->banck_name}}" class="form-control" placeholder="Address" type="text" required="true">
              <span class="glyphicon glyphicon-globe form-control-feedback"></span>
          </div>
        </div>  

        <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Bank Account Number</label>
             <input id="bank_acnt_no" name="bank_acnt_no" value="{{$user->bank_account_no}}" class="form-control" placeholder="Address" type="text" required="true">
              <span class="glyphicon glyphicon-globe form-control-feedback"></span>
          </div>
        </div>  

          <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Upload Bank Passbook here</label>
            <input id="bank_img" name="bank_img" class="form-control"  type="file" required="true" accept="image/gif, image/jpeg, image/png" onchange="readURL2(this);">
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
            <img id="blah2" src="{{url('/')}}/public/images/{{$user->bank_img}}" alt="your image" width="300px" />
          </div>
        </div>  

         <div class="col-md-12">
            <div class="form-group has-feedback">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div>
          </div>

        </div>

      </form>  
    
      </div>
       
      
          
         <!--  <div class="box-header with-border">
              <h3 class="box-title">Enter Login Details</h3>
          </div>

          <div class="box-body">
            
          <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>User ID</label>
             <input id="user_id" name="user_id" class="form-control" placeholder="Enter without space for eg abc12" type="text" required="true">
            <span class="glyphicon fa fa-user form-control-feedback"></span>
          </div>
        </div>    

        <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Sponcer Id</label>
            <input id="sponcer_id" name="sponcer_id" class="form-control" onchange="check()" placeholder="Sponcer Id" type="test" value="{{$_GET['sponcer_id'] or ''}}" required="true">
            <span id="success_msg" style="color: green"></span>
            <span id="error_msg" style="color:red"></span>
            <span class="glyphicon fa fa-user form-control-feedback"></span>
          </div>
        </div>  

          <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Password</label>
             <input id="password" name="password" class="form-control" placeholder="Enter Strong Password" type="password" required="true">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        </div>    

         </div> -->

        <!--  <div>

          <div class="col-md-6">
            <div class="col-xs-12">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox">I have read and accepted Terms And Condition 
                </label>
              </div>
            </div>
          </div>    

          
          <div class="col-md-12">
            <div class="form-group has-feedback">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
          </div>


        
      </div> -->
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      
     <script src="https://ukvalley.com/demo/cspl_investment//bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://ukvalley.com/demo/cspl_investment/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="https://ukvalley.com/demo/cspl_investment/plugins/iCheck/icheck.min.js"></script>
    <script src="https://ukvalley.com/demo/cspl_investment/bower_components/parsley.js"></script>
    <script type="text/javascript">
       function check()
        {
           var sponcer_id = $('#sponcer_id').val();
           $.ajax({
                  url: "{{url('/check_sponcer1')}}",
                  type: 'GET',
                  data: {
                    _method: 'GET',
                    sponcer_id     : sponcer_id,
                    _token:  '{{ csrf_token() }}'
                  },
                success: function(response)
                {
                  if(response.status == 'success')
                  {
                    $('#success_msg').text(response.name);
                    $('#error_msg').text('');
                  }
                  else if(response.status == 'error')
                  {
                    $('#success_msg').text('');
                    $('#error_msg').text('Sponcer id is invalid');
                  }
                  else
                  {
                    $('#success_msg').text('');
                    $('#error_msg').text('Sponcer id is invalid');
                  }
                }
                });
        }
    </script>   




    <script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

  </script>



   <script type="text/javascript">

    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah1')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

  </script>

   <script type="text/javascript">

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah2')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

  </script>





    <script type="text/javascript">   

       function check_amount()
        {
          
          var amount = $('#amount').val();
           var package =$('#package').val();
           
           if(amount<1)
           {
              document.getElementById('package').value = ''
              alert('amount is lower than 1');
           }    

          else if(amount < 10000)
          {
            
            document.getElementById('package').value = 'CSPL'
          }   

              

          else if(amount > 10000)
          {
            document.getElementById('package').value = ''
              alert('amount is greater than package');
          }   
    
    

      }
    </script>   

    <script>    

    $(document).ready(function(){
         setInterval(function(){  location.reload(); }, 380000);
    });
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
    </script>   



    <script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();   
    alert(countryID);
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-state-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>

 @stop 