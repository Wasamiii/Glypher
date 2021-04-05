<?php
session_start();
require('controller/controller.php');
try{
    if(isset($_GET['action'])){
        $callAction =$_GET['action'];

    }else{
        $callAction = "";
    }
    switch($callAction){
        case'basicglyphers':
            basicglypher();
        break;



        default: basicglypher();
    }
}
catch (Exception $e){
    echo "Error:" . $e->getMessage();
}