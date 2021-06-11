<?php
require "starter.php";
require "navbar.php";
require "dbconnect.php";

echo '<div class="container my-3" style="height:69vh;">


		<h2>Order</h2>
		<table id="myTable">
			<thead style="border:2px solid lightgray ;padding:10px">
				<tr style="border:2px solid lightgray ;padding:10px">
					<th style="border:2px solid lightgray ;padding:10px">Full name</th>
					<th style="border:2px solid lightgray ;padding:10px">Mobile Number</th>
					<th style="border:2px solid lightgray ;padding:10px">Address</th>
					<th style="border:2px solid lightgray ;padding:10px">Orderd Item</th>
					<th style="border:2px solid lightgray ;padding:10px">Price</th>
				</tr>
			</thead>
			<tbody style="border:2px solid lightgray">'; 
                session_start();
                $rusername=$_SESSION['username'];
				$sql= "SELECT * FROM `order` WHERE `rusername`='$rusername'";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($result)) {
					echo "<tr style='border:2px solid lightgray'>
						<td style='border:2px solid lightgray ;padding:10px'>".$row['fname']."</td>
						<td style='border:2px solid lightgray ;padding:10px'>".$row['mono']."</td>
						<td style='border:2px solid lightgray ;padding:10px'>".$row['address']."</td>
						<td style='border:2px solid lightgray ;padding:10px'>".$row['dname']."</td>
						<td style='border:2px solid lightgray ;padding:10px'>".$row['price']."</td>
					</tr>";
				};
			echo '	
			</tbody>
		</table>
        <a href="wipe.php" class="btn btn-primary" style="margin:20px ; margin-left:400px">Wipe Data</a>
    </div>'

    ?>

  