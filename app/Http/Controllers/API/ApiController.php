<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Plan;
use App\HeaderSlider;
use App\Schedule;
use App\Address;
use App\User;
use App\Subscription;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Closure;
use DB;
use DateTime;




class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** 
     * 
     *  Front section  
     *
     **/
    
    public function AppHomeFeed()
    {

       $user_id = 2;
        /* media url header ends here */

        $slides = HeaderSlider::get();
        if (!$slides->isEmpty()) {
            $row['header_slide']=$slides;
        } else {
            $row['header_slide']= array(
                'msg' => 'no slides',
                'success' => 0, 
            );
        }
        
        $schedules = Schedule::where('user_id', '=', $user_id)->get();
        if (!$schedules->isEmpty()) {
            
            $row['schedules']=$schedules;
            

       } else {
        $row['schedules']= array(
            'msg' => 'no schedules',
            'success' => 0, 
        );
       }
       
      
     
        $set['234WM_API_V1']  = $row;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }
    public function getSchedules()
    {

       $user_id = 2;
        /* media url header ends here */
        
        $schedules = Schedule::where('user_id', '=', $user_id)->get();
        if (!$schedules->isEmpty()) {
            
            $row['schedules']=$schedules;
            

       } else {
        $row['schedules']= array(
            'msg' => 'no schedules',
            'success' => 0, 
        );
       }
       
      
     
        $set['234WM_API_V1']  = $row;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }
    public function checkSubscription()
    {
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);
        
        $user = User::where('id', '=', $user_id)->first();
        $plan = Plan::where('id','=', $user->plan_id)->first();

        if ($plan) {
            $sub_plan = $plan->plan_name;
        }else{
            $sub_plan = null;
        }

       
        $response[]= array(
        'user_plan' => $sub_plan,
        'plan_pickups' => $user->plan_pickups,
        'plan_status' => $user->plan_status,
        'success' => '1'
     );
     $set['234WM_API_V1']  = $response;
       
      
     header( 'Content-Type: application/json; charset=utf-8' );
     echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
     die();
    }
    
    public function saveSubscription()
    {
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);
        $plan_id = filter_input(INPUT_GET, 'plan_id', FILTER_SANITIZE_STRING);
        $plan_code = filter_input(INPUT_GET, 'plan_code', FILTER_SANITIZE_STRING);
        $plan_amount = filter_input(INPUT_GET, 'plan_amount', FILTER_SANITIZE_STRING);
        $payment_ref = filter_input(INPUT_GET, 'payment_ref', FILTER_SANITIZE_STRING);
        
        $user = User::where('id', '=', $user_id)->first();
        $plan = Plan::where('id','=', $plan_id)->first();

        // store payment subscription
        $store = Subscription::create([
            'user_id' => $user_id,
            'plan_id' =>   $plan_id,
            'plan_code' =>   $plan_code,
            'amount_paid' =>    $plan_amount,
            'payment_ref' => $payment_ref
        ]);
      
        $main_plan_id = $plan->id;
        $main_plan_duration = $plan->plan_duration;
       
        // update the user plan status

       $sub_update =([
            'plan_status' => 1,
            'plan_id' => $main_plan_id,
            'plan_pickups' => $main_plan_duration,
        ]);

            User::where('id', $user_id)->update($sub_update);
         echo    $address = Address::where('user_id', $user_id)->first();

        //  echo  DB::table('addresses')
        //             ->where('user_id',  '=' ,  $user_id )
        //             ->first(); 

            // if ($address->city) {

            //      $address = $address->address;
            //     echo   $state = $address->city;
            // }
    //             $city = $address->city;
    //             $fullname = $user->full_name;
    //             $email = $user->email;
    //             $number = $user->number;
    //             $user_id = $user->id;

    //             $schedules = $plan->plan_duration;
    //             $set_number = 1;
    
    //             $date = new DateTime();
    //             while ($set_number <= $schedules) {
    //                         $date->modify('next saturday');
    //                     $store = Schedule::create([
    //                         'user_id' => $user->id,
    //                         'address' => $address,
    //                         'state' =>   $state,
    //                         'city' =>   $city,
    //                         'fullname' => $fullname,
    //                         'email' =>     $email,
    //                         'number' =>    $number,
    //                     ]);
            
    //                 $set_number++;
    //             }
    //         }
    //     $response[]= array(
    //     'user_id' => $user_id,
    //     'user_plan' => $user->plan_status,
    //     'to_address' => $address,
    //     'success' => '1'
    //  );
    //  $set['234WM_API_V1']  = $response;
       
      
    //  header( 'Content-Type: application/json; charset=utf-8' );
    //  echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    //  die();
    }
    /* store address for users */
    public function saveAddress()
    {
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_GET, 'address', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_GET, 'state', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_GET, 'city', FILTER_SANITIZE_STRING);
        
        $user = User::where('id', '=', $user_id)->first();
        // store payment subscription
        $store = Address::create([
            'user_id' => $user_id,
            'address' =>   $address,
            'state' =>   $state,
            'city' =>    $city,
        ]);
      
     
        $response[]= array(
        'user_id' => $user_id,
        'success' => '1'
     );
     $set['234WM_API_V1']  = $response;
       
      
     header( 'Content-Type: application/json; charset=utf-8' );
     echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
     die();
    }
    /* store address for user and activate his plan */
    public function saveAddressPlan()
    {
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_GET, 'address', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_GET, 'state', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_GET, 'city', FILTER_SANITIZE_STRING);
        
        $user = User::where('id', '=', $user_id)->first();
        // store payment subscription
        $store = Address::create([
            'user_id' => $user_id,
            'address' =>   $address,
            'state' =>   $state,
            'city' =>    $city,
        ]);
      
        
       $sub_update =([
        'plan_status' => 2,
    ]);

        User::where('id', $user_id)->update($sub_update);
     
        $response[]= array(
        'user_id' => $user_id,
        'success' => '1'
     );
     $set['234WM_API_V1']  = $response;
       
      
     header( 'Content-Type: application/json; charset=utf-8' );
     echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
     die();
    }
    /* get plans */
    public function getPlan()
    {        
        $plan = Plan::get();

       
        $response['plans']=$plan;
     
     $set['234WM_API_V1']  = $response;
        
      
     header( 'Content-Type: application/json; charset=utf-8' );
     echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
     die();
    }
    /* get address */
    public function getAddress()
    {        
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);

        $address = Address::where('user_id', '=', $user_id);

       
        $response['address']=$address;
     
     $set['234WM_API_V1']  = $response;
        
      
     header( 'Content-Type: application/json; charset=utf-8' );
     echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
     die();
    }

    /* store a schedule */

    public function StoreSubscriptionSchedule(Request $request)
    {


        $user = $request->user();

        $address = $request->address;
        $state = $request->state;
        $city = $request->city;
        $fullname = $user->full_name;
        $email = $user->email;
        $number = $user->number;
        $user_id = $user->id;

        if ($user->plan_status == 0) {
            $set['234WM_API_V1'][]=array('msg' =>'Please subscribe to a plan','success'=>'0');
        }elseif ($user->plan_status == 1) {
            $plan = Plan::where('id','=', $user->plan_id)->first();
            
            $schedules = $plan->plan_duration;
            $set_number = 1;

            $date = new DateTime();
            while ($set_number <= $schedules) {
                $date->modify('next saturday');
            $store = Schedule::create([
                'user_id' => $user->id,
                'address' => $address,
                'state' =>   $state,
                'city' =>   $city,
                'date' =>    $date->format('Y-m-d'),
                'fullname' => $fullname,
                'email' =>     $email,
                'number' =>    $number,
            ]);

        $set_number++;
        }
        $set['234WM_API_V1'][]=array('msg' =>'Subscription saved', 'success'=>'1');
        }

       
        // $weekly = false;
        // $monthly = true;
        // $schedules = 0;
        // $set_number = 1;

        // if ($monthly) {
        //     $schedules = 4;
        // }
        // if($weekly){
        //     $schedules = 8;
            
        // }
        
        
        // while ($set_number <= $schedules) {
            
        //     $store = Schedule::create([
        //         'user_id' => 3,
        //         'address' => 'address',
        //         'state' =>   'state' ,
        //         'city' =>   'city' ,
        //         'date' =>    '$lat' ,
        //         'time' =>    '$lat' ,
        //         'fullname' => '$lat' ,
        //         'email' =>    '$lat' ,
        //         'number' =>    1 ,
        //     ]);

        // $set_number++;
        // }


        header( 'Content-Type: application/json; charset=utf-8' );
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }
    public function StoreSchedule(Request $request)
    {


        $user = $request->user(); 
        $address = $request->address;
        $state = $request->state;
        $city = $request->city;
        $date = $request->date;
        $time = $request->time;
        $fullname = $user->full_name;
        $email = $user->email;
        $number = $user->number;
        $user_id = $user->user_id;

        if ($user->plan_status == 0) {
            $set['234WM_API_V1'][]=array('msg' =>'Please subscribe to a plan','success'=>'0');
        }elseif ($user->plan_status == 1) {
            $plan = Plan::where('id','=', $user->plan_id)->first();
            
            
        }

       
        // $weekly = false;
        // $monthly = true;
        // $schedules = 0;
        // $set_number = 1;

        // if ($monthly) {
        //     $schedules = 4;
        // }
        // if($weekly){
        //     $schedules = 8;
            
        // }
        
        
        // while ($set_number <= $schedules) {
            
        //     $store = Schedule::create([
        //         'user_id' => 3,
        //         'address' => 'address',
        //         'state' =>   'state' ,
        //         'city' =>   'city' ,
        //         'date' =>    '$lat' ,
        //         'time' =>    '$lat' ,
        //         'fullname' => '$lat' ,
        //         'email' =>    '$lat' ,
        //         'number' =>    1 ,
        //     ]);

        // $set_number++;
        // }


        header( 'Content-Type: application/json; charset=utf-8' );
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }



    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activateStore(Request $request)
    {
        $user_id = $request->user_id;
        $store_id = $request->store_id;
        $store_name = $request->store_name;
        $about_store = $request->about_store;
        $store_city = $request->store_city;
        $store_state = $request->store_state;

        /* making of the store slug */

        $slug = str_slug($store_name.' '.$store_id, '-');
        

        /* checking if the request has image and uploading the image */
        $thumbnail = null;
      if ($request->hasFile('store_image')){
          $image = $request->file('store_image');

          $valid_extensions = ['jpg','jpeg','png',];
          $image_extensions = ['jpg','jpeg','png'];

          if ( ! in_array(strtolower($image->getClientOriginalExtension()), $valid_extensions) ){
              return redirect()->back()->withInput($request->input())->with('error', 'Only .jpg, .jpeg and .png is allowed extension') ;
          }
          $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());
          if (in_array(strtolower($image->getClientOriginalExtension()), $image_extensions)) {
               $resized_thumb = Image::make($image)->resize(512, 512)->stream();
          }else {
            $resized_thumb = '512';
          }
        
          $thumbnail = strtolower(str_slug($file_base_name)).'.' . $image->getClientOriginalExtension();

          $thumbnailPath = '/public/backend/cdn/'.$store_name.'/'.$thumbnail;

          try{
            if (in_array(strtolower($image->getClientOriginalExtension()), $image_extensions)) {
              Storage::disk('public')->put($thumbnailPath, $resized_thumb->__toString());
            }else{
                Storage::disk('public')->put($thumbnailPath, $resized_thumb);

            }
          } catch (\Exception $e){
            echo $e->getMessage();
              return redirect()->back()->withInput($request->input())->with('error', $e->getMessage()) ;
          }
      }
