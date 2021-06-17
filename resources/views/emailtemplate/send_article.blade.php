<html>
    <?php
    if (isset($emaildata)) {
        $name = $emaildata->name;
        $title_article = $emaildata->title_article;
        $desc_article = $emaildata->desc_article;
        $link = $emaildata->link;
    }
    ?>
    <title>Artikel dari website</title>        
    <head></head>    
    <body>    
        <div>
            Dear <?php echo "$name" ?>, 
            <br/>
            <br/>
        </div>        
        <div>
            Ada Artikel baru dari website :<br/>
            <h1><?php echo "$title_article" ?></h1><br/>
            <?php echo "$desc_article" ?><br/>
            <?php echo URL::to("article/$link") ?><br/>
            <img src='cid:'$filenamesave_thumb>
        </div>                                
        <div>
            <br/>
            <br/>
            Regards,<br/><br/>          
            This email is an auto generated email by system, please do not reply this email.
        </div>
    </body>
</html>


