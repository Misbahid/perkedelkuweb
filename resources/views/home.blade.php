@extends('layout.index')
@section('seo')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script> 
<style>
    .mid_banner {
        padding: 0px!important;
        margin: 0px!important;
        background-image: url("/images/article/<?php echo "$article_img" ?>");
        /*        background-image: url("/images/<?php //echo "$mid_image"         ?>");*/
        background-repeat: no-repeat;  
        background-attachment: scroll;  
        background-position: 0% 0%;
        background-size: contain;


    }
    .paddingvideo {

        margin-top:-350px;
        margin-left: 20px;
        margin-bottom:50px;
    }
    @media (min-width: 768px) and (max-width: 979px) {
        .mid_banner {

            background-image: url("/images/article/<?php echo "$article_img" ?>");
            /*            background-image: url("/images/<?php echo "$mid_image" ?>");*/
            /*            background-repeat: no-repeat;  
                        background-position: 0% 0%;
                        background-size: 100% 100%;*/
            background-repeat: no-repeat;  
            background-attachment: scroll;  
            background-position: 0% 0%;
            background-size: contain;


        }
        .paddingvideo {

            margin-top:-200px;
            margin-left: 20px;
            margin-bottom:0px;
        }

    }
    @media (max-width: 767px) {

        .mid_banner {
            background-image: url("/images/article/<?php echo "$article_img" ?>");
            /*            background-image: url("/images/<?php echo "$mid_image" ?>");*/
            background-repeat: no-repeat;  
            background-attachment: scroll;  
            background-position: 5% 0%;
            background-size: contain;

        }
        .paddingvideo {

            margin-top:-100px;
            margin-left: 20px;
            margin-bottom:0px;
        }

    }    
    .slider {
        width:400px;
    }

    .videoimage {
        padding: 0px!important;
        margin: 0px!important;
        background-color: #eed2b5;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        height: 700px;
        position: relative;

    }
    /*    @media only screen and (max-width:900px) {
            .mid_banner {
                padding: 0px!important;
                margin: 0px!important;
                background-image: url("/images/<?php //echo "$mid_image"                              ?>");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                height: 200px;
            }
    
        }*/
</style>
<div class="preloader">
    <div class="loading">
        <img src="images/kentangloop.gif" width="450">
    </div>
</div>
<div class="topimage">
    <img src="{{URL::to("images/$top_image")}}" width="100%">
</div>
<div class="kentangimg">
    <img class="kentangsize" src="{{URL::to("images/kentangloop.gif")}}">
</div>
<?php
$function = new App\MainFunction\MainFunction();
//                $new_article[0]->content;
if ($new_article != 0) {
    $title_new_article = $new_article[0]->title;
    $permalink_new_article = $new_article[0]->permalink;
    $content_new_article = $new_article[0]->content;
    $cut_content = $function->cutcontent($content_new_article);
} else {
    $title_new_article = "";
    $permalink_new_article = "";
    $content_new_article = "";
    $cut_content = "";
}
?>
<div class="row" >
    <div class="col-md-6 col-sm-6 col-xs-6">
        <img style="max-width: 100%;max-height: 100%;" src="{{URL::to("/images/article/$article_img")}}">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">        
        <h1 class="articaltittle"><?php echo "$title_new_article" ?></h1>
        <h2 class="articalreadmore" >
            <?php echo "$cut_content" ?>
        </h2>

        <a href="{{URL::to("/article/$permalink_new_article")}}"><p class="articalmore" ><?php echo "$read_more" ?></p></a>
    </div>
</div>

<div class="borderpane">
    <a href="https://www.facebook.com/perkedelku.recipe/"><img src="{{asset('images/FB-Icon.png')}}" height="20px"></a>
    <!--<img src="{{asset('images/Youtube-Icon.png')}}" height="20px">-->
    <a href="https://www.instagram.com/perkedelku_id/"><img src="{{asset('images/Instagram-Icon.png')}}" height="20px"></a>
</div>

