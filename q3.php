<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

</head>
<body>
<header >
  <h5 class="text-center my-2" >Advance Web Development: Back-end</h5>
  <p class="text-center" >Juryn T. Tamtam</p>
</header>
<div class="box">
        <nav>
            <ul>
            <li><a href="ws1-3.php">Worksheet_1.3</a></li>
            <li><a href="ws1-4.php">Worksheet_1.4</a></li>
            <li><a href="ws1-5.php">Worksheet_1.5</a></li>
            </ul>
        </nav>
	</div>	

		<div class="container mt-3">
    	<nav>
        <ul>
            <li><a href="q1.php" class="btn btn-primary">Query 1</a></li>
            <li><a href="q2.php" class="btn btn-primary">Query 2</a></li>
            <li><a href="q3.php" class="btn btn-primary">Query 3</a></li>
            <li><a href="q4.php" class="btn btn-primary">Query 4</a></li>
            <li><a href="q5.php" class="btn btn-primary">Query 5</a></li>
            </ul>
        </nav>
        <hr>


<!-- Export Button -->
<button id="exportBtn" class="btn btn-success mb-3">Export to Excel</button>

<table id="myTable" class="table">
	<thead>
        <h4><br>3. List of all customers that have ordered "Tofu" product.</h4>
		<tr>
			<th onclick="sortTable(0)">Customer ID</th>	
			<th onclick="sortTable(0)">Customer Name</th>
			<th onclick="sortTable(1)">Product Order</th>                          
		</tr>
	</thead>

	<tbody>
<?php
include 'connect.php';
$sql = "SELECT customers.CustomerID, customers.CustomerName, products.ProductName
FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
JOIN orderdetails ON orders.OrderID = orderdetails.OrderID
JOIN products ON orderdetails.ProductID = products.ProductID
WHERE products.ProductName = 'Tofu'";
$all_sql = $con->query($sql);
	while($row = mysqli_fetch_array($all_sql)){
?>
		<tr>
			<td><?php echo $row["CustomerID"]; ?></td>	
            <td><?php echo $row["CustomerName"]; ?></td>
			<td><?php echo $row["ProductName"]; ?></td>                       
		</tr>
<?php 
	}
?>
	</tbody>
</table>
<script>
    document.getElementById('exportBtn').addEventListener('click', function() {
        var table = document.querySelector('table'); // Select the table to export
        var wb = XLSX.utils.table_to_book(table, {sheet: "Worksheet 1.4"});
        XLSX.writeFile(wb, "query2.xlsx");
    });
</script>
</div>
</body>
</html>
