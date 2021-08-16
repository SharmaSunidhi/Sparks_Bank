  <?php
  	session_start();
    $a="";
    $d="";
  	include 'config.php';
  	if(isset($_POST['submit'])){
  		$a = $_POST['user'];
  		$b = $_POST['Amount'];
  		$d = $_GET['name'];
  	}
  	$result1 = mysqli_query($mysqli,"SELECT * FROM customers where name='$a'");
  	if (!$result1) {
  		printf("Error: %s\n", mysqli_error($mysqli));
  		exit();
  	}
  	while($row = mysqli_fetch_array($result1)){
  		$f = $row[3];
  		$c = "UPDATE customers SET ";
  		$c .= "current_balance=current_balance+'$b' WHERE name='$a'";
  		mysqli_query($mysqli,$c);
  	}
  	$result2 = mysqli_query($mysqli,"SELECT * FROM customers where name='$d'");
  	if (!$result2) {
  		printf("Error: %s\n", mysqli_error($mysqli));
  		exit();
  	}
  	while($row = mysqli_fetch_array($result2)){
  		$g = $row[3];
  		$e = "UPDATE customers SET ";
  		$e .= "current_balance=current_balance-'$b' WHERE name='$d'";
  		mysqli_query($mysqli,$e);
  	}
  	$result3 = mysqli_query($mysqli,"SELECT * FROM customers where name='$d'");
  	if (!$result3) {
  		printf("Error: %s\n", mysqli_error($mysqli));
  		exit();
  	}
  	while($row = mysqli_fetch_array($result3)){
  		$h = "INSERT INTO transfers(sender, receiver, balance) VALUES('".$d."', '".$a."', '".$b."')";
  		mysqli_query($mysqli,$h);
  	}
  ?>
  <html>
  <head>
  <script>
  alert("Your Transaction has been Successful");
  window.location.href="users.php";
  </script>
  </head>
  <html>
