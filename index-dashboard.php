<?php
session_start();

if(isset($_SESSION['username'])){
    echo '<h1> welcome' . $_SESSION['username'] . '</h1>';
    echo '<a href="/php-begins/logout.php">logout</a>';

}else{
    echo '<h1>Welcome Guest</h1>';
    echo '<a href="index./php-begins/index">go back</a>';
}