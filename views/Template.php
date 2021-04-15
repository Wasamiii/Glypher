<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="public/CSS/style.css">
    <script src="JS/main.js" type="text/javascript"></script>
</head>
    <header>
    <?php require_once("menu.php");?>
    </header>
<body>
    <?=$content?>
</body>
    <footer></footer>
</html>