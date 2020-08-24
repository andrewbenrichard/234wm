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

        Route::post('signin', 'Auth\LoginController@Login');
        Route::get('forgotpass/{email?}', 'Auth\LoginController@ForgotPass');

        Route::post('join', 'Auth\RegisterController@RegisterCustomer');

        Route::get('signin/{email?}/{password?}', 'Auth\LoginController@Login');
        Route::get('join/{full_name?}/{email?}/{password?}/{number?}', 'Auth\RegisterController@RegisterCustomer');

        Route::post('signout', 'Auth\LogoutController');
        Route::get('me', 'Auth\MeController');
});
Route::group(['prefix'=> 'sc_admin','namespace' => 'API'], function(){
        /* chef */
        Route::get('chef', 'ApiController@chef');
        Route::post('post/chef', 'ApiController@ChefStore');
        Route::get('tester', 'Auth\LoginController@tester');
        /* category */
        Route::get('categories', 'ApiController@adminCategories');
        Route::get('single/project/{slug}', 'ApiController@singleProject');
        Route::post('post/category', 'ApiController@CategoryStore');
        Route::delete('delete/project/{id}', 'ApiController@ProjectDelete');

        /* Testimonial */
        Route::get('testimonials', 'ApiController@adminTestimonial');
        Route::get('single/testimonial/{slug}', 'ApiController@singleTestimonial');
        Route::post('post/testimonial', 'ApiController@TestimonialStore');
        Route::delete('delete/testimonial/{id}', 'ApiController@TestimonialDelete');

        /* delivery */
        Route::get('deliveries', 'ApiController@adminDeliveries');
        Route::get('single/project/{slug}', 'ApiController@singleProject');
        Route::post('post/delivery_type', 'ApiController@DeliveryStore');
        Route::delete('delete/project/{id}', 'ApiController@ProjectDelete');
        /* meals */
        Route::get('meals', 'ApiController@adminMeals');
        Route::get('single/meal/{slug}', 'ApiController@singleMeal');
        Route::post('post/meal', 'ApiController@MealStore');
        Route::delete('delete/meal/{id}', 'ApiController@MealDelete');
        /* donaion */
        Route::post('post/donation', 'ApiController@saveDonation');
        Route::get('donations', 'ApiController@donations');
        Route::delete('delete/donation/{id}', 'ApiController@DonateDelete');
        /* articles */
        Route::get('articles', 'ApiController@articles');
        Route::get('single/article/{slug}', 'ApiController@singleArticle');
        Route::post('post/article', 'ApiController@ArticleStore');
        Route::delete('delete/article/{id}', 'ApiController@ArticleDelete');
        /* gallery */
        Route::get('galleries', 'ApiController@galleries');
        Route::delete('delete/gallery/{id}', 'ApiController@GalleryDelete');
        Route::post('post/gallery', 'ApiController@GalleryStore');
       
});
/* 

for front end side

*/
Route::group(['prefix'=> 'sc_front','namespace' => 'API'], function(){
      Route::group(['prefix' => 'api_v1'], function(){

          /* Home APi */
          Route::get('home_feeds', 'ApiController@AppHomeFeed');
          Route::get('schedules_feeds', 'ApiController@getSchedules');
          Route::get('check/subscription', 'ApiController@checkSubscription');
          Route::post('schedule/pickup', 'ApiController@StoreSchedule');
          Route::post('schedule/subscription', 'ApiController@StoreSubscriptionSchedule');

          
          /* category feed */
          Route::get('home_category_feeds', 'ApiController@CategoriesFeed');
          Route::get('category/single/{cat_id?}', 'ApiController@SingleCategory');
          Route::get('subcategory/single/{sub_id?}', 'ApiController@subcategoryfeed');
          /* single post */
          Route::get('post/{post_id?}/{user_id?}', 'ApiController@SinglePost');
          Route::get('post/more/users/{post_id?}', 'ApiController@UsersRelatedPosts');
          Route::get('post/stores/offers/{post_id?}', 'ApiController@SinglePostOffers');
          Route::get('post/likes/make_like/{post_id?}/{user_id?}', 'ApiController@userLikedPost');
          Route::get('post/likes/dis_like/{post_id?}/{user_id?}', 'ApiController@userUnLikedPost');
          
          /* following */
          Route::get('follow/{user_id?}/{following_id?}/{is_store?}', 'ApiController@userClicksFollowing');
          Route::get('unfollow/{user_id?}/{following_id?}/{is_store?}', 'ApiController@userUnfollow');
          /* store */
          Route::get('store/{user_id?}', 'ApiController@myStore');
          Route::post('store/activate', 'ApiController@activateStore');
          Route::get('articles_mini', 'ApiController@FrontArticlesMini');
          Route::get('testimonials', 'ApiController@frontTestimonials');
          /* full ecommerce call apis */
          Route::get('product/{product_id?}', 'ApiController@SingleProduct');
          Route::get('related_product/{product_id?}/{store_id?}', 'ApiController@relatedProducts');
          //   TODO CHECKOUT, CART FILTER AND SORT, SEARCH, FAVORITES, CHECKOUT ADDRESS
          Route::get('add_cart/{product_id?}/{user_id?}', 'ApiController@SingleProduct');
          Route::get('checkout_address/{user_id?}', 'ApiController@SingleProduct');
       
      });
       
});
// Route::apiResources(['user' => 'API\UserController']);
