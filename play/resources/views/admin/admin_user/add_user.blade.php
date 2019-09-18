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

                  <h3 class="box-title">Add User</h3>
                 
                 
                 <form class="col s12" method="post" action="{{url('/')}}/admin/register_process" data-parsley-validate="">
                  
                  {{ csrf_field() }}
            
                  @include('admin.layout._operation_status')    
    


            <div class="box-header with-border">
              <h3 class="box-title">Enter User Details</h3>
            </div>

            <div class="box-body">

          <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>First Name</label>
            <input id="username" name="username" class="form-control" placeholder="First Name" type="text" required="true">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        </div>

         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Middle Name</label>
            <input id="middlename" name="middlename" class="form-control" placeholder="Middle Name" type="text" required="true">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        </div>

         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Last Name</label>
            <input id="last" name="last" class="form-control" placeholder="Last Name" type="text" required="true">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
        </div>

         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Date Of Birth</label>
             <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
            <input id="dob" name="dob" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text" required="true">
            </div>
          </div>
        </div>

         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Gender</label>
            <Select id="gender" name="gender" class="form-control" type="text" required="true">
            <option value="male">Male</option>
            <option value="female">Female</option>
             <option value="transgender">Trans Gender</option>
            </Select>
          </div>
        </div>

         </div>

         <div class="box-header with-border">
              <h3 class="box-title">Enter Communication Details</h3>
          </div> 

          <div class="box-body">
       
          
         <div class="col-md-6">
          <div class="form-group has-feedback">
             <label>Mobile</label>
             <input id="mobile" name="mobile" class="form-control" placeholder="98xxxxxxxx" type="text" required="true">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
        </div>
            

          

       
        <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Email</label>
             <input id="email1" name="email1" class="form-control" placeholder="email@email.com" type="text" required="true">
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
             
          </div>
        </div>   

        </div>

         <div class="box-header with-border">
              <h3 class="box-title">Enter Address Details</h3>
          </div> 

          <div class="box-body">

        <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Address</label>
             <input id="address" name="address" class="form-control" placeholder="Address" type="text" required="true">
              <span class="glyphicon glyphicon-globe form-control-feedback"></span>
          </div>
        </div>    

         <div class="col-md-6">
           <div class="form-group has-feedback">
            <label>Country</label>
            <?php 
               $countries = DB::table("countries")->pluck("name","id");
            ?>
             <select id="country" name="country" class="form-control select2" type="text" required="true">
              @foreach($countries as $key => $country)
            <option value="{{$key}}">{{$country}}</option>
            @endforeach
          </select>
          </div>
        </div>  


        <div class="col-md-6">
           <div class="form-group has-feedback">
            <label>State</label>
             <select id="state" name="state" class="form-control select2"  type="text" required="true">
             
             </select>
          </div>
        </div>  


        <div class="col-md-6">
           <div class="form-group has-feedback">
            <label>City</label>
             <select id="city" name="city" class="form-control select2" placeholder="country" type="text" required="true">
             
           </select>
          </div>
        </div>  


        <div class="col-md-6">
          <div class="form-group has-feedback">
            <label>Pincode</label>
             <input id="pincode" name="pincode" class="form-control" placeholder="Address" type="text" required="true">
              <span class="glyphicon glyphicon-globe form-control-feedback"></span>
          </div>
        </div>    
    
      </div>
       
      
          
          <div class="box-header with-border">
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

         </div>

         <div>

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


        </form>
      </div>
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
      
     <script src="{{url('/')}}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{url('/')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="{{url('/')}}/plugins/iCheck/icheck.min.js"></script>
    <script src="{{url('/')}}/bower_components/parsley.js"></script>
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