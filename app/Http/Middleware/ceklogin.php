<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use DB;

class ceklogin {

    public function handle($request, Closure $next) {
        if (session::has('arr_login_admin')) {
            return $next($request);
        } else {
            return redirect("/_admin_login")->with('failed',"Login Session Expired");
        }
    }

}
