<?php
require_once("functions.php");
require_once ("../database/db.php");

if(isset($_POST['m_req'])){
    $img_name = $_FILES['m_photo']['name'];
    $img_tmp = $_FILES['m_photo']['tmp_name'];
    $type = (trim($_POST['m_type']));
    $model_name = (trim($_POST['m_model_name']));
    $photo = get_image($img_name, $img_tmp);
    $tel = (trim($_POST['m_tel']));
    $last_see_d = (trim($_POST['m_last_see_date']));
    $last_see_t = (trim($_POST['m_last_see_time']));
    $last_see_city = (trim($_POST['m_last_see_city']));
    $signs_text = (trim($_POST['m_spec_feat_text']));
    $last_see_text = (trim($_POST['m_last_see_text']));
    $date = (trim($_POST['post_date']));




    $post_date = date('Y-m-d H:i', $date = time());
    $last_see_date = date('Y-m-d', $last_see_d = time());
    $last_see_time = date('H:i:m', $last_see_t = time());

    $insert_result = request_material($type, $model_name, $photo, $tel, $last_see_date, $last_see_time, $last_see_city, $signs_text, $last_see_text, $post_date);

    echo '<script type="text/javascript">';
    echo 'alert("Ваші дані надіслані на перевірку.");';
    echo '</script>';

    echo '<script type="text/javascript">';
    echo 'window.location.href="'."/index.php?action=main".'";';
    echo '</script>';
}

if(isset($_POST['p_req'])){
    $img_name = $_FILES['p_photo']['name'];
    $img_tmp = $_FILES['p_photo']['tmp_name'];

    $surname = (trim($_POST['p_surname']));
    $name = (trim($_POST['p_name']));
    $surname_2 = (trim($_POST['p_surname_2']));
    $photo = get_image($img_name, $img_tmp);
    $tel = (trim($_POST['p_tel']));
    $last_see_d = (trim($_POST['p_last_see_date']));
    $last_see_t = (trim($_POST['p_last_see_time']));
    $last_see_city = (trim($_POST['p_last_see_city']));
    $signs_text = (trim($_POST['p_spec_feat_text']));
    $sex = (trim($_POST['sex']));
    $birthday = (trim($_POST['p_birthday']));
    $oos_zone = (trim($_POST['p_zone']));
    $last_see_text = (trim($_POST['p_last_see_text']));
    $date = (trim($_POST['post_date']));

    $post_date = date('Y-m-d H:i', $date = time());
    $last_see_date = date('Y-m-d', $last_see_d = time());
    $last_see_time = date('H:i:m', $last_see_t = time());

    $insert_result = request_people($surname, $name, $surname_2, $photo, $last_see_city, $last_see_date,
        $last_see_time, $sex, $signs_text, $last_see_text, $tel, $birthday, $oos_zone, $post_date);

    echo '<script type="text/javascript">';
    echo 'alert("Ваші дані надіслані на перевірку.");';
    echo '</script>';

    echo '<script type="text/javascript">';
    echo 'window.location.href="'."/index.php?action=main".'";';
    echo '</script>';
}

