<html>
<head>
<style>
    /* Style for the Customers section */
    .section#customers {
        padding: 20px;
    }

    /* Style for the table */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Style for table headers */
    th {
        background-color: #007BFF;
        color: white;
        font-weight: bold;
        padding: 10px;
        text-align: left;
    }

    /* Style for alternating rows */
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Style for table cells */
    td {
        padding: 10px;
    }

    /* Hover effect for rows */
    tr:hover {
        background-color: #007BFF;
        color: white;
    }
</style>

</head>
<body>
<div class="section" id="customers">
    <h2>Customers</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "amc";

    // Create a new connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT user_name, selected_plan, total_amount, payment_method, payment_timestamp FROM payments";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>User Name</th><th>Selected Plan</th><th>Total Amount</th><th>Payment Method</th><th>Payment Timestamp</th></tr>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['user_name'] . '</td>';
        echo '<td>' . $row['selected_plan'] . '</td>';
        echo '<td>' . $row['total_amount'] . '</td>';
        echo '<td>' . $row['payment_method'] . '</td>';
        echo '<td>' . $row['payment_timestamp'] . '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
} else {
    echo 'No purchase details found.';
}

// Close the database connection
$conn->close();
?>

</div>
</body>
</html>