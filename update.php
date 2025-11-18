<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require 'config.php';

$id = $_POST["id"];
$description = $_POST["description"];
$updateData = ["description" => $description];

$storage = $supabase->storage->from("images");

if (isset($_FILES["image"])) {
    $filename = uniqid() . "-" . $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $storage->upload($filename, file_get_contents($tmp));
    $image_url = $storage->getPublicUrl($filename);

    $updateData["image_url"] = $image_url;
}

$response = $supabase->from("items")
    ->update($updateData)
    ->eq("id", $id)
    ->execute();

echo json_encode(["status" => "success", "data" => $response]);
