

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $studentName; ?></h1>
    </header>
    <nav>
        <ul>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="complaints.php">Complaints</a></li>
            <li><a href="maintenance-schedule.php">Maintenance Schedule</a></li>
            <li><a href="notifications.php">Notifications</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <h2>Your Profile</h2>
        <p>Name: <?php echo $studentName; ?></p>
        <p>Email: <?php echo $studentEmail; ?></p>
        <!-- Add more profile information here -->
    </main>
    <footer>
        <p>&copy; Your College Name</p>
    </footer>
</body>
</html>
