@extends('layout.index_admin')
@section('content')
<?php
$function = new \App\MainFunction\MainFunction();
$function->headertext("Matrix Menu");
$function->print_result();
?>
<form method="get" action="">
    <table>
        <tr>
            <td class="list">
                Select Role
            </td>
            <td class="list">
                :
            </td>
            <td class="list">
                <select name="idrole" class="form-control" onchange="this.form.submit()">
                    <option value="">Choose Role</option>
                    <?php
                    foreach ($selectlist as $selectlist) {
                        $LookupValue = $selectlist->LookupValue;
                        $LookupDescription = $selectlist->LookupDescription;
                        if ($LookupValue == $idrole) {
                            ?>
                            <option value="<?php echo "$LookupValue" ?>" selected="selected"><?php echo "$LookupDescription" ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo "$LookupValue" ?>"><?php echo "$LookupDescription" ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
    </table>

</form>
<br/>
<?php
if ($arr_getmenu != 0 and $idrole != 0) {
    ?>
    <div class="table-responsive">
        <form method="post" action="{{URL::to('/_admin_login/doupdate_matrixmenu')}}">
            <input type="hidden" name="idrole" value="<?php echo "$idrole" ?>">
            @csrf
            <table class="table">
                <tr>
                    <th class="kanan">

                    </th>
                    <th>
                        Menu Name
                    </th>
                    <th>

                    </th>

                </tr>
                <?php
                foreach ($arr_getmenu as $listmenu) {
                    $idmenu = $listmenu->id;
                    $displayname = $listmenu->displayname;
                    $menulvl = $listmenu->menulvl;
                    ?>
                    <tr>
                        <td class="kanan">
                            <?php
                            $flagcheck = 0;
                            foreach ($arr_gettr as $trlist) {
                                $idmenutr = $trlist->idmenu;
                                if ($idmenu == $idmenutr) {
                                    $flagcheck = 1;
                                }
                            }
                            if ($flagcheck == 1) {
                                ?>
                                <input type="checkbox" name="check[]" checked="checked" value="<?php echo "$idmenu" ?>">
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" name="check[]" value="<?php echo "$idmenu" ?>">
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            if ($menulvl == 1) {
                                echo "$displayname";
                            } else if ($menulvl == 2) {
                                ?>
                                <span class="fa fa-minus"></span>&nbsp;<?php echo "$displayname"; ?>
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <?php
}
?>
@endsection
