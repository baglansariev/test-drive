<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="<?php echo $this->asset->getMetaDesc() ?>">
        <meta name="keywords" content="<?php echo $this->asset->getMetaKeys() ?>">
        <title><?php echo $this->asset->getTitle() ?></title>
        <link rel="shortcut icon" href="/public/images/icons/favicon.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption&display=swap" rel="stylesheet">
        <link  rel="stylesheet" href="/public/style/font-awesome/css/all.min.css">
        <link  rel="stylesheet" href="/public/style/owl-carousel/owl.carousel.min.css">
        <link  rel="stylesheet" href="/public/style/owl-carousel/owl.theme.default.min.css">
        <link rel="stylesheet" href="/public/style/bootstrap/bootstrap-grid.css">
        <link rel="stylesheet" href="/public/style/bootstrap/bootstrap.css">
        <? foreach($this->asset->getCss() as $css): ?>
            <link rel="stylesheet" href="<?php echo $css ?>">
        <? endforeach ?>
        <link rel="stylesheet" href="/public/style/css/main.css">
        <script type="text/javascript" src="/public/style/js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript" src="/public/style/owl-carousel/owl.carousel.min.js"></script>
        <script type="text/javascript" src="/public/style/font-awesome/js/all.min.js"></script>
        <? foreach($this->asset->getJs() as $js): ?>
            <script type="text/javascript" src="<?php echo $js ?>"></script>
        <? endforeach ?>
        <script type="text/javascript" src="/public/style/js/app.js"></script>
    </head>
    <body>
        <?php echo $content ?>
        <script type="text/javascript" src="/public/style/bootstrap/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="/public/style/bootstrap/bootstrap.js"></script>
    </body>
</html>