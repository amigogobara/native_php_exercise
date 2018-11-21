<?php
/**
 * Created by PhpStorm.
 * User: ahmedsalim
 * Date: 20/11/18
 * Time: 02:43 م
 */

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once '../../config/Database.php';
include_once '../../models/Post.php';


$database = new Database();
$db = $database->connect();


$post = new Post($db);

$post->id = isset($_GET['id'])?$_GET['id']: die();

$post->read_single();

$post_arr = [
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_name' => $post->category_name
];

print_r(json_encode($post_arr));