<div class="carousel media-carousel" id="media">
    <div class="carousel-inner">
        <div class="item  active">
            <div class="paddingmid">
                <div class="row">
                    <?php
                    if ($list_product != 0) {
                        foreach ($list_product as $product) {
                            $thumb_image = $product->thumb_image;
                            $permalink = $product->permalink;
                            $title = $product->title;
                            ?>
                            <div class="col-md-4 col-xs-4 col-sm-4">
                                <a href="{{URL::to("article/$permalink")}}"><div class="itemzoom"><img src="{{ URL::to("images/article/$thumb_image") }}"  /></div></a> <br/>
        <!--                                    <p class="blisfull" style="font-size: 20px"><?php echo "$title" ?></p>-->
                            </div>  
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>

        </div>

        <div class="item">
            <div class="paddingmid">
                <div class="row">
                    <?php
                    if ($list_product_next != 0) {
                        foreach ($list_product_next as $product1) {
                            $thumb_image1 = $product1->thumb_image;
                            $permalink1 = $product1->permalink;
                            $title1 = $product1->title;
                            ?>
                            <div class="col-md-4 col-xs-4 col-sm-4">
                                <a href="{{URL::to("article/$permalink1")}}"><div class="itemzoom"><img src="{{ URL::to("images/article/$thumb_image1") }}" /></div></a><br/>
        <!--                                    <p class="blisfull" style="font-size: 20px"><?php echo "$title1" ?></p>-->
                            </div>  
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" data-slide="prev" href="#media" ><img class="imagearrowleft" src="images/Arrowleft.png"></a>
    <a class="right carousel-control" data-slide="next" href="#media" ><img class="imagearrow" src="images/Arrow.png"></a>
</div>  



<!--<div class="container">
    <div class="row">
<?php
if ($list_product != 0) {
    foreach ($list_product as $product) {
        //$thumb_image = $product->thumb_image;
        $thumb_image = $product->main_image;
        $permalink = $product->permalink;
        $title = $product->title;
        ?>
                                                                                                                                                                                                                                                                                                                                                                                <div class="col-md-4" align='center' style="padding:40px">
                                                                                                                                                                                                                                                                                                                                                                                    <a href="{{URL::to("article/$permalink")}}"><div class="item"><img src="{{ URL::to("images/article/$thumb_image") }}" width="70%" /></a></div> <br/>
                                                                                                                                                                                                                                                                                                                                                                                <p class="textartical" style="font-size: 25px"><?php //echo "$title"                                             ?></p>
                                                                                                                                                                                                                                                                                                                                                                            </div>
        <?php
    }
}
?>
</div>
</div>-->
<div class="column">
    <img src="{{URL::to("images/Perkedelku-Web-BOTBANNER.png")}}" width="100%" >
    <div class="paddingvideo">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12" >
                    <!--                    <video class="vdc" autoplay loop muted>
                                            <source src="{{URL::to('images/Perkedelku Jingle.mp4')}}" type="video/mp4" />
                                        </video>-->

                    <iframe width="100%" height="300"
                            src="https://www.youtube.com/embed/5XR9yvTK6q8?rel=0&autoplay=1" class="video" allow="autoplay; fullscreen">
                    </iframe>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row cont_products">           
        <div>
            <div class="col-md-5" style="padding: 15px!important" align='right'>
                <div align="left" style="padding-right: 50px;"  id="contact">
                    <h1 class="textfooter" style="font-size: 20px"><?php echo "$contact_us" ?></h1>
                    <?php
                    $function->print_result();
                    ?>
                </div>  
                <div align='left' >
                    <form method="post" action="{{URL::to('send_message')}}">
                        @csrf
                        <?php
                        $function->textbox('text', 'name', 'form-control', '', '', $contact_us_name, '1');
                        echo "<br/>";
                        $function->textbox('text', 'phone', 'form-control', '', '', $contact_us_phone, '1');
                        echo "<br/>";
                        $function->textbox('email', 'email', 'form-control', '', '', $contact_us_email, '1');
                        echo "<br/>";
                        ?>
                        <textarea name="message" placeholder="<?php echo "$contact_us_message" ?>" class="form-control" rows="7" required="required"></textarea>
                        <br/>
                        <div class="g-recaptcha" data-sitekey="<?php echo "$google_captcha_sitekey" ?>" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                        <button class="nutrijell"><?php echo "$contact_us_button_label" ?></button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 about_cont" >
                <div align="center" >
                    <label><p class="textfooter"> Kantor Pusat</p></label>
                    </br>
                    <span class="textfooter1">
                        PT Forisa Nusapersada<br/>
                        Jalan Raya Pegangsaan Dua <br/> 
                        No.12 RT 03 / RW 19 - Kelapa Gading <br/>
                        North Jakarta 14250 - INDONESIA <br/>
                        Customer line <br/>
                        0.800.1.233.333 (Toll free) <br/>
                        customer_care@forisa.co.id <br/>
                        www.forisa.co.id
                    </span>
                </div>
                <div align="center">
                    <img src="{{URL::to('images/Perkedelku-Web-LINE.png')}}" height="110px" >
                </div>
                <div align="center" >
                    <label><p class="textfooter"> Pabrik</p></label>
                    </br>
                    <span class="textfooter1">
                        PT Forisa Nusapersada<br/>
                        Jalan Raya Pegangsaan Dua <br/> 
                        No.12 RT 03 / RW 19 - Kelapa Gading <br/>
                        North Jakarta 14250 - INDONESIA <br/>
                        www.forisa.co.id
                    </span>
                </div>
            </div>
            <div class="col-md-1 about_cont" >
                <div align="left" class="paddingfooter">
                    <a href="https://www.forisa.co.id/home"><img src="{{URL::to('images/Logo-Forisa.png')}}" height="200px"></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function () {
    $('#media').carousel({
        interval: 2000
    })

    $('#media').on('slid.bs.carousel', function () {
        //alert("slid");
    });

});
</script>
