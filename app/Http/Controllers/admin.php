<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\MainFunction\MainFunction;
use App\MainFunction\MailFunction;
use Exception;
use Intervention\Image\Facades\Image as Image;
use getRealPath;
use Config;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class admin extends Controller {

    function login() {
        return view('admin/login');
    }

    function logout() {
        session::flush();
        return redirect('/_admin_login');
    }

    function dologin(request $request) {
        $username = $request->username;
        $password = $request->password;
        $user_auth = DB::select("select LoginId,role,Password from t_login where UserName=?", [$username]);
        $user_auth_pass = $user_auth[0]->Password;
//        var_dump($password,$user_auth_pass);
//        die();
        $cek_login = DB::select("select LoginId,role from t_login where UserName like ? and Password like ?", [$username, $password]);
        if (Hash::check($password, $user_auth_pass)) {
            //if ($cek_login) {
            $LoginId = $user_auth[0]->LoginId;
            $role = $user_auth[0]->role;
            $ceklistmenu = "select t_menu.* from t_menu_tr left join t_menu on t_menu_tr.idmenu = t_menu.id where t_menu_tr.idrole = ? and menulvl = 1 order by t_menu.id asc";
            $queryceklistmenu = DB::select($ceklistmenu, [$role]);
            $ceklistsubmenu = "select t_menu.* from t_menu_tr left join t_menu on t_menu_tr.idmenu = t_menu.id where t_menu_tr.idrole = ? and menulvl = 2 and active = 1 order by t_menu.id asc";
            $queryceklistsubmenu = DB::select($ceklistsubmenu, [$role]);
            $arr_login_admin = (object) [
                        'LoginId' => $LoginId,
                        'queryceklistmenu' => $queryceklistmenu,
                        'queryceklistsubmenu' => $queryceklistsubmenu,
                        'role' => $role,
            ];
            session::put('arr_login_admin', $arr_login_admin);
            return redirect('_admin_login/home');
        } else {
            return redirect()->back()->with('failed', "Wrong Username or Password");
        }
    }

    function home() {
        return view('admin/home');
    }

    function matrix_menu() {
        if (isset($_GET['idrole'])) {
            $idrole = $_GET['idrole'];
            $gettr = "select * from t_menu_tr where idrole like ?";
            $querygettr = DB::select($gettr, [$idrole]);
            $getlistmenu = "select id,displayname,menulvl from t_menu order by id asc";
            $querygetmenu = DB::select($getlistmenu);
        } else {
            $idrole = "";
            $querygettr = 0;
            $querygetmenu = 0;
        }
        $cekadmlist = "select * from t_lookup where CategoryId like 'ADMROLE'";
        $querycekadmlist = DB::select($cekadmlist);

        return view('admin/matrix_menu')->with('arr_admlist', $querycekadmlist)->with('idrole', $idrole)->with('arr_gettr', $querygettr)->with('arr_getmenu', $querygetmenu)->with('selectlist', $querycekadmlist);
    }

    function doupdate_matrixmenu() {
        $idrole = request('idrole');
        DB::begintransaction();
        try {
            $delete = "delete from t_menu_tr where idrole like ?";
            DB::statement($delete, [$idrole]);
            $check = request('check');
            foreach ($check as $checklist) {
                $insert = "insert into t_menu_tr (`idrole`,`idmenu`) values (?,?)";
                DB::statement($insert, [$idrole, $checklist]);
            }
            DB::commit();
            return redirect('/_admin_login/matrix_menu')->with('success', "Success Update Matrix Menu");
        } catch (Exception $ex) {
            DB::rollback();
            $msg = $ex->getMessage();
            return redirect('/_admin_login/matrix_menu')->with('failed', "$msg");
        }
    }

    function meta_data() {
        //check meta data
        $cek_meta = DB::select("select * from t_lookup where CategoryId in ('meta_web_title','meta_web_desc','meta_web_address','meta_web_keyword','logo','google_analytics','google_captcha_sitekey','google_captcha_secretkey')");
        foreach ($cek_meta as $meta_list) {
            $CategoryId = $meta_list->CategoryId;
            $Value = $meta_list->LookupValue;
            if ($CategoryId == "meta_web_title") {
                $meta_web_title = $Value;
            } else if ($CategoryId == "meta_web_desc") {
                $meta_web_desc = $Value;
            } else if ($CategoryId == "meta_web_address") {
                $meta_web_address = $Value;
            } else if ($CategoryId == "meta_web_keyword") {
                $meta_web_keyword = $Value;
            } else if ($CategoryId == "logo") {
                $logo = $Value;
            } else if ($CategoryId == "google_analytics") {
                $google_analytics = $Value;
            } else if ($CategoryId == "google_captcha_sitekey") {
                $google_captcha_sitekey = $Value;
            } else if ($CategoryId == "google_captcha_secretkey") {
                $google_captcha_secretkey = $Value;
            }
        }
        $data = array(
            'meta_web_title' => $meta_web_title,
            'meta_web_desc' => $meta_web_desc,
            'meta_web_address' => $meta_web_address,
            'meta_web_keyword' => $meta_web_keyword,
            'logo' => $logo,
            'google_analytics' => $google_analytics,
            'google_captcha_sitekey' => $google_captcha_sitekey,
            'google_captcha_secretkey' => $google_captcha_secretkey,
        );
        return view('admin/meta_data')->with($data);
    }

    function meta_data_doupdate(request $request) {
        if ($request->file != null) {
            $image = $request->file('file');
            $extension = $image->getClientOriginalExtension();
            $destination = 'images/';
            $filename = "logo";
            $filenamesave = $filename . '.' . $extension;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $filesave = $destination . $filenamesave;
            $image_resize->save($filesave);
            DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'logo'", [$filenamesave]);
        }
        $title = $request->title;
        $address = $request->address;
        $desc = $request->desc;
        $keyword = $request->keyword;
        $google_analytics = $request->google_analytics;
        $google_captcha_sitekey = $request->google_captcha_sitekey;
        $google_captcha_secretkey = $request->google_captcha_secretkey;
        try {
            DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'meta_web_title'", [$title]);
            DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'meta_web_desc'", [$desc]);
            DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'meta_web_address'", [$address]);
            DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'meta_web_keyword'", [$keyword]);
            DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'google_analytics'", [$google_analytics]);
            DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'google_captcha_sitekey'", [$google_captcha_sitekey]);
            DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'google_captcha_secretkey'", [$google_captcha_secretkey]);
            return redirect('_admin_login/meta_data')->with('success', "Success Update Meta Data");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/meta_data')->with('failed', $msg);
        }
    }

    //add msb
    function user_login() {
        $user_list = DB::select("select LoginId,UserName,Alias,Password from t_login order by UserName asc");
        $type_akses = DB::select("select id_type_akses,type_akses from t_type_access order by type_akses asc");
        $pass_user = $user_list[0]->Password;
        $data = array(
            'user_list' => $user_list,
            'type_akses' => $type_akses,
        );
        return view('admin/user_login')->with($data)->with('pass_user', $pass_user);
    }

    function user_login_doinsert(request $request) {
        $username = $request->username;
        $password = hash::make($request->password);
        $type_user = $request->type_user;
        $id_roles = DB::select("select id_type_akses from t_type_access  WHERE type_akses LIKE ?", [$type_user]);
        $id_role = $id_roles[0]->id_type_akses;
//        $id_role = 98;
//        $image = $request->file('file');
//        $extension = $image->getClientOriginalExtension();
//        $destination = 'images/';
//        $filename = $lang_id;
//        $filenamesave = $filename . '.' . $extension;
//        $image_resize = Image::make($image->getRealPath());
//        $image_resize->resize(50, 50);
//        $filesave = $destination . $filenamesave;
//        $image_resize->save($filesave);
        try {
            DB::statement("insert into t_login (UserName,Alias,Password,role) values (?,?,?,?)", [$username, $type_user, $password, $id_role]);
            return redirect('_admin_login/user_login')->with('success', "Success Insert User");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/user_login')->with('failed', $msg);
        }
    }

    function user_login_update(request $request) {
        $id_user = $request->id_user;
        $user_detail = DB::select("select LoginId,UserName,Password,Alias from t_login where LoginId like ?", [$id_user]);
        $type_akses = DB::select("select type_akses from t_type_access order by type_akses asc");
        return view('admin/user_login_update')->with('user_detail', $user_detail)->with('type_akses', $type_akses);
    }

    function user_login_doupdate(request $request) {
        $id_user = $request->id_user;
        //$username = $request->username;
        $passwords = hash::make($request->password);
        $type_user = $request->type_user;
        $id_roles = DB::select("select id_type_akses from t_type_access  WHERE type_akses LIKE ?", [$type_user]);
        $id_role = $id_roles[0]->id_type_akses;
//        var_dump($password,$type_user);
//        die();
        try {
            DB::statement("update t_login set Password = ?, Alias = ?, role =? where LoginId like '$id_user'", [$passwords, $type_user, $id_role]);
            return redirect('_admin_login/user_login')->with('success', "Success Update User");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/user_login')->with('failed', $msg);
        }
    }

    function user_login_delete(request $request) {
        $id_user = $request->id_user;
        try {
            DB::statement("delete from t_login where LoginId like ?", [$id_user]);
            return redirect('_admin_login/user_login')->with('success', "Success Delete user");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/user_login')->with('failed', $msg);
        }
    }

    function language() {
        $lang_list = DB::select("select * from t_language order by lang_name asc");
        $cek_setting = DB::select("select LookupValue from t_lookup where CategoryId like 'lang_setting'");
        $lang_setting = $cek_setting[0]->LookupValue;
        $data = array(
            'lang_list' => $lang_list,
            'lang_setting' => $lang_setting,
        );
        return view('admin/language')->with($data);
    }

    function language_doinsert(request $request) {
        $lang_id = $request->lang_id;
        $lang_name = $request->lang_name;
        $image = $request->file('file');
        $extension = $image->getClientOriginalExtension();
        $destination = 'images/';
        $filename = $lang_id;
        $filenamesave = $filename . '.' . $extension;
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(50, 50);
        $filesave = $destination . $filenamesave;
        $image_resize->save($filesave);
        try {
            DB::statement("insert into t_language (lang_id,lang_name,lang_icon,flag_default) values (?,?,?,?)", [$lang_id, $lang_name, $filenamesave, 0]);
            return redirect('_admin_login/language')->with('success', "Success Insert Language");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/language')->with('failed', $msg);
        }
    }

    function language_dochangesetting(request $request) {
        try {
            $lang_setting = $request->lang_setting;
            DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'lang_setting'", [$lang_setting]);
            return redirect()->back()->with('success', "Success Change Language Setting");
        } catch (Exception $ex) {
            return redirect()->back()->with('failed', "Failed Change Language Setting");
        }
    }

    function language_update(request $request) {
        $lang_id = $request->lang_id;
        $cek_detail = DB::select("select * from t_language where lang_id like ?", [$lang_id]);
        return view('admin/language_update')->with('lang_detail', $cek_detail);
    }

    function language_doupdate(request $request) {
        $lang_id = $request->lang_id;
        $lang_name = $request->lang_name;
        try {
            if ($request->file != null) {
                $image = $request->file('file');
                $extension = $image->getClientOriginalExtension();
                $destination = 'images/';
                $filename = $lang_id;
                $filenamesave = $filename . '.' . $extension;
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(50, 50);
                $filesave = $destination . $filenamesave;
                $image_resize->save($filesave);
                DB::statement("update t_language set lang_icon = ? where lang_id like '$lang_id'", [$filenamesave]);
            }
            DB::statement("update t_language set lang_name = ? where lang_id like '$lang_id'", [$lang_name]);
            return redirect('_admin_login/language')->with('success', "Success Update Language");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/language')->with('failed', $msg);
        }
    }

    function language_delete(request $request) {
        $lang_id = $request->lang_id;
        try {
            DB::statement("delete from t_language where lang_id like ?", [$lang_id]);
            return redirect('_admin_login/language')->with('success', "Success Delete Language");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/language')->with('failed', $msg);
        }
    }

    function language_setdefault(request $request) {
        $lang_id = $request->lang_id;
        try {
            DB::statement("update t_language set flag_default = 0");
            DB::statement("update t_language set flag_default = 1 where lang_id like ?", [$lang_id]);
            return redirect('_admin_login/language')->with('success', "Success Set Default Language");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/language')->with('failed', $msg);
        }
    }

    function content_homepage(request $request) {
        $lang_list = DB::Select("select lang_id,lang_name from t_language order by flag_default desc, lang_name asc");
        if ($request->lang != null) {
            $lang_choose = $request->lang;
            $cek_content = DB::select("select * from t_content where category like 'HOME' and lang like ?", [$lang_choose]);
            if (!$cek_content) {
                $cek_content = 0;
            }
        } else {
            $lang_choose = "none";
            $cek_content = 0;
        }
        $data = array(
            'lang_list' => $lang_list,
            'lang_choose' => $lang_choose,
            'list_content' => $cek_content,
        );
        return view('admin/content_homepage')->with($data);
    }

    function content_homepage_doupdate(request $request) {
        $lang_choose = $request->lang_choose;
        $about_us_label = $request->about_us_label;
        $about_us_desc = $request->about_us_desc;
        $our_products_label = $request->our_products_label;
        $stay_update = $request->stay_update;
        $button_subs = $request->button_subs;
        $read_more = $request->read_more;
        $cek_exist = DB::select("select category from t_content where category like 'HOME' and lang like ?", [$lang_choose]);
        try {
            if ($cek_exist) {
                //update
                DB::statement("update t_content set content = ? where category like 'HOME' and lang like ? and name like 'about_us'", [$about_us_label, $lang_choose]);
                DB::statement("update t_content set content = ? where category like 'HOME' and lang like ? and name like 'about_us_desc'", [$about_us_desc, $lang_choose]);
                DB::statement("update t_content set content = ? where category like 'HOME' and lang like ? and name like 'our_products'", [$our_products_label, $lang_choose]);
                DB::statement("update t_content set content = ? where category like 'HOME' and lang like ? and name like 'stay_update'", [$stay_update, $lang_choose]);
                DB::statement("update t_content set content = ? where category like 'HOME' and lang like ? and name like 'button_subs'", [$button_subs, $lang_choose]);
                DB::statement("update t_content set content = ? where category like 'HOME' and lang like ? and name like 'read_more'", [$read_more, $lang_choose]);
            } else {
                //insert
                DB::statement("insert into t_content (category,lang,name,content) values (?,?,?,?)", ['HOME', $lang_choose, 'about_us', $about_us_label]);
                DB::statement("insert into t_content (category,lang,name,content) values (?,?,?,?)", ['HOME', $lang_choose, 'about_us_desc', $about_us_desc]);
                DB::statement("insert into t_content (category,lang,name,content) values (?,?,?,?)", ['HOME', $lang_choose, 'our_products', $our_products_label]);
                DB::statement("insert into t_content (category,lang,name,content) values (?,?,?,?)", ['HOME', $lang_choose, 'stay_update', $stay_update]);
                DB::statement("insert into t_content (category,lang,name,content) values (?,?,?,?)", ['HOME', $lang_choose, 'button_subs', $button_subs]);
                DB::statement("insert into t_content (category,lang,name,content) values (?,?,?,?)", ['HOME', $lang_choose, 'read_more', $read_more]);
            }
            return redirect('_admin_login/content_homepage')->with('success', "Update Content Success");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/content_homepage')->with('failed', $msg);
        }
    }

    function menu(request $request) {
        $lang_list = DB::Select("select lang_id,lang_name from t_language order by flag_default desc, lang_name asc");
        if ($request->lang != null) {
            $lang_choose = $request->lang;
            $cek_content = DB::select("select * from t_menu_frontend where lang like ?", [$lang_choose]);
            if (!$cek_content) {
                $cek_content = 0;
            }
        } else {
            $lang_choose = "none";
            $cek_content = 0;
        }
        $data = array(
            'lang_list' => $lang_list,
            'lang_choose' => $lang_choose,
            'list_content' => $cek_content,
        );
        return view('admin/menu')->with($data);
    }

    function menu_doupdate(request $request) {
        $lang_choose = $request->lang_choose;
        $home = $request->home;
        $home_link = $request->home_link;
        $home_order = $request->home_order;
        $recipe = $request->recipe;
        $recipe_link = $request->recipe_link;
        $recipe_order = $request->recipe_order;
        $product = $request->product;
        $product_link = $request->product_link;
        $product_order = $request->product_order;
        $contact = $request->contact;
        $contact_link = $request->contact_link;
        $contact_order = $request->contact_order;
        //check exist data
        $cek_data = DB::select("select lang from t_menu_frontend where lang like ?", [$lang_choose]);
        try {
            if ($cek_data) {
                //udpate
                DB::statement("update t_menu_frontend set display_name = ?, link = ?, menu_order = ? where lang like ? and name like ?", [$home, $home_link, $home_order, $lang_choose, 'home']);
                DB::statement("update t_menu_frontend set display_name = ?, link = ?, menu_order = ? where lang like ? and name like ?", [$recipe, $recipe_link, $recipe_order, $lang_choose, 'recipe']);
                DB::statement("update t_menu_frontend set display_name = ?, link = ?, menu_order = ? where lang like ? and name like ?", [$product, $product_link, $product_order, $lang_choose, 'product']);
                DB::statement("update t_menu_frontend set display_name = ?, link = ?, menu_order = ? where lang like ? and name like ?", [$contact, $contact_link, $contact_order, $lang_choose, 'contact']);
            } else {
                //insert
                DB::statement("insert into t_menu_frontend (lang,name,display_name,link,menu_order) values (?,?,?,?,?)", [$lang_choose, 'home', $home, $home_link, $home_order]);
                DB::statement("insert into t_menu_frontend (lang,name,display_name,link,menu_order) values (?,?,?,?,?)", [$lang_choose, 'recipe', $recipe, $recipe_link, $recipe_order]);
                DB::statement("insert into t_menu_frontend (lang,name,display_name,link,menu_order) values (?,?,?,?,?)", [$lang_choose, 'product', $product, $product_link, $product_order]);
                DB::statement("insert into t_menu_frontend (lang,name,display_name,link,menu_order) values (?,?,?,?,?)", [$lang_choose, 'contact', $contact, $contact_link, $contact_order]);
            }
            return redirect('_admin_login/menu')->with('success', "Success Update Menu");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/menu')->with('failed', $msg);
        }
    }

    function homepage_image() {
        $cek_image = DB::select("select * from t_lookup where CategoryId in ('homepage_top_image','homepage_middle_image','contact_top_image')");
        foreach ($cek_image as $list_image) {
            $CategoryId = $list_image->CategoryId;
            $LookupValue = $list_image->LookupValue;
            if ($CategoryId == "homepage_top_image") {
                $top_image = $LookupValue;
            } else if ($CategoryId == "homepage_middle_image") {
                $mid_image = $LookupValue;
            } else if ($CategoryId == "contact_top_image") {
                $contact_top_image = $LookupValue;
            }
        }
        $data = array(
            'top_image' => $top_image,
            'mid_image' => $mid_image,
            'contact_top_image' => $contact_top_image,
        );
        return view('admin/homepage_image')->with($data);
    }

    function homepage_image_update(request $request) {
        try {
            if ($request->top_image != null) {
                ini_set('memory_limit', -1);
                $image = $request->file('top_image');
                $extension = $image->getClientOriginalExtension();
                $destination = 'images/';
                $filename = uniqid();
                $filenamesave = $filename . '.' . $extension;
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1300, 750);
                $filesave = $destination . $filenamesave;
                $image_resize->save($filesave);
                DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'homepage_top_image'", [$filenamesave]);
            }
            if ($request->middle_image != null) {
                ini_set('memory_limit', -1);
                $image = $request->file('middle_image');
                $extension = $image->getClientOriginalExtension();
                $destination = 'images/';
                $filename = uniqid();
                $filenamesave = $filename . '.' . $extension;
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1300, 750);
                // $image_resize->resize(1300, 1400);
                $filesave = $destination . $filenamesave;
                $image_resize->save($filesave);
                DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'homepage_middle_image'", [$filenamesave]);
            }
            if ($request->contact_top != null) {
                $image = $request->file('contact_top');
                $extension = $image->getClientOriginalExtension();
                $destination = 'images/';
                $filename = uniqid();
                $filenamesave = $filename . '.' . $extension;
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1300, 750);
                $filesave = $destination . $filenamesave;
                $image_resize->save($filesave);
                DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'contact_top_image'", [$filenamesave]);
            }
            return redirect('_admin_login/homepage_image')->with('success', "Success Update Image");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/homepage_image')->with('failed', $msg);
        }
    }

    function manage_article() {
        $check_default_lang = DB::select("select lang_id from t_language where flag_default = 1");
        $default_lang = $check_default_lang[0]->lang_id;
        $article_list = DB::select("SELECT
                    a.id,
                    c.catname,
                    a.thumb_image,
                    a.main_image,
                    b.lang,
                    b.title,
                    b.content,
                    b.permalink
            FROM
                    t_article_h AS a
            LEFT JOIN t_article_detail AS b ON a.id = b.id_article
            LEFT JOIN t_article_cat AS c ON a.cat = c.id
            where b.lang like '$default_lang' and c.lang = '$default_lang'");
        $data = array(
            'article_list' => $article_list,
        );
        return view('admin/manage_article')->with($data);
    }

    function add_article() {
        $lang_list = DB::Select("select lang_id,lang_name from t_language order by flag_default desc, lang_name asc");
        $check_default_lang = DB::select("select lang_id from t_language where flag_default = 1");
        $default_lang = $check_default_lang[0]->lang_id;
        //check cat based on default lang
        $cek_cat = DB::select("select id,catname from t_article_cat where lang like ?", [$default_lang]);
        $data = array(
            'lang_list' => $lang_list,
            'cat_list' => $cek_cat,
        );
        return view('admin/add_article')->with($data);
    }

    function do_add_article(request $request) {
        $datenow = new Carbon();
        $function = new MainFunction();
        $mail = new MailFunction();
        $cat = $request->cat;
        $lang = $request->lang;
        $title = $request->title;
        $desc = $request->desc;
        //thumbnail save image
        ini_set('memory_limit', -1);
        $image_thumb = $request->file('thumb_image');
        $extension_thumb = $image_thumb->getClientOriginalExtension();
        $destination_thumb = 'images/article/';
        $filename_thumb = uniqid();
        $filenamesave_thumb = $filename_thumb . '.' . $extension_thumb;
        $image_resize_thumb = Image::make($image_thumb->getRealPath());
        $image_resize_thumb->resize(300, 300);
        $filesave_thumb = $destination_thumb . $filenamesave_thumb;
        $image_resize_thumb->save($filesave_thumb);
        //article save image
        $image = $request->file('article_image');
        $extension = $image->getClientOriginalExtension();
        $destination = 'images/article/';
        $filename = uniqid();
        $filenamesave = $filename . '.' . $extension;
        $image_resize = Image::make($image->getRealPath());
        //$image_resize->resize(1300, 750);
        $image_resize->resize(1300, 1300);
        $filesave = $destination . $filenamesave;
        $image_resize->save($filesave);
        //$to='misbah.ansoiri@forisa.co.id';
        //$nama = 'misbah';
        //$telpon='123';
        //$email='coba@coba.com';
        //$pesan='coba';
        //check last id
        $cek_id = DB::select("select max(id) as lastid from t_article_h");
        if (!$cek_id) {
            $last_id = 0;
        } else {
            $last_id = $cek_id[0]->lastid;
        }
        $new_id = $last_id + 1;
        try {
            DB::statement("insert into t_article_h (id,cat,thumb_image,main_image,input_time) values (?,?,?,?,?)", [$new_id, $cat, $filenamesave_thumb, $filenamesave, $datenow]);
            foreach ($lang as $lang_list) {
                $lang_input = $lang_list;
                $title_input = $title[$lang_list];
                $desc_input = $desc[$lang_list];
                $permalink = $function->permalink($title_input);
                DB::statement("insert into t_article_detail (id_article,lang,title,content,permalink) values (?,?,?,?,?)", [$new_id, $lang_input, $title_input, $desc_input, $permalink]);
            }
            $emails_to = DB::select("select name,email from t_subscriber");
//            $to = $emails_to->email;
            // var_dump($desc["INA"]);die();
            $title_article = $title["INA"];
            $desc_article = $function->cutcontent($desc["INA"]);
            $link = $function->permalink($title_article);
            //$cat = $request->cat;
            switch ($cat) {
                case 1 :
                    foreach ($emails_to as $email_to) {
                        $to = $email_to->email;
                        $name = $email_to->name;
                        //var_dump($name);die();
                        $mail->send_recipe($to, $name, $title_article, $desc_article, $link, $filenamesave_thumb);
                        //var_dump($mail);die();
                    }
                    break;
                case 2:
                    foreach ($emails_to as $email_to) {
                        $to = $email_to->email;
                        $name = $email_to->name;
                        //var_dump($name);die();
                        $mail->send_product($to, $name, $title_article, $desc_article, $link, $filenamesave_thumb);
                        //var_dump($mail);die();
                    }
                    break;
                case 5:
                    foreach ($emails_to as $email_to) {
                        $to = $email_to->email;
                        $name = $email_to->name;
                        //var_dump($name);die();
                        $mail->send_article($to, $name, $title_article, $desc_article, $link, $filenamesave_thumb);
                        //var_dump($mail);die();
                    }
                    break;
                Default:
            }
            //var_dump($filenamesave_thumb);die();


            return redirect('_admin_login/manage_article')->with('success', "Input Article Success");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/manage_article')->with('failed', $msg);
        }
    }

    function article_update(request $request) {
        $id_article = $request->id;
        $cek_header = DB::select("select * from t_article_h where id = ?", [$id_article]);
        $cek_detail = DB::select("select * from t_article_detail where id_article = ?", [$id_article]);
        $arr_title = array();
        $arr_content = array();
        foreach ($cek_detail as $list_detail) {
            $lang = $list_detail->lang;
            $title = $list_detail->title;
            $content = $list_detail->content;
            $arr_title[$lang] = $title;
            $arr_content[$lang] = $content;
        }
        $lang_list = DB::Select("select lang_id,lang_name from t_language order by flag_default desc, lang_name asc");
        $check_default_lang = DB::select("select lang_id from t_language where flag_default = 1");
        $default_lang = $check_default_lang[0]->lang_id;
        $cek_cat = DB::select("select id,catname from t_article_cat where lang like ?", [$default_lang]);
        $data = array(
            'lang_list' => $lang_list,
            'cat_list' => $cek_cat,
            'header' => $cek_header,
            'arr_title' => $arr_title,
            'arr_content' => $arr_content,
            'id_article' => $id_article,
        );
        return view('admin/article_update')->with($data);
    }

    function do_update_article(request $request) {
        $id_article = $request->id_article;
        $function = new MainFunction();
        $cat = $request->cat;
        $lang = $request->lang;
        $title = $request->title;
        $desc = $request->desc;
        try {
            //thumbnail save image
            if ($request->thumb_image != null) {
                ini_set('memory_limit', -1);
                $image_thumb = $request->file('thumb_image');
                $extension_thumb = $image_thumb->getClientOriginalExtension();
                $destination_thumb = 'images/article/';
                $filename_thumb = uniqid();
                $filenamesave_thumb = $filename_thumb . '.' . $extension_thumb;
                $image_resize_thumb = Image::make($image_thumb->getRealPath());
                $image_resize_thumb->resize(300, 300);
                $filesave_thumb = $destination_thumb . $filenamesave_thumb;
                $image_resize_thumb->save($filesave_thumb);
                DB::statement("update t_article_h set thumb_image = ? where id = ?", [$filenamesave_thumb, $id_article]);
            }
            if ($request->article_image != null) {
                //article save image
                ini_set('memory_limit', -1);
                $image = $request->file('article_image');
                $extension = $image->getClientOriginalExtension();
                $destination = 'images/article/';
                $filename = uniqid();
                $filenamesave = $filename . '.' . $extension;
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1300, 1400);
                $filesave = $destination . $filenamesave;
                $image_resize->save($filesave);
                DB::statement("update t_article_h set main_image = ? where id = ?", [$filenamesave, $id_article]);
            }
            DB::statement("update t_article_h set cat = ? where id = ?", [$cat, $id_article]);

            foreach ($lang as $lang_list) {
                $lang_input = $lang_list;
                $title_input = $title[$lang_list];
                $desc_input = $desc[$lang_list];
                $permalink = $function->permalink($title_input);
                DB::statement("update t_article_detail set title = ?, content = ?, permalink = ? where id_article = ? and lang like ?", [$title_input, $desc_input, $permalink, $id_article, $lang_input]);
            }
            return redirect('_admin_login/manage_article')->with('success', "Update Article Success");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/manage_article')->with('failed', $msg);
        }
    }

    function delete_article(request $request) {
        $article_id = $request->id;
        try {
//            var_dump($article_id);
//            die();
            DB::statement("delete from t_article_h where id like ?", [$article_id]);
            DB::statement("delete from t_article_detail where id_article like ?", [$article_id]);
            return redirect('_admin_login/manage_article')->with('success', "Delete Article Success");
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return redirect('_admin_login/manage_article')->with('failed', $msg);
        }
    }

    function product_page(request $request) {
        $lang_list = DB::Select("select lang_id,lang_name from t_language order by flag_default desc, lang_name asc");
        $top_banner_query = DB::select("select LookupValue from t_lookup where CategoryId like ?", ['products_top_image']);
        $top_banner = $top_banner_query[0]->LookupValue;
        if ($request->lang != null) {
            $lang_choose = $request->lang;
            $cek_content = DB::select("select content from t_content where category like 'PRODUCTS' and name like 'main_content' and lang like ?", [$lang_choose]);
        } else {
            $lang_choose = 'none';
            $cek_content = 0;
        }
        $check_top_image = DB::Select("select LookupValue from t_lookup where CategoryId like 'products_top_image'");
        $top_image = $check_top_image[0]->LookupValue;
        $data = array(
            'lang_list' => $lang_list,
            'top_banner' => $top_banner,
            'lang_choose' => $lang_choose,
            'main_content' => $cek_content,
            'top_image' => $top_image,
        );
        return view('admin/product_page')->with($data);
    }

    function content_product_doupdate(request $request) {
        $lang_choose = $request->lang_choose;
        $about_us_desc = $request->about_us_desc;
        $cek_content = DB::select("select content from t_content where category like 'PRODUCTS' and name like 'main_content' and lang like ?", [$lang_choose]);
        try {
            if (empty($cek_content)) {
                DB::statement("insert into t_content (category,lang,name,content) values (?,?,?,?)", ['PRODUCTS', $lang_choose, 'main_content', $about_us_desc]);
            } else {

                DB::statement("update t_content set content = ? where category like 'PRODUCTS' and name like 'main_content' and lang like ?", [$about_us_desc, $lang_choose]);
            }
            return redirect('_admin_login/product_page')->with('success', 'Update Data Success');
        } catch (Exception $ex) {
            return redirect('_admin_login/product_page')->with('failed', 'Update Data Failed');
        }
    }

    function product_pic_update(request $request) {
        try {
            //thumbnail save image
            ini_set('memory_limit', -1);
            $image = $request->file('top_image');
            $extension = $image->getClientOriginalExtension();
            $destination = 'images/';
            $filename = uniqid();
            $filenamesave = $filename . '.' . $extension;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(1300, 750);
            $filesave = $destination . $filenamesave;
            $image_resize->save($filesave);
//            var_dump($filenamesave);
//            die();
            DB::statement("update t_lookup set LookupValue = ? where CategoryId like 'products_top_image'", [$filenamesave]);
            return redirect('_admin_login/product_page')->with('success', "Success Update Image");
        } catch (Exception $ex) {
            return redirect('_admin_login/product_page')->with('failed', "Failed Update Image");
        }
    }

    function subscribe() {
        return view('admin/home');
    }

    function send_article() {
        
    }

}
