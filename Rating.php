<?php
require("Login_connect.php");



$dbhost="localhost";

$dbname="student_login_db";

$dbuser= "root";

$dbpass= "";


if (!$con= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){

die("failed to connect!");

}



// Query to count the number of users
$sql = "SELECT COUNT(*) AS user_count FROM users";
$result = $con->query($sql);

if ($result) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    
    // Extract the user count from the row
    $userCount = $row['user_count'];

    echo "Number of users in the database: $userCount";
} else {
    echo "Error executing the query: " . $conn->error;
}




$Rang;

$sql = "SELECT user_id, user_name,r_index FROM users ORDER BY r_index DESC";
$result = $con->query($sql);

// Check if there are any users in the database
if ($result->num_rows > 0) {
    // Initialize rank counter
    $rank = 1;

    // Output header for the ranking list
    echo "<h2>Ranking List</h2>";
    echo "<table border='1'><tr><th>Rank</th><th>User ID</th><th>Name</th><th>Grade</th></tr>";

    // Output data of each user
    while ($row = $result->fetch_assoc()) {
        $userId = $row["user_id"];
        $userName = $row["user_name"];
        $userGrade = $row["r_index"];

        // Output the user's information along with their rank
        echo "<tr><td>$rank</td><td>$userId</td><td>$userName</td><td>$userGrade</td></tr>";

        // Increment rank counter for the next user
        $rank++;
    }

    echo "</table>"; // Close the table
} else {
    echo "No users found in the database.";
}





// Close the database connection
$con->close();




