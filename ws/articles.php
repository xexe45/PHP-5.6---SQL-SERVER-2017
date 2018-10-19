<?php

require_once('../Models/Articles.php');

if(isset($_GET)){
    $obj = new Articles();
    $articles = $obj->getAll();
    echo json_encode($articles);
}