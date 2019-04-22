<?php
session_start();
if(!$_SESSION["admin"]) die(Заборонено);
session_destroy();

echo '<script type="text/javascript">';
echo 'window.location.href="'."/index.php?action=main".'";';
echo '</script>';
exit;
?>
