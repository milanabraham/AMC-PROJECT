<?php
// Start the session only if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include your database connection file here
include("conn.php");

if (isset($_SESSION['company_id'])) {
    $company_id = $_SESSION['company_id'];

    // Fetch the user's plan from the amc_payments table
    $sql = "SELECT selected_plan FROM amc_payments WHERE company_id = '$company_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if (isset($row['selected_plan']) && $row['selected_plan'] !== null) {
            $userPlan = $row['selected_plan'];
            
            echo "<h2>Available Contracts</h2>";

            // Display contract details based on the user's plan
            switch ($userPlan) {
                case "basic":
                    // Display basic contract details
                    echo "<ul>";
                    echo "<li>Desktop</li>";
                    echo "<li>CPU</li>";
                    echo "<li>Mouse</li>";
                    echo "<li>Keyboard</li>";
                    echo "</ul>";
                    break;
                case "standard":
                    // Display standard contract details
                    echo "<ul>";
                    echo "<li>Desktop</li>";
                    echo "<li>CPU</li>";
                    echo "<li>Mouse</li>";
                    echo "<li>Keyboard</li>";
                    echo "<li>Printers, Scanners, Cameras</li>";
                    echo "<li>Speakers</li>";
                    echo "</ul>";
                    break;
                case "premium":
                    // Display premium contract details
                    echo "<ul>";
                    echo "<li>Desktop</li>";
                    echo "<li>CPU</li>";
                    echo "<li>Mouse</li>";
                    echo "<li>Keyboard</li>";
                    echo "<li>Printers, Scanners, Cameras</li>";
                    echo "<li>Speakers</li>";
                    echo "<li>Multimedia Projectors</li>";
                    echo "<li>Disk Drives</li>";
                    echo "<li>Modems</li>";
                    echo "</ul>";
                    break;
            }

            // Display "Add a Contract" button if the user has a plan
            echo '<form method="post">';
            echo '<input type="hidden" name="add_contract" value="1">';
            echo '<label for="contract_name">Add a Contract:</label>';
            echo '<input type="text" name="contract_name" required>';
            echo '<button type="submit">Add a Contract</button>';
            echo '</form>';
        } else {
            echo "No active plan. Please purchase a plan to access contracts.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Redirect the user to the login page if they are not authenticated
    header("Location: login.php");
    exit;
}
?>
