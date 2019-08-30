<?php



//Routes for frontend

Route::group(['namespace'=>'Front'],function(){


    Route::get('/','FrontController@index')->name('homepage');
    Route::get('contact','FrontController@contact');
    Route::get('about','FrontController@about');
    Route::get('page/{id}','FrontController@page');

    //customer login routes

    Route::get('customer_register','RegisterController@index');
    Route::post('customer_register','RegisterController@process_register');

    Route::get('customer_login','RegisterController@login')->name('customerLogin');
    Route::post('customer_login','RegisterController@process_login');

    Route::get('search','FrontController@search_process');

    Route::get('see_all_movie','FrontController@see_all_movie')->name('see_all_movie');
    Route::get('see_all_movie_news','FrontController@see_all_movie_news')->name('see_all_movie_news');

    Route::get('single_movie/{id}','FrontController@single_movie')->name('single_movie');

    Route::get('single_movie_news/{id}','FrontController@single_movie_news')->name('single_movie');

    Route::get('films_in_theater','FrontController@films_in_theater')->name('films_in_theater');




});



    Route::group(['namespace'=>'Front','middleware'=>'auth'],function(){

        Route::get('customer_logout','RegisterController@logout');

        Route::get('change_password','RegisterController@change_password');
        Route::post('change_password','RegisterController@process_password');



        Route::get('view_ticket','TicketController@view_ticket')->name('view_ticket');
        Route::post('edit_ticket','TicketController@edit_ticket')->name('edit_ticket');
        Route::get('delete_movie/{movie_id}','TicketController@delete_movie')->name('delete_movie');

        Route::get('pay_here','TicketController@pay_here')->name('pay_here');
        Route::get('booking_detail','TicketController@booking_detail');
        Route::post('ckeckout','TicketController@ckeckout')->name('ckeckout');
    });


Route::group(['namespace'=>'Front','middleware'=>'customer'],function(){
    Route::get('book_ticket/{id}','TicketController@book_ticket')->name('book_ticket');
});



//Routes for backend
    Route::group(['namespace'=>'Back','prefix'=>'admin','middleware'=>'admin'],function(){
    //Route for cateory
    Route::get('category','CategoryController@index')->name('category');
    Route::get('category/create','CategoryController@create')->name('category_create');
    Route::post('category/store','CategoryController@store')->name('category_store');
    Route::get('category/edit/{id}','CategoryController@edit')->name('category_edit');
    Route::put('category/update','CategoryController@update')->name('category_update');
    Route::delete('category/delete','CategoryController@delete')->name('category_delete');


    //Route for movie
    Route::get('movie','MovieController@index')->name('movie');
    Route::get('movie/create','MovieController@create')->name('movie_create');
    Route::post('movie/store','MovieController@store')->name('movie_store');
    Route::get('movie/edit/{id}','MovieController@edit')->name('movie_edit');
    Route::put('movie/update','MovieController@update')->name('movie_update');
    Route::delete('movie/delete','MovieController@delete')->name('movie_delete');
    Route::get('movie_single/{id}','MovieController@movie_single')->name('movie_single');


    //Routes for pages
    Route::get('page','PageController@index')->name('page');
    Route::get('page/add','PageController@add')->name('page_add');
    Route::post('page/store','PageController@store')->name('page_store');
    Route::get('page/edit/{page_id}','PageController@edit')->name('page_edit');
    Route::put('page/update','PageController@update')->name('page_update');
    Route::delete('page/delete','PageController@delete')->name('page_delete');


    Route::get('bookings','BookingController@view_bookings')->name('bookings');
    Route::get('changestatus/{bookingid}','BookingController@changeBookingStatus');
    Route::post('changestatus','BookingController@changestatus');



});



Auth::routes();

Route::get('sendMail','MailController@index');

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');