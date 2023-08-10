<?php
// Database connection configuration (same as provided in the previous responses)
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

// Get user input from the idea submission form
$ideaName = $_POST['idea_name'];
$description = $_POST['description'];
$industry = $_POST['industry'];
$businessModel = $_POST['business_model'];
$marketAnalysis = $_POST['market_analysis'];
$team = $_POST['team'];
$fundingRequest = $_POST['funding_request'];

// Perform database query to insert the startup idea into the database
$sql = "INSERT INTO startup_ideas (idea_name, description, industry, business_model, market_analysis, team, funding_request)
        VALUES ('$ideaName', '$description', '$industry', '$businessModel', '$marketAnalysis', '$team', '$fundingRequest')";

if (mysqli_query($conn, $sql)) {
    // Idea submission successful
    echo "<script>alert('Idea submission successful.');
          window.location.href = 'idea_submission.html';</script>";
} else {
    // Error occurred, show popup with the error message
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
}

// Close the database connection
mysqli_close($conn);
?>
