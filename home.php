<?php

 ob_start();

 session_start();

 require_once 'dbconnect.php';

 

 // if session is not set this will redirect to login page

 if( !isset($_SESSION['user']) ) {

  header("Location: index.php");

  exit;

 }

 // select logged-in users detail

 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);

 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "cr10_lorand_kovacs_biglibrary";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the publisher table
$sql = "SELECT id, name, address, size FROM publisher";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "id: " . $row["id"]. " - Name: " . $row["name"] . " - Address: " . $row["address"] . " - Size: " . $row["size"]. "<br>"; 
	}
} else {
	echo "0 results";
}

// Select the author table
$sql = "SELECT id, name, surname, media_id FROM author";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "id: " . $row["id"]. " - Name: " . $row["name"] . " - Surname: " . $row["surname"] . " - Medias: " . $row["media_id"]. "<br>"; 
	}
} else {
	echo "0 results" . "<br>";
}

// Select the Media table
$sql = "SELECT id, title, short_description, publish_date, type, publisher_id, author_id FROM media";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "id: " . $row["id"]. " - Title: " . $row["title"] . " - Short description: " . $row["short_description"] . " - Publish date: " . $row["publish_date"]. " - Type: " . $row["type"] . " - Publisher: " . $row["publisher_id"] . " - Author: " . $row["author_id"] . "<br>"; 
	}
} else {
	echo "0 results";
}



mysqli_close($conn);
?>

<!DOCTYPE html>

<html>

<head>

<title>Welcome - <?php echo $userRow['userEmail']; ?></title>

</head>

<body>



            Hi' <?php echo $userRow['userEmail']; ?>

             

            <a href="logout.php?logout">Sign Out</a>

   

         

   

</body>

</html>

<?php ob_end_flush(); ?>