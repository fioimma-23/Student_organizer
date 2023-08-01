<?php

         if(isset($_POST['submit'])) {
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

        $Name=$_POST['Name'];
        $Rollno=$_POST['Rollno'];  
        $Course=$_POST['Course'];
        $Gender=$_POST['Gender'];
        $Address=$_POST['Address'];
        $Phoneno=$_POST['Phoneno'];
        $registerdate=$_POST['registerdate'];


        $query=mysqli_query($conn, "insert into student_details(Name,Rollno,Course,Gender,Address,Phoneno,registerdate) value('$Name', '$Rollno ', '$Course', '$Gender','$Address', '$Phoneno', '$registerdate' )");
        if ($query)
        {
        echo "<script>alert('You have successfully inserted the data');</script>";
        echo "<script type='text/javascript'> document.location ='login.php'; </script>";
        }"<script>alert('Something Went Wrong. Please try again');</script>";
      }
        
?>
      <!DOCTYPE html>
<html>
<head>
  <title>Personal Details</title>
</head>
<body>
  <h1>Personal Details</h1>
  <form method="POST" action="">
    <label for="Name">Name:</label>
    <input type="text" id="Name" name="Name" required><br><br>

    <label for="Rollno">Roll Number:</label>
    <input type="text" id="Rollno" name="Rollno" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required><br><br>

    <label for="Course">Course:</label>
    <select name="Course">
      <option value="" selected>Select</option>
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="IT">IT</option>
      <option value="Mech">Mech</option>
      <option value="ICE">ICE</option>
    </select>

      
      </div>
      <div>
      <label> 
      <br>Gender :
      </label><br>
      <input type="radio" value="Male" name="Gender" checked > Male 
      <input type="radio" value="Female" name="Gender"> Female 
      <input type="radio" value="Other" name="Gender"> Other
      
      </div>

    <br><label for="Address">Address:</label>
    <input type="text" id="Address" name="Address" required><br><br>

    <label> 
      Phone No :
    </label>
      <input type="text" name="phoneno" placeholder="phoneno" maxlength="10" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" > 

 <br>
 <br>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</body>
</html>