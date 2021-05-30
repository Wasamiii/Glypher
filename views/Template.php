<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="public/CSS/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="public/JS/CallApi.js"></script>


</head>
<header>
    <?php require_once("menu.php");?>
</header>
<body>

    <div id="timer" data-cycle="">
    <span id="day"><img id="svgday" src="public\IMG\sun-solid.svg"></i>Day</span>
    <span id="night"><img  id="svgnight"src="public\IMG\moon-solid.svg" alt="Night on cetus"></img>Night</span>
    <span id="countdown"></span>
    </div>
    <?=$content?>
    
    <footer></footer>

</body>
</html>