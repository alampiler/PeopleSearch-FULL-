<?php
require_once("functions.php");
require_once ("../database/db.php");

if(isset($_GET['red_id'])){
    $add = true;
    $add_id = $_GET['red_id'];
    admin_check($add, $add_id);

    echo '<script type="text/javascript">';
    echo 'window.location.href="'."/index.php?action=admin_panel".'";';
    echo '</script>';

}

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    admin_delete($del_id);

    echo '<script type="text/javascript">';
    echo 'window.location.href="'."/index.php?action=admin_panel".'";';
    echo '</script>';

}