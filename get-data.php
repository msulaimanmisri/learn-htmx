<?php
require 'debug.php';
require 'connection.php';
$id = $_GET['id'] ?? null;

/**
 * Database Prepare statement
 */
$sql = 'SELECT * FROM z_php WHERE id = :id';
$statement = $pdo->prepare($sql);
$statement->execute(['id' => $id]);
$data = $statement->fetch();

// Debug::pre($data);

/**
 * Make the object as variable
 */
$title = $data->title;
$content = $data->content;

/**
 * Convert into json
 */
echo json_encode([
    'title' => ucwords($title),
    'content' => ucfirst($content),
]);
