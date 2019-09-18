@extends('admin.layout.master')                

@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Games
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>All Games</a></li>
        <li class="active">All Games</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Games</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Date</th>
                  <th>Winning Position</th>
                  <th>Win Amount</th>
                  
                
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $key=>$value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->date or 'NA'}}</td>   
                    <td>{{$value->winning_no or 'NA'}}</td>   
                    <td>{{$value->amount or 'NA'}}</td>   
                   
                    
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
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