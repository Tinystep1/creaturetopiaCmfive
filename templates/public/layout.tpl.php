<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        $w->enqueueStyle(array("name" => "publicstyle.css", "uri" => "/modules/creaturetopia/assets/css/publicstyle.css", "weight" => 950));
        ?>
        <!-- <link rel="stylesheet" type="text/css" href="/creaturetopia/assets/css/publicstyle.css"> -->
        <?php
        $w->outputStyles();
        $w->outputScripts();
        ?>
    </head>
<body>
<div class="row-fluid body">
            <?php // Body section w/ message and body from template ?>
            <div class="row-fluid <?php // if(!empty($boxes)) echo "medium-10 small-12 "; ?>">
                <?php if (empty($hideTitle) && !empty($title)) :?>
                <div class="row-fluid small-12">
                    <h3 class="header"><?php echo $title; ?></h3>
                </div>
                <?php endif;?>
                <?php
                if (!empty($error)) {
                    echo Html::alertBox($error, "warning");
                } elseif (!empty($msg)) {
                    echo Html::alertBox($msg);
                }
                ?>
                <div class="row-fluid" style="overflow: hidden;">
                    <?php echo !empty($body) ? $body : ''; ?>
                </div>
            </div>
        </div>
    </body>
</html>




