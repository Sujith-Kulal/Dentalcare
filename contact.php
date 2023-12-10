<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $date = $_POST["date"];

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

    // Prepare and execute the SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, number, date) VALUES (?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $number, $date);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
