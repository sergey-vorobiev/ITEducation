<?php

$num_article = 4;

require_once 'include/datebase.php';

$query = "SELECT * FROM articles";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

$num_rows = mysqli_num_rows($result);

if(isset($_GET['page'])){
    $page = $_GET['page'];
    $num_page = $num_rows / $num_article;

    if(!is_int($num_page)){
        $num_page = ceil($num_page);
    }

    $query = "SELECT * FROM articles WHERE id > ($page - 1) * $num_article LIMIT $num_article";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $rows = mysqli_num_rows($result);

    for($i = 0; $i < $rows; $i++){
        $row = mysqli_fetch_row($result);

        echo "
            <div class='article'>
                <span class='id'>№ $row[0]</span>
                <h2>$row[1]</h2>
                <p class='content'>$row[2]</p>
            </div>
        ";
    } 

    if($rows == 0){
        echo "
        <div class='article'>
            На этой странице нету статей!
        </div>";
    }

    exit();
}

if($result){

    for($i = 0; $i < $num_rows; $i++){
        $row = mysqli_fetch_row($result);

        echo "
            <div class='article'>
                <span class='id'>№ $row[0]</span>
                <h2>$row[1]</h2>
                <p class='content'>$row[2]</p>
            </div>
        ";
    } 
}

?>