<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <?php
 $data_setting = \DB::table('site_setting')->where('id','=','1')->first();
?>
  <title>{{$data_setting->site_name}} Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://www.ukvalley.com/demo/cspl_investment/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://www.ukvalley.com/demo/cspl_investment/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://www.ukvalley.com/demo/cspl_investment/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://www.ukvalley.com/demo/cspl_investment/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://www.ukvalley.com/demo/cspl_investment/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <style type="text/css">
    .parsley-required{
      color: red;
      list-style: none;
      margin-left: -37px;
    }
    .parsley-equalto{
      color: red; 
      list-style: none;
          margin-left: -37px;
    }
  </style>
</head>
<body class="hold-transition login-page bg-gray" style="background-image: url(http://dreamtouch.in/play/images/back2.jpg);">
<div class="login-box">
  <div class="login-logo">
  	   <!--  <img src="https://www.ukvalley.com/demo/cspl_investment/images/growind.png" style="height: 75px;"><br> -->
       <h3>{{$data_setting->site_name}}</h3>
   <b>Login</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body bg-white">
    <p class="login-box-msg">Sign in </p>

     <form class="login-form" method="post" action="{{url('/')}}/admin/login_process" data-parsley-validate="">
        {{ csrf_field() }}
        @include('admin.layout._operation_status')
      <div class="form-group has-feedback">
        <input id="username" name="username" class="form-control" placeholder="User Name" type="text" value="{{$_COOKIE['username'] or ''}}" required="true">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
         <input id="password" name="password" class="form-control" placeholder="Password" type="password" value="{{$_COOKIE['password'] or ''}}" required="true">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <a href="{{url('/')}}/admin/forget_password">I forgot my password</a><br>
     <a href="{{url('/')}}/admin/registration">Register Now</a><br>
  

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="https://www.ukvalley.com/demo/cspl_investment/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://www.ukvalley.com/demo/cspl_investment/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="https://www.ukvalley.com/demo/cspl_investment/plugins/iCheck/icheck.min.js"></script>
<script src="https://www.ukvalley.com/demo/cspl_investment/bower_components/parsley.js"></script>
<script>
$(document).ready(function(){
     setInterval(function(){  location.reload(); }, 90000);
});
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
