<?php
session_start();
include('../db.php');

if (!isset($_SESSION['staff_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['staff_id'];

$query = "
SELECT DISTINCT Programmes.ProgrammeName
FROM ProgrammeModules
JOIN Modules ON ProgrammeModules.ModuleID = Modules.ModuleID
JOIN Programmes ON ProgrammeModules.ProgrammeID = Programmes.ProgrammeID
WHERE Modules.ModuleLeaderID = ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
<title>My Programmes</title>
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
    <h2>My Programmes</h2>
</div>

<div class="grid">

<?php
while ($row = $result->fetch_assoc()) {
    echo "
    <div class='dashboard-card'>
        <h3>{$row['ProgrammeName']}</h3>
        <p>Programme including your module</p>
    </div>
    ";
}
?>

</div>

</div>

</div>

</body>
</html>