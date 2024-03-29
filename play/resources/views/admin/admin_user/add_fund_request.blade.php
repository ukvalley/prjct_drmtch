@extends('admin.layout.master')                

@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Fund Requests
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Fund Requests</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Level Income</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Sender Id</th>    
                  <!-- <th>Reciver Id</th>     -->
                  <th>Date</th>
                   <th>UTR</th>
                  <th>Amount</th>
                
                <!--  <th>BTC </btc> -->
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $key=>$value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->sender_id or 'NA'}}</td>   
                   <!--  <td>{{$value->reciver_id or 'NA'}}</td>    -->
                    <td>{{$value->created_at or 'NA'}}</td>
                    <td>{{$value->utr or 'NA'}}</td>
                    <td>{{$value->amount}}</td>
                     <!-- <td>{{$value->btc or 'NA'}}</td> -->
                 {{--    <td>
                      @if(!empty($value->receipt_file))
                        <a href="" download=""><i class="fa fa-download"></i></a>
                      @else
                        NA
                      @endif
                    </td> --}}
                    <td>
                      @if($value->approval=='completed')
                        <a href="javascript:void(0)" class="btn label-success">Payment Received</a>
                      @elseif($value->approval=='payment_done')
                       
                         @if($value->is_active==0 && $value->generator!='system')   
                        <a onclick="open_model(this)" data-sample-id="{{$value->trans_id}}" value="{{$value->trans_id}}" href="{{url('/')}}/admin/reclaim_payment?id={{$value->trans_id}}" class="button1 btn label-warning">Reclaim Payment</a>
                        @else
                          <a onclick="open_model(this)" data-sample-id="{{$value->trans_id}}" value="{{$value->trans_id}}"  href="{{url('/')}}/admin/accept_package?id={{$value->trans_id}}"  class="button1 btn label-danger">Accept Payment</a>
                      
                       @endif
                       
                      @else
                        <button class="btn label-info">Payment Inprocess</button>
                      @endif
                    </td>
                    <td>
                        <a onclick="open_model(this)" data-sample-id="{{$value->trans_id}}" value="{{$value->trans_id}}"  href="{{url('/')}}/admin/delete_package?id={{$value->trans_id}}"  class="button1 btn label-danger">Reject Payment</a>
                      
                    </td>
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