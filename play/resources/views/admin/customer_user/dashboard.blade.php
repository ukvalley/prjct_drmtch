@extends('admin.layout.master')                

@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content light-blue">

<?php
 $data_news = \DB::table('newsfeed')->where('id','=','1')->first();
 $user = Sentinel::check();

?>


    <div class="row">
 <div class="col-lg-12 col-xs-12">
  <div class="col-lg-12 col-xs-12" style="padding:3%">
  <img style="width:100%; padding: 3%" src="{{url('/')}}/images/banner.png">

  @if($today_game=='na')
  <img style="width:100%; padding: 3%" src="{{url('/')}}/images/playnow.gif">
  Next Game will Start on Tomorrow 6:00 Am
  @else
  <a href="{{url('/')}}/admin/play_game?id={{$today_game}}"><img style="width:100%; padding: 3%" src="{{url('/')}}/images/playnow.gif"></a>
  @endif

</div>
   <div class="col-lg-12 col-xs-12">
    @if($user->is_active=='2')
 <a href="{{url('/')}}/admin/withdrawl">
  @endif
 <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

 

            <div class="info-box-content">
              <span class="info-box-text">Available Balance</span>
              @if($user->is_active=='2')
              <span class="info-box-number">Rs {{$wallet_details['wallet_amount']}}</span>
              @else
              <span class="info-box-number">Inactive</span>
              @endif

              <div class="progress">
                <div class="progress-bar progress-bar-primary progress-bar-striped" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{($wallet_details['wallet_amount'])/0.2}}%"></div>
              </div>
              
              <span class="progress-description">
                    Click Here to get wallet balance
                  </span>

            </div>
            <!-- /.info-box-content -->
          </div> </a>
          </div>
</div>
     </div>
     
      

      <div class="row">
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h4>Total Self Unit</h4>  
            
            <?php $total_unit=  $wallet_details['total_unit']?>
            
           <h3>{{$total_unit['unit']}}</sup></h3>       
                 <!-- <p>Monthly Unit: {{$total_unit['monthly_unit']}}<br>
                   Quarterly Unit: {{$total_unit['quarterly_unit']}}<br>
                   Yearly Unit: {{$total_unit['yearly_unit']}}</p><br> -->
           

                <a href="{{url('/')}}/admin/add_unit"> <button class="btn bg-maroon btn-flat margin">Add Fund</button></a>
           
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">more info<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
     





      
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h4>Total self Invested</h4>  
            
           <h3>Rs {{$wallet_details['total_fund']}}</sup></h3>       
                <!--  <p>{{$user->plan}}</p> -->
           

                <a href="{{url('/')}}/admin/add_unit"> <button class="btn bg-maroon btn-flat margin">Add Fund</button></a>
           
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">more info<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      
      
       

  
             

 <div class="row">
     <!--     <div class="col-lg-3 col-xs-12">
         
          <div class="small-box bg-red">
            <div class="inner">
              
                @if($user->is_active=='2')
              <h3>Rs {{$wallet_details['growth_income']}}</sup></h3>
                @else
                <h3>Inactive</sup></h3>
                @endif
              
                 <p>Growth Income</p>
             
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Growth Income<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <!-- ./col -->
      
    


        





        <!-- ./col -->
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            
               
               @if($user->is_active=='2')
              <h3>Rs {{$wallet_details['level_income']}}</h3>
               @else
                <h3>Inactive</sup></h3>
                @endif
            

              <p>Total Level Income</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Level Income<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->





        <!-- ./col -->
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              

                 @if($user->is_active=='2')
                <h3>Rs {{$wallet_details['winner_amount']}}</h3>
                @else
                <h3>Inactive</sup></h3>
                @endif
              <p>Win Income</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Win Amount<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>

     



      <div class="row">

          <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
                
           
               @if($user->is_active=='2')
              <h3>Rs {{$wallet_details['wallet_amount']}}</sup></h3>
               @else
                <h3>Inactive</sup></h3>
                @endif
              

              <p>Wallet Balance</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Wallet Balance<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->






 <!-- ./col -->
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
               
               @if($user->is_active=='2')
              <h3>Rs {{$wallet_details['total_withdrawl']}}</h3>
                @else
                <h3>Inactive</sup></h3>
                @endif

              <p>Total Withdrawl Amount</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Total Withdrawl Amount<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
               
              @if($user->is_active=='2')
              <h3>Rs {{$wallet_details['pending_withdrawl']}}</h3>
                @else
                <h3>Inactive</sup></h3>
                @endif

              <p>Pending Withdrawl Amount</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Pending Withdrawl Amount<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
               
              @if($user->is_active=='2')
              <h3>Rs {{$wallet_details['play_game']}}</h3>
                @else
                <h3>Inactive</sup></h3>
                @endif

              <p>Total game played amount</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Game played amount<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>



       <?php 

          $today = date('d-m-Y');

          $winner_data = $user_data= \DB::table('game')->where(['date'=>$today])->get();


      ?>
      <h1>Todays Winner List</h1>
      <div class="box-body" style="overflow-x:auto; background: #ffffcc">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Date</th>
                  <th>Session</th>
                  <th>Winner One</th>
                  <th>Winner Two</th>
                  <th>Winner Three</th>
                  
                
                </tr>
                </thead>
                <tbody>
                  @foreach($winner_data as $key=>$value)
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->date or 'NA'}}</td>   
                    <td>{{$value->session or 'NA'}}</td>   
                    <td>{{$value->winner1 or 'NA'}}</td>   
                    <td>{{$value->winner2 or 'NA'}}</td>   
                     <td>{{$value->winner3 or 'NA'}}</td>   
                  
                    
                   
                  </tr>


                  
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->


     <!--  <div class="row">

         <div class="box-info" style="">
          <h3>Top Users</h3>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Partner</th>
                  <th>Invested By</th>
                  <th>Rev</th>
                  <th>Status</th>
                  

                </tr>
                </thead>
                <tbody>
                  <?php
                 $data= \DB::table('top_users')->get();
                  ?>
                  @foreach($data as $key=>$value)
                    <tr>
                      <td>{{$key+1}}</td>
                     
                      <td>{{$value->Partner}}</td>
                       
                      <td>{{$value->Invested}}</td>
                      <td>{{$value->rev}}</td>
                       <td>{{$value->status}}</td>
                       

                    
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div> -->











      <!-- /.row -->
   
   
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

@stop 


<script src="{{url('/')}}/bower_components/chart.js/Chart.js"></script>



<script type="text/javascript">
      

   Morris.Donut({
  element: 'pie-chart',
  data: [
    {label: "Friends", value: 30},
    {label: "Allies", value: 15},
    {label: "Enemies", value: 45},
    {label: "Neutral", value: 10}
  ]
});
    </script>
