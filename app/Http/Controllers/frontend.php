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
use SEOMeta;
use OpenGraph;
use Cookie;

class frontend extends Controller {

    function home() {
        $lang = session::get('lang');
        //check meta data
        $cek_meta = DB::select("select * from t_lookup where CategoryId in ('meta_web_title','meta_web_desc','meta_web_address','meta_web_keyword','google_captcha_sitekey')");
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
            } else if ($CategoryId == "google_captcha_sitekey") {
                $google_captcha_sitekey = $Value;
            }
        }
        $arr_keyword = explode(",", $meta_web_keyword);
        $keyword = "";
        $banyak_keyword = count($arr_keyword);
        $z = 1;
        foreach ($arr_keyword as $list_keyword) {
            if ($z == $banyak_keyword) {
                $keyword = $keyword . "$list_keyword";
            } else {
                $keyword = $keyword . "$list_keyword" . ",";
            }
            $z++;
        }
        $cek_logo = DB::select("select LookupValue from t_lookup where CategoryId like 'logo'");
        $logo = $cek_logo[0]->LookupValue;
        $logo_path = $meta_web_address . "/images/$logo";
        SEOMeta::setTitle($meta_web_title);
        SEOMeta::addKeyword([$keyword]);
        SEOMeta::setDescription($meta_web_desc);
        OpenGraph::setUrl($meta_web_address);
        OpenGraph::setTitle($meta_web_title);
        OpenGraph::setDescription($meta_web_desc);
        OpenGraph::addImage(['url' => $logo_path, 'size' => 300]);
        //content
        $cek_content = DB::select("select name,content from t_content where lang like ? and category like ?", [$lang, 'HOME']);
        foreach ($cek_content as $list_content) {
            $name = $list_content->name;
            $content = $list_content->content;
            if ($name == 'about_us') {
                $label_about_us = $content;
            } else if ($name == 'about_us_desc') {
                $about_us_desc = $content;
            } else if ($name == 'our_products') {
                $our_products = $content;
            } else if ($name == 'stay_update') {
                $stay_update = $content;
            } else if ($name == 'button_subs') {
                $button_subs = $content;
            } else if ($name == 'read_more') {
                $read_more = $content;
            } else if ($name == 'contact_us') {
                $contact_us = $content;
            } else if ($name == 'contact_us_name') {
                $contact_us_name = $content;
            } else if ($name == 'contact_us_phone') {
                $contact_us_phone = $content;
            } else if ($name == 'contact_us_email') {
                $contact_us_email = $content;
            } else if ($name == 'contact_us_message') {
                $contact_us_message = $content;
            } else if ($name == 'contact_us_button_label') {
                $contact_us_button_label = $content;
            }
        }
        $cek_image = DB::select("select * from t_lookup where CategoryId in ('homepage_top_image','homepage_middle_image')");
        foreach ($cek_image as $list_image) {
            $CategoryId = $list_image->CategoryId;
            $LookupValue = $list_image->LookupValue;
            if ($CategoryId == "homepage_top_image") {
                $top_image = $LookupValue;
            } else if ($CategoryId == "homepage_middle_image") {
                $mid_image = $LookupValue;
            }
        }
        //check last article
        $cek_last_article = DB::select("select id from t_article_h where cat= 5 order by id desc limit 1");
        if ($cek_last_article) {
            $last_id = $cek_last_article[0]->id;
//            $cek_detail_article = DB::select("select title, content, permalink from t_article_detail where lang like '$lang' and id_article = $last_id");
            $cek_detail_article = DB::select("select title, content, permalink,main_image,thumb_image from t_article_detail LEFT JOIN t_article_h ON t_article_detail.id_article = t_article_h.id where lang like '$lang' and id_article = $last_id");
            $article_img = $cek_detail_article[0]->main_image;
//             var_dump($article_img);
//             die();
        } else {
            $cek_detail_article = 0;
        }
        //check product
        $cek_product = DB::select("SELECT
                    a.id,
                    a.thumb_image,
					a.main_image,
                    b.permalink,
                    b.title
            FROM
                    t_article_h AS a
            LEFT JOIN t_article_detail AS b ON a.id = b.id_article
            where b.lang like ? and a.cat = ?
            ORDER BY a.input_time desc limit 3", [$lang, 1]);
        //check product
        $cek_productnext = DB::select("SELECT
                    a.id,
                    a.thumb_image,
					a.main_image,
                    b.permalink,
                    b.title
            FROM
                    t_article_h AS a
            LEFT JOIN t_article_detail AS b ON a.id = b.id_article
            where b.lang like ? and a.cat = ?
            ORDER BY a.input_time limit 3 ", [$lang, 1]);
        if (!$cek_product) {
            $cek_product = 0;
            $label_about_us = '';
            $about_us_desc = '';
            $our_products = '';
            $stay_update = '';
            $button_subs = '';
            $read_more = '';
            $cek_detail_article = '';
            $contact_us = '';
            $contact_us_name = '';
            $contact_us_phone = '';
            $contact_us_email = '';
            $contact_us_message = '';
            $google_captcha_sitekey = '';
            $contact_us_button_label = '';
            $data = array(
                'top_image' => $top_image,
                'mid_image' => $mid_image,
                'read_more' => $read_more,
            );
        }
        $data = array(
            'label_about_us' => $label_about_us,
            'about_us_desc' => $about_us_desc,
            'our_products' => $our_products,
            'stay_update' => $stay_update,
            'button_subs' => $button_subs,
            'top_image' => $top_image,
            'mid_image' => $mid_image,
            'read_more' => $read_more,
            'new_article' => $cek_detail_article,
            'article_img' => $article_img,
            'list_product' => $cek_product,
            'list_product_next' => $cek_productnext,
            'contact_us' => $contact_us,
            'contact_us_name' => $contact_us_name,
            'contact_us_phone' => $contact_us_phone,
            'contact_us_email' => $contact_us_email,
            'contact_us_message' => $contact_us_message,
            'google_captcha_sitekey' => $google_captcha_sitekey,
            'contact_us_button_label' => $contact_us_button_label,
        );
        return view('home')->with($data);
    }

    function change_lang($lang_id) {
        session::put('lang', $lang_id);
        return redirect()->back();
    }

    function content($permalink) {
        //check meta data
        $cek_meta = DB::select("select * from t_lookup where CategoryId in ('meta_web_title','meta_web_desc','meta_web_address','meta_web_keyword')");
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
            }
        }
        $arr_keyword = explode(",", $meta_web_keyword);
        $keyword = "";
        $banyak_keyword = count($arr_keyword);
        $z = 1;
        foreach ($arr_keyword as $list_keyword) {
            if ($z == $banyak_keyword) {
                $keyword = $keyword . "$list_keyword";
            } else {
                $keyword = $keyword . "$list_keyword" . ",";
            }
            $z++;
        }
        $cek_logo = DB::select("select LookupValue from t_lookup where CategoryId like 'logo'");
        $logo = $cek_logo[0]->LookupValue;
        $logo_path = $meta_web_address . "/images/$logo";
        SEOMeta::setTitle($meta_web_title);
        SEOMeta::addKeyword([$keyword]);
        SEOMeta::setDescription($meta_web_desc);
        OpenGraph::setUrl($meta_web_address);
        OpenGraph::setTitle($meta_web_title);
        OpenGraph::setDescription($meta_web_desc);
        OpenGraph::addImage(['url' => $logo_path, 'size' => 300]);
        $lang = session::get('lang');
        $cek_cat = DB::select("select id,catname from t_article_cat where permalink like ?", [$permalink]);
        $id_cat = $cek_cat[0]->id;
        $catname = $cek_cat[0]->catname;
        $cek_article = DB::select("SELECT
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
            where b.lang like ? and c.lang like ? and a.cat = ?
            ORDER BY a.input_time desc", [$lang, $lang, $id_cat]);
        $check_top_image = DB::Select("select LookupValue from t_lookup where CategoryId like 'products_top_image'");
        $top_image = $check_top_image[0]->LookupValue;
        //cek read more
        $lang = session::get('lang');
        $cek_content = DB::select("select content from t_content where lang like ? and category like ? and name like ?", [$lang, 'HOME', 'read_more']);
        $readmore = $cek_content[0]->content;
        return view('frontend/content')->with('list_article', $cek_article)->with('catname', $catname)->with('LookupValue', $top_image)->with('read_more', $readmore);
    }

    function content_all() {
        //check meta data
        $cek_meta = DB::select("select * from t_lookup where CategoryId in ('meta_web_title','meta_web_desc','meta_web_address','meta_web_keyword')");
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
            }
        }
        $arr_keyword = explode(",", $meta_web_keyword);
        $keyword = "";
        $banyak_keyword = count($arr_keyword);
        $z = 1;
        foreach ($arr_keyword as $list_keyword) {
            if ($z == $banyak_keyword) {
                $keyword = $keyword . "$list_keyword";
            } else {
                $keyword = $keyword . "$list_keyword" . ",";
            }
            $z++;
        }
        $cek_logo = DB::select("select LookupValue from t_lookup where CategoryId like 'logo'");
        $logo = $cek_logo[0]->LookupValue;
        $logo_path = $meta_web_address . "/images/$logo";
        SEOMeta::setTitle($meta_web_title);
        SEOMeta::addKeyword([$keyword]);
        SEOMeta::setDescription($meta_web_desc);
        OpenGraph::setUrl($meta_web_address);
        OpenGraph::setTitle($meta_web_title);
        OpenGraph::setDescription($meta_web_desc);
        OpenGraph::addImage(['url' => $logo_path, 'size' => 300]);
        $lang = session::get('lang');
        $cek_article = DB::select("SELECT
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
            where b.lang like ? and c.lang like ?
            ORDER BY a.input_time desc", [$lang, $lang]);
        $catname = "";
        return view('frontend/content')->with('list_article', $cek_article)->with('catname', $catname);
    }

    function detail_content($permalink) {
        //cek detail content
        $lang = session::get('lang');
        $cek_id_article = DB::select("select id_article from t_article_detail where permalink like ?", [$permalink]);
        $function = new MainFunction();
        if ($cek_id_article) {
            $id_article = $cek_id_article[0]->id_article;
            $cek_detail = DB::select("select a.title, a.content, c.catname, c.permalink from t_article_detail as a left join t_article_h as b on a.id_article = b.id left join t_article_cat as c on b.cat = c.id where a. lang like ? and a.id_article like ?", [$lang, $id_article]);
            $meta_web_title = $cek_detail[0]->title;
            $content = $cek_detail[0]->content;
            $meta_web_desc = $function->cutcontent($content);
            $cek_meta = DB::select("select * from t_lookup where CategoryId in ('meta_web_address')");
            $meta_web_address = $cek_meta[0]->LookupValue . "/article/" . $permalink;
            $web_address = $cek_meta[0]->LookupValue;
            $cek_header = DB::select("select * from t_article_h where id like ?", [$id_article]);
            $image = $cek_header[0]->thumb_image;
            $image_path = $web_address . "/images/article/$image";
            SEOMeta::setTitle($meta_web_title);
            //SEOMeta::addKeyword([$keyword]);
            SEOMeta::setDescription($meta_web_desc);
            OpenGraph::setUrl($meta_web_address);
            OpenGraph::setTitle($meta_web_title);
            OpenGraph::setDescription($meta_web_desc);
            OpenGraph::addImage(['url' => $image_path, 'size' => 300]);
            $data = array(
                'detail' => $cek_detail,
                'header' => $cek_header,
            );
            return view('frontend/detail_content')->with($data);
        } else {
            return redirect('/home');
        }
    }

    function subscribe(request $request) {
        $name = $request->name;
        $email = $request->email;
         $datenow = new Carbon();
        $cek_email = DB::select("select * from t_subscriber where email like ?", [$email]);
        if ($cek_email) {
            return view('frontend/subscribe')->with('msg', "Email Already Registered");
        } else {
//            var_dump($cek_email); die();
            $email_sent = DB::statement('insert into t_subscriber (name,email,create_date) values (?,?,?)', [$name,$email, $datenow]);
            return view('frontend/subscribe')->with('msg', "Register Email Success, Thank You");
        }
    }

    function send_message(request $request) {
        $cek_secret_key = DB::select("select LookupValue from t_lookup where CategoryId like 'google_captcha_secretkey'");
        $secretkey = $cek_secret_key[0]->LookupValue;
        $nama = $request->name;
        $telpon = $request->phone;
        $email = $request->email;
        $pesan = $request->message;
        $mail = new MailFunction();
        if (isset($_POST["g-recaptcha-response"])) {
            $post_data = "secret=$secretkey&response=" .
                    $_POST['g-recaptcha-response'] . "&remoteip=" . $_SERVER['REMOTE_ADDR'];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=utf-8',
                'Content-Length: ' . strlen($post_data)));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            $googresp = curl_exec($ch);
            $decgoogresp = json_decode($googresp);
            curl_close($ch);
            
            if ($decgoogresp->success == true) {
                $cek_email = DB::select("select LookupValue from t_lookup where categoryid like 'contact_email'");
                $to = $cek_email[0]->LookupValue;
                $mail->send_home_contact($to, $nama, $telpon, $email, $pesan);
                //$mail->test_email();
                // if ( $mail){
                //      echo "sukses";
                //     die();
                // }else {
                //     echo "gagal";
                //     die();
                // }
                return redirect('/home#contact')->with('success', "Send Contact Success");
//                return redirect('/beta#contact')->with('success', "Send Contact Success");
            } else {
                return redirect('/home#contact')->with('failed', "Captcha Error");
//                return redirect('/beta#contact')->with('failed', "Captcha Error");
            }
        } else {
            return redirect('/home#contact')->with('failed', "Please Input Captcha");
//            return redirect('/beta#contact')->with('failed', "Please Input Captcha");
        }
    }
    
    function testing_email() {
        $mail = new MailFunction();
        $send = $mail->test_email();
        echo "$send";
    }

    function products() {
        //check meta data
        $cek_meta = DB::select("select * from t_lookup where CategoryId in ('meta_web_title','meta_web_desc','meta_web_address','meta_web_keyword')");
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
            }
        }
        $arr_keyword = explode(",", $meta_web_keyword);
        $keyword = "";
        $banyak_keyword = count($arr_keyword);
        $z = 1;
        foreach ($arr_keyword as $list_keyword) {
            if ($z == $banyak_keyword) {
                $keyword = $keyword . "$list_keyword";
            } else {
                $keyword = $keyword . "$list_keyword" . ",";
            }
            $z++;
        }
        $cek_logo = DB::select("select LookupValue from t_lookup where CategoryId like 'logo'");
        $logo = $cek_logo[0]->LookupValue;
        $logo_path = $meta_web_address . "/images/$logo";
        SEOMeta::setTitle($meta_web_title);
        SEOMeta::addKeyword([$keyword]);
        SEOMeta::setDescription($meta_web_desc);
        OpenGraph::setUrl($meta_web_address);
        OpenGraph::setTitle($meta_web_title);
        OpenGraph::setDescription($meta_web_desc);
        OpenGraph::addImage(['url' => $logo_path, 'size' => 300]);
        $lang = session::get('lang');
        $cek_article = DB::select("SELECT
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
            where b.lang like ? and c.lang like ? and a.cat = ?
            ORDER BY a.input_time desc", [$lang, $lang, 2]);
        //check content
        $cek_content = DB::select("select content from t_content where category like 'PRODUCTS' and name like 'main_content' and lang like ?", [$lang]);
        if (empty($cek_content)) {
            $content = '';
        } else {
            $content = $cek_content[0]->content;
        }

        //check top image
        $check_top_image = DB::Select("select LookupValue from t_lookup where CategoryId like 'products_top_image'");
        $top_image = $check_top_image[0]->LookupValue;
        $cek_cat = DB::select("select catname from t_article_cat where permalink like 'product'");
        $catname = $cek_cat[0]->catname;
        $data = array(
            'list_article' => $cek_article,
            'content' => $content,
            'top_image' => $top_image,
            'catname' => $catname,
        );
        return view('frontend/products')->with($data);
    }

    function contact() {
        $lang = session::get('lang');
        //check meta data
        $cek_meta = DB::select("select * from t_lookup where CategoryId in ('meta_web_title','meta_web_desc','meta_web_address','meta_web_keyword','google_captcha_sitekey')");
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
            } else if ($CategoryId == "google_captcha_sitekey") {
                $google_captcha_sitekey = $Value;
            }
        }
        $arr_keyword = explode(",", $meta_web_keyword);
        $keyword = "";
        $banyak_keyword = count($arr_keyword);
        $z = 1;
        foreach ($arr_keyword as $list_keyword) {
            if ($z == $banyak_keyword) {
                $keyword = $keyword . "$list_keyword";
            } else {
                $keyword = $keyword . "$list_keyword" . ",";
            }
            $z++;
        }
        $cek_logo = DB::select("select LookupValue from t_lookup where CategoryId like 'logo'");
        $logo = $cek_logo[0]->LookupValue;
        $logo_path = $meta_web_address . "/images/$logo";
        SEOMeta::setTitle($meta_web_title);
        SEOMeta::addKeyword([$keyword]);
        SEOMeta::setDescription($meta_web_desc);
        OpenGraph::setUrl($meta_web_address);
        OpenGraph::setTitle($meta_web_title);
        OpenGraph::setDescription($meta_web_desc);
        OpenGraph::addImage(['url' => $logo_path, 'size' => 300]);
        $check_top_image = DB::Select("select LookupValue from t_lookup where CategoryId like 'contact_top_image'");
        $top_image = $check_top_image[0]->LookupValue;
        //content
        $cek_content = DB::select("select name,content from t_content where lang like ? and category like ?", [$lang, 'HOME']);
        foreach ($cek_content as $list_content) {
            $name = $list_content->name;
            $content = $list_content->content;
            if ($name == 'about_us') {
                $label_about_us = $content;
            } else if ($name == 'about_us_desc') {
                $about_us_desc = $content;
            } else if ($name == 'our_products') {
                $our_products = $content;
            } else if ($name == 'stay_update') {
                $stay_update = $content;
            } else if ($name == 'button_subs') {
                $button_subs = $content;
            } else if ($name == 'read_more') {
                $read_more = $content;
            } else if ($name == 'contact_us') {
                $contact_us = $content;
            } else if ($name == 'contact_us_name') {
                $contact_us_name = $content;
            } else if ($name == 'contact_us_phone') {
                $contact_us_phone = $content;
            } else if ($name == 'contact_us_email') {
                $contact_us_email = $content;
            } else if ($name == 'contact_us_message') {
                $contact_us_message = $content;
            } else if ($name == 'contact_us_button_label') {
                $contact_us_button_label = $content;
            }
        }
        if (empty($label_about_us)) {
            $data = array(
                'top_image' => $top_image,
                $label_about_us = '',
                $about_us_desc = '',
                $our_products = '',
                $stay_update = '',
                $button_subs = '',
                $read_more = '',
                $contact_us = '',
                $contact_us_name = '',
                $contact_us_phone = '',
                $contact_us_email = '',
                $contact_us_message = '',
                $google_captcha_sitekey = '',
                $contact_us_button_label = '',
            );
        } else {
            $data = array(
                'top_image' => $top_image,
                'label_about_us' => $label_about_us,
                'about_us_desc' => $about_us_desc,
                'our_products' => $our_products,
                'stay_update' => $stay_update,
                'button_subs' => $button_subs,
                'read_more' => $read_more,
                'contact_us' => $contact_us,
                'contact_us_name' => $contact_us_name,
                'contact_us_phone' => $contact_us_phone,
                'contact_us_email' => $contact_us_email,
                'contact_us_message' => $contact_us_message,
                'google_captcha_sitekey' => $google_captcha_sitekey,
                'contact_us_button_label' => $contact_us_button_label,
            );
        }

