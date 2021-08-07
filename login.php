<?php 
session_start();
if (isset($_SESSION['user']) or isset($_COOKIE['user_name']) and isset($_COOKIE['password'])) {
  header('Location: index.php');
}
 ?>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
   <link rel="stylesheet" href="CSS/css2.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <?php if(isset($_GET['error'])){ ?>
  <span class="alert danger-alert">Inavalid Username or password</span>
<?php } ?>

 
<form action="index.php" method="post">
  <br>

  <div class="new">
    <br>
    <h1 class="log">Login</h1>

  <input type="text" name="username" placeholder="User name" class="border3" required>
  <br>
    <input type="Password" name="pwd" placeholder="Password" class="border3" required>
  <br>
  <input type="submit" name="login" value="Submit" id="h">
    </div>

</form>
</body>
</html>
