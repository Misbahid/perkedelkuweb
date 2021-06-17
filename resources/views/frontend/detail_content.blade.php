@extends('layout.index')
@section('seo')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')
<?php
$top_image = $header[0]->main_image;
$video_url = $header[0]->video_url;
$title = $detail[0]->title;
$content = $detail[0]->content;
$catname = $detail[0]->catname;
$permalink = $detail[0]->permalink;
?>
<div class="paddingtopcontentdetail">
    <div class="product_home cont_content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{URL::to("images/article/$top_image")}}" class="detailimg">
                    <div class="detailimg">
                        <?php if (is_null($video_url)){
                            echo "<div class='nullpadding'></div>";
                        }else {
                            echo "$video_url";
                        } ?>
                    </div>
                </div>               
                <div class="col-md-8">
                    <div align="right">
                        <br/>
                        <br/>
                        <h1 class="lobster4"><?php echo "$title" ?></h1>
    <!--                    <span class="blisfull5">
                            <a href="{{URL::to("/content/$permalink")}}"><p><?php echo "$catname" ?></p></a>
                        </span>-->
                        <br/><br/>
                    </div>
                    <span class="blisfull6">
                        <?php echo "$content" ?>
                    </span>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection