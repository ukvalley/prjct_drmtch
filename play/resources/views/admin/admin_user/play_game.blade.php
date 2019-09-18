@extends('admin.layout.master')                

@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        Select Number To Play
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Number Selection</li>
      </ol>
    </section> -->

    <style type="text/css">
      /* Designing all grid */ 
         .grid-container { 
            display: grid; 
            grid-template-columns: auto auto auto; 
            background-color: white; 
            padding: 5px; 
        } 
  
        /* Designing all grid-items */ 
        .grid-item { 
            background-color: #0a2778 ; 
            border: 1px solid white; 
            padding: 20px; 
            color: white; 
            font-size: 30px; 
            text-align: center; 
        }  
  
        /* Designing h1 element */ 
        h1 { 
            color: green; 
            text-align: center; 

    </style>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Select Number To Play</h3>
            </div>
            <!-- /.box-header -->
              <div class="grid-container"> 
                @for($i=0;$i<30;$i++)
                <a href="{{url('/')}}/admin/play_game_unit?game_id={{$_GET['id']}}&selected={{$i+1}}"><div class="grid-item">{{$i+1}}</div> </a>
                @endfor
      
    </div> 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
   
  </div>
  <!-- /.content-wrapper -->

@stop 