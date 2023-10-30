<?php
// Include your database connection file here
include("conn.php");

// Function to generate a random string
function generateRandomString($length) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST["company_name"];
    $email = $_POST["email"];
    $mobile_number = $_POST["mobile_number"];
    $company_address = $_POST["company_address"];
    $password = $_POST["password"];

    // Generate the unique company_id
    $prefix = "COMP";
    $randomCharacters = generateRandomString(6); // Change the length as needed
    $uniqueCompanyID = $prefix . $randomCharacters;

    // Hash the password for security (you should use a more secure hashing method)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO amc_users (company_id, company_name, email, mobile_number, company_address, password) VALUES ('$uniqueCompanyID', '$company_name', '$email', '$mobile_number', '$company_address', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "Signup successful. You can now <a href='login.html'>login</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
