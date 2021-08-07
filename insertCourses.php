<?php  
session_start();
if ($_SESSION['admin']) {
}
else{

	header('location: index.php');
}
?>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin- Insert Courses</title>
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
							<h3>Insert Courses</h3>
							<p>Fill in the data below.</p>
							<form method="post">

								<div class="col-md-12">
									<input class="form-control" type="text" name="id" placeholder="ID" required>  
								</div>

								<div class="col-md-12">
									<input class="form-control" type="text" name="name" placeholder="Name" required>  
								</div>


								<div class="col-md-12">

									<select name=teachers>
										<option value="" disabled selected>Select Teacher..</option>

										<?php 
                              		include("C:/xampp/htdocs/FP/tables.php");// Check connection
                              		if (mysqli_connect_errno())
                              		{
                              			echo "Failed to connect to MySQL: " . mysqli_connect_error();
                              		}

                              		$query = "SELECT Teachers.name FROM Teachers";

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
              	$selected=$_POST['teachers'];
              	$sql2="Select * from Teachers
              	where Teachers.name= '".$selected."'";


              	$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
              	$row2 = mysqli_fetch_assoc($result2);
              	$teacher_id=$row2['id'];


              	include("C:/xampp/htdocs/FP/tables.php");



              	$sql = "INSERT INTO courses (id, name,teacher_id)
              	VALUES ('"
              	.$_POST["id"].
              	"','".$_POST["name"]."',"
              	.$teacher_id.')';


              	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
              }


              ?>



