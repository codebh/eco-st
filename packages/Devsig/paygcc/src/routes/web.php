<?php
// Route::group(['namespace' => 'Devsig\paygcc\Http\Controllers', 'middleware' => ['web']], function(){
//     Route::get('contact', 'ContactFormController@index');
// });



Route::get('contact', function(){
    return 'Hello from the contact form package';
});