<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,400;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/php_usue/kt4/css/style.css">
    <link rel="stylesheet" href="/php_usue/kt4/css/red.css">
    <title>Редактирование книги</title>
</head>
<body>
    <header class = "header">
        <h1 class = "header_text"><a class = "header_text_link" href="/php_usue/kt4/biblioteka.php">Библиографический поиск</a></h1>
    </header>
    <?php
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'biblioteka2';
        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf-8'");

        $query="SELECT * FROM books";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for($data=[]; $row = mysqli_fetch_assoc($result); $data[] = $row);

        $result = '
        <table border="1 solid">
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
            $result .= '<td><a href="?update=' .$el['id_number_book'].'">Редактировать</a></td>';
            
            $result .= '</tr>';
        }
        $result .= '</table>';
        $result1 = "";

        if(isset($_GET['update'])){
            $del = $_GET['update'];
            $query = "SELECT * FROM books WHERE id_number_book=$del";
            $result1 = mysqli_query($link, $query) or die(mysqli_error($link));
            for($data=[]; $row = mysqli_fetch_assoc($result1); $data[] = $row);
            foreach($data as $el){
                $publication = $el['publication'];
                $author = $el['author'];
                $title = $el['title'];
                $year_books = $el['year_books'];
            }
            $result1 = "
                <h1 class = 'search'>Редактирование данных</h1>
                <form method='POST'>
                    <div class='search_surname'>
                        <input type='text' name='id_books' value='$del' />
                    </div>
                    <div class='search_surname'>
                        <input type='text' name='id_pub' value='$publication' />
                    </div>
                    <div class='search_surname'>
                        <input type='text' name='id_aut' value='$author' />
                    </div>
                    <div class='search_surname'>
                        <input type='text' name='id_tit' value='$title' />
                    </div>
                    <div class='search_surname'>
                        <input type='text' name='id_year' value='$year_books' />
                    </div>
                    <input type='submit' value='Сохранить'>
                </form>";
        }

        if(isset($_POST['id_books']) AND isset($_POST['id_pub']) AND isset($_POST['id_aut']) AND isset($_POST['id_tit']) AND isset($_POST['id_year'])){
            $id_books = $_POST['id_books'];
            $id_pub = $_POST['id_pub'];
            $id_aut = $_POST['id_aut'];
            $id_tit = $_POST['id_tit'];
            $id_year = $_POST['id_year'];
            $query = "UPDATE books SET publication = '$id_pub', author = '$id_aut', title = '$id_tit', year_books = '$id_year' WHERE id_number_book = '$id_books'";
            $result_edit = mysqli_query($link, $query) or die(mysqli_error($link));
            echo "Редактирование прошло успешно!";
        }
    ?>

    <div class="redakt">
        <div class="table_redakt">
            <?php echo $result; ?>
        </div>
        <div class="form_redakt">
            <?php echo $result1; ?>
        </div>
    </div>

    
</body>
</html>


