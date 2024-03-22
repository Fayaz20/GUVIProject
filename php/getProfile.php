<?php
use MongoDB\Client;

require_once 'connectionMongo.php';

if(isset($_GET['userid'])) {
    $userid = $_GET['userid'];

    $userProfile = $collection->findOne(['id' => $userid]);

    if ($userProfile) {
        $age = $userProfile->age;
        $dob = $userProfile->dob;
        $contact = $userProfile->contact;
        $address = $userProfile->address;

        echo json_encode(array(
            "success" => true,
            "age" => $age,
            "dob" => $dob,
            "contact" => $contact,
            "address" => $address
        ));
    } else {
        echo json_encode(array(
            "success" => false,
            "message" => "Profile is not completed. Do update profile!."
        ));
    }
} else {
    echo json_encode(array(
        "success" => false,
        "message" => "Userid not provided."
    ));
}
?>
