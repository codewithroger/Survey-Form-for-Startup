<?php
// Database connection
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $age = $conn->real_escape_string($_POST['age']);
    $role = $conn->real_escape_string($_POST['role']);
    $experience = $conn->real_escape_string($_POST['experience']);
    $user_rate = $conn->real_escape_string($_POST['user-rate']);
    $materials_rate = $conn->real_escape_string($_POST['materials-rate']);
    $user_recommend = $conn->real_escape_string($_POST['user-recommend']);
    $prefer = implode(", ", $_POST['prefer']);
    $comment = $conn->real_escape_string($_POST['comment']);
    
    // Insert data into database
    $sql = "INSERT INTO survey_data (name, email, age, role, experience, user_rate, materials_rate, user_recommend, prefer, comment) VALUES ('$name', '$email', '$age', '$role', '$experience', '$user_rate', '$materials_rate', '$user_recommend', '$prefer', '$comment')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('From Sumbit Successfully');</script>";
        echo "<script>window.location.href = 'index.html';</script>";
    } else {
        echo 'alert("Error: " . $sql . "<br>" . $conn->error)';
    }
}

  $conn->close();
  ?>