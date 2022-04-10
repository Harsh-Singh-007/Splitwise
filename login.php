<?php 
session_start();
$server = "localhost";
$user = "root";
$password = "";
$dbname = "insert";

$conn = mysqli_connect($server, $user, $password, $dbname) or die();
mysqli_select_db($conn, $dbname);

if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$sql = "select * from form where email = '".$email."'AND password = '".$pass."' limit 1";

	$res = mysqli_query($conn,$sql);

	if(mysqli_num_rows($res) == 1){  
		$row = mysqli_fetch_array($res);
		$_SESSION['id'] = $row['id'];
		header('Location: splitwise.php');    
		exit();
	}
	else{
        $alert = "<script>alert('Wrong Email or Password'); window.location.href='home.php';</script>";
        echo $alert;
	}
}

?>