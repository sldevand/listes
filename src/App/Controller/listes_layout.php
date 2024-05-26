<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/materialize.css">
        <link rel="stylesheet" type="text/css" href="css/style-parent.css">

        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/materialize.js"></script>

        <title> <?php echo $siteTitle; ?> </title>
    </head>

    <body>
        <?php echo $navbar->getHTML(); ?>

        <div id="main-content" class="container">
            <?php echo $content; ?>
        </div>

        <script src="js/eventListeners.js"></script>
    </body>
</html> 
