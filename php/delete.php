<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'biblioteka2';
    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf-8'");
    if(isset($_GET['del'])){
        $del = $_GET['del'];
        $query = "DELETE FROM books WHERE id_number_book=$del";
        mysqli_query($link, $query) or die(mysqli_error($link));
    }
    header('Location: /php_usue/kt4/biblioteka.php');
?>