/* now we send the data to the server for update */
       $store_update = [
                           
                        'shop_name' => $store_name,
                        'about_store' => $about_store,
                        'store_city' => $store_city,
                        'store_state' => $store_state,
                        'store_slug' => $slug,
                        'is_active' => 1
                    ];

                    if ($thumbnail){
                        $store_update['has_logo'] = 1;
                        
                        Media::create([
                             
                            'user_id' => $user_id,
                            'media_store_id' => $store_id,
                             'media_type' => 'logo',
                             'media_title' => $thumbnail,
                             'media_slug' => $thumbnail,
                            ]);
                        }

                    $store_store =    Shop::where('id', $store_id)->update($store_update);

                    $response[] = array(
                        'res_msg' => 'Profile activated, One last step',
                        'res_status' => 1
                    );
                    $set['234WM_API_V1']  = $response;
                    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                    die();

    }


    public function store_Address(Request $request)
    {
        $user_id = $request->user_id;
        $store_id = $request->store_id;
        $store_address = $request->store_address;
        $store_lat = $request->store_lat;
        $store_lng = $request->store_lng;
        $primary_color = $request->primary_color;

        $store_update = [
                           
            'store_address' => $store_address,
            'store_lat' => $store_lat,
            'store_lng' => $store_lng,
            'primary_color' => $primary_color,
        ];
        $store_store =    Shop::where('id', $store_id)->update($store_update);

        $response[] = array(
            'res_msg' => 'And we are live, lets add some products',
            'res_status' => 1
        );
        $set['234WM_API_V1']  = $response;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MealDelete($id)
    {
        $meal = Meal::find($id)->delete();
        // DB::table('projects')->where('id', '', 100)->delete();

        return $id;
    }
    public function ProjectDelete($id)
    {
        $project = Project::find($id)->delete();
        // DB::table('projects')->where('id', '', 100)->delete();

        return $id;
    }
    public function DonateDelete($id)
    {
        $donation = Donation::find($id)->delete();
        // DB::table('projects')->where('id', '', 100)->delete();

        return $id;
    }
    public function GalleryDelete($id)
    {
        $gallery = Gallery::find($id)->delete();
        return $id;
    }
    public function ArticleDelete($id)
    {
        $article = Article::find($id)->delete();
        return $id;
    }
    public function destroy($id)
    {
        //
    }
}
