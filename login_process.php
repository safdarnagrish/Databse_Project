<?php
// Database connection configuration (same as provided in the previous response)
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

// Get user input from the login form
$email = $_POST['email'];
$password = $_POST['password'];

// Perform database query to check if the user exists and the password is correct
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // User login successful
    header("Location: idea_submission.html"); // Redirect to the idea submission page
} else {
    // Invalid login credentials
    echo "Invalid email or password. <a href='login.html'>Try again</a>.";
}

// Close the database connection
mysqli_close($conn);
?>
