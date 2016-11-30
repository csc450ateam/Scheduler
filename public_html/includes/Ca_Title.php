<?php

$title = basename($_SERVER['SCRIPT_FILENAME'], '.php');
$title = str_replace('_', ' ', $title);
if ($title == 'home'){
    $title = 'home';
}
$title = ucwords($title);
/**
 * Created by PhpStorm.
 * User: ALE
 * Date: 10/18/16
 * Time: 3:19 PM
 */