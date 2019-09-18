<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use URL;
use Mail;
use Session;
use Sentinel;
use Validator;
use App\Models\UserModel;
use App\Models\EmailTemplateModel;
use PHPMailer\PHPMailer;

class AuthController extends Controller
{
    public $arr_view_data;
    public $admin_panel_slug;

    public function __construct(UserModel $user_model,
                               EmailTemplateModel $email_template_model)
    {
      $this->UserModel          = $user_model;
      $this->EmailTemplateModel = $email_template_model;
      $this->arr_view_data      = [];
      $this->admin_panel_slug   = config('app.project.admin_panel_slug');

    }
    

    public function login()
    {
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = "Login";
      
    	return view('admin.login',$this->arr_view_data);
    }

    public function login_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'  => 'required|max:255',
            'password'  => 'required',
        ]);

        if ($validator->fails()) 
        {
            return redirect(config('app.project.admin_panel_slug').'/login')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }
       
        if(isset($_POST["remember_me"]))
        {
          if($_POST["remember_me"]=='on')
          {
            $hour = time() + 3600 * 24 * 30;
            setcookie('username',$request->input('username'), $hour);
            setcookie('password',$request->input('password'), $hour);
          }
        }

        $credentials = [
            'email'=> $request->input('username'),
            'password' => $request->input('password'),
        ];
        $check_authentication = Sentinel::authenticate($credentials);

        if($check_authentication)
        {

          $user = Sentinel::check();
         
            return redirect('admin/dashboard');die;
         /* if($user->is_admin=='1')
          {
          }
          else
          {
            Sentinel::logout();
            Session::flash('error', 'Invalid Login Credentials.');
            return redirect('admin');
          }*/
        }
        else
        {
          Session::flash('error', 'Invalid Login Credentials.');
        } 
      Sentinel::logout();
      return redirect('admin');
    }

    public function dashboard()
    {
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title']       = "dashboard";

       $user = Sentinel::check();
       die;
       if($user->is_admin==1)
       {
          return view('admin.dashboard',$this->arr_view_data);
       }
       else
       {
          return view('admin.customer_user.dashboard',$this->arr_view_data);
       }
      
    }

    public function registration()
    {
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title']       = "Login";
      
      return view('admin.register',$this->arr_view_data);
    }

    public function register_process(Request $request)
    
    {
    
     /* $validator = Validator::make($request->all(), [
            'username'       => 'required',
            'user_id'        => 'required',
            'sponcer_id'     => 'required',
            'mobile'         => 'required',
            'email'          => 'required',
            'password'       => 'required',
            
        ]);
      
      if ($validator->fails()) 
      {
          return redirect(config('app.project.admin_panel_slug').'/registration')
                      ->withErrors($validator)
                      ->withInput($request->all());
      }
      */
    

      $count = $this->UserModel->where(['email'=>$request->input('sponcer_id')])->first();


      $count_self = $this->UserModel->where(['mobile' =>$request->input('mobile')])->count();
      
      
      
     

      
      
     /* if($count['is_active']!='2')
      {
   
        Session::flash('error', "Sponcer id not yet activated! Please wait for some time.");
        return redirect()->back();
      }*/

       
 
      $count = $this->UserModel->where(['email'=>$request->input('sponcer_id')])->count();

      
      
 
      
      
      
      if($count==0)
      {
        Session::flash('error', "No parent user exist.");
        return redirect()->back();
      }
      
      
      
      $count1 = $this->UserModel->where(['email'=>$request->input('user_id')])->count();
      
      
      
      if($count1)
      {
        Session::flash('error', "User already exist.");
        return redirect()->back();
      }

      
      
      $arr_data               = [];
      $arr_data['user_name']  = $request->input('username');
      $arr_data['mobile']     = $request->input('mobile');
      $arr_data['email']      = $request->input('user_id');
      $arr_data['password']   = $request->input('password');
     
      
      $arr_data['is_active']  = 1;
      
      
      
      
      

      
      
      $user_status = Sentinel::registerAndActivate($arr_data); 

      
      
      if(isset($user_status->id) && !empty($user_status->id))
      {
        $arr_user_data                 = [];
        $arr_user_data['user_name']    = $request->input('username');
        $arr_user_data['middle_name']    = $request->input('middlename');
        $arr_user_data['last_name']    = $request->input('lastname');
        $arr_user_data['gender']    = $request->input('gender');
        $arr_user_data['dob']    = $request->input('dob');
        
        $arr_user_data['mobile']       = $request->input('mobile');
        $arr_user_data['email1']   = $request->input('email1');

        $arr_user_data['email']   = $request->input('user_id');  
        $arr_user_data['password12'] = $request->input('password'); 

         
        $arr_user_data['spencer_id']   = $request->input('sponcer_id');
        $arr_user_data['spencer_name'] = $request->input('spencer_name');

        
        $arr_user_data['country']          = $request->input('country');
        $arr_user_data['state']         = $request->input('state');
        $arr_user_data['city']            = $request->input('city');
        $arr_user_data['address']             =   $request->input('address');
        $arr_user_data['pincode']          = $request->input('pincode');
    
        $arr_user_data['joining_date']    = null;//date('Y-m-d');
        $arr_user_data['recommit_count']        = 0;
        $email = $request->input('email');
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        
      
        
       
     
        for ($i = 0; $i < 6; $i++) 
        {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $arr_user_data['transaction_pin']    = $randomString;

        $arr_user_data['password']        = password_hash($request->input('password'), PASSWORD_DEFAULT);

        
        $this->UserModel->where(['id'=>$user_status->id])->update($arr_user_data);
        
        
        
	     	$tree_count = $this->UserModel->where(['spencer_id'=>$request->input('sponcer_id')])->count();
       $A = $this->UserModel->where(['email'=>$request->input('sponcer_id')])->update(['tree_count'=>$tree_count]);

       
       
        $data_setting = \DB::table('site_setting')->where('id','=','1')->first();
            
        $message = "Welcome to ".$data_setting->site_name." Your User Name:".$request->input('username').",User Id:".$request->input('user_id').", Transaction Pin:".$randomString." Password is:".$request->input('password')."";
     
        
        $url='http://sms.fastsmsindia.com/api/sendhttp.php?authkey='.$data_setting->sms_auth.'&mobiles='.$request->input('mobile').'&message='.$message.'&sender='.$data_setting->sms_sender_id.'&route=6';
        
        $this->mail($request->input('email1'));
        
        $user_name= $request->input('email1');
        
         $arr_user_data['title'] = "The registration is successfully";
         
         $data = [
           'email' => $request->input('user_id'),
           'password' => $request->input('password')
            ];
            
          
           $email =  $request->input('email');
         
          /* Mail::send('mail',['data' => $data], function($message) use ($email) {
 
            $message->to($email, 'Receiver Name')
 
                    ->subject('The Corevestor Securities Private Limited - Registration Successfully');
                    $message->from('support@cspl.com','CSPL');
        });*/
        
       $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);
       
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }
        
        curl_close($ch);
        
        
        $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     $response = curl_exec ($ch);
     $err = curl_error($ch);  //if you need
     curl_close ($ch);
     //return $response;
        
        
      }
      Session::flash('success', ''.$message);
      return redirect('admin/login')->with( [ 'id' => $request->input('user_id') ] );;
    }
    
    
    
     public function mail()
    {
        /* $arr_user_data['title'] = "The registration is successfully";
         Mail::send('mail', $arr_user_data, function($message) {
 
            $message->to('mahajandivya192@gmail.com', 'Receiver Name')
 
                    ->subject('Registration Successfull');
                    $message->from('support@globalfx.world','Globalfx');
        });
 */
        
     
    }
    


