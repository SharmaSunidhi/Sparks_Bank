<?php
	session_start();
	include 'config.php';
	$Name="";
	if(isset($_GET['name'])){
		$Name=$_GET['name'];
	}
	$q="SELECT * From customers WHERE name='$Name'";
	$result=mysqli_query($mysqli,$q);
	$row_count=mysqli_num_rows($result);
	$_SESSION['senderName']=$Name;
?>
<html>
<head>
	<title>Money Transfer</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel = "stylesheet" type = "text/css" href = "css/style.css">
	<style>
		table {
		font-family: sans-serif;
		border-collapse: collapse;
		width: 100%;
		}
		h1{
		font-family: sans-serif;
		font-size:40px;
		}
		td, th {
		text-align: center;
		padding: 8px;
		}

	</style>
</head>
<body class="tra">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	    <a class="navbar-brand" href="https://www.thesparksfoundationsingapore.org/">
	      <img style="height:2em;" src="img/logo.png" alt="logo">
	    </a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="navbar-collapse" id="navbarSupportedContent">
	      <ul class="nav navbar-nav ml-auto">
	        <li >
	          <a class="nav-link" href="index.php"> Home </a>
	        </li>
	        <li >
	          <a class="nav-link" href="users.php"> Customers </a>
	        </li>
	        <li >
	          <a class="nav-link" href="history.php"> Transaction History </a>
	        </li>
	    </div>
	  </nav>
	<div align="center" style="top:0px">
<br>
	<div>
		<h1 style="font-family:serif;text-align:center;color: black;">Account Details</h1>
		<table class="table">
           <th>NAME </th>
           <th>EMAIL</th>
		   <th>CURRENT BALANCE</th>
           <tr>
			<?php
				$row=mysqli_fetch_array($result)
			?>
			<td><?php echo  $row["name"]; ?></td>
			<td><?php echo  $row["email"]; ?></td>
			<td><?php echo  $row["current_balance"]; ?></td>
           </tr>
        </table>
	</div>
	<?php echo "<form method='post' action='transaction.php?name=$Name'>"?>
<br><br>
	<h3 style="font-family: cursive;color: black;">Select the user to whom you want to transfer money from the dropdown list</h3>
	<table border="0px" class="table">
		<tr>
		<td>Transfer To:</td>
		<td>
<select name="user" class="custom-select"  style="width:130px;" >
	<option >--Select--</option>
				<?php
				$q1="select * from customers";
				$result1=mysqli_query($mysqli,$q1);
				while($row=mysqli_fetch_array($result1)){
			?>
			<option value="<?php echo $row['name']; ?>"> <?php echo $row["name"]; ?></option>
			<?php }
			?>
    </select></td></tr>
			<tr><td>Amount:</td><td><input type="text" name="Amount"></td></tr>
			<tr><td></td><td><input type="submit" name="submit" value="Submit" align=center style="margin-top: 10px; width:6em; height:2em; font-size:15px; background-color: skyblue; font-weight: bold;"></td></tr>
			</table>
</form>
</body>
</html>
