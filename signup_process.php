<?php
// Database connection configuration

$host = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "startup_idea"; 

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user input from the signup form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Perform database query to insert the user's data
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    // Signup successful, show popup and redirect to login page
    echo "<script>alert('Signup successful. You can now login.');
          window.location.href = 'login.html';</script>";
} else {
    // Error occurred, show popup with the error message
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
}

// Close the database connection
mysqli_close($conn);
?>
