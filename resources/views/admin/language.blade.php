@extends('layout.index_admin')
@section('content')
<?php
$function = new \App\MainFunction\MainFunction();
$function->headertext("Language");
$function->print_result();
?>
<div class="row">
    <div class="col-md-12">
        <h3>Language Setting</h3>
        <form method="post" action="{{URL::to('_admin_login/language_dochangesetting')}}">
            @csrf
            <table>
                <tr>
                    <td class="list">Change Language Setting <br/> (User can change language)</td>
                    <td class="list">:</td>
                    <td class="list">
                        <select name="lang_setting" class="form-control" onchange="this.form.submit()">
                            <option value="on" <?php if ($lang_setting == "on") { ?> selected="selected" <?php } ?>>On</option>
                            <option value="off" <?php if ($lang_setting == "off") { ?> selected="selected" <?php } ?>>Off</option>
                        </select>
                    </td>
                </tr>
            </table>
        </form>
        <br/>
        <h3>Insert Language</h3>
        <form method="post" action="{{URL::to('_admin_login/language_doinsert')}}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td class="list" style="vertical-align: top">Language Logo</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list">
                        <input type="file" name="file" accept="image/*" required="required">
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Language Code</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'lang_id', 'form-control', '', '', '', 1);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Language Name</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'lang_name', 'form-control', '', '', '', 1);
                        ?>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-success">Add Language</button>
        </form>
        <br/>
        <h3>Language List :</h3>
        <table class="table">
            <tr>
                <th>Language Name</th>
                <th>Language Code</th>
                <th>Language Icon</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($lang_list as $lang) {
                $lang_id = $lang->lang_id;
                $lang_name = $lang->lang_name;
                $lang_icon = $lang->lang_icon;
                $flag_default = $lang->flag_default;
                ?>
                <tr>
                    <td><?php echo "$lang_name" ?></td>
                    <td><?php echo "$lang_id" ?></td>
                    <td>
                        <?php
                        if ($lang_icon != "") {
                            ?>
                            <img src="{{URL::to("/images/$lang_icon")}}" height="30px">
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($flag_default == 1) {
                            echo "Default Language";
                        } else if ($flag_default == 0) {
                            ?>
                            <form method="post" action="">
                                @csrf
                                <?php
                                $function->textbox('hidden', 'lang_id', '', $lang_id);
                                ?>
                                <button class="btn btn-default btn-xs" formaction="{{URL::to('_admin_login/language_setdefault')}}">Set as default</button>                               
                            </form>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <form method="post" action="">
                            @csrf
                            <?php
                            $function->textbox('hidden', 'lang_id', '', $lang_id);
                            ?>
                            <button class="btn btn-primary btn-xs" formaction="{{URL::to('_admin_login/language_update')}}">Update</button>
                            <?php
                            if ($flag_default != 1) {
                                ?>
                                <button class="btn btn-danger btn-xs" formaction="{{URL::to('_admin_login/language_delete')}}" onclick="return confirm('Are You Sure Delete?')">Delete</button>
                                <?php
                            }
                            ?>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
@endsection
