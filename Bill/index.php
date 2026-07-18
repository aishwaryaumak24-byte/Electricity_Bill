<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Billing System</title>

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
            <p>Electricity Billing System</p>
        </div>

    </div>

    <h2 class="section-title">Consumer Details</h2>

    <form action="bill.php" method="POST">

        <table class="info-table">

            <tr>
                <td><strong>Billing Month</strong></td>
                <td>
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
                </td>
            </tr>

            <tr>
                <td><strong>Customer Name</strong></td>
                <td>
                    <input type="text"
                           name="name"
                           placeholder="Enter Customer Name"
                           required>
                </td>
            </tr>

            <tr>
                <td><strong>Address</strong></td>
                <td>
                    <textarea
                        name="address"
                        rows="4"
                        placeholder="Enter Complete Address"
                        required></textarea>
                </td>
            </tr>

            <tr>
                <td><strong>Mobile Number</strong></td>
                <td>
                    <input type="tel"
                           name="mobile"
                           maxlength="10"
                           pattern="[0-9]{10}"
                           placeholder="Enter Mobile Number"
                           required>
                </td>
            </tr>

            <tr>
                <td><strong>Units Consumed</strong></td>
                <td>
                    <input type="number"
                           name="units"
                           min="1"
                           placeholder="Enter Number of Units"
                           required>
                </td>
            </tr>

        </table>

        <div class="button-group">

            <button type="submit" class="btn">
                ⚡ Generate Bill
            </button>

        </div>

    </form>

</div>

</body>
</html>