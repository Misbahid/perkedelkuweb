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
$function->headertext("Product Page Content");
$function->print_result();
?>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{URL::to('_admin_login/product_pic_update')}}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td class="list" style="vertical-align: top">Banner Image <br/> 1300px x 750px</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list">
                        <img src="{{URL::to("images/$top_image")}}" width="300px">
                        <input type="file" name="top_image" accept="image/*">
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Update Image</button>
        </form>
        <br/>
        <br/>
        <form method="get" action="">
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
            if (empty($main_content)) {
                $content = "";
            } else {
                $content = $main_content[0]->content;
               
            }
            ?>
            <form method="post" action="{{URL::to('_admin_login/content_product_doupdate')}}">
                @csrf
                <?php
                $function->textbox('hidden', 'lang_choose', '', $lang_choose);
                ?>
                <table>
                    <tr>
                        <td class="list" style="vertical-align: top">Product Description</td>
                        <td class="list" style="vertical-align: top">:</td>
                        <td class="list">
                            <textarea class="form-control" name="about_us_desc"><?php echo "$content" ?></textarea>
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
