<?php
session_start();
if ($_SESSION['teacher']) {
}
else{

	header('location: index.php');
}
$TwoMonths = 60 * 60 * 24 * 60 + time();
setcookie('lastVisitT', date("G:i - m/d/y"), $TwoMonths);
if(isset($_COOKIE['lastVisitT']))	
{
	$visitT = $_COOKIE['lastVisitT'];
	echo "<script>\n";
	echo "alert('Welcome! your last visit was at: {$visitT}')\n";
	echo "</script>\n";
}
?>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Teacher- Dashboard</title>
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
					Teacher Dashboard
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
						<a href="teacherDash.php">
							<i class="fas fa-list-alt"></i>
							<p>Add Grades</p>

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
							<h3>Add Grades</h3>
							<p>Fill in the data below.</p>
							<form method="post">

								<div class="col-md-12">
									<select name=grades>
										<option>A+</option>
										<option>A</option>
										<option>A-</option>
										<option>B+</option>
										<option>B</option>
										<option>B-</option>
										<option>C+</option>
										<option>C</option>
										<option>C-</option>
										<option>D+</option>
										<option>D</option>
										<option>D-</option>


									</select>									</div>

									<div class="col-md-12">

										<select name=students>
											<option value="" disabled selected>Select Student..</option>

											<?php 
                              		include("C:/xampp/htdocs/FP/tables.php");// Check connection
                              		if (mysqli_connect_errno())
                              		{
                              			echo "Failed to connect to MySQL: " . mysqli_connect_error();
                              		}

                              		$query = "SELECT Students.name FROM Students";
                              		;

                              		$result = mysqli_query($conn, $query) or die(mysqli_error());
                              		while ($row = mysqli_fetch_assoc($result)) {
                              			echo "<option>";
                              			echo $row['name'];
                              			echo "</option>";
                              		}
                              		


                              		?>
                              	</select>
                              </div>


                              <div class="col-md-12">

                              	<select name=courses>
                              		<option value="" disabled selected>Select Course..</option>

                              		<?php 
                              		include("C:/xampp/htdocs/FP/tables.php");// Check connection
                              		if (mysqli_connect_errno())
                              		{
                              			echo "Failed to connect to MySQL: " . mysqli_connect_error();
                              		}

                              		$query = "SELECT courses.name FROM Courses WHERE Courses.teacher_id = ".$_SESSION ['teacher']["id"] ;
                              		;

                              		$result = mysqli_query($conn, $query) or die(mysqli_error());
                              		while ($row = mysqli_fetch_assoc($result)) {
                              			echo "<option>";
                              			echo $row['name'];
                              			echo "</option>";
                              		}
                              		


                              		?>
                              	</select>
                              </div>
                              <div class="form-button mt-3">
                              	<button type="submit" name="save" id="save" class="btn btn-primary">Save</button>
                              </div>

                          </form>
                      </div>
                  </div>
              </div>
              
              

              <?php
              if(isset($_POST['save']))
              {
              	$selected1=$_POST['students'];
              	$selected2=$_POST['courses'];
              	$selected3=$_POST['grades'];



              	$sql2="Select * from students
              	where students.name= '".$selected1."'";
              	$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
              	$row2 = mysqli_fetch_assoc($result2);
              	$student_id=$row2['id'];
              	

              	$sql3="Select * from courses
              	where courses.name= '".$selected2."'";
              	$result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
              	$row3 = mysqli_fetch_assoc($result3);
              	$course_id=$row3['id'];
              	
              	include("C:/xampp/htdocs/FP/tables.php");

              	$sql = "INSERT INTO grades (student_id, course_id,grade)
              	VALUES (".$student_id.','.
              	$course_id.',"'.
              	$selected3.'")';


              	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
              }


              ?>
              