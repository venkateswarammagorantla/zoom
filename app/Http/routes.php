<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::get('/','Employee_Controller@create');
Route::get('/post/','Employee_Controller@create');
Route::get('/a', function () {
    return view('anchor');
});
Route::any('/store','Employee_Controller@store');
Route::any('/destroy','Employee_Controller@destroy');
Route::any('/update','Employee_Controller@update');

/*$router->get('/{b}',[
    'uses' => 'Employee_Controller@s',
    'as'   => 'switch1'
]);*/
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile1','UploadFileController@showUploadFile');
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');
Route::get('ajax',function() {
   return view('message');
});
Route::get('/getmsg','AjaxController@index');
//sessions
Route::get('session_get','SessionController@accessSessionData');
Route::get('session_set','SessionController@storeSessionData');
Route::get('session_remove','SessionController@deleteSessionData');
//cookies
Route::get('/cookie/set','CookieController@setCookie');
Route::get('/cookie/get','CookieController@getCookie');
//pagination
Route::any('/get_emps','PaginationController@index');
//template
Route::get('/','PropertyController@index');
Route::get('properties','PropertyController@properties');
Route::get('properties-single/{id}','PropertyController@pro_details');
//start section Register,Login and Reset passwords
Route::get('register', 'Auth\RegisterController@register');
Route::post('register', 'Auth\RegisterController@storeUser');
Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('home', 'HomeController@home')->name('home');
Route::get('forget-password', 'Auth\ForgotPasswordController@getEmail');
Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail');
Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');
//end section Register,Login and Reset passwords

//loading view directly
//Route::view('/','welcome');
Route::get('/section', function () {
    return view('child');
});
//export and import excel files into database

Route::get('/import_excel', 'ImportExcelController@index');
Route::post('/import_excel/import', 'ImportExcelController@import');

//Route::get('/exportExcel', 'ImportExcelController@exportExcel');
Route::get('/export_excel', 'ExportExcelController@index');

Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');
//student data exporting
Route::get('/stu_export_excel', 'StuExportExcelController@index');

Route::get('/stu_export_excel/excel', 'StuExportExcelController@excel')->name('stu_export_excel.excel');
//ajax crude operations
Route::resource('ajax-crud', 'AjaxCrudController@index');
Route::get('ajax-crud/store', 'AjaxCrudController@store');

Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');

Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');


Route::get('ajaxdata', 'AjaxdataController@index')->name('ajaxdata');
Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');

Route::post('ajaxdata/postdata', 'AjaxdataController@postdata')->name('ajaxdata.postdata');


?>



