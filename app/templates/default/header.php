<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $data['title'] . ' - ' . SITETITLE; //SITETITLE defined in app/core/config.php     ?></title>

        <?php
        helpers\assets::css(array(
            'http://' . helpers\url::template_path() . 'assets/css/bootstrap.min.css',
            'http://' . helpers\url::template_path() . 'assets/css/dashboard.css',
        ))
        ?>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project Score</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="login.html">Uitloggen</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
