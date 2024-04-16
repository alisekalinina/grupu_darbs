<<?php
session_start();

include("Login_connect.php");
include("functions.php");

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_name = $_POST['user_name'];
    $user_surname = $_POST['user_surname'];
    $P_kods = $_POST['p_kods'];
    $A_mat = $_POST['a_mat'];
    $A_eng = $_POST['a_eng'];
    $A_vid = $_POST['a_vid'];
    $F_prog = $_POST["f_prog"];
    $S_prog = $_POST["s_prog"];
    $R_index= ($_POST['a_eng']+$_POST['a_mat'])/2;

    // Check if all required fields are filled and user_name is not numeric
    if (!empty($user_name) && !empty($user_surname) && !is_numeric($user_name) && !empty($P_kods) && !empty($A_mat) && !empty($A_eng) && !empty($A_vid)) {
        // Generate a random user_id
        $user_id = random_num(20);

        // Prepare an SQL statement
        $query = "INSERT INTO users (user_id, user_name, user_surname, p_kods, a_mat, a_eng, a_vid,f_prog, s_prog,r_index) VALUES (?, ?, ?, ?, ?, ?, ?,? ,?,?)";

        // Prepare the SQL statement
        $stmt = mysqli_prepare($con, $query);

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssssssssss", $user_id, $user_name, $user_surname, $P_kods, $A_mat, $A_eng, $A_vid, $F_prog, $S_prog, $R_index);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);

        // Redirect to login page after successful registration
        header("Location: Login.php");
        die;
    } else 
        // Display an error message if any required field is empty
        echo "Lūdzu aizpildiet visu informāciju!";
    
}