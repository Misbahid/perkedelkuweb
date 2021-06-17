@extends('layout.index')
@section('seo')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')
<?php
$function = new App\MainFunction\MainFunction();
if (empty($list_article)) {
//    $top_image = 'TopBanner_01.png';
//    echo '<img src="../images/article/'.$top_image.'" width="100%">';

} else {
//    $top_image = 'TopBanner_01.png';
//     echo '<img src="../images/article/'.$top_image.'" width="100%">';
}
?>
<div class="paddingtopcontent">
    <div class="container">

        <?php
        if ($catname != "") {
            ?>
    <!--        <h1 class="lobster3" style="text-align: right"><?php echo "$catname" ?></h1>-->
            <?php
        }
        $function = new App\MainFunction\MainFunction();
        $function->print_result();
        foreach ($list_article as $article_list) {
            $image = $article_list->thumb_image;
            $title = $article_list->title;
            $permalink = $article_list->permalink;
            $catname_article = $article_list->catname;
            $content_article = $article_list->content;
            $cut_content = $function->cutcontent($content_article);
            ?>
            <div class="row" style="padding-top: 30px;padding-bottom: 30px" data-aos="fade-up">
                <div class="col-md-3 col-xs-3 col-sm-3 " style="padding:10px!important">
                    <a href="{{URL::to("/article/$permalink")}}"><img src="{{URL::to("images/article/$image")}}" class="imgcontent"></a>
                </div>
                <div class="col-md-9 col-xs-9 col-sm-9 ">
                    <span >
                        <p>
                            <?php
                            echo "<h1 class='titlearticleblisfull'>$title </h1>";
                            echo "<br/><div class='blisfull5'>$cut_content</div>";
                            if ($catname == "") {
                                echo "<br/><div class='blisfull5'>$catname_article</div>";
                            }
                            ?>         
                            <a class="readmoreblisfull" href="{{URL::to("/article/$permalink")}}"><?php echo "$read_more" ?></a>
                        </p>
                    </span>

                </div>
            </div>
            <?php
        }
        ?>

    </div>
    @endsection