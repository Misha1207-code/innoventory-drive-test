<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Innoventory Drive - Home</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <img src="logo.png" alt="logo" style="height:40px">
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
    <a href="php/logout.php">Logout</a>
  </header>
  <main>
    <p>This is a simple placeholder for the user dashboard (index.php).</p>
    <p>User role: <?php echo htmlspecialchars($user['role']); ?></p>
  </main>
  <script src="script.js"></script>
</body>
</html>
