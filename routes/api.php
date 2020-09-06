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

        Route::post('signin', 'Auth\LoginController@Login')->middleware('cors');
        Route::get('forgotpass/{email?}', 'Auth\LoginController@ForgotPass')->middleware('cors');

        Route::post('join', 'Auth\RegisterController@RegisterCustomer')->middleware('cors');

        Route::get('signin/{email?}/{password?}', 'Auth\LoginController@Login')->middleware('cors');
        Route::get('join/{full_name?}/{email?}/{password?}/{number?}', 'Auth\RegisterController@RegisterCustomer')->middleware('cors');

        Route::post('signout', 'Auth\LogoutController')->middleware('cors');
        Route::get('me', 'Auth\MeController')->middleware('cors');
});
Route::group(['prefix'=> 'sc_admin','namespace' => 'API'], function(){
        /* chef */
        Route::get('chef', 'ApiController@chef')->middleware('cors');
        Route::post('post/chef', 'ApiController@ChefStore')->middleware('cors');
        Route::get('tester', 'Auth\LoginController@tester')->middleware('cors');
        /* category */
        Route::get('categories', 'ApiController@adminCategories')->middleware('cors');
        Route::get('single/project/{slug}', 'ApiController@singleProject')->middleware('cors');
        Route::post('post/category', 'ApiController@CategoryStore')->middleware('cors');
        Route::delete('delete/project/{id}', 'ApiController@ProjectDelete')->middleware('cors');

        /* Testimonial */
        Route::get('testimonials', 'ApiController@adminTestimonial')->middleware('cors');
        Route::get('single/testimonial/{slug}', 'ApiController@singleTestimonial')->middleware('cors');
        Route::post('post/testimonial', 'ApiController@TestimonialStore')->middleware('cors');
        Route::delete('delete/testimonial/{id}', 'ApiController@TestimonialDelete')->middleware('cors');

        /* delivery */
        Route::get('deliveries', 'ApiController@adminDeliveries')->middleware('cors');
        Route::get('single/project/{slug}', 'ApiController@singleProject')->middleware('cors');
        Route::post('post/delivery_type', 'ApiController@DeliveryStore')->middleware('cors');
        Route::delete('delete/project/{id}', 'ApiController@ProjectDelete')->middleware('cors');
        /* meals */
        Route::get('meals', 'ApiController@adminMeals')->middleware('cors');
        Route::get('single/meal/{slug}', 'ApiController@singleMeal')->middleware('cors');
        Route::post('post/meal', 'ApiController@MealStore')->middleware('cors');
        Route::delete('delete/meal/{id}', 'ApiController@MealDelete')->middleware('cors');
        /* donaion */
        Route::post('post/donation', 'ApiController@saveDonation')->middleware('cors');
        Route::get('donations', 'ApiController@donations')->middleware('cors');
        Route::delete('delete/donation/{id}', 'ApiController@DonateDelete')->middleware('cors');
        /* articles */
        Route::get('articles', 'ApiController@articles')->middleware('cors');
        Route::get('single/article/{slug}', 'ApiController@singleArticle')->middleware('cors');
        Route::post('post/article', 'ApiController@ArticleStore')->middleware('cors');
        Route::delete('delete/article/{id}', 'ApiController@ArticleDelete')->middleware('cors');
        /* gallery */
        Route::get('galleries', 'ApiController@galleries')->middleware('cors');
        Route::delete('delete/gallery/{id}', 'ApiController@GalleryDelete')->middleware('cors');
        Route::post('post/gallery', 'ApiController@GalleryStore')->middleware('cors');
       
});
/* 

for front end side

*/
Route::group(['prefix'=> 'sc_front','namespace' => 'API'], function(){
      Route::group(['prefix' => 'api_v1'], function(){

          /* Home APi */
          Route::get('home_feeds', 'ApiController@AppHomeFeed')->middleware('cors');
          Route::get('schedules_feeds', 'ApiController@getSchedules')->middleware('cors');
          Route::get('check/subscription/{user_id?}', 'ApiController@checkSubscription')->middleware('cors');
          Route::get('save/subscription/{user_id?}/{plan_id?}/{plan_code?}/{plan_amount?}/{payment_ref?}', 'ApiController@saveSubscription')->middleware('cors');
          Route::get('save/address/{user_id?}/{address?}/{city?}/{state?}', 'ApiController@saveAddress')->middleware('cors');
          Route::get('save/address/plan/{user_id?}/{address?}/{city?}/{state?}', 'ApiController@saveAddressPlan')->middleware('cors');
          Route::get('get/address/{user_id?}', 'ApiController@getAddress')->middleware('cors');
          Route::get('get/subscription/feed', 'ApiController@getPlan')->middleware('cors');
          Route::post('schedule/pickup', 'ApiController@StoreSchedule')->middleware('cors');
          Route::post('schedule/subscription', 'ApiController@StoreSubscriptionSchedule')->middleware('cors');

          
          /* category feed */
          Route::get('home_category_feeds', 'ApiController@CategoriesFeed')->middleware('cors');
          Route::get('category/single/{cat_id?}', 'ApiController@SingleCategory')->middleware('cors');
          Route::get('subcategory/single/{sub_id?}', 'ApiController@subcategoryfeed')->middleware('cors');
          /* single post */
          Route::get('post/{post_id?}/{user_id?}', 'ApiController@SinglePost')->middleware('cors');
          Route::get('post/more/users/{post_id?}', 'ApiController@UsersRelatedPosts')->middleware('cors');
          Route::get('post/stores/offers/{post_id?}', 'ApiController@SinglePostOffers')->middleware('cors');
          Route::get('post/likes/make_like/{post_id?}/{user_id?}', 'ApiController@userLikedPost')->middleware('cors');
          Route::get('post/likes/dis_like/{post_id?}/{user_id?}', 'ApiController@userUnLikedPost')->middleware('cors');
          
          /* following */
          Route::get('follow/{user_id?}/{following_id?}/{is_store?}', 'ApiController@userClicksFollowing')->middleware('cors');
          Route::get('unfollow/{user_id?}/{following_id?}/{is_store?}', 'ApiController@userUnfollow')->middleware('cors');
          /* store */
          Route::get('store/{user_id?}', 'ApiController@myStore')->middleware('cors');
          Route::post('store/activate', 'ApiController@activateStore')->middleware('cors');
          Route::get('articles_mini', 'ApiController@FrontArticlesMini')->middleware('cors');
          Route::get('testimonials', 'ApiController@frontTestimonials')->middleware('cors');
          /* full ecommerce call apis */
          Route::get('product/{product_id?}', 'ApiController@SingleProduct')->middleware('cors');
          Route::get('related_product/{product_id?}/{store_id?}', 'ApiController@relatedProducts')->middleware('cors');
          //   TODO CHECKOUT, CART FILTER AND SORT, SEARCH, FAVORITES, CHECKOUT ADDRESS
          Route::get('add_cart/{product_id?}/{user_id?}', 'ApiController@SingleProduct')->middleware('cors');
          Route::get('checkout_address/{user_id?}', 'ApiController@SingleProduct')->middleware('cors');
       
      });
       
});
// Route::apiResources(['user' => 'API\UserController']);
