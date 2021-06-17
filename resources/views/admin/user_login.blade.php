@extends('layout.index_admin')
@section('content')
<?php
$function = new \App\MainFunction\MainFunction();
$function->headertext("User Login");
$function->print_result();
?>
<div class="row">
    <div class="col-md-12">
        <h3>Insert User</h3>
        <form method="post" action="{{URL::to('_admin_login/user_login_doinsert')}}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td class="list" style="vertical-align: top">Username</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list" style="vertical-align: top">
                        <?php
                        $function->textbox('text', 'username', 'form-control', '', '', '', 1);
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
                    <td class="list"style="vertical-align: top">Hak Akses</td>
                    <td class="list"style="vertical-align: top">:</td>
                    <td class="list"style="vertical-align: top">
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
            <button type="submit" class="btn btn-success">Add User</button>
        </form>
        <br/>
        <h3>User List :</h3>
        <table class="table">
            <tr>
                <th>UserName</th>
                <th>Password</th>
                <th>Akses</th>
                <th>Status</th>
                <!--<th>Action</th>-->
            </tr>
            <?php
            foreach ($user_list as $user) {
                $username = $user->UserName;
                $id_user = $user->LoginId;
                $pass_user = $user->Password;
                $alias_user = $user->Alias;
                ?>
                <tr>
                    <td><?php echo "$username" ?></td>
                    <td><?php echo "$pass_user" ?></td>
                    <td><?php echo "$alias_user" ?></td>
                    <!--<td>
                        
                            <form method="post" action="">
                                @csrf
                                
                                <button class="btn btn-default btn-xs" formaction="{{URL::to('_admin_login/language_setdefault')}}">Set as default</button>                               
                            </form>
                           
                    </td>-->
                    <td>
                        <form method="post" action="">
                            @csrf
                            <?php
                            $function->textbox('hidden', 'id_user', '', $id_user);
                            ?>
                            <button class="btn btn-primary btn-xs" formaction="{{URL::to('_admin_login/user_login_update')}}">Update</button>
                            <button class="btn btn-danger btn-xs" formaction="{{URL::to('_admin_login/user_login_delete')}}" onclick="return confirm('Are You Sure Delete?')">Delete</button>

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
