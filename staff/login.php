<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Staff Login</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="login-container">

<div class="login-box">
<h2>Staff Login</h2>

<?php
if (isset($_SESSION['error'])) {
    echo "<div class='error'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']);
}
?>

<form method="POST" action="auth.php">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>

</form>

</div>

</div>

</body>
</html>