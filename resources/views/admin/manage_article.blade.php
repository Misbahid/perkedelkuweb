@extends('layout.index_admin')
@section('content')
<?php
$function = new \App\MainFunction\MainFunction();
$function->headertext("Manage Article");
$function->print_result();
?>
<div class="row">
    <br/>
    <div class="col-md-12">
        <a href="{{URL::to('_admin_login/add_article')}}"><button class="btn btn-primary">Add Article</button></a>
    </div>
    <br/>
    <br/>
    <br/>
    <div class="col-md-12">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Pic</th>
                <th>Action</th>
            </tr>
            <?php
            $x = 1;
            foreach ($article_list as $list) {
                $title = $list->title;
                $cat = $list->catname;
                $pic = $list->thumb_image;
                $id = $list->id;
                ?>
                <tr>
                    <td><?php echo "$x" ?></td>
                    <td><?php echo "$title" ?></td>
                    <td><?php echo "$cat" ?></td>
                    <td>
                        <img src="{{URL::to("images/article/$pic")}}" height="150px">
                    </td>
                    <td>
                        <form method="post" action="">
                            @csrf
                            <?php
                            $function->textbox('hidden', 'id', '', $id);
                            ?>
                            <button type="submit" class="btn btn-primary" formaction="{{URL::to('_admin_login/article_update')}}">Update</button>
                            <button type="submit" class="btn btn-danger" formaction="{{URL::to('_admin_login/delete_article')}}" onclick="return confirm('Are You Sure Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                $x++;
            }
            ?>
        </table>
    </div>
</div>
@endsection
