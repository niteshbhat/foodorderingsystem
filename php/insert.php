<!DOCTYPE html>
<html>

<head>
	<title>Food order system</title>
</head>

<body>
	<center>
		<?php
        $servername = "foodsystem-mysql:3306";
        $username = "root";
        $password = "root";
        $dbname = "local_db";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		

		$orderdate = $_REQUEST['orderdate'];
		$item = $_REQUEST['item'];
		$quantity = $_REQUEST['quantity'];
    

		$sql = "INSERT INTO orders (order_date, item, quantity) VALUES ('$orderdate', '$item', '$quantity')";

		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n$orderdate\n $item\n $gender\n");
            $sql1 = "SELECT * FROM orders";
            $result = (mysqli_query($conn, $sql1));
    
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["id"]. " - Order Date: " . $row["order_date"]. " - Item: " . $row["item"]. " - Quantity: " . $row["quantity"]. "<br>";
                }
            } else {
                echo "0 results";
            }

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}

		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
