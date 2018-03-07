<?php
require_once "dbfunctions.php";

$Emails = getEmails();
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

                    <div class="text-center mb-4">
                        <i class="far fa-envelope"></i>
                        <h1 class="h3 mb-3 font-weight-normal">Crowd Mailer</h1>
                        <p>A simple program to send custom emails to a group of persons.</p>
                        <button type="button" id="btn-toggle" class="btn btn-dark btn-sm">Check your current mailing list...</button>
                    </div>

                    <div class="card" id="mailing-list">
                        <div class="card-body">
                            <?php if (count($Emails) > 0) {?>
                                <strong>This is your current mailing list :</strong><br>
                                <?php foreach ($Emails as $email)
                                    echo $email['Name'].' - <a href="mailto:'.$email['Email'].'">'.$email['Email'].'</a><br>'
                                ?>
                            <?php } else { ?>
                            <strong>There isn't any recipient.</strong><br>Please add recipients in your 'Emails' table.
                            <?php } ?>
                        </div>
                    </div>
                    <form class="form-signin" action="crowdmailer.php" method="post">
                        <div class="form-label-group">
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <input type="email" id="from" name="from" class="form-control" placeholder="Send email from..." required >
                        </div>

                        <div class="form-label-group">
                            &nbsp;Hello &lt;name&gt; !
                            <textarea name="message" id="message" class="form-control" placeholder="Message to send... Btw, this text area support HTML!" required ></textarea>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block" type="submit">Send !</button>
                        <p class="mt-4 mb-3 text-muted text-center">&copy; 2018 - Olivier Brassard<br><a href="https://github.com/obrassard/CrowdMailer">Check on GitHub</a></p>

                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
    <script>
        $( "#btn-toggle" ).click(function() {
            $( "#mailing-list" ).slideToggle()
        });
    </script>
</html>

