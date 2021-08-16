<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPARKS BANK</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style type="text/css">
    .container{
      padding-top: 30px;
      text-align: center;
      background-size: cover;
    }
    a{
      color: white;
    }
    a:hover{
      text-decoration: none;
      color:#D3D3D3;
    }
    </style>
</head>
<body>
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
            <a class="nav-link" href="history.php"> Transaction History </a>
          </li>
      </div>
    </nav>
<?php
    require 'config.php';
    $query = "SELECT * FROM customers";
    $result = mysqli_query($mysqli,$query);
?>
    <div class="container divStyle">
        <h4>LIST OF ALL CUSTOMERS</h4>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table roundedCorners tabletext table-hover table-sm table-condensed table-bordered table-dark">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email Id</th>
                            <th scope="col">Current Balance</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
  while($row=mysqli_fetch_array($result)){
     ?>
 <?php echo "<td> <a href = 'transfer.php?name=$row[1]'>$row[1]</a></td>";?>
<td><?php echo  $row["email"]; ?></td>
<td><?php echo  $row["current_balance"]; ?></td>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
