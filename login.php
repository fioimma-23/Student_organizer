<?php

  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $dbname = 'student_personal_details';
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  if (mysqli_connect_errno()) {
    // echo"here";exit;
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

  if (isset($_POST['submit'])) {
    // echo"here";exit;

    if ((isset($_POST['Rollno']) && $_POST['Rollno'] != '') && (isset($_POST['Phoneno']) && $_POST['Phoneno'] != '')) {

        $Rollno = trim($_POST['Rollno']);
        $Phoneno = trim($_POST['Phoneno']);
     

        $sqlEmail = "SELECT `Rollno` `Phoneno` FROM student_details WHERE Rollno = '$Rollno' AND Phoneno = '$Phoneno'";


        $rs = mysqli_query($conn, $sqlEmail) or die('Error in SQL');

        $numRows = mysqli_num_rows($rs);

        if ($numRows == 1) {
            $_SESSION['Rollno'] = $Rollno;
            header('location:regi form.php');
        } else {
            $errorMsg = "Invalid Username or Password!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      width: 300px;
      margin: 0 auto;
      margin-top: 100px;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #cccccc;
      border-radius: 5px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
    }

    h2 {
      text-align: center;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #cccccc;
      border-radius: 3px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      color: #ffffff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .forgot-password {
      text-align: center;
    }

    .forgot-password a {
      color: #777777;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login Form</h2>
    <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <input type="text" name="Rollno" placeholder="Rollno" required>
      <input type="password" name="Phoneno" placeholder="Password" required>
      <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="forgot-password">
      <a href="forgot_password.php">Forgot Password?</a>
    </div>
  </div>
</body>
</html>
