<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../models/inventory_item.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$inventory_item = new InventoryItem($db);
$inventory_item->id = isset($_GET['id']) ? $_GET['id'] : die();
$inventory_item->readOne();
$inventory_item_arr = array(
    "id" => $inventory_item->id,
    "description" => $inventory_item->description,
    "quantity" => $inventory_item->quantity,
    "category" => $inventory_item->category_id,
    "image_path" => $inventory_item->image_path,
);
print_r(json_encode($inventory_item_arr));
?>