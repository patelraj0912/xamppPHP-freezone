<?php
    session_start();
    if(!isset($_SESSION['username']))
        {
            header("Location: login.php"); 
        }
    include 'db_connect.php';
    $user_id = $_SESSION['user_id'];
    

    $stmt = $conn->prepare("UPDATE tbl_users SET status = 0 WHERE user_id = $user_id");
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("UPDATE tbl_innovation SET status = 0 WHERE user_id = $user_id");
    $stmt->execute();
    $stmt->close();

    $conn->close();
    setcookie("username", "", time() - 60); 
    header("Location: logout.php");
    exit();
?>