@extends('layout.index_admin')
@section('content')
<?php
$function = new \App\MainFunction\MainFunction();
$function->headertext("Meta Data");
$function->print_result();
?>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{URL::to('_admin_login/meta_data_doupdate')}}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td class="list" style="vertical-align: top">Logo</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list">
                        <?php
                        $logo_path = "images/$logo";
                        ?>
                        <img src="{{URL::to($logo_path)}}" width="200px"> <br/>
                        <input type="file" name="file" accept="image/*" >
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Website Title</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'title', 'form-control', $meta_web_title, '', '', 1);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Website Address</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'address', 'form-control', $meta_web_address, '', '', 1);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Website Description</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'desc', 'form-control', $meta_web_desc, '', '', 1);
                        ?>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Website Keyword <br/> (Separate with comma)</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'keyword', 'form-control', $meta_web_keyword, '', '', 1);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Google Analytics Script</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <textarea class="form-control" name="google_analytics"><?php echo "$google_analytics" ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Google Captcha Site Key</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'google_captcha_sitekey', 'form-control', $google_captcha_sitekey, '', '', 1);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Google Captcha Secret Key</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'google_captcha_secretkey', 'form-control', $google_captcha_secretkey, '', '', 1);
                        ?>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
