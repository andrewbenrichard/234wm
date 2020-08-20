<?php

namespace App\Http\Controllers\APi\Auth;

use App\User;
use App\Shop;
use Session;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
   public function RegisterCustomer(Request $request)
   {
  

    
        $full_name = $request->full_name;
        $number = $request->number;
        $email = $request->email;
        $password = $request->password;
        
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
                 $response= array(
                 'token' => $token,
                 'fullname' => $user->full_name,
                 'email' => $user->email,
                 'number' => $user->number,
              );
              $set['234WM_API_V1']  = $response;
         }
         //  return response()->json(compact('token'));
     }

        //      Auth::login($user);
        //     $user = auth()->user();
    
        //     $set['234WM_API_V1'][]=array(
        //       'user_id' => $user->id,
        //       'full_name' => $user->full_name,
        //   'email' => $user->email,
        //   'number' => $user->number,
        //   'is_shop_active' => 0, //0 for not a shop, 1 for is a shop but not active, 2 for is a shop and active,
        //   'is_reseller' => 0,
        //   'success' => '1');
            }

      

      } else{
        $set['234WM_API_V1'][]=array('msg' =>'An Error as occoured, please check your details and try again','success'=>'0');

    }
    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
        
  

  }
}