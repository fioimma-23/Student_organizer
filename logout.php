<?php
session_start();

if (isset($_GET['logout'])) {

    // Unset all of the session variables
    $_SESSION = array();

// Destroy the session.
    //session_destroy();

    header('location:index.php?logout=true');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Log out</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center"><br><br><br><br><br><br><br>
<style>
h3 {
  font-size: 2.5em; 
}
</style>

<h3 align="center">Thank You</h3>

</form>
</body>
</html>