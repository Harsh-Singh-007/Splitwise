<?php 

$server = "localhost";
$user = "root";
$password = "";
$dbname = "insert";

$conn = mysqli_connect($server, $user, $password, $dbname);

if(isset($_POST['register'])){
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['numbers']) && !empty($_POST['pass']) && !empty($_POST['confirm'])){

		$name = $_POST['name'];
		$email = $_POST['email'];
		$numbers = $_POST['numbers'];
		$pass = $_POST['pass'];
		$confirm = $_POST['confirm'];

		if($_POST['pass'] == $_POST['confirm']){

		$query = "INSERT INTO form (name, email, numbers,password) VALUES ('$name','$email','$numbers','$pass')";

		$run = mysqli_query($conn, $query) or die(mysqli_error());		

		if($run){
			echo "Form submitted success";
			header('Location: home.php');
		}
	}
	else{
		$alert = "<script>alert('Password not matched please type again properly'); window.location.href='signup.php';</script>";
        echo $alert;
	}
	}
	else{
		$alert = "<script>alert('Everything is required'); window.location.href='signup.php';</script>";
        echo $alert;
	}
}

 ?>