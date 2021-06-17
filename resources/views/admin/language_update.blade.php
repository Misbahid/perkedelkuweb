@extends('layout.index_admin')
@section('content')
<?php
$function = new \App\MainFunction\MainFunction();
$function->headertext("Update Language");
$function->print_result();
$lang_id = $lang_detail[0]->lang_id;
$lang_name = $lang_detail[0]->lang_name;
$lang_icon = $lang_detail[0]->lang_icon;
?>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{URL::to('_admin_login/language_doupdate')}}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td class="list" style="vertical-align: top">Language Logo</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list">
                        <?php
                        if ($lang_icon != "") {
                            ?>
                            <img src="{{URL::to("/images/$lang_icon")}}" height="30px">
                            <?php
                        }
                        ?>
                        <input type="file" name="file" accept="image/*">
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Language Code</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'lang_id', 'form-control', $lang_id, '', '', 1, 1);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Language Name</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'lang_name', 'form-control', $lang_name, '', '', 1);
                        ?>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-success">Update Language</button>
        </form>
    </div>
</div>
@endsection
