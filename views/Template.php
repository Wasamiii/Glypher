<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="public/IMG/Warframe-glypher-head_256.png" type="image/x-icon"/>
    <link rel="icon" type="image/png" href="public/IMG/Warframe-glypher-head_256.png"/>
    <link rel="stylesheet" href="public/CSS/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>
<body class ="dark">
    <header>
        <?php require_once("menu.php");?>
    </header>
    <?=$content?>
    <footer></footer>
</body>
</html>