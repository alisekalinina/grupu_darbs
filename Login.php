

<?php
session_start(); // Start the session

include("Login_connect.php"); // Include the database connection file
include("functions.php");

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_name = $_POST['user_name'];
    $user_surname = $_POST['user_surname'];
   
    // Check if all required fields are filled and user_name is not numeric
    if (!empty($user_name) && !empty($user_surname) && !is_numeric($user_name)) {
        // Prepare an SQL statement
        $query = "SELECT * FROM users WHERE user_name=? AND user_surname=?";
        
        // Prepare the SQL statement
        $stmt = mysqli_prepare($con, $query);
        
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ss", $user_name, $user_surname);
        
        // Execute the prepared statement
        mysqli_stmt_execute($stmt);
        
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
        
        // Check if the user exists
        if ($row = mysqli_fetch_assoc($result)) {
            // User found, store user data in session
            $_SESSION['user_id'] = $row['user_id']; 
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_surname'] = $row['user_surname'];
            $_SESSION['date'] = $row['date'];
            $_SESSION['p_kods'] = $row['p_kods'];
            $_SESSION['a_mat'] = $row['a_mat'];
            $_SESSION['a_eng'] = $row['a_eng'];
            $_SESSION['a_vid'] = $row['a_vid'];
            $_SESSION['f_prog'] = $row['f_prog'];
            $_SESSION['s_prog'] = $row['s_prog'];
            $_SESSION['r_index'] = $row['r_index'];
            
            // Redirect to User_data.php
            header("Location: User_data.php");
            exit;
        } else {
            // User not found
            echo "Lūdzu ievadiet pareizu informāciju!";
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Display an error message if any required field is empty
        echo "Lūdzu aizpildiet pareizu informāciju!";
    }
}
?>


<!DOCTYPE html>
<html>


<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log_In</title>

</head>

<body>

    <h1>Ielaģošana</h1>


        <form method="POST"> 

        <p>Vārds :</p> <br>

        <input type="text" name="user_name" > <br>
        
        <p>Uzvārds :</p> <br>

        <input type="password" name="user_surname" > <br> <br>

        <button type="submit" value="Login">Log In</button> <br>  <br>

        <a href="Register.php">Reģistēties </a> 

        </form>

        

        <br>  <a href="F-page.php">Doties sakumlapā </a> 

</body>

</html>