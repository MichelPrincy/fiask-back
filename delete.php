<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require 'config.php';

$id = $_POST["id"];

// récupérer info
$item = $supabase->from("items")
    ->select("*")
    ->eq("id", $id)
    ->single()
    ->execute();

$filename = basename($item["image_url"]);
$storage = $supabase->storage->from("images");

// supprimer image
$storage->remove($filename);

// supprimer item
$response = $supabase->from("items")
    ->delete()
    ->eq("id", $id)
    ->execute();

echo json_encode(["status" => "success"]);
