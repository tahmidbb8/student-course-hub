<?php
session_start();

if (!isset($_SESSION['staff_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="wrapper">

<!-- Sidebar -->
<div class="sidebar">
    <h2>Staff Panel</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="my_modules.php">My Modules</a>
    <a href="my_programmes.php">My Programmes</a>
    <a href="profile.php">Profile</a>
    <a href="logout.php">Logout</a>
</div>

<!-- Main -->
<div class="main">

<div class="card">
    <h2>Welcome <?php echo $_SESSION['staff_name']; ?></h2>
    <p>Overview of your teaching data</p>
</div>

<div class="grid">

    <div class="dashboard-card">
        <h3>My Modules</h3>
        <p>View modules you teach</p>
        <a href="my_modules.php">Open</a>
    </div>

    <div class="dashboard-card">
        <h3>My Programmes</h3>
        <p>Programmes linked to your modules</p>
        <a href="my_programmes.php">Open</a>
    </div>

</div>

</div>

</div>

</body>
</html>