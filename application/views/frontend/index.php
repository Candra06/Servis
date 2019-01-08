<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title><?= $tittle ?></title>

    <!-- vendor css -->
    <link href="<?= base_url() ?>asset/app/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/app/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/app/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/app/css/bracket.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/app/css/bracket.dark.css">

    <script src="<?= base_url() ?>asset/app/lib/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  </head>

  <body>

    <?php
        if(isset($_SESSION['email'])){
            if($_SESSION['email']){
                redirect(base_url('dashboard'));
            }
        }

        include str_replace("system", "application/views/frontend/", BASEPATH)."layout/content.php";
    ?>

  </body>
</html>
