<?php
/**
 * Created by PhpStorm.
 * User: ahmedsalim
 * Date: 20/11/18
 * Time: 03:25 م
 */

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods,
Content-Type, Authorization, X-Requested-With');


include_once '../../config/Database.php';
include_once '../../models/Post.php';


$database = new Database();
$db = $database->connect();


$post = new Post($db);

//Get Posted Data

$data = json_decode(file_get_contents("php://input"));

$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;


//create post

if($post->create()){
    echo json_encode([
        'message' => 'Post Created'
    ]);
}else{

    echo json_encode([
        'message' => 'Post Not Created'
    ]);


}