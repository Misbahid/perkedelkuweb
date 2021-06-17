<?php
$arr_session = session::get('arr_login_admin');
$queryceklistmenu = $arr_session->queryceklistmenu;
$queryceklistsubmenu = $arr_session->queryceklistsubmenu;
$role = $arr_session->role;
$function = new \App\MainFunction\MainFunction;
//cek logo
$cek_logo = DB::select("select LookupValue from t_lookup where CategoryId like 'logo'");
$logo = $cek_logo[0]->LookupValue;
?>
<div id="responsive-admin-menu">
    <div id="responsive-menu">
        <div class="menuicon">≡</div>
    </div>

    <div id="logo"><img src="{{ URL::to("/images/$logo") }}" style="max-height: 80%;border-radius: 10px"></div>
    <br/>
    <?php
    $function->getsidemenu($queryceklistmenu, $queryceklistsubmenu, $role);
    ?>

</div>
