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

// Slab Calculation
if ($units <= 50) {
    $amount = $units * 3.50;
}
elseif ($units <= 100) {
    $amount = (50 * 3.50) + (($units - 50) * 4.00);
}
elseif ($units <= 250) {
    $amount = (50 * 3.50) + (50 * 4.00) + (($units - 100) * 5.20);
}
else {
    $amount = (50 * 3.50) + (50 * 4.00) + (150 * 5.20) + (($units - 250) * 6.50);
}

// Save to Database
$sql = "INSERT INTO bills(month, customer_name, address, mobile, units, amount)
VALUES(?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssid", $month, $name, $address, $mobile, $units, $amount);
$stmt->execute();

$billId = $stmt->insert_id;
$billNo = "EB" . date("Y") . str_pad($billId, 5, "0", STR_PAD_LEFT);

// Due Date = 10 days from today
$dueDate = date("d-m-Y", strtotime("+10 days"));

// Slab Details
$slab1 = min($units,50);
$slab2 = ($units>50)?min($units-50,50):0;
$slab3 = ($units>100)?min($units-100,150):0;
$slab4 = ($units>250)?$units-250:0;
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Electricity Bill</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="bill-container">

<div class="bill-header">

<div class="logo">

⚡

</div>

<div class="company">

<h1>MAHARASHTRA STATE ELECTRICITY</h1>

<h2>DISTRIBUTION COMPANY LIMITED</h2>

<p>Official Electricity Bill</p>

</div>

</div>

<hr>

<div class="bill-info">

<div>

<p><strong>Bill Number</strong></p>

<h3><?php echo $billNo; ?></h3>

</div>

<div>

<p><strong>Bill Month</strong></p>

<h3><?php echo $month; ?></h3>

</div>

<div>

<p><strong>Bill Date</strong></p>

<h3><?php echo date("d-m-Y"); ?></h3>

</div>

<div>

<p><strong>Due Date</strong></p>

<h3><?php echo $dueDate; ?></h3>

</div>

</div>

<h2 class="section-title">Customer Information</h2>

<table class="info-table">

<tr>

<td><strong>Customer Name</strong></td>

<td><?php echo htmlspecialchars($name); ?></td>

</tr>

<tr>

<td><strong>Mobile Number</strong></td>

<td><?php echo htmlspecialchars($mobile); ?></td>

</tr>

<tr>

<td><strong>Address</strong></td>

<td><?php echo nl2br(htmlspecialchars($address)); ?></td>

</tr>

<tr>

<td><strong>Units Consumed</strong></td>

<td><?php echo $units; ?> Units</td>

</tr>

</table>

<h2 class="section-title">Electricity Bill Calculation</h2>

<table class="bill-table">

    <tr>
        <th>Slab</th>
        <th>Units</th>
        <th>Rate (₹)</th>
        <th>Amount (₹)</th>
    </tr>

    <tr>
        <td>0 - 50</td>
        <td><?php echo $slab1; ?></td>
        <td>3.50</td>
        <td><?php echo number_format($slab1 * 3.5,2); ?></td>
    </tr>

    <tr>
        <td>51 - 100</td>
        <td><?php echo $slab2; ?></td>
        <td>4.00</td>
        <td><?php echo number_format($slab2 * 4,2); ?></td>
    </tr>

    <tr>
        <td>101 - 250</td>
        <td><?php echo $slab3; ?></td>
        <td>5.20</td>
        <td><?php echo number_format($slab3 * 5.2,2); ?></td>
    </tr>

    <tr>
        <td>Above 250</td>
        <td><?php echo $slab4; ?></td>
        <td>6.50</td>
        <td><?php echo number_format($slab4 * 6.5,2); ?></td>
    </tr>

</table>


<div class="summary">

    <div class="summary-card">

        <h3>Total Units</h3>

        <p><?php echo $units; ?> Units</p>

    </div>

    <div class="summary-card amount">

        <h3>Total Bill Amount</h3>

        <h1>₹ <?php echo number_format($amount,2); ?></h1>

    </div>

</div>


<div class="payment-status">

    <span>Payment Status</span>

    <h2>UNPAID</h2>

</div>


<div class="notice">

    <h3>Important Instructions</h3>

    <ul>

        <li>Please pay your electricity bill before the due date.</li>

        <li>Late payment may attract additional charges.</li>

        <li>Keep this bill safely for future reference.</li>

        <li>For any billing queries, contact the customer care center.</li>

    </ul>

</div>


<div class="footer">

    <div>

        <strong>Generated On</strong><br>

        <?php echo date("d-m-Y H:i"); ?>

    </div>

    <div>

        <strong>Customer Signature</strong>

        <br><br>

        ___________________

    </div>

    <div>

        <strong>Authorized Officer</strong>

        <br><br>

        ___________________

    </div>

</div>


<div class="button-group">

<button onclick="window.print()" class="btn">

🖨 Print Bill

</button>

<a href="index.php" class="btn">

➕ Generate New Bill

</a>

</div>

</div>

</body>

</html>