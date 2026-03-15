<?php
session_start();
include "../db.php";

// if admin session does not exist, send user back to login page
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Manage Modules</h1>
<p>This page will be used to manage modules.</p>

<p><a href="dashboard.php">Back to Dashboard</a></p>