<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require 'config.php';

if (!isset($_FILES['image']) || !isset($_POST['description'])) {
    echo json_encode(["status" => "error", "msg" => "Missing data"]);
    exit;
}

$description = $_POST['description'];
$filename = uniqid() . "-" . $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

$storage = $supabase->storage->from('images');
$storage->upload($filename, file_get_contents($tmp));
$image_url = $storage->getPublicUrl($filename);

$response = $supabase->from("items")->insert([
    "image_url" => $image_url,
    "description" => $description
])->execute();

echo json_encode(["status" => "success", "data" => $response]);
