<?php
session_start();
if(isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login - Innoventory Drive</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form id="loginForm" method="POST" action="php/login-action.php">
      <label>Email</label><br>
      <input type="email" name="email" required><br>
      <label>Password</label><br>
      <input type="password" name="password" required><br>
      <button type="submit">Login</button>
    </form>
    <p><a href="signup.php">Create an account</a></p>
  </div>
  <script src="script.js"></script>
</body>
</html>
