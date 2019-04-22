<?php
 session_start();
require_once "layouts/header.php";

?>


<?php
if (isset($_GET['action'])&&(file_exists(('views/'. $_GET['action'] .'.php')))){
    include ('views/'. $_GET['action'] .'.php');
}
else{
    include ('views/main.php');
};

?>

<?php require_once "layouts/footer.php"?>

<?php


?>