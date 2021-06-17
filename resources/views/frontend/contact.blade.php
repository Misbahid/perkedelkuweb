@extends('layout.index')
@section('seo')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')
<?php
$function = new App\MainFunction\MainFunction();
if (empty($top_image)) {
    $top_image = '';
}
if (empty($contact_us)) {
    $contact_us = '';
}
if (empty($contact_us_name)) {
    $contact_us_name = '';
}
if (empty($contact_us_phone)) {
    $contact_us_phone = '';
}
if (empty($contact_us_email)) {
    $contact_us_email = '';
}
if (empty($contact_us_message)) {
    $contact_us_message = '';
}
if (empty($google_captcha_sitekey)) {
    $google_captcha_sitekey = '';
}
if (empty($contact_us_button_label)) {
    $contact_us_button_label = '';
}
if (empty($stay_update)) {
    $stay_update = '';
}
if (empty($button_subs)) {
    $button_subs = '';
}
if (empty($label_about_us)) {
    $label_about_us = '';
}
if (empty($about_us_desc)) {
    $about_us_desc = '';
}
?>
<img src="{{URL::to("images/$top_image")}}" width="100%">
<img src="{{URL::to('images/pane-background.png')}}" class="line_home">
<div class="product_home cont_content">
    <div class="container">
<!--        <div class="row cont_products">
            <h1 class="lobster" style="text-align:right"><?php echo "$label_about_us" ?></h1>
            <span class="blisfull" style="font-size: 20px; text-align:justify"><?php echo "$about_us_desc" ?></span>
        </div>-->
        <div class="row cont_products">
            <div class="row" >    
                <div style="position: relative;top: 0px">
                    <div class="col-md-6 " style="padding: 15px!important" align='right'>
                        <div align="left" style="padding-right: 50px;"  id="contact">
                            <h1 class="blisfull" style="font-size: 20px"><?php echo "$contact_us" ?></h1>
                            <?php
                            $function->print_result();
                            ?>
                        </div>  
                        <div align='left' >
                            <form method="post" action="{{URL::to('send_message')}}">
                                @csrf
                                <?php
                                $function->textbox('text', 'name', 'form-control', '', '', $contact_us_name,'1');
                                echo "<br/>";
                                $function->textbox('text', 'phone', 'form-control', '', '', $contact_us_phone,'1');
                                echo "<br/>";
                                $function->textbox('email', 'email', 'form-control', '', '', $contact_us_email,'1');
                                echo "<br/>";
                                ?>
                                <textarea name="message" placeholder="<?php echo "$contact_us_message" ?>" class="form-control" rows="7" required="required"></textarea>
                                <br/>
                                <div class="g-recaptcha" data-sitekey="<?php echo "$google_captcha_sitekey" ?>" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                                <button class="nutrijell"><?php echo "$contact_us_button_label" ?></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 about_cont" >
                        <div align='right'>
                            <form method="post" action="{{URL::to('subscribe')}}">
                                @csrf
                                <p class="blisfull" align='center'><?php echo "$stay_update" ?></p>
                                 <input type="name" name="name" class="custom" placeholder="Name"size="47%" style="margin-left:0px" required="required">
                                <input type="email" name="email" class="custom" placeholder="E-Mail"size="47%" style="margin-left:0px" required="required">
                                <button class="subscribe"><?php echo "$button_subs" ?></button>
                                <br/><br/>
                                <img src="{{asset('images/Facebook_Icon.png')}}" style="margin-bottom:15px;margin-right:0px" height="20px">
                                <img src="{{asset('images/Instagram_Icon.png')}}" style="margin-bottom:15px;margin-right:130px" height="20px">
<!--                                <img src="{{asset('images/Twitter_Icon.png')}}" style="margin-bottom:15px;margin-right:130px" height="20px"> <br/>-->
                            </form>
                        </div>
                        <div align="right" >
                            <img src="{{URL::to('images/Forisa-Logo.png')}}" height="60px">
                            </br>
                            <span class="dosis_regular">
                                PT Forisa Nusapersada<br/>
                                Jalan Raya Pegangsaan Dua <br/> 
                                No.12 RT 03 / RW 19 - Kelapa Gading <br/>
                                North Jakarta 14250 - INDONESIA <br/>
                                www.forisa.co.id
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection