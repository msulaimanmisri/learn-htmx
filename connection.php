<?php
/**
 * Database Initialize
 */
$host = 'localhost';
$port = '3306';
$dbname = '';
$username = '';
$password = '';
$dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8;";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

} catch (PDOException $error) {
    echo "Ada error ni : " . $error->getMessage();
    exit();
}
