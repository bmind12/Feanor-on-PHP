<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="/template/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/template/css/styles.css"/>

        <?php foreach ($categoriesList as $category):?>
            <?php if ($category['selected']):?>
              <title><?=$category['description']; ?></title>
            <?php endif;?>
        <?php endforeach;?>

        <!-- Add jQuery library -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <!-- Add fancyBox -->
        <link rel="stylesheet" href="/template/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
        <script type="text/javascript" src="/template/fancybox/source/jquery.fancybox.pack.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $(".fancybox").fancybox();
            });
        </script>

    </head>

    <body>
        <div id="head">
            <img id="logo" src="http://feanor.cz/images/logo_studio.gif">
        </div>
