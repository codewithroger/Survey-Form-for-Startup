<?php
// Database connection parameters
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "Suvery_Form"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process registration form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $emailid = $_POST['email'];
     $message = $_POST['message'];
   

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO contact (email, name, message) 
            VALUES ('$emailid', '$name', '$message')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('From Sumbit Successfully');</script>";
        echo "<script>window.location.href = 'index.html';</script>";
    } else {
        echo 'alert("Error: " . $sql . "<br>" . $conn->error)';
    }
}

// Close database connection
$conn->close();
?>

