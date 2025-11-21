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
  <title>Sign Up - Innoventory Drive</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h2>Sign Up</h2>
    <form id="signupForm" method="POST" action="php/signup-action.php">
      <label>Name</label><br>
      <input type="text" name="name" required><br>
      <label>Email</label><br>
      <input type="email" name="email" required><br>
      <label>Password</label><br>
      <input type="password" name="password" required><br>
      <button type="submit">Sign up</button>
    </form>
    <p><a href="login.php">Already have an account? Login</a></p>
  </div>
  <script src="script.js"></script>
</body>
</html>
