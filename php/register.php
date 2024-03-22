<?php
require_once 'connection.php';

if(isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    $name =  $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_query = "SELECT COUNT(*) as count FROM users WHERE email = ?";
    $check_stmt = $conn_mysql->prepare($check_query);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    $row = $result->fetch_assoc();
    $user_count = $row['count'];


    if ($user_count > 0) {
    
        echo json_encode(array("success" => false, "message" => "User already registered with this email"));
        exit; 
    }

   
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";


    $stmt = $conn_mysql->prepare($sql);



    $stmt->bind_param("sss", $name, $email, $password);


    if ($stmt->execute()) {
  
        echo json_encode(array("success" => true, "message" => "Registered successfully"));
    } else {
    
        echo json_encode(array("success" => false, "message" => "Unknow Error"));
    }

    $stmt->close();
} else {
    echo json_encode(array("success" => false, "message" => "Form data is not set"));
}


$conn_mysql->close();
?>
