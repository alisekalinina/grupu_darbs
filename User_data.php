<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Studenta_Dati</title>
</head>
<body>
    <h1>Jūsu Dati: </h1>


    <?php
session_start();
require("Rating.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Display user data


// echo "Bla <br> bla 2";


//echo "Welcome, " . $_SESSION['user_name'] . " " . $_SESSION['user_surname'];

echo " <h2> Sveicinām , "." ". $_SESSION['user_name']." ". $_SESSION['user_surname']." ! <br> </h2>";

echo "Vārds: "." ". $_SESSION['user_name']."<br><br>";


echo "Uzvārds: "." ". $_SESSION['user_surname']."<br><br>";

echo "Personalais kods : "." ". $_SESSION['p_kods']."<br><br>";

echo "Reģistējas: "." ". $_SESSION['date']."<br><br>";

echo "CE Angļu valodā: "." ". $_SESSION['a_eng']."<br><br>";

echo "CE Matemātīkā: "." ". $_SESSION['a_mat']."<br><br>";

echo "Videja atzīme vidusskolā: "." ". $_SESSION['a_vid']."<br><br>";

echo "Pirma izvēlēta programma : "." ". $_SESSION['f_prog']."<br><br>";

echo "Otra izvēlēta programma : "." ". $_SESSION['s_prog']."<br><br>";

echo "<i> Rating index formula: Jūsu vieta=  A Mat + A eng. Jūsu vieta ir index'a salīdzinājuma reitings </i> .<br><br>";

echo "<i>Gadījumā , ja diviem kandidatiem būs viens index, tad kandidātam ar lilelāku vidējo atzīmi skola būs labāks reitings </i>.<br><br>";

echo "Your index: <b>" . $INDEX=($_SESSION['a_eng'] + $_SESSION['a_mat']) / 2 . "</b><br><br>";



// Additional user data can be retrieved from the database using the user_id stored in the session
?>

    <br>  <a href="F-page.php">Doties sakumlapā </a> 
</body>
</html>