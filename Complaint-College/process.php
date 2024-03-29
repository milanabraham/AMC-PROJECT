<?php
// Establish a database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$id = $_POST['id'];
$name = $_POST['name'];
$department = $_POST['department'];
$complaint = $_POST['complaint'];

// Check if the ID already exists in the database
$idExistsQuery = "SELECT id FROM complaints WHERE id = '$id'";
$result = $conn->query($idExistsQuery);

if ($result->num_rows > 0) {
    // ID already exists, show a message
    $message1 = "ID already exists. Please choose a different ID.";
    header("Location: studentComplaint.php?message=" . urlencode($message1));
    exit();
}

// Prepare and execute SQL query to insert the complaint
$sql = "INSERT INTO complaints (id, name, department, complaint, status) VALUES ('$id', '$name', '$department', '$complaint', 'processing')";

if ($conn->query($sql) === TRUE) {
    // Insertion successful, show a success message
    $message = "Complaint registered successfully!";
    header("Location: studentComplaint.php?message=" . urlencode($message));
} else {
    // Error in insertion, show an error message
    $message = "Error registering complaint: " . $conn->error;
    header("Location: studentComplaint.php?message=" . urlencode($message));
}

// Close the database connection
$conn->close();
?>
