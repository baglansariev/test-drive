<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="description" content="<?= $this->asset->getMetaDesc() ?>">
	<meta name="keywords" content="<?= $this->asset->getMetaKeys() ?>">
	<title><?= $this->asset->getTitle() ?></title>
	<link rel="shortcut icon" href="/public/images/icons/favicon.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="/public/style/css/main.css">
	<link rel="stylesheet" href="/public/style/bootstrap/bootstrap-grid.css">
	<link rel="stylesheet" href="/public/style/bootstrap/bootstrap.css">
	<? foreach($this->asset->getCss() as $css): ?>
	<link rel="stylesheet" href="<?= $css ?>">
	<? endforeach ?>
	<script type="text/javascript" src="/public/style/js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="/public/style/js/app.js"></script>
	<? foreach($this->asset->getJs() as $js): ?>
	<script type="text/javascript" src="<?= $js ?>"></script>
	<? endforeach ?>
</head>
<body>
	<?= $header ?>
	<?= $content ?>
	<?= $footer ?>
	<script type="text/javascript" src="/public/style/bootstrap/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="/public/style/bootstrap/bootstrap.js"></script>
</body>
</html>