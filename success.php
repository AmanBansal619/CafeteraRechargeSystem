<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div>
		<h2>Payment Success</h2>
	</div>

	<div>
		<?php 
			if(isset($_POST['status']))
			{
				if($_POST['status']=="success")
				{
					echo "<p>Payment Done Successfully.<br>Details Are Below.</p>";
					echo "<p>Txn Id: ".$_POST['txnid']."</p>";
					echo "<p>Name: ".$_POST['firstname']."</p>";
					echo "<p>Email: ".$_POST['email']."</p>";
					echo "<p>Amount: ".$_POST['amount']."</p>";
					echo "<p>Phone No: ".$_POST['phone']."</p>";
					echo "<p>Product Info: ".$_POST['productinfo']."</p>";
					echo "<p>encryptedPaymentId: ".$_POST['encryptedPaymentId']."</p>";
					
					$username = "root";
   $password = "";
   $db = "payment";
   
   $connect = mysqli_connect("127.0.0.1",$username,$password,$db);
   
   // get values form input text and number
   
   $phone = $_POST['phone'];
   $amount = $_POST['amount'];
				
           
   // mysql query to Update data
					$query1=" SELECT `amount` FROM `users` WHERE `phone`= $phone ";
					$query2=" insert into history values('$phone','$amount') ";
					
					$result1 = mysqli_query($connect, $query1);
					$result3 = mysqli_query($connect, $query2);	
if ($result1->num_rows > 0) 
{
  while($row = $result1->fetch_assoc()) 
  {
    $amount1 = $row["amount"];
  }
}
					$amount2=$amount+$amount1;
   $query = "UPDATE `users` SET `amount`='".$amount2."' WHERE `phone` = $phone";
   $result = mysqli_query($connect, $query);
					
							
   
   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($connect);
				}
			}

			?>
	</div>
</body>
</html>