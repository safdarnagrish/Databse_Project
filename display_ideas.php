<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Startup Ideas</title>
    <style>
        
/* Basic CSS Reset */
body, h1, table {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

h1 {
    text-align: center;
    margin: 20px 0;
}

/* Center the table and set its width to 80% */
.table-container {
    width: 80%;
    margin: 0 auto;
}

table {
    
    width: 80%;
    border-collapse: collapse;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #dddddd;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}


    </style>
</head>
<body>
    <h1>Submitted Startup Ideas</h1>
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

    // Perform database query to retrieve submitted ideas
    $sql = "SELECT * FROM startup_ideas";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>Idea Name</th>
                    <th>Description</th>
                    <th>Industry</th>
                    <th>Business Model</th>
                    <th>Market Analysis</th>
                    <th>Team</th>
                    <th>Funding Request</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['idea_name']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['industry']}</td>
                    <td>{$row['business_model']}</td>
                    <td>{$row['market_analysis']}</td>
                    <td>{$row['team']}</td>
                    <td>{$row['funding_request']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No submitted ideas found.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
