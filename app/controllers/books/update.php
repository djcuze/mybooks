<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../config/database.php';
include_once '../../models/invoice.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$invoice = new Invoice($db);

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of product to be edited
$invoice->id = $data->id;

// set product property values
$invoice->id = $data->id;
$invoice->invoice_number = $data->invoice_number;
$invoice->invoice_date = $data->invoice_date;
$invoice->supplier_id = $data->supplier_id;

// update the product
if ($invoice->update()) {
    echo '{';
    echo '"message": "Invoice was updated."';
    echo '}';
} // if unable to update the product, tell the user
else {
    echo '{';
    echo '"message": "Unable to update invoice."';
    echo '}';
}
?>
