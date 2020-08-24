<?php

namespace App\Http\Controllers\APi\Auth;

use App\User;
use App\Plan;
use Session;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
   public function RegisterCustomer()
   {

    
        $full_name = filter_input(INPUT_GET, 'full_name', FILTER_SANITIZE_STRING);
        $number = filter_input(INPUT_GET, 'number', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);
        
      if (!$full_name == null OR !$number == null OR !$email == null OR !$password == null) {
        $userauth = User::where('email', '=', $email)->orWhere('number', '=', $number)->first();

        if($userauth){     
            // echo "used";
       
            $set['234WM_API_V1'][]=array('msg' =>'This email or number is registered already','success'=>'0');
        }
        else if (!$userauth) {

          $user = User::create([
            'full_name'    => $full_name,
            'email'         => $email,
            'accept_terms'         => 1,
            'number'         => $number,
            'password'      => Hash::make($password),
        ]);
      
            
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $credentials = request(['email', 'password']);
            
            if (! $token = auth()->attempt($credentials)) {
             $email_checker = User::where('email','=',$email)->first();
             if (!$email_checker) {
                 $set['234WM_API_V1'][]=array('msg' =>'Account not found','success'=>'0');
             }
             $hashedPassword = $email_checker->password;
 
 
             if (!Hash::check($password, $hashedPassword)) {
                 $set['234WM_API_V1'][]=array('msg' =>'wrong password','success'=>'0');
             }
             }
             
             if($token){
                 $user = User::where('email','=',$email)->first();
                 $plan = Plan::where('id','=', $user->plan_id)->first();

                 if ($plan) {
                     $sub_plan = $plan->plan_name;
                 }else{
                     $sub_plan = null;
                 }
                 $response[]= array(
                    'auth_token' => $user->id,
                    'full_name' => $user->full_name,
                 'email' => $user->email,
                 'number' => $user->number,
                 'success' => "1"
              );
              $set['234WM_API_V1']  = $response;
         }
     }

            }

      

      } else{
        $set['234WM_API_V1'][]=array('msg' =>'An Error as occoured, please check your details and try again','success'=>'0');

    }
    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
        
  

  }
}