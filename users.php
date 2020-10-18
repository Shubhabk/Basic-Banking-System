<?php 
 $host="localhost";
 $dbUsername="root";
 $dbpassword="";
 $dbname="credit";
/// Create a connection
 $conn= new mysqli($host,$dbUsername,$dbpassword,$dbname);
$result = mysqli_query($conn,"SELECT credits,username FROM users ORDER BY id");
if (mysqli_connect_error()) {
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
  }
?>
<html>
    <head>
        <title>CUSTOMERS</title>
        <style>
            .b1 .btn{
                width: 15%;
                align-content: center;
                background-color: #4CAF50;
                color: white;
                padding: 15px 15px ;
                margin: 8px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
    
                
            }
            .b1{
                margin-left:35%;
            }
            th, td {
  padding: 8px;
  text-align: left;
}

div{
    margin-left:20%;
}
        </style>
    </head> 
    <body bgcolor="#b3c6ff">
    <div class="data">
    <table class="table" >
    <tbody>
      <?php 
        echo "<table border='0' cellspacing='20'  width='60%'>
        <tr style=\"background-color:rgb(0, 0, 0,0.7);color:white\">
        <th style=\"text-align:center\"><h3>NAME</h3></th>
        <th style=\"text-align:center\"><h3>CREDITS</h3></th>
        <th style=\"text-align:center\"><h3>DETAILS</h3></th>
        </tr>";
        if(mysqli_num_rows($result) > 0)
        {
            while ($res = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td style=\"text-align:center\">".$res['username']."</td>";
                echo "<td style=\"text-align:center\">".$res['credits']."</td>";
                echo "<td style=\"text-align:center\"><a href=\"view_users.php?ID=$res[username]\">View Details</a></td>";
                echo "</tr>";
            } 
        }
        else{
            echo "no results";
        }
    ?>
    	</tbody>
        </table>
    </div>
    <div class="b1">
    <a href='home.html'><button class="btn">BACK</button></a>
    </div>  
    </body>
</html>