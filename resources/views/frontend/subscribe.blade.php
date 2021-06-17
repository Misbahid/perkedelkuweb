<?php
//cek logo
$cek_logo = DB::select("select LookupValue from t_lookup where CategoryId like 'logo'");
$logo = $cek_logo[0]->LookupValue;
?>
<html>
    <title>Success Subscribe</title>
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
            @media only screen and (max-width:700px) {
                .logo{
                    width: 95%;
                }
            }
        </style>
    </head>
    <body>
        <div class="isi">
            <div class="logo">
                <div align="center">
                    <img src="{{ URL::to("/images/$logo") }}" width="200px"><br><br>
                    <div align="center">
                        <h3><?php echo "$msg" ?></h3>
                        <a href="home">Back To Website</a>
                        <!-- <a href="beta">Back To Website</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body></html>