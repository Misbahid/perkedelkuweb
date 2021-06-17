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

// Route::get('/', function(){
//     return view('frontend/maintenance');
// });
// Route::get('/home', function(){
//     return view('frontend/maintenance');
// });
Route::get('/', 'frontend@home')->middleware('cek_lang');
Route::get('/home', 'frontend@home')->middleware('cek_lang');
//Route::get('/beta', 'frontend@home')->middleware('cek_lang');
Route::get('/change_lang/{lang_id}', 'frontend@change_lang')->middleware('cek_lang');
Route::get('/article/{permalink}', 'frontend@detail_content')->middleware('cek_lang');
Route::get('/content/{permalink}', 'frontend@content')->middleware('cek_lang');
Route::get('/content/', 'frontend@content_all')->middleware('cek_lang');
Route::post('/subscribe', 'frontend@subscribe');
Route::post('/send_message', 'frontend@send_message');
Route::get('/products', 'frontend@products')->middleware('cek_lang');
Route::get('/contact', 'frontend@contact')->middleware('cek_lang');
Route::get('/perkedelku', 'frontend@perkedelku')->middleware('cek_lang');
//msb
Route::post('/_search', 'frontend@search')->middleware('cek_lang');



Route::get('/_admin_login', 'admin@login');
Route::get('/_admin_login/logout', 'admin@logout');
Route::post('/_admin_login/dologin', 'admin@dologin');
Route::get('/_admin_login/home', 'admin@home')->middleware('ceklogin');
Route::get('/_admin_login/matrix_menu', 'admin@matrix_menu')->middleware('ceklogin');
Route::post('/_admin_login/doupdate_matrixmenu', 'admin@doupdate_matrixmenu')->middleware('ceklogin');
Route::get('/_admin_login/meta_data', 'admin@meta_data')->middleware('ceklogin');
Route::post('/_admin_login/meta_data_doupdate', 'admin@meta_data_doupdate')->middleware('ceklogin');
Route::get('/_admin_login/meta_data', 'admin@meta_data')->middleware('ceklogin');
Route::get('/_admin_login/language', 'admin@language')->middleware('ceklogin');
Route::post('/_admin_login/language_doinsert', 'admin@language_doinsert')->middleware('ceklogin');
Route::post('/_admin_login/language_update', 'admin@language_update')->middleware('ceklogin');
Route::post('/_admin_login/language_doupdate', 'admin@language_doupdate')->middleware('ceklogin');
Route::post('/_admin_login/language_delete', 'admin@language_delete')->middleware('ceklogin');
Route::post('/_admin_login/language_setdefault', 'admin@language_setdefault')->middleware('ceklogin');
Route::post('/_admin_login/language_dochangesetting', 'admin@language_dochangesetting')->middleware('ceklogin');
Route::get('/_admin_login/content_homepage', 'admin@content_homepage')->middleware('ceklogin');
Route::post('/_admin_login/content_homepage_doupdate', 'admin@content_homepage_doupdate')->middleware('ceklogin');
Route::get('/_admin_login/menu', 'admin@menu')->middleware('ceklogin');
Route::post('/_admin_login/menu_doupdate', 'admin@menu_doupdate')->middleware('ceklogin');
Route::get('/_admin_login/homepage_image', 'admin@homepage_image')->middleware('ceklogin');
Route::post('/_admin_login/homepage_image_update', 'admin@homepage_image_update')->middleware('ceklogin');
Route::get('/_admin_login/manage_article', 'admin@manage_article')->middleware('ceklogin');
Route::get('/_admin_login/add_article', 'admin@add_article')->middleware('ceklogin');
Route::post('/_admin_login/do_add_article', 'admin@do_add_article')->middleware('ceklogin');
Route::post('/_admin_login/article_update', 'admin@article_update')->middleware('ceklogin');
Route::post('/_admin_login/do_update_article', 'admin@do_update_article')->middleware('ceklogin');
Route::get('/_admin_login/product_page', 'admin@product_page')->middleware('ceklogin');
Route::post('/_admin_login/content_product_doupdate', 'admin@content_product_doupdate')->middleware('ceklogin');
Route::post('/_admin_login/product_pic_update', 'admin@product_pic_update')->middleware('ceklogin');
//add msb 
Route::get('/_admin_login/user_login', 'admin@user_login')->middleware('ceklogin');
Route::post('/_admin_login/user_login_doinsert', 'admin@user_login_doinsert')->middleware('ceklogin');
Route::post('/_admin_login/user_login_update', 'admin@user_login_update')->middleware('ceklogin');
Route::post('/_admin_login/user_login_doupdate', 'admin@user_login_doupdate')->middleware('ceklogin');
Route::post('/_admin_login/user_login_delete', 'admin@user_login_delete')->middleware('ceklogin');
Route::post('/_admin_login/delete_article', 'admin@delete_article')->middleware('ceklogin');
Route::get('/_admin_login/subscribe', 'admin@subscribe')->middleware('ceklogin');









