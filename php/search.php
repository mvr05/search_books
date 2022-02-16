<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'biblioteka2';
    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf-8'");

    session_start();
    $t = 0;
    if(isset($_POST['search_b'])){
        if(!empty($_POST['search_author'])) $search_author = $_POST['search_author'];
        else $search_author='';
        if(!empty($_POST['search_title'])) $search_title = $_POST['search_title'];
        else $search_title = '';
        if(!empty($_POST['search_publication'])) $search_publication = $_POST['search_publication'];
        else $search_publication='';

        $search_author_b = explode(" ", $search_author);
        $search_title_b = explode(" ", $search_title);
        $search_publication_b = explode(" ", $search_publication);

        $workers1 = [];
        if($search_author!='' AND $search_title=='' AND $search_publication==''){
            foreach($search_author_b as $el){
                $query = "SELECT * FROM books WHERE author LIKE '%$el%'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                for($data=[]; $row = mysqli_fetch_assoc($result); $data[] = $row);
                for ($i = 0; $i < count($data); $i ++) {
                    array_push($workers1, $data[$i]['publication'], $data[$i]['author'], $data[$i]['title'], $data[$i]['year_books']);
                }
            }
            if(!empty($workers1)) {
                $result = '<table border="1 solid" class="no_double">
                <tr class = "zagolovok">
                    <td>Издание</td>
                    <td>Автор</td>
                    <td>Название</td>
                    <td>Год</td>
                </tr>';
                for($i=0; $i<count($workers1);$i +=4){
                    $result .= '<tr>';

                    $result .= '<td>' . $workers1[$i].' </td>';
                    $result .= '<td>' . $workers1[$i+1] . ' </td>';
                    $result .= '<td>' . $workers1[$i+2] . ' </td>';
                    $result .= '<td>' . $workers1[$i+3] . '</td>';
                    
                    $result .= '</tr>';
                }
                $result .= '</table>';
            }
        }
        $workers1 = [];
        if($search_author=='' AND $search_title!='' AND $search_publication==''){
            foreach($search_title_b as $el){
                $query = "SELECT * FROM books WHERE title LIKE '%$el%'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                for($data=[]; $row = mysqli_fetch_assoc($result); $data[] = $row);
                for ($i = 0; $i < count($data); $i ++) {
                    array_push($workers1, $data[$i]['publication'], $data[$i]['author'], $data[$i]['title'], $data[$i]['year_books']);
                }
            }
            if(!empty($workers1)) {
                $result = '<table border="1 solid" class="no_double">
                <tr class = "zagolovok">
                    <td>Издание</td>
                    <td>Автор</td>
                    <td>Название</td>
                    <td>Год</td>
                </tr>';
                for($i=0; $i<count($workers1);$i +=4){
                    $result .= '<tr>';

                    $result .= '<td>' . $workers1[$i].' </td>';
                    $result .= '<td>' . $workers1[$i+1] . ' </td>';
                    $result .= '<td>' . $workers1[$i+2] . ' </td>';
                    $result .= '<td>' . $workers1[$i+3] . '</td>';
                    
                    $result .= '</tr>';
                }
                $result .= '</table>';
            }
        }
        $workers1 = [];
        if($search_author=='' AND $search_title=='' AND $search_publication!=''){
            foreach($search_publication_b as $el){
                $query = "SELECT * FROM books WHERE publication LIKE '%$el%'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                for($data=[]; $row = mysqli_fetch_assoc($result); $data[] = $row);
                for ($i = 0; $i < count($data); $i ++) {
                    array_push($workers1, $data[$i]['publication'], $data[$i]['author'], $data[$i]['title'], $data[$i]['year_books']);
                }
            }
            if(!empty($workers1)) {
                $result = '<table border="1 solid" class="no_double">
                <tr class = "zagolovok">
                    <td>Издание</td>
                    <td>Автор</td>
                    <td>Название</td>
                    <td>Год</td>
                </tr>';
                for($i=0; $i<count($workers1);$i +=4){
                    $result .= '<tr>';

                    $result .= '<td>' . $workers1[$i].' </td>';
                    $result .= '<td>' . $workers1[$i+1] . ' </td>';
                    $result .= '<td>' . $workers1[$i+2] . ' </td>';
                    $result .= '<td>' . $workers1[$i+3] . '</td>';
                    
                    $result .= '</tr>';
                }
                $result .= '</table>';
            }
        }
        $workers1 = [];
        if($search_author!='' AND $search_title!='' AND $search_publication==''){
            $query = "SELECT * FROM books WHERE author LIKE '%$search_author%' AND title LIKE '%$search_title%'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            for($data=[]; $row = mysqli_fetch_assoc($result); $data[] = $row);
            for ($i = 0; $i < count($data); $i ++) {
                array_push($workers1, $data[$i]['publication'], $data[$i]['author'], $data[$i]['title'], $data[$i]['year_books']);
            }
            if(!empty($workers1)) {
                $result = '<table border="1 solid" class="no_double">
                <tr class = "zagolovok">
                    <td>Издание</td>
                    <td>Автор</td>
                    <td>Название</td>
                    <td>Год</td>
                </tr>';
                for($i=0; $i<count($workers1);$i +=4){
                    $result .= '<tr>';

                    $result .= '<td>' . $workers1[$i].' </td>';
                    $result .= '<td>' . $workers1[$i+1] . ' </td>';
                    $result .= '<td>' . $workers1[$i+2] . ' </td>';
                    $result .= '<td>' . $workers1[$i+3] . '</td>';
                    
                    $result .= '</tr>';
                }
                $result .= '</table>';
            }
        }
        $workers1 = [];
        if($search_author!='' AND $search_title=='' AND $search_publication!=''){
            $query = "SELECT * FROM books WHERE author LIKE '%$search_author%' AND publication LIKE '%$search_publication%'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            for($data=[]; $row = mysqli_fetch_assoc($result); $data[] = $row);
            for ($i = 0; $i < count($data); $i ++) {
                array_push($workers1, $data[$i]['publication'], $data[$i]['author'], $data[$i]['title'], $data[$i]['year_books']);
            }
            if(!empty($workers1)) {
                $result = '<table border="1 solid" class="no_double">
                <tr class = "zagolovok">
                    <td>Издание</td>
                    <td>Автор</td>
                    <td>Название</td>
                    <td>Год</td>
                </tr>';
                for($i=0; $i<count($workers1);$i +=4){
                    $result .= '<tr>';

                    $result .= '<td>' . $workers1[$i].' </td>';
                    $result .= '<td>' . $workers1[$i+1] . ' </td>';
                    $result .= '<td>' . $workers1[$i+2] . ' </td>';
                    $result .= '<td>' . $workers1[$i+3] . '</td>';
                    
                    $result .= '</tr>';
                }
                $result .= '</table>';
            }
        }
        $workers1 = [];
        if($search_author=='' AND $search_title!='' AND $search_publication!=''){
            $query = "SELECT * FROM books WHERE title LIKE '%$search_title%' AND publication LIKE '%$search_publication%'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            for($data=[]; $row = mysqli_fetch_assoc($result); $data[] = $row);
            for ($i = 0; $i < count($data); $i ++) {
                array_push($workers1, $data[$i]['publication'], $data[$i]['author'], $data[$i]['title'], $data[$i]['year_books']);
            }
            if(!empty($workers1)) {
                $result = '<table border="1 solid" class="no_double">
                <tr class = "zagolovok">
                    <td>Издание</td>
                    <td>Автор</td>
                    <td>Название</td>
                    <td>Год</td>
                </tr>';
                for($i=0; $i<count($workers1);$i +=4){
                    $result .= '<tr>';

                    $result .= '<td>' . $workers1[$i].' </td>';
                    $result .= '<td>' . $workers1[$i+1] . ' </td>';
                    $result .= '<td>' . $workers1[$i+2] . ' </td>';
                    $result .= '<td>' . $workers1[$i+3] . '</td>';
                    
                    $result .= '</tr>';
                }
                $result .= '</table>';
            }
        }
        $workers1 = [];
        if($search_author!='' AND $search_title!='' AND $search_publication!=''){
            $query = "SELECT * FROM books WHERE author LIKE '%$search_author%' AND title LIKE '%$search_title%' AND publication LIKE '%$search_publication%'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            for($data=[]; $row = mysqli_fetch_assoc($result); $data[] = $row);
            for ($i = 0; $i < count($data); $i ++) {
                array_push($workers1, $data[$i]['publication'], $data[$i]['author'], $data[$i]['title'], $data[$i]['year_books']);
            }
            if(!empty($workers1)) {
                $result = '<table border="1 solid" class="no_double">
                <tr class = "zagolovok">
                    <td>Издание</td>
                    <td>Автор</td>
                    <td>Название</td>
                    <td>Год</td>
                </tr>';
                for($i=0; $i<count($workers1);$i +=4){
                    $result .= '<tr>';

                    $result .= '<td>' . $workers1[$i].' </td>';
                    $result .= '<td>' . $workers1[$i+1] . ' </td>';
                    $result .= '<td>' . $workers1[$i+2] . ' </td>';
                    $result .= '<td>' . $workers1[$i+3] . '</td>';
                    
                    $result .= '</tr>';
                }
                $result .= '</table>';
            }
        }
    }
    $_SESSION['result'] = $result;
    $_SESSION['t'] = $t;
    header('Location: /php_usue/kt4/biblioteka.php');
?>