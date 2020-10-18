<?php

//including the database connection file
    $host="localhost";
    $dbUsername="root";
    $dbpassword="";
    $dbname="credit";
/// Create a connection
    $conn= new mysqli($host,$dbUsername,$dbpassword,$dbname);
/// for error occurs in connection
    
    if (mysqli_connect_error()) {
      die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
?>
<!DOCTYPE HTML>
<head>
	<title>OPERATION</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <style type="text/css">
	body{
        background-color: #b3c6ff;
 }
 .submitt{
 		background: transparent;
  		border-radius: 10px;
  		padding: 3px 20px;
  		text-align: center;
 }
 select{
		background: transparent;
  		border-radius: 10px;
  		padding: 7px 25px;
  		text-align: center;
	}
	  	table{
	  		font-size:15px;
	  	}
	  	.heading{
	  		position: absolute;
	  		top: 0%;
	  	}
	  	.form{
	  		position: absolute;
	  		top:15%;
	  		left:45%;
			  color:black;
	  	}
		  
	@media screen and (max-width:500px) {
		  body{
  			background-image:url('6.jpeg');
			  background-size: cover;
			  background-repeat: no-repeat;
			  min-height: 700px;
			  justify-content: flex-start;
			  align-items: flex-end;
  	
		  }
 .submitt{
 		background: transparent;
  		border-radius: 10px;
  		padding: 3px 20px;
  		text-align: center;
 }
 select{
		background: transparent;
  		border-radius: 10px;
  		padding: 7px 25px;
  		text-align: center;
	}
	  	table{
	  		font-size:15px;
			  color:black;
			
	  	}
	  	.heading{
	  		position: absolute;
	  		top: 0%;
	  	}
	  	.form{
	  		position: absolute;
	  		top:15%;
	  		left:45%;
			
		  }
		  }
    button{
        width: 20%;
                align-content: center;
                background-color: #4CAF50;
                color: white;
                padding: 15px 15px ;
                margin: 8px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
    
    }
	  </style>
</head>
<body>
			<?php
			ini_set('error_reporting',E_ALL & ~E_NOTICE );
				$ID = $_GET['ID'];
				$result=mysqli_query($conn,"SELECT username,id,mail,credits FROM users WHERE username='". $ID ."' ");
			?>
	<div class="data">
		<table class="table" style="position: absolute;left:5%;width:30%;">
			<thead>
			<tr>
			<th style="text-align: center;font-size: 20px;">YOUR DETAILS</th>	
			</tr>
			</thead>
			<tbody>
				<?php
				while($res = mysqli_fetch_array($result)) {     
    				echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>USER NAME</b><br><br>".$res['username']."</td>";
    				echo "<br>";
    				echo "</tr>";
					echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>TOTAL CREDITS AVAILABLE</b><br><br>".$res['credits']."</td>";
    				echo "<br>";
    				echo "</tr>";
      			}
      			?>
			</tbody>
		</table>
	</div>
	<div class="form">
		<form action="transfer_operation.php" method="post">

			<label style="font-size:20px;">From</label>
			<?php
				echo "<input type=\"text\" name=\"from\" placeholder=\"".$ID."\" required size=\"30\"  style=\"border-radius:5px\;padding:4px 15px\;border-width:1px\;border-color:black; width:90%;\">";
				?>
				<br><br><br>
			<label style="font-size:20px;">Select user to transfer credits :</label>
			<br>
			<select name="status1" id="status">

				<option value="Select">-SELECT-</option>
				<?php
				      $host="localhost";
					    $dbUsername="root";
					    $dbpassword="";
					    $dbname="credit";
					/// Create a connection
					    $conn= new mysqli($host,$dbUsername,$dbpassword,$dbname);
					/// for error occurs in connection
					    
					    if (mysqli_connect_error()) {
					      die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
					    }

					$result = mysqli_query($conn, "SELECT username FROM users "); 
					while($res = mysqli_fetch_array($result)) { 
						echo "<option value='".$res['username']."' > ".$res['username']." </option>";
						
					}
  					?>	
  				</select>
  				<br>
  				<br>
  				<input type="number" name="credits" placeholder="Enter Value" required size="50"  style="border-radius:5px;padding:4px 15px;border-width:1px;border-color:black; width:90%;">
  				<br><br><br>
  				<input type="submit" name="" value="Transfer" class="submitt">
  				<br><br>
		</form>
		<a href="transfer.php" style="color:black"><button>Back</button></a>
		
	</div>