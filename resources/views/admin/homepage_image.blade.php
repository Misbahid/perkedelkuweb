@extends('layout.index_admin')
@section('content')
<?php
$function = new \App\MainFunction\MainFunction();
$function->headertext("Home & Contact Page Image");
$function->print_result();
?>
<div class="row">
    <div class="col-md-12">
        <h3>Insert Language</h3>
        <form method="post" action="{{URL::to('_admin_login/homepage_image_update')}}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td class="list" style="vertical-align: top">Home Top Image <br/> 1300px x 750px</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list">
                        <img src="{{URL::to("images/$top_image")}}" width="300px">
                        <input type="file" name="top_image" accept="image/*">
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Home Middle Image <br/> 1300px x 750px</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list">
                        <img src="{{URL::to("images/$mid_image")}}" width="300px">
                        <input type="file" name="middle_image" accept="image/*">
                    </td>
                </tr>
                <tr>
                    <td class="list" style="vertical-align: top">Contact Top Image <br/> 1300px x 750px</td>
                    <td class="list" style="vertical-align: top">:</td>
                    <td class="list">
                        <img src="{{URL::to("images/$contact_top_image")}}" width="300px">
                        <input type="file" name="contact_top" accept="image/*">
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-success">Update Image</button>
        </form>
    </div>
</div>
@endsection
