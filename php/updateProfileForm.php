<?php
require_once 'connectionMongo.php';


$id = $_POST['id'] ?? '';
$age = $_POST['age'] ?? '';
$dob = $_POST['dob'] ?? '';
$contact = $_POST['contact'] ?? '';
$address = $_POST['address'] ?? '';


$insertResult = $collection->insertOne([
    'id' => $id,
    'age' => $age,
    'dob' => $dob,
    'contact' => $contact,
    'address' => $address
]);

if ($insertResult->getInsertedCount() > 0) {
    echo json_encode(array("success" => true, "message" => "Profile Updated."));
} else {
    echo json_encode(array("success" => false, "message" => "Failed to insert data."));
}
?>
