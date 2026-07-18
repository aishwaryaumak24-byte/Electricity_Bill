<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Billing System</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="container">

    <h1>⚡ Electricity Billing System</h1>
    <p class="subtitle">Generate Electricity Bill</p>

    <form action="bill.php" method="POST">

        <!-- Month -->
        <div class="input-group">
            <label>Select Month</label>

            <select name="month" required>

                <option value="">-- Select Month --</option>

                <option>January</option>
                <option>February</option>
                <option>March</option>
                <option>April</option>
                <option>May</option>
                <option>June</option>
                <option>July</option>
                <option>August</option>
                <option>September</option>
                <option>October</option>
                <option>November</option>
                <option>December</option>

            </select>
        </div>

        <!-- Customer Name -->

        <div class="input-group">

            <label>Customer Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter Customer Name"
                required
            >

        </div>

        <!-- Address -->

        <div class="input-group">

            <label>Address</label>

            <textarea
                name="address"
                rows="5"
                placeholder="Enter Complete Address"
                required
            ></textarea>

        </div>

        <!-- Mobile -->

        <div class="input-group">

            <label>Mobile Number</label>

            <input
                type="tel"
                name="mobile"
                pattern="[0-9]{10}"
                maxlength="10"
                placeholder="Enter 10 Digit Mobile Number"
                required
            >

        </div>

        <!-- Units -->

        <div class="input-group">

            <label>Number of Units Consumed</label>

            <input
                type="number"
                name="units"
                min="1"
                placeholder="Enter Units"
                required
            >

        </div>

        <!-- Submit Button -->

        <button type="submit">
            Generate Bill
        </button>

    </form>

</div>

</body>
</html>