<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require 'config.php';

$data = $supabase->from("items")
    ->select("*")
    ->order("id", "desc")
    ->execute();

echo json_encode(["status" => "success", "data" => $data]);
