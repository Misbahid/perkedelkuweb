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
$function->headertext("Menu");
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
                $home = "";
                $home_link = "";
                $home_order = "";
                $recipe = "";
                $recipe_link = "";
                $recipe_order = "";
                $product = "";
                $product_link = "";
                $product_order = "";
                $contact = "";
                $contact_link = "";
                $contact_order = "";
            } else {
                foreach ($list_content as $content_list) {
                    $menu_name = $content_list->name;
                    $displayname = $content_list->display_name;
                    $link = $content_list->link;
                    $menu_order = $content_list->menu_order;
                    if ($menu_name == "home") {
                        $home = $displayname;
                        $home_link = $link;
                        $home_order = $menu_order;
                    } else if ($menu_name == "recipe") {
                        $recipe = $displayname;
                        $recipe_link = $link;
                        $recipe_order = $menu_order;
                    } else if ($menu_name == "product") {
                        $product = $displayname;
                        $product_link = $link;
                        $product_order = $menu_order;
                    } else if ($menu_name == "contact") {
                        $contact = $displayname;
                        $contact_link = $link;
                        $contact_order = $menu_order;
                    }
                }
            }
            ?>
            <form method="post" action="{{URL::to('_admin_login/menu_doupdate')}}">
                @csrf
                <?php
                $function->textbox('hidden', 'lang_choose', 'form-control', $lang_choose, '', '', 1);
                ?>
                <table>
                    <tr>
                        <td class="list" colspan="3" style="text-align: center;font-weight: bold">Home</td>
                    </tr>
                    <tr>
                        <td class="list">Display Name</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'home', 'form-control', $home, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Link</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'home_link', 'form-control', $home_link, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Menu Order</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'home_order', 'form-control', $home_order, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list" colspan="3" style="text-align: center;font-weight: bold">Recipes</td>
                    </tr>
                    <tr>
                        <td class="list">Display Name</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'recipe', 'form-control', $recipe, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Link</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'recipe_link', 'form-control', $recipe_link, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Menu Order</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'recipe_order', 'form-control', $recipe_order, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list" colspan="3" style="text-align: center;font-weight: bold">Product</td>
                    </tr>
                    <tr>
                        <td class="list">Display Name</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'product', 'form-control', $product, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Link</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'product_link', 'form-control', $product_link, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Menu Order</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'product_order', 'form-control', $product_order, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list" colspan="3" style="text-align: center;font-weight: bold">Contact</td>
                    </tr>
                    <tr>
                        <td class="list">Display Name</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'contact', 'form-control', $contact, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Link</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'contact_link', 'form-control', $contact_link, '', '', 1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="list">Menu Order</td>
                        <td class="list">:</td>
                        <td class="list">
                            <?php
                            $function->textbox('text', 'contact_order', 'form-control', $contact_order, '', '', 1);
                            ?>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
            <?php
        }
        ?>
    </div>
</div>
@endsection
