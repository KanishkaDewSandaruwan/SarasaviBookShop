<?php 
    if(!isset($_SESSION['admin']) ||  $_SESSION['admin'] != 'admin'){
        echo '<script>window.location.href = "login.php"; </script>';
    }
?>