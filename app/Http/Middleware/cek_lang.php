<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use DB;

class cek_lang {

    public function handle($request, Closure $next) {
        if (session::has('lang')) {
            $lang = session::get('lang');
        } else {
            $cek_default = DB::select("select lang_id from t_language where flag_default = 1");
            $lang = $cek_default[0]->lang_id;
        }
        session::put('lang', $lang);
        return $next($request);
    }

}
