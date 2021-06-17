<?php
//cek logo
$cek_logo = DB::select("select LookupValue from t_lookup where CategoryId like 'logo'");
$logo = $cek_logo[0]->LookupValue;
?>
<html>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <head>
        <style>
            body{
                background-image:url("{{url('/images/Mid-Banner.png')}}");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }

            .isi{
                height: 100%;
                width: 100%;
                margin: 0;
            }
            .logo{
                position:fixed;
                left:50%;top:50%;
                transform:translate(-50%,-50%);
                z-index:10000;
                background-color: #e6e6e6;
                padding: 20px;
                border-radius: 20px;
            }
            
        </style>
    </head>
    <body>
        <div class="isi">
            <div class="logo">
                <div align="center">
                    <img src="{{ URL::to("/images/$logo") }}" width="200px"><br><br>
                    <div align="center">
                        <form action="/_admin_login/dologin" method="POST">
                            @csrf
                            <div class="control-group">
                                <input type="text" name="username" class="form-control" value="" placeholder="username" id="login-name" required="required">
                            </div>
                            <br>
                            <div class="control-group">
                                <input type="password" name="password" class="form-control" value="" placeholder="password" id="login-pass" required="required">
                            </div>
                            <br>
                            <?php
                            /*
                              echo "$capt";
                              ?>
                              <br>
                              <br>
                              <div class="control-group">
                              <input type="text" name="captcha" required="required" class="form-control" placeholder="Captcha">
                              </div>
                              <br>
                             * 
                             * 
                             */
                            ?>
                            <button type="submit" class="btn btn-danger btn-large btn-block"><span class="fa fa-sign-in"></span>&nbsp;Login</button>
                            <?php
                            $function = new \App\MainFunction\MainFunction();
                            $function->print_result();
                            ?>
                        </form>
                    </div>
                    <?php
                    $year = date('Y');
                    ?>
                    <p style="color: #000">Admin Panel - &copy;Forisa <?php echo "$year" ?></p>
                </div>
            </div>
        </div>
    </div>
</body></html>