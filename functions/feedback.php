<?php
    require_once("functions.php");
    require_once ("../database/db.php");

if(isset($_POST['feedback_name']) && isset($_POST['feedback_tel']) && isset($_POST['feedback_email']) && isset($_POST['feedback_text'])) {
    $name = (trim($_POST['feedback_name']));
    $tel = (trim($_POST['feedback_tel']));
    $email = (trim($_POST['feedback_email']));
    $text = (trim($_POST['feedback_text']));

    $insert_result = insert_subscribes($name, $email, $tel);

    $header = 'Location: /?action=main';
    $header .= $insert_result;

}
else{
    header('Location: /');
}



//echo $name, $tel, $email, $text;

