<?php
//cek logo
$cek_logo = DB::select("select LookupValue from t_lookup where CategoryId like 'logo'");
$logo = $cek_logo[0]->LookupValue;
//cek menu
$lang = session::get('lang');
$cek_menu = DB::select("select * from t_menu_frontend where lang like ? order by menu_order asc", [$lang]);
//cek lang setting
$cek_setting = DB::select("select LookupValue from t_lookup where CategoryId like 'lang_setting'");
$lang_setting = $cek_setting[0]->LookupValue;
?>
<div class="container">
    <table width='100%'>
        <tr>
            <td width='30%'>
                <div class='logo'>
                    <div class="row">
                        <?php
                        if ($lang_setting == "on") {
                            $query_lang = DB::select("select lang_id, lang_icon from t_language order by lang_name asc");
                            foreach ($query_lang as $list_lang) {
                                $lang_id = $list_lang->lang_id;
                                $lang_icon = $list_lang->lang_icon;
                                ?>
                                                                                                                                    <a href="{{URL::to("change_lang/$lang_id")}}"><img src="{{asset("images/$lang_icon")}}" style="margin-bottom:10px" height="20px"></a>                                                                                            <!--<a href="{{URL::to("change_lang/$lang_id")}}"><img src="{{asset("images/$lang_icon")}}" style="margin-bottom:10px" height="20px"></a>-->
                                <?php
                            }
                        }
                        ?>
                        <!--<img src="{{asset('images/Facebook_Icon.png')}}" style="margin-bottom:15px" height="20px">
                        <img src="{{asset('images/Instagram_Icon.png')}}" style="margin-bottom:15px" height="20px">
                        <img src="{{asset('images/Twitter_Icon.png')}}" style="margin-bottom:15px" height="20px"> <br/>
                        <img src="{{asset("images/$logo")}}" style="margin-bottom:15px;position: relative;top: -30px" class="logo_main">-->
                        <br/>

                        <nav>
                            <div class="dropdown">
                                <a class="dropbtn" align="center">&#x2630;</a>
                                <div class="dropdown-content">
                                    <ul>
                                        <?php
                                        foreach ($cek_menu as $list_menu) {
                                            $name_menu = $list_menu->display_name;
                                            $link = $list_menu->link;
                                            ?>
                                            <a href="{{URL::to($link)}}"><p class="granlin"><?php echo "$name_menu" ?></p></a>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <br/>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </td>
            <td style="text-align: center;padding: 0px;" width='30%' >
                <div class='logo' >
                    <div class="row">
                        <?php
                        if ($lang_setting == "on") {
                            $query_lang = DB::select("select lang_id, lang_icon from t_language order by lang_name asc");
                            foreach ($query_lang as $list_lang) {
                                $lang_id = $list_lang->lang_id;
                                $lang_icon = $list_lang->lang_icon;
                                ?>
                                                                                                                                  <!--<a href="{{URL::to("change_lang/$lang_id")}}"><img src="{{asset("images/$lang_icon")}}" style="margin-bottom:10px" height="20px"></a>-->
                                <?php
                            }
                        }
                        ?>
                        <br/>
                        <br/>
                        <br/>
                        <!--<img src="{{asset('images/Facebook_Icon.png')}}" style="margin-bottom:15px" height="20px">
                        <img src="{{asset('images/Instagram_Icon.png')}}" style="margin-bottom:15px" height="20px">
                        <img src="{{asset('images/Twitter_Icon.png')}}" style="margin-bottom:15px" height="20px"> <br/>-->
                        <a href="{{URL::to('/')}}"><img id="logo" src="{{asset("images/$logo")}}" style="margin-bottom:-15px;position: relative;top: -30px" class="logo_main"></a>
                    </div>
                </div>
            </td>
            <td style="text-align: right;" class= "logintab">
                <div>


<!--<a href="{{URL::to($link)}}"><img class="logoicon1" src="{{asset('images/Perkedelku-Web-SIGNUP.png')}}" ></a>-->
                    <!--                    <a href="" data-toggle="modal" data-target="#modalLRForm" class="textlogin" >Log in &#124;</a>-->
<!--                    <img class="logoicon2" src="{{asset('images/Perkedelku-Web-SEARCHedit.png')}}" >-->
                    <img class="logoicon3" src="{{asset('images/Perkedelku-Web-SearchHole.png')}}" >
                    <form method="post" action="{{URL::to('/_search')}}">
                        @csrf
                        <input class="expand"  type="text" name="search" placeholder="Cari Resep">

                    </form>
<!--                    <a href=""><img class="logoicon2" src="{{asset('images/Perkedelku-Web-SEARCH.png')}}" ></a>-->


                </div>
            </td>
        </tr>
    </table>   
</div>

<!--Modal: Login / Register Form-->
<!--<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        Content
        <div class="modal-content">

            Modal cascading tabs
            <div class="modal-c-tabs">

                 Nav tabs 
                <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                            Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                            Register</a>
                    </li>
                </ul>

                 Tab panels 
                <div class="tab-content">
                    Panel 7
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        Body
                        <div class="modal-body mb-1">
                            <div class="md-form form-sm mb-5">
                                <i class="fas fa-envelope prefix"></i>

                                <input type="email" id="modalLRInput10" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput10">Your email</label>
                            </div>

                            <div class="md-form form-sm mb-4">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" id="modalLRInput11" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput11">Your password</label>
                            </div>
                            <div class="text-center mt-2">
                                <button class="btn btn-success">Log in </i></button>
                            </div>
                        </div>
                        Footer
                        <div class="modal-footer">
                            <div class="options text-center text-md-right mt-1">
                              <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
                                <p>Forgot <a href="#" class="blue-text">Password?</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                    /.Panel 7

                    Panel 8
                    <div class="tab-pane fade" id="panel8" role="tabpanel">
                        <form method="post" id="formoffice" action="{{URL::to('/logincustomer_doinsert')}}" enctype="multipart/form-data">
                        Body
                        <div class="modal-body">
                            <div class="md-form form-sm mb-5">
                                <i class="fas fa-envelope prefix"></i>
                                <input type="email" id="modalLRInput12" class="form-control form-control-sm validate" required>
                                <label data-error="wrong" data-success="right" for="modalLRInput12">Your email</label>
                            </div>

                            <div class="md-form form-sm mb-5">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" id="txtNewPassword" class="form-control form-control-sm validate" required>
                                <label data-error="wrong" data-success="right" for="modalLRInput13">Your password</label>
                            </div>

                            <div class="md-form form-sm mb-4">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" id="txtConfirmPassword" class="form-control form-control-sm validate" onChange="isPasswordMatch();" required>
                                <label data-error="wrong" data-success="right" for="modalLRInput14">Repeat password</label>
                            </div>
                            <div id="divCheckPassword"></div>
                            <div class="text-center form-sm mt-2">
                                <button id="myBtn" class="btn btn-success" >Sign up </i></button>
                            </div>

                        </div>
                        Footer
                        <div class="modal-footer">
                                          <div class="options text-right">
                                            <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
                                          </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                    /.Panel 8
                </div>

            </div>
        </div>
        /.Content
    </div>
</div>-->
<!--Modal: Login / Register Form-->

<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (matchMedia('only screen and (max-width: 480px)').matches) {
            // smartphone/iphone... maybe run some small-screen related dom scripting?
            if (document.body.scrollTop >= 80 || document.documentElement.scrollTop >= 80) {
                document.getElementById("logo").style.width = "110%";
                document.getElementById("logo").style.transition = "all 1s";
                document.getElementById("logo").style.transitionDelay = "1s";
                document.getElementById("logo").style.padding = "0px";

            } else {
                document.getElementById("logo").style.width = "140%";
            }
        } else {
            if (document.body.scrollTop >= 80 || document.documentElement.scrollTop >= 80) {
                document.getElementById("logo").style.width = "70%";
                document.getElementById("logo").style.transition = "all 1s";
                document.getElementById("logo").style.transitionDelay = "1s";
                document.getElementById("logo").style.padding = "0px";

            } else {
                document.getElementById("logo").style.width = "120%";
            }
        }

    }
    function isPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();

        if (password != confirmPassword)
            $("#divCheckPassword").html("Passwords do not match!");

        else
            $("#divCheckPassword").html("Passwords match.");
    }


</script>
