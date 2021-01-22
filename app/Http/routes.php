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

//Route::get('login', 'Auth\LoginController@login')->name('login');
Route::any('/login/{id?}',function($id=2) {
   return view('auth.login')->with('id',$id);


});
Route::post('login_authenticate', 'Auth\LoginController@authenticate');
//Route::any('sample_page', 'Auth\LoginController@sample_page');
Route::get('sample_page',function() {
   return view('sample_page');
});
//Route::post('samepage','Auth\LoginController@samepage');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('home', 'HomeController@home')->name('home');
Route::get('forget-password', 'Auth\ForgotPasswordController@getEmail');
Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail');
Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');
Route::get('email_verification/{token}', 'Email_Verification@verify_Email');
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

/*Route::resource('ajax-crud', 'AjaxCrudController');

Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');
Route::post('ajax-crud/store', 'AjaxCrudController@update')->name('ajax-crud.store');


Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');
*/

Route::get('ajaxdata', 'AjaxdataController@index')->name('ajaxdata');
Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');

Route::post('ajaxdata/postdata', 'AjaxdataController@postdata')->name('ajaxdata.postdata');
//edit data
Route::get('/livetable', 'LiveTable@index');
Route::get('/livetable/fetch_data', 'LiveTable@fetch_data');
Route::post('/livetable/add_data', 'LiveTable@add_data')->name('livetable.add_data');
Route::post('/livetable/update_data', 'LiveTable@update_data')->name('livetable.update_data');
Route::post('/livetable/delete_data', 'LiveTable@delete_data')->name('livetable.delete_data');
//ajax login
Route::get('/ajax_login/{id?}',function($id=2) {
   return view('ajax_login')->with('id',$id);


});
//Route::get('/ajax_login', 'AjaxUserController@index')->name('ajax_login.index');
Route::post('/ajax_login/check', 'AjaxUserController@check')->name('ajax_login.check');
Route::get('/test', 'AjaxUserController@welcome')->name('test.ajax_welcome_page_after_login');
Route::get('/ajax_logout', 'AjaxUserController@ajax_logout')->name('ajax_logout');
Route::get('/payment', 'AjaxUserController@ajax_sample_payment_page')->name('payment.ajax_sample_payment_page');
//creating courses
Route::get('addcourse', 'CourseController@addcourse')->name('addcourse');
Route::get('delete_course/{course_id}', 'CourseController@delete_course')->name('delete_course');
Route::post('insertcourse', 'CourseController@insertcourse');

Route::post('topic/topicinsert', 'CourseController@topicinsert')->name('topic.topicinsert');
Route::get('/allcourses', 'CourseController@select_all_couses')->name('allcourses.select_all_couses');
Route::get('/stu_course', 'StuCourseController@index')->name('stu_course.index');
Route::get('/stu_enrolled', 'CourseController@stu_enrolled')->name('stu_enrolled');
Route::get('stu_topics/{course_id}', 'StuCourseController@topics');
Route::get('topics/{course_id}', 'CourseController@topics');
Route::post('class_timings', 'StuCourseController@class_timings')->name('class_timings');
Route::get('generate_excel_courses', 'CourseController@generate_excel_courses')->name('generate_excel_courses');
Route::get('dailyreport', 'CourseController@dailyreport')->name('dailyreport');
Route::get('weeklyReport', 'CourseController@weeklyReport')->name('weeklyReport');
//ajax calls
Route::get('dynamic_field', 'DynamicFieldController@index');

Route::post('dynamic_field/insert', 'DynamicFieldController@insert')->name('dynamic_field.insert');
//full_text_search
Route::get('full-text-search', 'Full_text_search_Controller@index');

Route::post('full-text-search/action', 'Full_text_search_Controller@action')->name('full-text-search.action');

Route::get('full-text-search/normal-search', 'Full_text_search_Controller@normal_search')->name('full-text-search.normal-search');
//column-searching
Route::resource('column-searching', 'ColumnSearchingController');
//Qr code generator
Route::get('qr-code-g', function () {
    
  return view('qrCode');
});
//Ticket Rising System
Route::post('newticket/insert', 'NewTicketController@insert')->name('newticket.insert');
Route::get('ticket_history', 'NewTicketController@ticket_history')->name('ticket_history');
Route::get('admin/fetch_ticket', 'AdminTicketController@fetch_ticket')->name('admin.fetch_ticket');

  Route::get('risied_tickets', 'AdminTicketController@risied_tickets')->name('risied_tickets');
   Route::post('admin/close_ticket', 'AdminTicketController@close_ticket')->name('admin.close_ticket');
//zoom integration
  Route::get('CreateZoomMeeting', 'ZoomMeeting@CreateZoomMeeting')->name('CreateZoomMeeting');
  Route::get('startzoomzeeting/select', 'Start_Zoom_Meeting@select')->name('startzoomzeeting.select');
  Route::post('startzoomzeeting/meetinginwebsite', 'Start_Zoom_Meeting@meetinginwebsite')->name('startzoomzeeting.meetinginwebsite');

  //Route::any('zoom/callback', 'ZoomCallBack@callback')->name('zoom.callback'); 

//admin login
Route::get('admin_login', 'AdminLogin@index');
Route::post('admin/validate_login', 'AdminLogin@validate_login')->name('admin.validate_login');
Route::get('admin/logout', 'AdminLogin@logout')->name('admin.logout');
?>



