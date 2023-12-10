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



    <!-- Add Search Form -->
    <form method="post" action="">
        <div class="mb-3">
            <label for="searchName" class="form-label">Search by Name:</label>
            <input type="text" class="form-control" id="searchName" name="searchName" required>
        </div>
        <button type="submit" class="btn btn-primary" name="search">Search</button>


    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        // Collect search data
        $searchName = $_POST['searchName'];

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

        // Prepare and execute the SQL statement to retrieve data
        $stmt = $conn->prepare("SELECT * FROM contact_form WHERE name = ?");
        $stmt->bind_param("s", $searchName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            ?>
            <h4 align="center">Result for "<?php echo $searchName; ?>"</h4>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo htmlentities($row['id']); ?></td>
                                    <td><?php echo htmlentities($row['name']); ?></td>
                                    <td><?php echo htmlentities($row['email']); ?></td>
                                    <td><?php echo htmlentities($row['number']); ?></td>
                                    <td><?php echo htmlentities($row['date']); ?></td>
                                    <td><?php echo empty($row['status']) ? "Not Updated Yet" : htmlentities($row['status']); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- .widget-body -->
            <?php
        } else {
            ?>
            <p>No record found for "<?php echo $searchName; ?>".</p>
            <?php
        }

        $stmt->close();
        $conn->close();
    }
    ?>

</div>

</body>
</html>
