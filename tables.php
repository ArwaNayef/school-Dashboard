<?php 
// Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname="FP_DB";

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully"."<br>";
/*
// Create database
$sql = "CREATE DATABASE FP_DB";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn)>"<br>";
}

mysqli_close($conn);
*/

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

/*
// sql to create table
$sql1 = "CREATE TABLE Students (
id INT(3) UNSIGNED  PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(30) NOT NULL
)";

if ($conn->query($sql1) === TRUE) {
  echo "Table Students created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql2 = "CREATE TABLE Teachers (
id INT(4) UNSIGNED  PRIMARY KEY,
name VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
)";

if ($conn->query($sql2) === TRUE) {
  echo "Table Teachers created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql3 = "CREATE TABLE Courses (
id INT(5) UNSIGNED  PRIMARY KEY,
name VARCHAR(50) NOT NULL,
teacher_id INT(4) UNSIGNED NOT NULL
)";

if ($conn->query($sql3) === TRUE) {
  echo "Table Courses created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql4 = "CREATE TABLE Grades (
student_id INT(3) UNSIGNED NOT NULL,
course_id INT(5) UNSIGNED NOT NULL,
grade VARCHAR(20),
PRIMARY key(student_id,course_id)
)";

if ($conn->query($sql4) === TRUE) {
  echo "Table Grades created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql4 = "CREATE TABLE admin (
id INT(3) UNSIGNED  PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(30) NOT NULL
)";

if ($conn->query($sql4) === TRUE) {
  echo "Table admin created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

/*
$sql = "INSERT INTO Students(id, name, email, password)VALUES
(123, 'Bart', 'bart@fox.com','123'),
(456, 'Milhouse', 'milhouse@fox.com','123'),
(888, 'Lisa', 'lisa@fox.com','123'),
(404, 'Ralph', 'ralph@fox.com','123')";

if ($conn->query($sql) === TRUE) {
  echo "New records created in Students table successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql1 = "INSERT INTO Teachers(id, name, password)VALUES
(1234, 'Karbappel', '123'),
(5678, 'Hoover','123'),
(9012, 'Stepp', '123')";

if ($conn->query($sql1) === TRUE) {
  echo "New records created in Teachers table successfully";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}
$sql2 = "INSERT INTO courses(id, name, teacher_id)VALUES
(10001, 'Computer Science 142', '1234'),
(10002, 'Computer Science 143','5678'),
(10003, 'Computer Science 190M', '9012'),
(10004, 'Informatics 100', '1234')";


if ($conn->query($sql2) === TRUE) {
  echo "New records created in Course table successfully";
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$sql3 = "INSERT INTO Grades(student_id, course_id, grade)VALUES
(123, 10001, 'B-'),
(123, 10002,'C'),
(456, 10001, 'B+'),
(888, 10002, 'A+'),
(888, 10003, 'A+'),
(404, 10004, 'D+')";


if ($conn->query($sql3) === TRUE) {
  echo "New records created in Grades table successfully";
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}
/*$sql3 = "INSERT INTO admin (id, name, email, password)VALUES(1000, 'admin', 'admin@fox.com', '123456')";


if ($conn->query($sql3) === TRUE) {
  echo "New records created in admin table successfully";
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}
*/

/*$stmt = $conn->prepare("INSERT INTO Teachers(id, name, password) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $id, $name, $pass);

// set parameters and execute
$id = 1234;
$name = "Karbappel";
$pass = "123";
$stmt->execute();

$id = 5678;
$name = "Hoover";
$pass = "123";
$stmt->execute();

$id = 9102;
$name = "Stepp";
$pass = "123";
$stmt->execute();

echo "New records created successfully";
$stmt->close();*/


//$conn->close();
?>