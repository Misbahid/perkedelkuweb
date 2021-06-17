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
$function->headertext("Add Article");
$function->print_result();
?>
<br/>
<form method="post" action="{{URL::to('_admin_login/do_add_article')}}" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td class="list">Category</td>
            <td class="list">:</td>
            <td class="list">
                <select name="cat" class="form-control">
                    <?php
                    foreach ($cat_list as $cat) {
                        $cat_id = $cat->id;
                        $catname = $cat->catname;
                        ?>
                        <option value="<?php echo "$cat_id" ?>"><?php echo "$catname" ?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="list" style="vertical-align: top">Thumbnail Image</td>
            <td class="list" style="vertical-align: top">:</td>
            <td class="list">
                <input type="file" name="thumb_image" accept="image/*" required="required"> (Will be resized to 300px x 300px and file cannot be more than 2 mb)
            </td>
        </tr>
        <tr>
            <td class="list" style="vertical-align: top">Article Image</td>
            <td class="list" style="vertical-align: top">:</td>
            <td class="list">
                <input type="file" name="article_image" accept="image/*" required="required"> (Will be resized to 1300px x 1300px and file cannot be more than 2 mb)
            </td>
        </tr>
        <?php
        foreach ($lang_list as $lang) {
            $lang_id = $lang->lang_id;
            $lang_name = $lang->lang_name;
            ?>
            <tr>
                <td class="list" style="text-align: center;font-weight: bold" colspan="3"><?php echo "$lang_name" ?></td>
                <?php
                $function->textbox('hidden', "lang[$lang_id]", 'form-control', $lang_id, '', '', 1)
                ?>
            </tr>
            <tr>
                <td class="list">Title</td>
                <td class="list">:</td>
                <td class="list">
                    <?php
                    $function->textbox('text', "title[$lang_id]", 'form-control', '', '', '', 1)
                    ?>
                </td>
            </tr>
            <tr>
                <td class="list" style="vertical-align: top">Description</td>
                <td class="list" style="vertical-align: top">:</td>
                <td class="list">
                    <textarea name="desc[<?php echo "$lang_id" ?>]"></textarea>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br/>
    <button type="submit" class="btn btn-default">Add Article</button>
</form>
@endsection