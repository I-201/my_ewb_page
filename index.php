<!DOCTYPE html>
<html class="no-js" lang="ja"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>no_title</title>
        <meta name="description" content="">
        <meta name="author" content="anonimus">

        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- CSS Reset -->
        <link rel="stylesheet" href="./css/reset.css">

        <!-- Global CSS for the page and tiles -->
        <link rel="stylesheet" href="./css/main.css">

        <!-- Lightbox -->
        <link rel="stylesheet" type="text/css" href="./resource/lightbox.css" media="screen,tv" />
        <script type="text/javascript" charset="UTF-8" src="./resource/lightbox_plus.js"></script>

        <style>
            /**
             * Grid items
             */
            #tiles li {
                -webkit-transition: all 0.3s ease-out;
                -moz-transition: all 0.3s ease-out;
                -o-transition: all 0.3s ease-out;
                transition: all 0.3s ease-out;
            }
        </style>
    </head>
    <body>

        <div id="container">
            <header>
                <!-- <h1>會津美人</h1> -->
                <!--
                 <p>The items with the 'stamped' descriptions keep their positions even if they are defined out of order in the code.</p>
                 <p>Each number in the descriptions represent their real index in the html code.</p>
                 <p>You can stamp the first item to the right by setting the direction option to 'right'.</p>
                -->
            </header>
            <br/>

            <div id="main" role="main">

                <ul id="tiles">

                    <?php
                    //なぜ文字列連結できないし...
                    $dir_path = 'C:/xampp/htdocs/PhpProject1/my_web_page/sample-images/';
                    $files = scandir($dir_path);
                    //print_r($files);

                    foreach ($files as $value) {
                        ?>

                        <li>
                            <a href=<?php echo './sample-images/' . $value ?> rel="lightbox">
                                <img src=<?php echo './sample-images/' . $value ?> width="200">
                            </a>
                            <p><?php echo $value?></p>
                        </li>

                    <?php } ?>

                </ul>
            </div>
            <hr>
        </div>



        <!-- include jQuery -->
        <script src="./libs/jquery.min.js"></script>

        <!-- Include the imagesLoaded plug-in -->
        <script src="./libs/jquery.imagesloaded.js"></script>

        <!-- Include the plug-in -->
        <script src="./libs/jquery.wookmark.js"></script>

        <!-- Once the page is loaded, initalize the plug-in. -->
        <script type="text/javascript">
            (function ($) {
                $('#tiles').imagesLoaded(function () {
                    function comparatorIsStamped(a, b) {
                        var $a = $(a), $b = $(b);
                        // Check if tile should be the first one
                        if (!$a.hasClass('stamped-first') && $b.hasClass('stamped-first'))
                            return 1;
                        // Check if tile should be the last one
                        if ($a.hasClass('stamped-last') && !$b.hasClass('stamped-last'))
                            return 1;
                        // Check if tile should the fourth one
                        if (!$a.hasClass('stamped-fourth') && $b.hasClass('stamped-fourth') && $a.index() >= 4)
                            return 1;
                        return -1;
                    }

                    // Prepare layout options.
                    var options = {
                        autoResize: true, // This will auto-update the layout when the browser window is resized.
                        container: $('#main'), // Optional, used for some extra CSS styling
                        offset: 2, // Optional, the distance between grid items
                        itemWidth: 210, // Optional, the width of a grid item
                        comparator: comparatorIsStamped, // Used to sort the items
                        direction: 'left' // Set this to 'right' if you want to stamp the 'stamped-first' item to the right
                    };

                    // Get a reference to your grid items.
                    var $handler = $('#tiles li');

                    $handler.each(function (i) {
                        console.log($(this).index() + ':' + $(this).find('p').text());
                    });

                    // Call the layout function.
                    $handler.wookmark(options);
                });
            })(jQuery);
        </script>
    </body>
</html>
