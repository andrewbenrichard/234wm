<?php

// use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix'=> 'auth','namespace' => 'API'], function(){

        Route::post('signin', 'Auth\LoginController@Login')->middleware('Cors');
        Route::get('forgotpass/{email?}', 'Auth\LoginController@ForgotPass')->middleware('Cors');

        Route::post('join', 'Auth\RegisterController@RegisterCustomer')->middleware('Cors');

        Route::get('signin/{email?}/{password?}', 'Auth\LoginController@Login')->middleware('Cors');
        Route::get('join/{full_name?}/{email?}/{password?}/{number?}', 'Auth\RegisterController@RegisterCustomer')->middleware('Cors');

        Route::post('signout', 'Auth\LogoutController')->middleware('Cors');
        Route::get('me', 'Auth\MeController')->middleware('Cors');
});
Route::group(['prefix'=> 'sc_admin','namespace' => 'API'], function(){
        /* chef */
        Route::get('chef', 'ApiController@chef')->middleware('Cors');
        Route::post('post/chef', 'ApiController@ChefStore')->middleware('Cors');
        Route::get('tester', 'Auth\LoginController@tester')->middleware('Cors');
        /* category */
        Route::get('categories', 'ApiController@adminCategories')->middleware('Cors');
        Route::get('single/project/{slug}', 'ApiController@singleProject')->middleware('Cors');
        Route::post('post/category', 'ApiController@CategoryStore')->middleware('Cors');
        Route::delete('delete/project/{id}', 'ApiController@ProjectDelete')->middleware('Cors');

        /* Testimonial */
        Route::get('testimonials', 'ApiController@adminTestimonial')->middleware('Cors');
        Route::get('single/testimonial/{slug}', 'ApiController@singleTestimonial')->middleware('Cors');
        Route::post('post/testimonial', 'ApiController@TestimonialStore')->middleware('Cors');
        Route::delete('delete/testimonial/{id}', 'ApiController@TestimonialDelete')->middleware('Cors');

        /* delivery */
        Route::get('deliveries', 'ApiController@adminDeliveries')->middleware('Cors');
        Route::get('single/project/{slug}', 'ApiController@singleProject')->middleware('Cors');
        Route::post('post/delivery_type', 'ApiController@DeliveryStore')->middleware('Cors');
        Route::delete('delete/project/{id}', 'ApiController@ProjectDelete')->middleware('Cors');
        /* meals */
        Route::get('meals', 'ApiController@adminMeals')->middleware('Cors');
        Route::get('single/meal/{slug}', 'ApiController@singleMeal')->middleware('Cors');
        Route::post('post/meal', 'ApiController@MealStore')->middleware('Cors');
        Route::delete('delete/meal/{id}', 'ApiController@MealDelete')->middleware('Cors');
        /* donaion */
        Route::post('post/donation', 'ApiController@saveDonation')->middleware('Cors');
        Route::get('donations', 'ApiController@donations')->middleware('Cors');
        Route::delete('delete/donation/{id}', 'ApiController@DonateDelete')->middleware('Cors');
        /* articles */
        Route::get('articles', 'ApiController@articles')->middleware('Cors');
        Route::get('single/article/{slug}', 'ApiController@singleArticle')->middleware('Cors');
        Route::post('post/article', 'ApiController@ArticleStore')->middleware('Cors');
        Route::delete('delete/article/{id}', 'ApiController@ArticleDelete')->middleware('Cors');
        /* gallery */
        Route::get('galleries', 'ApiController@galleries')->middleware('Cors');
        Route::delete('delete/gallery/{id}', 'ApiController@GalleryDelete')->middleware('Cors');
        Route::post('post/gallery', 'ApiController@GalleryStore')->middleware('Cors');
       
});
/* 

for front end side

*/
Route::group(['prefix'=> 'sc_front','namespace' => 'API'], function(){
      Route::group(['prefix' => 'api_v1'], function(){

          /* Home APi */
          Route::get('home_feeds', 'ApiController@AppHomeFeed')->middleware('Cors');
          Route::get('schedules_feeds', 'ApiController@getSchedules')->middleware('Cors');
          Route::get('check/subscription/{user_id?}', 'ApiController@checkSubscription')->middleware('Cors');
          Route::get('save/subscription/{user_id?}/{plan_id?}/{plan_code?}/{plan_amount?}/{payment_ref?}', 'ApiController@saveSubscription')->middleware('Cors');
          Route::get('save/address/{user_id?}/{address?}/{city?}/{state?}', 'ApiController@saveAddress')->middleware('Cors');
          Route::get('save/address/plan/{user_id?}/{address?}/{city?}/{state?}', 'ApiController@saveAddressPlan')->middleware('Cors');
          Route::get('get/address/{user_id?}', 'ApiController@getAddress')->middleware('Cors');
          Route::get('get/subscription/feed', 'ApiController@getPlan')->middleware('Cors');
          Route::post('schedule/pickup', 'ApiController@StoreSchedule')->middleware('Cors');
          Route::post('schedule/subscription', 'ApiController@StoreSubscriptionSchedule')->middleware('Cors');

          
          /* category feed */
          Route::get('home_category_feeds', 'ApiController@CategoriesFeed')->middleware('Cors');
          Route::get('category/single/{cat_id?}', 'ApiController@SingleCategory')->middleware('Cors');
          Route::get('subcategory/single/{sub_id?}', 'ApiController@subcategoryfeed')->middleware('Cors');
          /* single post */
          Route::get('post/{post_id?}/{user_id?}', 'ApiController@SinglePost')->middleware('Cors');
          Route::get('post/more/users/{post_id?}', 'ApiController@UsersRelatedPosts')->middleware('Cors');
          Route::get('post/stores/offers/{post_id?}', 'ApiController@SinglePostOffers')->middleware('Cors');
          Route::get('post/likes/make_like/{post_id?}/{user_id?}', 'ApiController@userLikedPost')->middleware('Cors');
          Route::get('post/likes/dis_like/{post_id?}/{user_id?}', 'ApiController@userUnLikedPost')->middleware('Cors');
          
          /* following */
          Route::get('follow/{user_id?}/{following_id?}/{is_store?}', 'ApiController@userClicksFollowing')->middleware('Cors');
          Route::get('unfollow/{user_id?}/{following_id?}/{is_store?}', 'ApiController@userUnfollow')->middleware('Cors');
          /* store */
          Route::get('store/{user_id?}', 'ApiController@myStore')->middleware('Cors');
          Route::post('store/activate', 'ApiController@activateStore')->middleware('Cors');
          Route::get('articles_mini', 'ApiController@FrontArticlesMini')->middleware('Cors');
          Route::get('testimonials', 'ApiController@frontTestimonials')->middleware('Cors');
          /* full ecommerce call apis */
          Route::get('product/{product_id?}', 'ApiController@SingleProduct')->middleware('Cors');
          Route::get('related_product/{product_id?}/{store_id?}', 'ApiController@relatedProducts')->middleware('Cors');
          //   TODO CHECKOUT, CART FILTER AND SORT, SEARCH, FAVORITES, CHECKOUT ADDRESS
          Route::get('add_cart/{product_id?}/{user_id?}', 'ApiController@SingleProduct')->middleware('Cors');
          Route::get('checkout_address/{user_id?}', 'ApiController@SingleProduct')->middleware('Cors');
       
      });
       
});
// Route::apiResources(['user' => 'API\UserController']);
