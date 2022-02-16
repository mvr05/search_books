<?php 
if (isset($_POST['all_books'])){
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'biblioteka2';
    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf-8'");


    

    /*if(isset($_GET['update'])){
        $update = $_GET['update'];
        $query = "SELECT * FROM books WHERE id_number_book=$update";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for($data=[]; $row = mysqli_fetch_assoc($result); $data[] = $row);
        foreach($data as $el){
            $publication = $el['publication'];
            $author = $el['author'];
            $title = $el['title'];
            $year_books = $el['year_books'];
        }
        echo $publication;
    }*/


    $query = "SELECT * FROM books";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data=[]; $row = mysqli_fetch_assoc($result); $data[] = $row);
    $result = '
    <table border="1 solid" class="no_double">
    <tr class = "zagolovok">
        <td>Издание</td>
        <td>Автор</td>
        <td>Название</td>
        <td>Год</td>
        <td>Удаление</td>
    </tr>';
    foreach($data as $el) {
        $result .= '<tr>';

        $result .= '<td>' . $el['publication'] .' </td>';
        $result .= '<td>' . $el['author'] . ' </td>';
        $result .= '<td>' . $el['title'] . ' </td>';
        $result .= '<td>' . $el['year_books'] . '</td>';
        $result .= '<td><a class="delete" href="delete.php?del=' .$el['id_number_book'] . '">Удалить</a></td>';
        //$result .= '<td><a class="delete" href="delete.php">Удалить</a></td>';
        
        $result .= '</tr>';
    }
    $result .= '</table>';
}

session_start();
$_SESSION['result_all'] = $result;
header('Location: /php_usue/kt4/biblioteka.php');
?>