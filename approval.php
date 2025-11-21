<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Approval - Innoventory Drive</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>Admin Approval Dashboard</h1>
    <p>Admin: <?php echo htmlspecialchars($_SESSION['user']['name']); ?></p>
    <a href="php/logout.php">Logout</a>
  </header>
  <main>
    <div id="usersList">
      <?php
      include 'php/connect.php';
      $res = $conn->query("SELECT id, name, email, role, status, created_at FROM users ORDER BY created_at DESC");
      if($res && $res->num_rows){
        echo '<table border="1" cellpadding="6"><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Action</th></tr>';
        while($u = $res->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.htmlspecialchars($u['id']).'</td>';
          echo '<td>'.htmlspecialchars($u['name']).'</td>';
          echo '<td>'.htmlspecialchars($u['email']).'</td>';
          echo '<td>'.htmlspecialchars($u['role']).'</td>';
          echo '<td>'.htmlspecialchars($u['status']).'</td>';
          echo '<td>
            <form method="POST" action="php/approve-user.php" style="display:inline">
              <input type="hidden" name="id" value="'.htmlspecialchars($u['id']).'">
              <select name="status">
                <option value="approved">Approve</option>
                <option value="denied">Deny</option>
              </select>
              <button type="submit">Set</button>
            </form>
          </td>';
          echo '</tr>';
        }
        echo '</table>';
      } else {
        echo '<p>No users found.</p>';
      }
      ?>
    </div>
  </main>
</body>
</html>
