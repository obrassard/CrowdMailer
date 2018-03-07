<?php
/**
 * result.php
 * Created by Olivier Brassard on 06-03-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */
require_once "dbfunctions.php";
$result = validateGet("r");

if(!$result){
    header('Location: index.php');
    die();
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>CrowdMailer</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- FontAwesome -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <!-- Custom styles  -->
        <link href="style.css" rel="stylesheet">

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="text-center mb-4" id="result">
                        <?php

                            if($result == "failed"){ ?>
                                <i class="far fa-times-circle result-icon red"></i>
                                <h1 class="">Oh no !</h1>
                                <h3>An error occurred...<br>Your message has not been sent.</h3>
                                <br>
                                <a class="btn btn-primary btn-lg" href="index.php">Try again</a>
                            <?php } else { ?>
                                <i class="far fa-check-circle result-icon green"></i>
                                <h1 class="">Success !</h1>
                                <h3>Your message has been sent to <?php echo $result?> persons!</h3>
                                <br>
                                <a class="btn btn-primary btn-lg" href="index.php">Send another mail</a>
                            <?php } ?>
                        <br>

                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    </body>

</html>

