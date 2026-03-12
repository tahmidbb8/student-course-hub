<?php
session_start();

// if admin session does not exist, send user back to login page
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Admin Dashboard</h1>
<p>Login successful.</p>