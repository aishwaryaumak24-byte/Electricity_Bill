<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit();
}

$month = $_POST['month'];
$name = trim($_POST['name']);
$address = trim($_POST['address']);
$mobile = trim($_POST['mobile']);
$units = (int)$_POST['units'];

$amount = 0;

// Slab-wise Bill Calculation
if ($units <= 50) {
    $amount = $units * 3.50;
}
elseif ($units <= 100) {
    $amount = (50 * 3.50) +
              (($units - 50) * 4.00);
}
elseif ($units <= 250) {
    $amount = (50 * 3.50) +
              (50 * 4.00) +
              (($units - 100) * 5.20);
}
else {
    $amount = (50 * 3.50) +
              (50 * 4.00) +
              (150 * 5.20) +
              (($units - 250) * 6.50);
}

// Save into Database
$sql = "INSERT INTO bills
(month, customer_name, address, mobile, units, amount)
VALUES
(?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssid",
    $month,
    $name,
    $address,
    $mobile,
    $units,
    $amount
);

$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Electricity Bill</title>

<link rel="stylesheet" href="css/style.css">

<style>

.bill{

max-width:700px;

margin:40px auto;

background:white;

padding:30px;

border-radius:10px;

box-shadow:0 0 15px rgba(0,0,0,.2);

}

.bill h2{

text-align:center;

margin-bottom:20px;

}

table{

width:100%;

border-collapse:collapse;

}

td{

padding:12px;

border-bottom:1px solid #ddd;

}

th{

padding:12px;

background:#2e8b57;

color:white;

}

.button-group{

margin-top:30px;

display:flex;

gap:15px;

justify-content:center;

flex-wrap:wrap;

}

.btn{

padding:12px 25px;

background:#2e8b57;

color:white;

text-decoration:none;

border:none;

cursor:pointer;

border-radius:5px;

font-size:16px;

}

.btn:hover{

background:#1d6d46;

}

@media print{

.button-group{

display:none;

}

body{

background:white;

}

.bill{

box-shadow:none;

margin:0;

}

}

</style>

</head>

<body>

<div class="bill">

<h2>Electricity Bill</h2>

<table>

<tr>
<th>Field</th>
<th>Details</th>
</tr>

<tr>
<td>Month</td>
<td><?php echo htmlspecialchars($month); ?></td>
</tr>

<tr>
<td>Customer Name</td>
<td><?php echo htmlspecialchars($name); ?></td>
</tr>

<tr>
<td>Address</td>
<td><?php echo nl2br(htmlspecialchars($address)); ?></td>
</tr>

<tr>
<td>Mobile Number</td>
<td><?php echo htmlspecialchars($mobile); ?></td>
</tr>

<tr>
<td>Units Consumed</td>
<td><?php echo $units; ?></td>
</tr>

<tr>
<td>Total Amount</td>
<td><strong>₹ <?php echo number_format($amount,2); ?></strong></td>
</tr>

<tr>
<td>Date</td>
<td><?php echo date("d-m-Y"); ?></td>
</tr>

</table>

<div class="button-group">

<button onclick="window.print()" class="btn">
Print Bill
</button>

<a href="index.php" class="btn">
Generate New Bill
</a>

</div>

</div>

</body>
</html>