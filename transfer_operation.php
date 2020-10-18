<?php
	ini_set('error_reporting',E_ALL & ~E_NOTICE );
		$sel=$_POST['status1'];
		$num=$_POST['credits'];
		$ID = $_POST['from'];
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
		$result =mysqli_query($conn, "SELECT credits FROM users WHERE username='". $sel ."' ");
		$res=mysqli_fetch_array($result);
		$num=(int)$num;
		if($num <= 0){
			echo "<script>alert(\"Enter credit > 0 (INVALID CREDIT) \");window.location.href=\"transfer.php\";</script> ";
					}
		else if($num > $res['credits']){
			echo "<script>alert(\"INSUFFICIENT CREDITS!!\");window.location.href=\"transfer.php\";</script>";
				}
		else if(strcmp($sel,$ID)==0){
			echo "<script>alert(\"CANNOT TRANSFER TO SELF \");window.location.href=\"transfer.php\";</script> ";
					}
		if($num <= $res['credits'] && $num>0 ){
			$result1=mysqli_query($conn, "UPDATE users SET credits= credits+$num  WHERE username='".$sel."' ");
			$result2=mysqli_query($conn, "UPDATE `users` SET `credits`=credits-$num WHERE username= '".$ID."' ");
			if($result1 ==1){
			echo "<script>alert(\"TRANSACTION SUCCESFULL\");window.location.href=\"transfer.php\";</script>";
			}
		}
		

?>