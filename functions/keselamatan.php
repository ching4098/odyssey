<?php
if(!(isset($_SESSION['idPengguna']))) {
    session_destroy();
    header ("location: ../pages/login.php");
}
?>