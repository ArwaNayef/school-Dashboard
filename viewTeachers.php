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
    <title>Admin- View Teachers</title>
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
            <div class="content">
                <div class="container-fluid">
                    <h4 class="page-title">View Teachers Page</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Teachers Table </div>
                                </div>
                                <div class="card-body">

                                    <?php
include("C:/xampp/htdocs/FP/tables.php");// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn,"SELECT * FROM Teachers");

echo "<table class='table table-head-bg-primary mt-4'>
<thead>
<tr>
<th scope='col'>ID</th>
<th scope='col'>Name</th>

</tr>
</thead>
<tbody>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>