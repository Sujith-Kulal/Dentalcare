<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Appointment Status</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="container mt-5">
    <h2>Check Appointment Status</h2>
    <a href="main.html" class="btn btn-primary">Back</a>

<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_db";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle approval or cancellation
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    // Retrieve the current status
    $checkSql = "SELECT status FROM contact_form WHERE id = $id";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        $currentStatus = $checkResult->fetch_assoc()['status'];

        // Update the status only if it's not already changed
        if (($action == 'approve' && $currentStatus != 'Approved') || ($action == 'cancel' && $currentStatus != 'Cancelled')) {
            // Update the status based on the action
            $status = ($action == 'approve') ? 'Approved' : 'Cancelled';
            $updateSql = "UPDATE contact_form SET status = '$status' WHERE id = $id";
            $conn->query($updateSql);
        }
    }
}

// Retrieve data from the database
$sql = "SELECT * FROM contact_form";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["number"] . "</td>
                <td>" . $row["date"] . "</td>
                <td>" . $row["status"] . "</td>
                <td>
                    <a href='?action=approve&id=" . $row["id"] . "'>Approve</a> |
                    <a href='?action=cancel&id=" . $row["id"] . "'>Cancel</a>
                </td>
            </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
</body>
</html>

