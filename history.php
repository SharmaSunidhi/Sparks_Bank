<?php
	session_start();
	include 'config.php';
	$q="select * from transfers;";
	$result=mysqli_query($mysqli,$q);
	$row_count=mysqli_num_rows($result);
?>
<html>
<head>
	<title>Transaction History</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel = "stylesheet" type = "text/css" href = "css/style.css">
	<style>
	html,body {
margin:0;
padding:0;
overflow-x:hidden;
}
		table {
		font-family: sans-serif;
		border-collapse: collapse;
		}
		h1{
		font-family: serif;
		font-size:40px;
		}
		td, th {
		text-align: center;
		padding: 8px;
		}
	</style>
</head>
<body class="hist">
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
	    </div>
	  </nav>
	    <h1 style="color:black;text-align: center;font-family: cursive;" >Transaction History</h1>
	<div class="row">
			<div class="col">
					<div class="table-responsive-sm">
					<table class="table table-striped table-sm table-condensed table-dark">
							<thead>
									<tr>
									<th scope="col">Sender</th>
									<th scope="col">Receiver</th>
									<th scope="col">Amount</th>
									<th scope="col">Date and Time</th>
									</tr>
							</thead>
							<tbody>
<?php
while($row=mysqli_fetch_array($result)){
?>
<td><?php echo  $row["sender"]; ?></td>
<td><?php echo  $row["receiver"]; ?></td>
<td><?php echo  $row["balance"]; ?></td>
<td><?php echo  $row["datetime"]; ?></td>
<tr align = center>
<?php }
?>
</tr>
							</tbody>
					</table>
					</div>
			</div>
	</div>
	</div>
</div>
</body>
</html>
