<?php
session_start();
	date_default_timezone_set('Asia/Kolkata');
	$server = "localhost";
	$user = "root";
	$password = "";
	$dbname = "insert";

	$conn = mysqli_connect($server, $user, $password, $dbname) or die();
	mysqli_select_db($conn, $dbname);

	if(isset($_POST['submit'])){
		$id = $_SESSION['id'];
		$topic = date("d/m/Y");
		$name = $_POST['name'];
		$moneys = $_POST['money'];
		$total = 0;
		$count = 0;
		$sum = 0;
		foreach ($moneys as $key => $value) {
			$total += $moneys[$key];
			++$count;
		}
		$sum = $total/$count;
		foreach ($moneys as $key => $value) {
			$moneys[$key] -= $sum;
		}

		foreach ($moneys as $key => $value) {
			$save = "INSERT INTO cal (id, topic, name, moneys) VALUES ('$id','$topic','".$name[$key]."','".$moneys[$key]."')";
			$query = mysqli_query($conn,$save) or die(mysqli_error());
		}
	}

?>
<html>
	<head>
	<title>Splitwise</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<link rel="stylesheet" href ="style.css"> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
		<div class = "scroll" style="text-align: center; background: #114856;">
    		<img src="b.png" alt="">
  		</div>
		  <br>
			<div class="form-group" style = "background:#FFFFFF; padding: 25px; border-radius: 10px;">
			<input type="text" name="Date" placeholder="Date" class="form-control name_list" required>
				<form name="add_name" id="add_name" method="POST" action="splitwise.php">
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
							<tr>
								<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" required/></td>
								<td><input type="text" name="money[]" placeholder="Amount" class="form-control name_list" required/></td>
								<td><button type="button" name="add" id="add" class="btn btn-success" style="font-size : 15px;">+</button></td>
							</tr>
						</table>
						<input type="submit" value="Calculate" name = "submit">
					</div>
				</form>
				<br>
				<br>
				<br>
				<table class="table table-striped">
					<tr>
						<th>Date</th>
						<th>Name</th>
						<th>Money To Pay</th>
					</tr>
					<?php
						$select = "Select * FROM cal where id = '".$_SESSION['id']."'ORDER BY topic DESC";
						$result = mysqli_query($conn, $select);
						while($row = mysqli_fetch_array($result)){ ?>
						<tr>
							<td><?php echo $row['topic']?></td>
							<td><?php echo $row['name']?></td>
							<td><?php echo $row['moneys']?></td>
						</tr>
						<?php
						}
					?>
				</table>
				<br>
				<br>
				<br>
			</div>
		</div>
	</body>
</html>

<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" required/></td><td><input type="text" name="money[]" placeholder="Amount" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
});
</script>