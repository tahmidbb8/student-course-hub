<?php
session_start();

// if admin session does not exist, send user back to login page
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Manage Programmes</h1>

<h2>Add New Programme</h2>

<form method="POST">

<label>Programme Name:</label>
<input type="text" name="programme_name"><br><br>

<label>Level:</label>
<input type="text" name="level"><br><br>

<label>Programme Leader:</label>
<input type="text" name="leader"><br><br>

<button type="submit">Add Programme</button>

</form>

<hr>

<p><a href="dashboard.php">Back to Dashboard</a></p>