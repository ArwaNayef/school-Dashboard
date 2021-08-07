<?php
session_start();
if ($_SESSION['admin']) {
}
else{
	header('location: index.php');
}

$TwoMonths = 60 * 60 * 24 * 60 + time();
setcookie('lastVisitA', date("G:i - m/d/y"), $TwoMonths);
if(isset($_COOKIE['lastVisitA']))	
{
	$visitA = $_COOKIE['lastVisitA'];
	echo "<script>\n";
	echo "alert('Welcome! your last visit was at: {$visitA}')\n";
	echo "</script>\n";
}

include("C:/xampp/htdocs/FP/tables.php");
if(isset($_POST['save']))
{
	$sql = "INSERT INTO teachers (id, name, password)
	VALUES ('".$_POST["id"]."','".$_POST["name"]."','".$_POST["password"]."')";

	$result = mysqli_query($conn,$sql);
}

?>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin- Insert Teachers</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/dash.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="insertTeachers.php" class="logo">
					Admin Dashboard
				</a>
			</div>
			
		</div>
		<div class="sidebar">
			<div class="scrollbar-inner sidebar-wrapper">
				<div class="user">
					<div class="photo">
						<img src="assets/img/profile.png">
					</div>

				</div>
				<ul class="nav">
					<li class="nav-item active">
						<a href="insertTeachers.php">
							<i class="fas fa-user-plus"></i>
							<p>Insert Teachers</p>

						</a>
					</li>
					<li class="nav-item">
						<a href="viewTeachers.php">
							<i class="fas fa-list-alt"></i>
							<p>View Teachers</p>
							
						</a>
					</li>
					<li class="nav-item active">
						<a href="insertStudents.php">
							<i class="fas fa-user-plus"></i>
							<p>Insert Student</p>
							
						</a>
					</li>
					<li class="nav-item">
						<a href="viewStudents.php">
							<i class="fas fa-list-alt"></i>
							<p>View Students</p>
							
						</a>
					</li>
					<li class="nav-item active">
						<a href="insertCourses.php">
							<i class="fas fa-plus-square"></i>
							<p>Insert Couses</p>
							
						</a>
					</li>
					<li class="nav-item">
						<a href="viewCourses.php">
							<i class="fas fa-list-alt"></i>
							<p>View Courses</p>
							
						</a>
					</li>
					<li class="nav-item active">
						<a href="viewES.php">
							<i class="fas fa-list-alt"></i>
							<p>View Excellent Students</p>
							
						</a>
					</li>
					<li class="nav-item">
						<a href="sign_out.php">
							<i class="fas fa-sign-out-alt"></i>
							<p>Logout</p>
							
						</a>
					</li>

					
					
				</ul>
			</div>
		</div>

		<div class="main-panel">
			
			<div class="form-body">
				
				<div class="form-holder">
					<div class="form-content">
						<div class="form-items">
							<h3>Insert Teachers</h3>
							<p>Fill in the data below.</p>
							<form method="post">

								<div class="col-md-12">
									<input class="form-control" type="text" name="id" placeholder="ID" required>  
								</div>

								
								<div class="col-md-12">
									<input class="form-control" type="text" name="name" placeholder="Name" required>  
								</div>

								
								<div class="col-md-12">
									<input class="form-control" type="password" name="password" placeholder="Password" required>
								</div>

								<div class="form-button mt-3">
									<button type="submit" name="save" id="save" class="btn btn-primary">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				