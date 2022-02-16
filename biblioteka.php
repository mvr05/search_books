<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,400;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Библиотека</title>
</head>
<body>
    <header class = "header">
        <h1 class = "header_text"><a class = "header_text_link" href="/php_usue/kt4/biblioteka.php">Библиографический поиск</a></h1>
    </header>
    <div class="container">
        <h1 class = "search">Поиск книги</h1>
        <div class="search_books">
            <div class="form_search">
                <form class = "search_form" action="php/search.php" method="POST">
                    <div class="search_surname">
                        <input name="search_author" type="text" placeholder="Автор">
                    </div>
                    <div class="search_surname">
                        <input name="search_title" type="text" placeholder="Название">
                    </div>
                    <div class="search_surname">
                        <input name="search_publication" type="text" placeholder="Издание">
                    </div>
                    <input name="search_b" type="submit" value="Найти книгу">
                </form>
            </div>  
            <div class="search-table">
                <?php 
                    $t = 1;
                    session_start();
                    if(!empty($_SESSION['result'])): 
                    echo $_SESSION['result'];
                    elseif($t == 1): echo "";
                    else: echo "Результатов нет!";
                    endif;
                    session_destroy();
                ?>
            </div>
        </div>
        <div class="redakt-div">        
            <input name="search_b" type="submit" value="Редактировать книги" onclick="location.href='php/red.php'">
        </div>
        <div class="all_books">
            <form action = "php/view_books.php" method="POST" class = "view_books">
                <input id = "books_bib" class="all_books_b" type="submit" name="all_books" value="Показать все книги" />
                <input id="noView" class="noView" name="search_b" type="submit" value="Скрыть" onclick="location.href='php/clear_table.php'">
            </form>
            <?php
                if(!empty($_SESSION['result_all'])):{ 
                    echo $_SESSION['result_all'];
                }
                endif;
            ?>
        </div>
        <form action = "php/add_books.php" method = "POST" class="decor">
            <div class="form-inner">
                <h1 class = "search">Добавление книги</h1>
                <div class="search_surname">
                    <select required name = "publication">
                        <option required value = Печатное>Печатное</option>
                        <option required value = Электронное>Электронное</option>
                        <option required value = Сборник>Сборник</option>
                        <option required value = Текстовое>Текстовое</option>
                    </select>
                </div>
                <div class="search_surname">
                    <input name = "surname" required  type="text" placeholder = "Фамилия">
                </div>
                <div class="search_surname">
                    <input name = "name" required  type="text" placeholder = "Имя">
                </div>
                <div class="search_surname">
                    <input name = "title" required  type="text" placeholder = "Название книги">
                </div>
                <div class="search_surname">
                    <input name = "year_books"required  type="text" placeholder = "Год">
                </div>
                <input type="submit" value="Добавить книгу" name = "add_b">
            </div>
            <?php if(!empty($_SESSION['add_result'])): ?>
                <h1 class = "search"><?php echo $_SESSION['add_result']; ?></h1>
                <?php endif;?>
        </form>
    </div>
</body>

</html>