public function forgot_tpin()
    {
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = "Forget Password";
      
      return view('admin.forgot_tpin',$this->arr_view_data);
    }


public function forget_transaction_pin(Request $request)
    {

    	if(empty($_POST['username']) || empty($_POST['mobile']))
    	{
    		echo "Invalid Parameters!";

    	}
    	
      $characters = '0123456789';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 6; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }

      $arr_user_data                 = [];
      $password                      = $randomString;
      $arr_user_data['email']        = $request->input('username');
      $arr_user_data['mobile']       = $request->input('mobile');

      $count = $this->UserModel->where($arr_user_data)->count();
      
      if($count)
      {
        $this->UserModel->where($arr_user_data)->update(['transaction_pin'=>$password]);
        Session::flash('success', 'Password has been sent to user mobile.');
        $mobileno = $request->input('mobile');
      
       









      $data_setting = \DB::table('site_setting')->where('id','=','1')->first();


        $msg="Dear Sir, Your new transaction pin is ".$randomString." for ".$arr_user_data['email']." Please Login Your Account.";
        $url='http://sms.fastsmsindia.com/api/sendhttp.php?authkey='.$data_setting->sms_auth.'&mobiles='.$request->input('mobile').'&message='.$msg.'&sender='.$data_setting->sms_sender_id.'&route=6';
        
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);
       
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }
        
        curl_close($ch);
        
        
        $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     $response = curl_exec ($ch);
     $err = curl_error($ch);  //if you need
     curl_close ($ch);
     //return $response;
          
          
        
          
          
          Session::flash('success', 'Transaction pin has been sent successfully.');
         return redirect('admin');
      }
      else
      {
           Session::flash('error', 'Please enter valid details!!!.');
          return redirect('admin/forgot_tpin');
      }
}




     public function forget_password()
    {
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = "Forget Password";
      
      return view('admin.forgot',$this->arr_view_data);
    }




    public function forget_password_process(Request $request)
    {
    	if(empty($_POST['username']) || empty($_POST['mobile']))
    	{
    		echo "Invalid Parameters!";

    	}
    	
      $characters = '0123456789';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 6; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }

      $arr_user_data                 = [];
      $password                      = password_hash($randomString, PASSWORD_DEFAULT);
      $arr_user_data['email']        = $request->input('username');
      $arr_user_data['mobile']       = $request->input('mobile');

      $count = $this->UserModel->where($arr_user_data)->count();
      $user= $this->UserModel->where(['email'=>$request->input('username')])->first();
      if($count)
      {
        $this->UserModel->where($arr_user_data)->update(['password'=>$password]);
        Session::flash('success', 'Password has been sent to user mobile.');
        $mobileno = $request->input('mobile');
      
       







        $data_setting = \DB::table('site_setting')->where('id','=','1')->first();


        
        
        $data = [
           'email' => $user->email,
           'password' => $randomString
            ];
            
          
           $email =  $user->email1;
         
         Mail::send('forgot_mail',['data' => $data], function($message) use ($email) {
 
            $message->to($email, 'Receiver Name')
 
                    ->subject('Dream Touch forgot Password request');
                    $message->from('support@dreamtouch.in','DreamTouch');
        });


        $msg="Dear Sir, Your new password is ".$randomString." for ".$arr_user_data['email']." Please Login Your Account.";
        $url='http://sms.fastsmsindia.com/api/sendhttp.php?authkey='.$data_setting->sms_auth.'&mobiles='.$request->input('mobile').'&message='.$msg.'&sender='.$data_setting->sms_sender_id.'&route=6';
       $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);
       
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }
        
        curl_close($ch);
        
        
        $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     $response = curl_exec ($ch);
     $err = curl_error($ch);  //if you need
     curl_close ($ch);
     //return $response;
      }
      else
      {
         echo 'error,Please enter valid details!!!';
      }
    }

 public function forget_password_process1(Request $request)
    {

    	if(empty($_POST['username']) || empty($_POST['mobile']))
    	{
    		echo "Invalid Parameters!";

    	}
    	
      $characters = '0123456789';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 6; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }

      $arr_user_data                 = [];
      $password                      = password_hash($randomString, PASSWORD_DEFAULT);
      $arr_user_data['email']        = $request->input('username');
      $arr_user_data['mobile']       = $request->input('mobile');

      $count = $this->UserModel->where($arr_user_data)->count();
      $user= $this->UserModel->where(['email'=>$request->input('username')])->first();
      
      if($count)
      {
        $this->UserModel->where($arr_user_data)->update(['password'=>$password]);
        Session::flash('success', 'Password has been sent to user mobile.');
        $mobileno = $request->input('mobile');
      
       








        $data_setting = \DB::table('site_setting')->where('id','=','1')->first();


         $data_setting = \DB::table('site_setting')->where('id','=','1')->first();


       
        
        $data = [
           'email' => $user->email,
           'password' => $randomString
            ];
            
          
           $email =  $user->email1;
         
         Mail::send('forgot_mail',['data' => $data], function($message) use ($email) {
 
            $message->to($email, 'Receiver Name')
 
                    ->subject('Dream Touch NEW PASSWORD REQUEST');
                     $message->from('support@dreamtouch.in','Dream Touch');
        });


        $msg="Dear Sir, Your new password is ".$randomString." for ".$arr_user_data['email']." Please Login Your Account.";
        $url='http://sms.fastsmsindia.com/api/sendhttp.php?authkey='.$data_setting->sms_auth.'&mobiles='.$request->input('mobile').'&message='.$msg.'&sender='.$data_setting->sms_sender_id.'&route=6';
        
       $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);
       
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }
        
        curl_close($ch);
        
        
        $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     $response = curl_exec ($ch);
     $err = curl_error($ch);  //if you need
     curl_close ($ch);
    // return $response;
          
          
          Session::flash('success', 'Password has been sent successfully.');
         return redirect('admin');
      }
      else
      {
           Session::flash('error', 'Please enter valid details!!!.');
          return redirect('admin');
      }
}
      



    public function logout()
    {
      Sentinel::logout();
      return redirect(url($this->admin_panel_slug.'/login'));
    }
}
