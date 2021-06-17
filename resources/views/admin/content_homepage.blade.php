@extends('layout.index_admin')
@section('content')
<script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script>
tinymce.init({
    selector: "textarea",
    theme: "modern",
    width: '100%',
    height: 200,
    plugins: [
        "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
    ],
    style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
});
</script>
<?php
$function = new \App\MainFunction\MainFunction();
$function->headertext("Home & Contact Page Content");
$function->print_result();
?>
<div class="row">
    <div class="col-md-12">
        <form method="get" action="" enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="list">Select Language</td>
                    <td class="list">:</td>
                    <td class="list">
                        <select name="lang" class="form-control">
                            <?php
                            foreach ($lang_list as $language) {
                                $lang_id = $language->lang_id;
                                $lang_name = $language->lang_name;
                                if ($lang_choose == $lang_id) {
                                    ?>
                                    <option value="<?php echo "$lang_id" ?>" selected="selected"><?php echo "$lang_name" ?></option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="<?php echo "$lang_id" ?>"><?php echo "$lang_name" ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-primary">Choose Language</button>
                    </td>
                </tr>
            </table>
        </form>
        <br/>
        <?php
        if ($lang_choose != "none") {
            if ($list_content == 0) {
                $about_us_label = "";
                $about_us_desc = "";
                $our_products_label = "";
                $stay_update_label = "";
                $button_subs = "";
                $read_more ="";
            } else {
                foreach ($list_content as $content_list) {
                    $name = $content_list->name;
                    $content = $content_list->content;
                    if ($name == "about_us") {
                        $about_us_label = $content;
                    } else if ($name == "about_us_desc") {
                        $about_us_desc = $content;
                    } else if ($name == "our_products") {
                        $our_products_label = $content;
                    } else if ($name == "stay_update") {
                        $stay_update_label = $content;
                    } else if ($name == "button_subs") {
                        $button_subs = $content;
                    } else if ($name == "read_more") {
                        $read_more = $content;
                    }
                }
            }
            ?>
            <form method="post" action="{{URL::to('_admin_login/content_homepage_doupdate')}}">
                @csrf
                <?php
                $function->textbox('hidden', 'lang_choose', '', $lang_choose);
                ?>
                <table>
                    <tr>
                        <td class="list">About Us Label</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'about_us_label', 'form-control', $about_us_label);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list" style="vertical-align: top">About Us Description</td>
                        <td class="list" style="vertical-align: top">:</td>
                        <td class="list">
                            <textarea class="form-control" name="about_us_desc"><?php echo "$about_us_desc" ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Our Products Label</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'our_products_label', 'form-control', $our_products_label);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Stay Update Label</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'stay_update', 'form-control', $stay_update_label);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Subscribe Button Label</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'button_subs', 'form-control', $button_subs);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Read More Label</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'read_more', 'form-control', $read_more);
                            ?>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-success">Update Content</button>
            </form>
            <?php
        }
        ?>
    </div>
</div>
@endsection
