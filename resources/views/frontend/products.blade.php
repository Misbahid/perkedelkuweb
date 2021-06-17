@extends('layout.index')
@section('seo')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
@endsection
@section('content')
<?php
$function = new App\MainFunction\MainFunction();
?>
<img src="{{URL::to("images/$top_image")}}" width="100%">
<img src="{{URL::to('images/Ornament.png')}}" class="line_home">
<div class="product_home cont_content">
    <div class="container">
        <div class="row cont_products">
            <h1 class="lobster" style="text-align: right"><?php echo "$catname" ?></h1>
            <span class="blisfull"><?php echo "$content" ?></span>
            <?php
            foreach ($list_article as $article_list) {
                $image = $article_list->thumb_image;
                $title = $article_list->title;
                $permalink = $article_list->permalink;
                $catname_article = $article_list->catname;
                ?>
                <div class="col-md-3" align="center" style="padding:10px!important">
                    <img src="{{URL::to("images/article/$image")}}" width="100%">
                    <span class="blisfull" style="font-size: 20px">
                        <p><?php
                            echo "$title";
                            ?></p>
                    </span>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3" align='center' style="padding:40px">
                <a href=""><img src="http://192.168.80.122:8000/images/article/5c4ad553c2744.png" width="100%" /></a> <br/>
                <p class="blisfull" style="font-size: 20px">Nutrijell Lychee</p>
            </div>
            <div class="col-md-3" align='center' style="padding:40px">
                <a href=""><img src="http://192.168.80.122:8000/images/article/5c4ad530c5df3.png" width="100%" /></a> <br/>
                <p class="blisfull" style="font-size: 20px">Nutrijell Strawberry</p>
            </div>
            <div class="col-md-3" align='center' style="padding:40px">
                <a href=""><img src="http://192.168.80.122:8000/images/article/5c4ad5138ec6c.png" width="100%" /></a> <br/>
                <p class="blisfull" style="font-size: 20px">Nutrijell Mango</p>
            </div>
            <div class="col-md-3" align='center' style="padding:40px">
                <a href=""><img src="http://192.168.80.122:8000/images/article/5c4979cea346a.png" width="100%" /></a> <br/>
                <p class="blisfull" style="font-size: 20px">Nutrijell Chocolate</p>
            </div>
        </div>
    </div>
</div>
@endsection