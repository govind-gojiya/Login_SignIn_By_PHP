<?php

$server = 'localhost';
$user = 'root';
$pwd = '';
$db = 'webphp';

$con = mysqli_connect($server, $user, $pwd, $db);

if($con) {
    ?>
    <script>
        alert('Connection Successfull.😀');
    </script>
    <?php
} else {
    ?>
    <script>
        alert('Connection Erorr.💥');
    </script>
    <?php
}

?>