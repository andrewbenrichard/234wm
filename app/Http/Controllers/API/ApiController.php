<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Plan;
use App\HeaderSlider;
use App\Schedule;
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
            'payment_ref' => $payment_ref,
        ]);
      
        $main_plan_id = $plan->id;
        $main_plan_duration = $plan->plan_duration;
       
        // update the user plan status

       $sub_update =([
            'plan_status' => 1,
            'plan_id' => $main_plan_id,
            'plan_pickups' => $main_plan_duration
        ]);

        $user =    User::where('id', $user_id)->update($sub_update);

        $response[]= array(
        'user_id' => $user->id,
        'user_plan' => $user->plan_status,
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
        $user_id = $user->user_id;

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

    public function AppHomeDiscovery()
    {

        $contest_url = 'https://api.234WMfashion.com/public/backend/cdn/contest/';
        $posts_url = 'https://api.234WMfashion.com/public/backend/cdn/posts/';
        $hash_url = 'https://api.234WMfashion.com/public/backend/cdn/hashtag/';
        $profile_image_url = 'https://api.234WMfashion.com/public/backend/cdn/users/';
        /* media url header ends here */

        $contests = Contest::get();
        if (!$contests->isEmpty()) {
            foreach ($contests as $contest ) {
                $contest_main_media = Media::where('id', '=', $contest->contest_media_id)->first();
                $contest_in_media = Media::where('id', '=', $contest->contest_in_media)->first();
                $hashtag = PostHashtag::where('id', '=', $contest->contest_hashtag_id)->first();
                $posts = Post::where('post_contest_id', '=', $contest->id)->get();
                $posts_count = $posts->count();
                $contest_duration = $contest->contest_duration. 'days';
                $contest_end = date('F jS', strtotime($contest_duration));
                $api_contest[] = array(
                    'contest_id' => $contest->id,
                    'contest_name' => $contest->contest_name,
                    'contest_offer' => $contest->contest_offer,
                    'contest_type' => $contest->contest_type,
                    'contest_duration' => $contest_end,
                    'contest_count' => $posts_count,
                    'hashtag_id' => $hashtag->id,
                    'hashtag_name' => $hashtag->hashtag_name,
                    'contest_in_media' => $contest_url.$contest_main_media->media_slug,
                );
    
                $row['header_contest']=$api_contest;
    
            }
        } else {
            $row['header_contest']= array(
                'msg' => 'no contests',
                'success' => 0, 
            );
        }
        
       
        $hashtags = PostHashtag::where('hash_main_media', '!=', null)->get();
       if (!$hashtags->isEmpty()) {
        foreach ($hashtags as $hash ) {
            $hash_media = Media::where('id', '=', $hash->hash_main_media)->first();
            $header_hash[] = array(
                'hash_id' => $hash->id,
                'hash_name' => $hash->hashtag_name,
                'hash_media' => $hash_url.$hash_media->media_slug,

            );

            $row['header_hash']=$header_hash;

            }
       } else {
        $row['header_hash']= array(
            'msg' => 'no hashtags',
            'success' => 0, 
        );
       }
       
        $posts = DB::table("posts")
        ->orderBy('posts.id', 'desc')->get()->take(20);

        if (!$posts->isEmpty()) {
            foreach ($posts as $post ) {
                $post_img = Media::where('id', '=', $post->post_media_id)->first();
                $post_user = User::where('id', '=', $post->user_id)->first();                
                $post_hashtag = PostHashtag::where('id', '=', $post->post_hashtag_id)->first(); 
                if ($post_user->user_image_id) {
                    $user_img = Media::where('id', '=', $post_user->user_image_id)->first();  
   
                    $profile_image= $user_img->media_slug;
                } else {
                    $profile_image = null;
                }
                 
                             
                if ($post_hashtag) {
                    $hashtag = $post_hashtag->hashtag_name;
                }else{
                    $hashtag = null;
                }
                if ($post_hashtag) {
                    $hashtag = $post_hashtag->hashtag_name;
                }else{
                    $hashtag = null;
                }
                
                $header_post[] = array(
                    'post_id' => $post->id,
                    'user_id' => $post->user_id,
                    'post_contest_id' => $post->post_contest_id,
                    'post_name' => $post->post_title,
                    'post_username' => $post_user->first_name,
                    'post_des' => $post->post_des,
                    'post_likes' => $post->post_likes,
                    'post_image' => $posts_url.$post_img->media_slug,
                    'post_user_image' => $profile_image_url.$profile_image,
                );
                $row['header_post']=$header_post;

                }
           } else {
            $row['header_post']= array(
                'msg' => 'no posts',
                'success' => 0, 
            );
           }

         $set['234WM_API_V1']  = $row;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }
    /**
     * Single items apis
     *
     */

    public function SinglePost()
    {

        $posts_url = 'https://api.234WMfashion.com/public/backend/cdn/post/';
        $profile_image_url = 'https://api.234WMfashion.com/public/backend/cdn/users/';
        /* media url header ends here */

        if (isset($_GET['post_id'])) {
            $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_STRING);
            $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);

        $post = Post::where('id', $post_id)->first();
        
        if ($post) {
        $liked = Like::where('post_id', $post->id)->where('user_id', $user_id)->first();

        $following = Follower::where('user_id', $user_id)->where('following_id', $post->user_id)->first();
         if ($liked) {
            
            $is_liked = 1;
         } else {
             $is_liked = 0;
         }

         if ($following) {
             $is_following = 1;
         } else {
             $is_following =0;
         }
         
                $post_img = Media::where('id', '=', $post->post_media_id)->first();
                
                if ($post->is_store == 1) {
                    $post_user = Shop::where('user_id', '=', $post->user_id)->first();                
                    $user_name = $post_user->shop_name;
                    if ($post_user->has_logo == 1) {
                        $user_img = Media::where('media_store_id', '=', $post_user->id)->where('media_type', '=', 'logo')->first();
       
                        $profile_image= $user_img->media_slug;
                    } else {
                        $profile_image = null;
                    }

                    $is_store = 1;
                     
                } else {
                    $post_user = User::where('id', '=', $post->user_id)->first();                
                   $user_name = $post_user->first_name;
                    if ($post_user->user_image_id) {
                        $user_img = Media::where('id', '=', $post_user->user_image_id)->first();  
       
                        $profile_image= $user_img->media_slug;
                    } else {
                        $profile_image = null;
                    }

                    $is_store = 0;
                }
                


                $post_hashtag = PostHashtag::where('id', '=', $post->post_hashtag_id)->first(); 
               
                $date = Carbon::parse($post->created_at); // now date is a carbon instance

            
                
                $header_post[] = array(
                    'post_id' => $post->id,
                    'user_id' => $post->user_id,
                    'post_contest_id' => $post->post_contest_id,
                    'post_name' => $post->post_title,
                    'post_username' => $user_name,
                    'post_caption' => $post->post_des,
                    'post_likes' => $post->post_likes,
                    'is_liked' => $is_liked,
                    'is_following' => $is_following,
                    'is_store' => $is_store,
                    'post_image' => $posts_url.$post_img->media_slug,
                    'post_user_image' => $profile_image_url.$profile_image,
                    'created_at' => $date->diffForHumans(),
                );
                $response=$header_post;

                }else {
                    $response[]= array(
                        'msg' => 'post not found',
                        'success' => 0, 
                    );
           } 
           }else{
            $response[]= array(
                'msg' => 'post not found',
                'success' => 0, 
            );
           }

         $set['234WM_API_V1']  = $response;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }
    public function SinglePostOffers()
    {

        // $posts_image_url = 'https://api.234WMfashion.com/public/backend/cdn/post/';
        $store_logo_url = 'https://api.234WMfashion.com/public/backend/cdn/users/';
        /* media url header ends here */

        if (isset($_GET['post_id'])) {
            $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_STRING);

        $post = Post::where('id', $post_id)->first();

        $offers = DB::table("post_packages")
        ->where('post_packages.post_id', '=', $post->id)
        ->orderBy('post_packages.id', 'desc')->get()->take(4);

        if (!$offers->isEmpty()) {
            foreach ($offers as $offer ) {
                $shop = Shop::where('id', '=', $offer->store_id)->first();
                $shop_logo = Media::where('media_store_id', '=', $shop->id)->where('media_type', '=', 'logo')->first();
                
                if ($shop_logo) {
                    $shop_image = $store_logo_url.$shop_logo->media_slug;
                } else {
                    $shop_image = null;
                }

                if ($shop->feature_type > 0) {
                    $is_featured = 1;
                } else {
                    $is_featured = 0;
                }
                
                
                $header_offers[] = array(
                    'offer_id' => $offer->id,
                    'store_id' => $offer->store_id,
                    'store_name' => $shop->shop_name,
                    'store_logo' => $shop_image,
                    'offer_amount' => $offer->offer_amount,
                    'offer_featured' => $is_featured,
                    'offer_duration' => 'Made and delivered in '.$offer->offer_duration.' days',
                    
                   
                );
                $row['header_offers']=$header_offers;

                }
        } else {
            $row['header_offers']= array(
                'msg' => 'No offers available', 
                'success' => 0, 
            );
        }

        
           }else{
            $row[]= array(
                'msg' => 'post not found',
                'success' => 0, 
            );
           }

         $set['234WM_API_V1']  = $row;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }

    public function UsersRelatedPosts()
    {

        $posts_url = 'https://api.234WMfashion.com/public/backend/cdn/post/';
        $profile_image_url = 'https://api.234WMfashion.com/public/backend/cdn/users/';
        /* media url header ends here */

        if (isset($_GET['post_id'])) {
            $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_STRING);

        $post = Post::where('id', $post_id)->first();
        $post_user = User::where('id', '=', $post->user_id)->first();                

        if ($post) {
          
            $posts = DB::table("posts")
            ->where('posts.user_id', '=', $post->user_id)->where('posts.id', '!=', $post->id)
            ->orderBy('posts.id', 'desc')->get()->take(6);
    
            if (!$posts->isEmpty()) {
                foreach ($posts as $post ) {
                    $post_img = Media::where('id', '=', $post->post_media_id)->first();
                    $post_hashtag = PostHashtag::where('id', '=', $post->post_hashtag_id)->first(); 
                    if ($post_user->user_image_id) {
                        $user_img = Media::where('id', '=', $post_user->user_image_id)->first();  
       
                        $profile_image= $user_img->media_slug;
                    } else {
                        $profile_image = null;
                    }
                     
                                 
                    if ($post_hashtag) {
                        $hashtag = $post_hashtag->hashtag_name;
                    }else{
                        $hashtag = null;
                    }
                    if ($post_hashtag) {
                        $hashtag = $post_hashtag->hashtag_name;
                    }else{
                        $hashtag = null;
                    }
                    
                    $header_post[] = array(
                        'post_id' => $post->id,
                        'user_id' => $post->user_id,
                        'post_contest_id' => $post->post_contest_id,
                        'post_name' => $post->post_title,
                        'post_username' => $post_user->first_name,
                        'post_des' => $post->post_des,
                        'post_likes' => $post->post_likes,
                        'post_image' => $posts_url.$post_img->media_slug,
                        'post_user_image' => $profile_image_url.$profile_image,
                    );
                    $row['header_post']=$header_post;
    
                    }
            } else {
                $row['header_post']= array(
                    'msg' => 'No more posts from '.$post_user->first_name, 
                    'success' => 0, 
                );
            }

               /* related products */

               $str = $post->post_title;
                $strarray = (explode(" ",$str));
                Foreach($strarray as $key=>$value){
                If($key > 0){
                    $products = Product::where('product_name','LIKE','%'.$value.'%')->orWhere('product_des','LIKE','%'.$value.'%')->get()->take(6);
                }
                $products = Product::where('product_name','LIKE','%'.$value.'%')->orWhere('product_des','LIKE','%'.$value.'%')->get()->take(6);
            }
               
       
               if (!$products->isEmpty()) {
            foreach ($products as $products ) {
                $product_img = Media::where('id', '=', $product->main_media_id)->first();
                $product_store = Shop::where('id', '=', $product->store_id)->first();
                if ($product->product_type == 0) {
                    $type = 'trending';
                } elseif($product->product_type == 1) {
                    $type = 'Custom Made';
                }else{
                    $type = 'trending';
                }
                
                
                $related_product[] = array(
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'product_des' => $product->product_des,
                    'product_price' => $product->regular_price,
                    'product_sale' => $product->sale_price,
                    'product_type' => $type,
                    'product_editors_pick' => $product->editors_pick,
                    'product_main_img' => $product_url.$product_img->media_slug,
                    'store_name' => $product_store->shop_name,
                   
                );
                $row['related_product']=$related_product;

                }
           } else {
            $row['related_product']= array(
                'msg' => 'no related products',
                'success' => 0, 
            );
           }


      



               
           }else{
            $row[]= array(
                'msg' => 'post not found'
            );
           }
        }else{
            $row[]= array(
                'msg' => 'post not found'
            );
           }
        
                 $set['234WM_API_V1']  = $row;
                echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                die();
    }

    /**
     * used for categories feed
     *
     * 
     * 
     */

    public function CategoriesFeed()
    {

        $services_image_url = 'https://api.234WMfashion.com/public/backend/cdn/services/';
        $category_image_url = 'https://api.234WMfashion.com/public/backend/cdn/category/';
        /* media url header ends here */


        /* services */

        $servicecats = TopService::get();

        if (!$servicecats->isEmpty()) {
            foreach ($servicecats as $service ) {
                $service_cat_media = Media::where('id', '=', $service->service_media_id)->first();
                
                if ($service->id == 1) {
                 $count_text =   "100+ Tuts";
                } elseif($service->id == 2) {
                   $count_text =   "50+ Salons";
                }elseif($service->id == 2){
                    $count_text =  "23+ Providers";
                }
                
                $header_servicecat[] = array(
                    'service_id' => $service->id,
                    'service_name' => $service->service_name,
                    'service_image' => $services_image_url.$service_cat_media->media_slug,
                    'service_count' =>  $count_text,
                );
                $row['header_servicecat']=$header_servicecat;

                }
        }else{
        
                $row['header_servicecat']= array(
                    'msg' => 'No Top services', 
                    'success' => 0, 
                );
       
        } 

        /* women fashion */
            $womencats = SubCategory::where('category_id', 1)->get()->take(6);
            
            if (!$womencats->isEmpty()) {
                foreach ($womencats as $women_cat ) {
                    $women_cat_img = Media::where('id', '=', $women_cat->sub_category_media_id)->first();
                    
                    $header_womencat[] = array(
                        'subcategory_id' => $women_cat->id,
                        'subcategory_name' => $women_cat->sub_category_name,
                        'subcategory_image' => $category_image_url.$women_cat_img->media_slug,
                    );
                    $row['header_womencat']=$header_womencat;
    
                    }
            } else {
                $row['header_womencat']= array(
                    'msg' => 'No Categories in this section', 
                    'success' => 0, 
                );
            }
        /* men fashion */
            $mencats = SubCategory::where('category_id', 2)->get()->take(6);
            
            if (!$mencats->isEmpty()) {
                foreach ($mencats as $men_cat ) {
                    $men_cat_img = Media::where('id', '=', $men_cat->sub_category_media_id)->first();
                    
                    $header_mencat[] = array(
                        'subcategory_id' => $men_cat->id,
                        'subcategory_name' => $men_cat->sub_category_name,
                        'subcategory_image' => $category_image_url.$men_cat_img->media_slug,
                    );
                    $row['header_mencat']=$header_mencat;
    
                    }
            } else {
                $row['header_mencat']= array(
                    'msg' => 'No Categories in this section', 
                    'success' => 0, 
                );
            }
        /* kids fashion */
            $kidcats = SubCategory::where('category_id', 3)->get()->take(6);
            
            if (!$kidcats->isEmpty()) {
                foreach ($kidcats as $kids_cat ) {
                    $kids_cat_img = Media::where('id', '=', $kids_cat->sub_category_media_id)->first();
                    
                    $header_kidscat[] = array(
                        'subcategory_id' => $kids_cat->id,
                        'subcategory_name' => $kids_cat->sub_category_name,
                        'subcategory_image' => $category_image_url.$kids_cat_img->media_slug,
                    );
                    $row['header_kidscat']=$header_kidscat;
    
                    }
            } else {
                $row['header_kidscat']= array(
                    'msg' => 'No Categories in this section', 
                    'success' => 0, 
                );
            }

             
        
                 $set['234WM_API_V1']  = $row;
                echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                die();
    }
    public function subcategoryfeed()
    {
        $category_image_url = 'https://api.234WMfashion.com/public/backend/cdn/category/';
        $product_url = 'https://api.234WMfashion.com/public/backend/cdn/products/';
        $store_url = 'https://api.234WMfashion.com/public/backend/cdn/stores/';
        $sub_id = filter_input(INPUT_GET, 'sub_id', FILTER_SANITIZE_STRING);

            
        $products = DB::table("products")
        ->where('status', '=', 3)->where('products.sub_category_id', '=', $sub_id)
        ->orderBy('products.views', 'desc')->get()->take(6);

        if (!$products->isEmpty()) {
            foreach ($products as $top ) {
                $product_img = Media::where('id', '=', $top->main_media_id)->first();
                $product_store = Shop::where('id', '=', $top->store_id)->first();
                if ($top->product_type == 0) {
                    $type = 'trending';
                } elseif($top->product_type == 1) {
                    $type = 'Custom Made';
                }else{
                    $type = 'trending';
                }
                
                
                $top_items[] = array(
                    'product_id' => $top->id,
                    'product_name' => $top->product_name,
                    'product_des' => $top->product_des,
                    'product_price' => $top->regular_price,
                    'product_sale' => $top->sale_price,
                    'product_type' => $type,
                    'product_editors_pick' => $top->editors_pick,
                    'product_main_img' => $product_url.$product_img->media_slug,
                    'store_name' => $product_store->shop_name,
                   
                );
                $row =$top_items;

                }
           } else {
            $row= array(
                'msg' => 'no top products',
                'success' => 0, 
            );
           }

     
        $set['234WM_API_V1']  = $row;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();

    }

    /* single product */
    public function SingleProduct()
    {
        $product_image_url = 'https://api.234WMfashion.com/public/backend/cdn/products/';
        $store_image_url = 'https://api.234WMfashion.com/public/backend/cdn/stores/';
        $product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_STRING);

        $product = Product::where('id', '=', $product_id)->first();
        if ($product) {

            $product_imgs = Media::where('media_product_id', '=', $product_id)->get();
            $store = Shop::where('id', '=', $product->store_id)->first();
            $shop_logo = Media::where('media_store_id', '=', $store->id)->where('media_type', '=', 'logo')->first();

            // dd($product_imgs);
            if (!$product_imgs->isEmpty()) {
                foreach ($product_imgs as $media ) {
                    $product_media[] = array(
                        'product_id' => $media->media_product_id,
                        'media_id' => $media->id,
                        'product_img' => $product_image_url.$media->media_slug,                       
                    );
                    $row['product_media'] =$product_media;
                   
                    }
               } else {
                $row= array(
                    'msg' => 'no product medias',
                    'success' => 0, 
                );
               }

            //    product details
     
            if ($product->product_type == 0) {
                $type = 'trending';
            } elseif($product->product_type == 1) {
                $type = 'Custom Made';
            }else{
                $type = 'trending';
            }
            
            
            $product_items[] = array(
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'product_des' => $product->product_des,
                'product_price' => $product->regular_price,
                'product_sale' => $product->sale_price,
                'product_type' => $type,
                'product_size_s' => $product->size_s,
                'product_size_m' => $product->size_m,
                'product_size_l' => $product->size_l,
                'product_size_xl' => $product->size_xl,
                'product_size_xxl' => $product->size_xxl,
                'product_editors_pick' => $product->editors_pick,               
            );
            $row['product_details'] =$product_items;
        } else {
            $row= array(
                'msg' => 'Product Not found',
                'success' => 0, 
            );
           }
            
            
        //    product store

         
        $store_detail[] = array(
            'store_id' => $store->id,
            'store_name' => $store->shop_name,
            'store_state' => $store->store_state,
            'store_logo' => $store_image_url.$shop_logo->media_slug,
           
           
        );
        $row['store_details'] =$store_detail;

        $set['234WM_API_V1']  = $row;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();

    }

    /* related and more store products */

    public function relatedProducts()
    {
        $product_image_url = 'https://api.234WMfashion.com/public/backend/cdn/products/';
        $product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_STRING);
        $store_id = filter_input(INPUT_GET, 'store_id', FILTER_SANITIZE_STRING);

        $product = Product::where('id', '=', $product_id)->first();
        $shop = Shop::where('id', '=', $store_id)->first();

        $store_products = Product::where('store_id', '=', $shop->id)->where('status', '=', 3)->get()->take(6);
        if (!$store_products->isEmpty()) {
            foreach ($store_products as $product ) {
                $product_img = Media::where('id', '=', $product->main_media_id)->first();
                $product_store = Shop::where('id', '=', $product->store_id)->first();
                if ($product->product_type == 0) {
                    $type = 'trending';
                } elseif($product->product_type == 1) {
                    $type = 'Custom Made';
                }else{
                    $type = 'trending';
                }
                
                
                $shop_items[] = array(
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'product_des' => $product->product_des,
                    'product_price' => $product->regular_price,
                    'product_sale' => $product->sale_price,
                    'product_type' => $type,
                    'product_editors_pick' => $product->editors_pick,
                    'product_main_img' => $product_image_url.$product_img->media_slug,
                    'store_name' => $product_store->shop_name,
                   
                );
                $row['product_shop_items']=$shop_items;

                }
           } else {
            $row['product_shop_items']= array(
                'msg' => 'no more items in this store',
                'success' => 0, 
            );
           }

        $related_product = DB::table("products")
        ->where('status', '=', 3)->where('sub_category_id', '=', $product->sub_category_id )
        ->orderBy('products.id', 'desc')->get()->take(15);
        if (!$related_product->isEmpty()) {
            foreach ($related_product as $latest ) {
                $product_img = Media::where('id', '=', $latest->main_media_id)->first();
                $product_store = Shop::where('id', '=', $latest->store_id)->first();
                if ($latest->product_type == 0) {
                    $type = 'trending';
                } elseif($latest->product_type == 1) {
                    $type = 'Custom Made';
                }else{
                    $type = 'trending';
                }
                
                
                $related_items[] = array(
                    'product_id' => $latest->id,
                    'product_name' => $latest->product_name,
                    'product_des' => $latest->product_des,
                    'product_price' => $latest->regular_price,
                    'product_sale' => $latest->sale_price,
                    'product_type' => $type,
                    'product_editors_pick' => $latest->editors_pick,
                    'product_main_img' => $product_image_url.$product_img->media_slug,
                    'store_name' => $product_store->shop_name,
                   
                );
                $row['related_items']=$related_items;

                }
           } else {
            $row['related_items']= array(
                'msg' => 'no latest items',
                'success' => 0, 
            );
           }
       
     
        $set['234WM_API_V1']  = $row;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }

     /**
     * Used for filters, search, single subcategory and product list
     *
     */

    public function SingleSubCategory()
    {
        $category_image_url = 'https://api.234WMfashion.com/public/backend/cdn/category/';

        $subcat_id = filter_input(INPUT_GET, 'subcat_id', FILTER_SANITIZE_STRING);

        $cats = SubCategory::where('id', $subcat_id)->get();
            
        if (!$cats->isEmpty()) {
            foreach ($cats as $cat ) {
                $cat_img = Media::where('id', '=', $cat->sub_category_media_id)->first();
                
                $header_cat[] = array(
                    'subcategory_id' => $cat->id,
                    'category_id' => $cat->category_id,
                    'subcategory_name' => $cat->sub_category_name,
                    'subcategory_image' => $category_image_url.$cat_img->media_slug,
                );
                $row['header_cat']=$header_cat;

                }
        } else {
            $row['header_cat']= array(
                'msg' => 'No Categories in this section', 
                'success' => 0, 
            );
        }

     
        $set['234WM_API_V1']  = $row;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();

    }
    /**
     * Store a all likes resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userLikedPost()
    {
        $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_STRING);
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);


        $liked = Like::create([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'like_type' => 2,
        ]);

        if ($liked) {
            $response= array(
                'msg' => 'saved to your liked list', 
                'success' => 1, 
            );
        } else {
            $response= array(
                'msg' => 'An error occured', 
                'success' => 0, 
            );
        }
        
        $set['234WM_API_V1']  = $response;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();

    }
    public function userUnLikedPost()
    {
        $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_STRING);
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);


       $destroy_like = Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
       
       $response= array(
        'msg' => 'This post has been removed from your like list', 
        'success' => 1, 
     ); 
        
        $set['234WM_API_V1']  = $response;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();

    }

    /**
     * Store following  resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userClicksFollowing()
    {
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);
        $following_id = filter_input(INPUT_GET, 'following_id', FILTER_SANITIZE_STRING);
        $is_store = filter_input(INPUT_GET, 'is_store', FILTER_SANITIZE_STRING);

        
        if ($is_store == 1) {
            $following_store = 1;
            $following_user = 0;
            $follow_data = Shop::where('id', $following_id)->first(); 
            $follow_name = $follow_data->shop_name;
            $is_following = Follower::where('user_id', $user_id)->where('following_id', $following_id)->where('is_store', 1)->first();
        } else {
            $following_user = 1;
            $following_store = 0;
            $follow_data = User::where('id', $following_id)->first(); 
            $follow_name = $follow_data->first_name;
            $is_following = Follower::where('user_id', $user_id)->where('following_id', $following_id)->where('is_store', 0)->first();

      }
      
       if ($is_following) {
        $response= array(
            'msg' => 'You are alredy following ' .$follow_name, 
            'success' => 0, 
        );
       } else {
        $following = Follower::create([
            'user_id' => $user_id,
            'following_id' => $following_id,
            'is_store' => $following_store ,
            'is_user' => $following_user ,
        ]);

        if ($following) {
            $response= array(
                'msg' => 'You are now following ' .$follow_name, 
                'success' => 1, 
            );
        } else {
            $response= array(
                'msg' => 'An error occured', 
                'success' => 0, 
            );
        }
       }
       
        
        $set['234WM_API_V1']  = $response;
        echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();

    }
    public function userUnfollow()
    {
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);
        $following_id = filter_input(INPUT_GET, 'following_id', FILTER_SANITIZE_STRING);
        $is_store = filter_input(INPUT_GET, 'is_store', FILTER_SANITIZE_STRING);

        
        if ($is_store == 1) {
            $follow_data = Shop::where('id', $following_id)->first(); 
            $follow_name = $follow_data->shop_name;
            $following_store = 1;
            $following_user = 0;
            $is_following = Follower::where('user_id', $user_id)->where('following_id', $following_id)->where('is_store', 1)->delete();
        } else {
            $following_user = 1;
            $following_store = 0;
            $follow_data = User::where('id', $following_id)->first(); 
            $follow_name = $follow_data->first_name;
            $is_following = Follower::where('user_id', $user_id)->where('following_id', $following_id)->where('is_store', 0)->delete();

      }
      
      $response= array(
        'msg' => "You've unfollowed ".$follow_name, 
        'success' => 1, 
    );
       
        
        $set['234WM_API_V1']  = $response;
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
