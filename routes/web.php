<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('login','AuthController@loginView')->name('loginView');
Route::post('login/phone','AuthController@login')->name('login');

Route::get('/verify/{id}','AuthController@verifyView');
Route::post('/verify','AuthController@verify')->name('verify');

Route::get('logout',function (){
    if (auth()->check())
    {
        auth()->logout();
        return redirect('/');
    }
    else
    {
        return redirect('/');

    }
});

Route::group(['namespace'=>'front' ],function (){
    Route::get('/','HomeController@index');
    Route::post('/newsletter','HomeController@newsletter')->name('newsletter');
    Route::get('aboutus','HomeController@aboutus');
    Route::get('contactus','HomeController@contactus');
    Route::get('faq','HomeController@faq');
    Route::post('/getCityByProvince','HomeController@getCityByProvince')->name('getCityByProvince');
    Route::post('/getCityByProvinceForSerach','HomeController@getCityByProvinceForSerach')->name('getCityByProvinceForSerach');
    Route::post('/getGenreByCategory','HomeController@getGenreByCategory')->name('getGenreByCategory');
    Route::post('/getSkilByCategory','HomeController@getSkilByCategory')->name('getSkilByCategory');

    Route::get('/category/{id}','HomeController@category');
    Route::get('/blogs','BlogController@blogs');
    Route::get('/blog/{id}','BlogController@single');
    Route::get('/members','MemberController@members');
    Route::get('/member/{id}','MemberController@member');
    Route::get('/member/sample/{id}','MemberController@sample');

});


Route::group(['namespace'=>'user','middleware'=>['auth:web'], 'prefix'=>'user'],function (){
    Route::get('/profile','ProfileController@index');
    Route::post('/updateProfile','ProfileController@update')->name('updateProfile');
    Route::post('/updateSkil','ProfileController@updateSkil')->name('updateSkil');
    Route::get('/skils','ProfileController@skils');
    Route::get('/contact','MessageController@contact');
    Route::get('/message/{id}','MessageController@messages');
    Route::post('/sendMessage','MessageController@sendMessage')->name('sendMessage');
    Route::post('/storeSample','SampleController@storeSample')->name('storeSample');
    Route::get('/createSample','SampleController@createSample');
    Route::get('/samples','SampleController@samples');
    Route::get('/ticket','TicketController@ticket');
    Route::get('/tickets','TicketController@tickets');
    Route::post('/storeTicket','TicketController@storeTicket')->name('storeTicket');
    Route::get('/reply/{id}','TicketController@reply');
    Route::post('/storeReply','TicketController@storeReply')->name('storeReply');

});



Route::group(['namespace'=>'admin','middleware'=>['auth:web','checkAdmin'], 'prefix'=>'admin'],function (){
    Route::get('/dashboard','DashboardController@index');
    Route::resource('category' , 'CategoryController');
    Route::get('/subcategory/{id}' , 'CategoryController@subcategory')->name('subcategory');
    Route::resource('payment' , 'PaymentController');
    Route::resource('plan' , 'PlanController');
    Route::resource('ticket' , 'TicketController');
    Route::get('ticket/reply/{id}' , 'TicketController@replyView');
    Route::post('ticket/Addreply/{id}' , 'TicketController@addReply')->name('addReply');
    Route::get('ticket/closeTicket/{id}' , 'TicketController@closeTicket');
    Route::resource('ticketCategory' , 'TicketCategoryController');
    Route::resource('general' , 'GeneralController');
    Route::resource('blog' , 'BlogController');
    Route::resource('province' , 'ProvinceController');
    Route::resource('city' , 'CityController');
    Route::resource('genre' , 'GenreController');
    Route::resource('skil' , 'SkilController');
    Route::resource('category-for-blogs' , 'CategoryForBlogController');
    Route::get('/category-for-blogs/create' , 'CategoryForBlogController@create')->name('catsForBlogs.create');
    Route::get('/category-for-blogs/edit/{id}' , 'CategoryForBlogController@edit')->name('catsForBlogs.edit');
    Route::post('/category-for-blogs/store' , 'CategoryForBlogController@store')->name('catsForBlogs.store');
    Route::post('/category-for-blogs/update/{id}' , 'CategoryForBlogController@update')->name('catsForBlogs.update');
    Route::delete('/category-for-blogs/destroy/{id}' , 'CategoryForBlogController@destroy')->name('catsForBlogs.destroy');
    Route::get('/subskil/{id}' , 'SkilController@subskil')->name('subskil');
    Route::get('/sub-category-for-blogs/{id}' , 'CategoryForBlogController@sub')->name('catsForBlogs.sub');

    Route::get('notification','NotificationController@index');
    Route::post('notification/send','NotificationController@send')->name('sendNotification');

    Route::resource('user' , 'UserController');
    Route::resource('slider' , 'SliderController');
    Route::resource('message' , 'MessageController');
    Route::resource('newsletter' , 'NewsLetterController');
    Route::resource('faq' , 'FaqController');
    Route::get('newsletterexport' , 'NewsLetterController@export');


});
