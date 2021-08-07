<?php 
session_start();

if(array_key_exists("login", $_POST))
{
  include("tables.php");
  $uid = $_POST['id'];
  $uid=stripcslashes($uid);
  $uid=mysqli_real_escape_string($conn,$uid);
  $pwd = $_POST['pwd'];
  $pwd=stripcslashes($pwd);
  $pwd=mysqli_real_escape_string($conn,$pwd);


  $sql = "SELECT * FROM teachers WHERE id='$uid' AND password='$pwd'";
  $result = mysqli_query($conn, $sql);
  if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION ['teacher']["id"] = $row['id'];
    $_SESSION ['teacher']["password"] = $row['password'];
    echo "You are logged in!";
    header("location: teacherDash.php");
  } else {
   echo "<script>\n";
   echo "alert('wrong Data! Please Try again..')\n";
   echo "</script>\n";
 }
}
?>

<html lang="en">
<head>
  <title>Teacher Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="CSS/css2.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container">   
  <form method="post">
    <br>
    <div class="new">
      <br>
      <h1 class="log">Teacher Login</h1>
      <input type="text" name="id" placeholder="ID" class="border3" required>
      <br>
      <input type="Password" name="pwd" placeholder="Password" class="border3" required>
      <br>
      <input type="submit" name="login" value="Submit" id="h">
    </div>
  </form>
</div>
</body>
</html>
