<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'biblioteka2';
    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf-8'");

    if(isset($_POST['add_b'])){
        $publication = $_POST['publication'];
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $all = $surname .' '. $name;
        $title = $_POST['title'];
        $year_books = $_POST['year_books'];
        $query = "INSERT INTO books SET publication='$publication', author='$all', title='$title', year_books='$year_books'";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $result = "Книга добавлена!";
    }
    session_start();
    $_SESSION['add_result'] = $result;
    header('Location: /php_usue/kt4/biblioteka.php');
?>