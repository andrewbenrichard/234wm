<?php

namespace App\Http\Controllers\APi\Auth;

use App\User;
use App\Plan;
use App\Media;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
   public function login(Request $request)
   {
       if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
       {
           $credentials = request(['email', 'password']);
           
           if (! $token = auth()->attempt($credentials)) {
            $email_checker = User::where('email','=',$request->email)->first();
            if (!$email_checker) {
                $set['234WM_API_V1'][]=array('msg' =>'Account not found','success'=>'0');
            }
            $hashedPassword = $email_checker->password;


            if (!Hash::check($password, $hashedPassword)) {
                $set['234WM_API_V1'][]=array('msg' =>'wrong password','success'=>'0');
            }
            }
            
            if($token){
                $user = User::where('email','=',$request->email)->first();
                $plan = Plan::where('id','=', $user->plan_id)->first();

                if ($plan) {
                    $sub_plan = $plan->plan_name;
                }else{
                    $sub_plan = null;
                }

                $response[]= array(
                'token' => $token,
                'fullname' => $user->full_name,
                'email' => $user->email,
                'number' => $user->number,
                'user_plan' => $sub_plan,
                'plan_pickups' => $user->plan_pickups,
                'plan_status' => $user->plan_status,
             );
             $set['234WM_API_V1']  = $response;
        }
        //  return response()->json(compact('token'));
    }else {
        $email_checker = User::where('email','=',$request->email)->first();
        if (!$email_checker) {
            $set['234WM_API_V1'][]=array('msg' =>'Account not found','success'=>'0');
        }
        $hashedPassword = $email_checker->password;


        if (!Hash::check($request->password, $hashedPassword)) {
            $set['234WM_API_V1']=array('msg' =>'wrong password','success'=>'0');
        }
    }

   
    //  $user = User::where('email', $request->email)->first();
    //  if ($user != null) {
     
    //  }
    // $response[] = array('token' => 'test' );
    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
   
   }

}
