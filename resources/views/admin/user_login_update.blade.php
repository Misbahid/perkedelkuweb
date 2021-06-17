@extends('layout.index_admin')
@section('content')
<?php
$function = new \App\MainFunction\MainFunction();
$function->headertext("Update User Login");
$function->print_result();
$id_user = $user_detail[0]->LoginId;
$username = $user_detail[0]->UserName;
$password = $user_detail[0]->Password;
$alias = $user_detail[0]->Alias;
?>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{URL::to('_admin_login/user_login_doupdate')}}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td class="list" style="vertical-align: top">Username</td>
                    <td class="list" style="vertical-align: top">:</td>
                        <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'username', 'form-control', $username, '', '', 1, 1);
                        $function->textbox('hidden', 'id_user', '', $id_user);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Password</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                     <?php
                        $function->textbox('text', 'password', 'form-control', '', '', '', 1);
                        ?>   
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Akses</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                         <select name="type_user" class="form-control">
                            <?php
                            foreach ($type_akses as $type) {
                                echo "<option value='$type->type_akses' selected='selected'' >$type->type_akses</option>";
                            }
                            ?>


                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-success">Update User</button>
        </form>
    </div>
</div>
@endsection
