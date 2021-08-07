<?php
session_start();
if ($_SESSION['user']) {
}
else{
	header('location: index.php');
}

$TwoMonths = 60 * 60 * 24 * 60 + time();
setcookie('lastVisitS', date("G:i - m/d/y"), $TwoMonths);
if(isset($_COOKIE['lastVisitS']))	
{
	$visitS = $_COOKIE['lastVisitS'];
	echo "<script>\n";
	echo "alert('Welcome! your last visit was at: {$visitS}')\n";
	echo "</script>\n";
}

?>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Student Dashboard</title>
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
					Student Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
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
						<a href="studentDash.php">
							<i class="fas fa-list-alt"></i>
							<p>Your Grades</p>
							
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
			<div class="content">
				<div class="container-fluid">
					<h4 class="page-title">Student Page</h4>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Your Grades</div>
								</div>
								
								<div class="card-body">
									
									<?php

									include("C:/xampp/htdocs/FP/tables.php");
// Check connection
									if (mysqli_connect_errno())
									{
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
									}

									$query =  "SELECT DISTINCT  Grades.grade, Students.name as n, courses.name as c ".
									"FROM Students, Grades,courses ".
									"WHERE Students.id = Grades.student_id AND courses.id = Grades.course_id AND Students.email= '".$_SESSION ['user']["email"]."'";





									$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
									echo "<table class='table table-head-bg-primary mt-4'>
									<thead>
									<tr>
									<th scope='col'>Name</th>
									<th scope='col'>Course id</th>
									<th scope='col'>Grade Name</th>
									</tr>
									</thead>
									<tbody>";
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>" . $row['n'] . "</td>";
										echo "<td>" . $row['c'] . "</td>";
										echo "<td>" . $row['grade'] . "</td>";
										echo "</tr>";
									}
									echo "</table>";

									mysqli_close($conn);
									?>