//        $data = array(
//            'top_image' => $top_image,
//            'label_about_us' => $label_about_us,
//            'about_us_desc' => $about_us_desc,
//            'our_products' => $our_products,
//            'stay_update' => $stay_update,
//            'button_subs' => $button_subs,
//            'read_more' => $read_more,
//            'contact_us' => $contact_us,
//            'contact_us_name' => $contact_us_name,
//            'contact_us_phone' => $contact_us_phone,
//            'contact_us_email' => $contact_us_email,
//            'contact_us_message' => $contact_us_message,
//            'google_captcha_sitekey' => $google_captcha_sitekey,
//            'contact_us_button_label' => $contact_us_button_label,
//        );
        return view('frontend/contact')->with($data);
    }

    function perkedelku() {
        $lang = session::get('lang');
        $cek_detail = DB::select("select a.title, a.content, c.catname, c.permalink from t_article_detail as a left join t_article_h as b on a.id_article = b.id left join t_article_cat as c on b.cat = c.id where a. lang like ? and a.id_article like '5'", [$lang]);

        $content = $cek_detail[0]->content;
        $data = array(
            'detail' => $cek_detail,
        );
        return view('frontend/content_perkedelku')->with($data);
    }

    function logincustomer_doinsert(request $request) {
        return view('frontend/content_perkedelku');
    }

    function search() {
        $key_search = $_POST['search'];
        $lang = session::get('lang');
        $count_search = DB::select("select count(title)as c_title from t_article_detail where title like ? and lang = ?",['%'.$key_search.'%',$lang]);
        $cek_search = DB::select("select permalink,title from t_article_detail where title LIKE ? and lang = ?",['%'.$key_search.'%',$lang]);

        if ($count_search[0]->c_title == 1) {
            return redirect('article/' . $cek_search[0]->permalink);
        } else {
            return redirect('content/recipe')->with('failed', "Maaf, hasil pencarian resep anda tidak ditemukan atau kata kuncinya kurang detail");
        }
    }

}
