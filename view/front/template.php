<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen and (max-width: 575px)" href="public/css/smallScreen.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 576px) and (max-width: 959px)" href="public/css/mediumScreen.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 960px)" href="public/css/largeScreen.css">
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/general.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <?= $content ?>
    <?php require('footer.php'); ?>
</body>
</html>