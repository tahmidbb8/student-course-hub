<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM Staff WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {

        $staff = $result->fetch_assoc();

        if (!empty($staff['Password']) && password_verify($password, $staff['Password'])) {

            $_SESSION['staff_id'] = $staff['StaffID'];
            $_SESSION['staff_name'] = $staff['Name'];

            header("Location: dashboard.php");
            exit();

        } else {
            $_SESSION['error'] = "Invalid username or password!";
        }

    } else {
        $_SESSION['error'] = "Invalid username or password!";
    }

} else {
    $_SESSION['error'] = "Invalid request!";
}

header("Location: login.php");
exit();