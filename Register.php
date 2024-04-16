<!DOCTYPE html>
<html>

<?php 


session_start();

include("Login_connect.php");
include("functions.php");

?>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>

</head>

<body>

    <h1>Reģistrācija</h1>


    <form action="RegPHP.php" method="post">

        <label for="user_name">Vārds</label> <br>
        <input   type="text" id="user_name" name="user_name"> <br>

        <label for="user_surname">Uzvārds</label> <br>
        <input   type="text" id="user_surname" name="user_surname"> <br>

        <label for="pkods">Personas Kods</label> <br>
        <input   type="text" id="p_kods" name="p_kods"> <br> <br>


        <p>Pirma macību programma:</p> 

       
        <select id="f_prog" name="f_prog">
            <option value="Matemātikas zinātne">Matemātikas zinātne</option>
            <option value="Anģļu filoloģija">Anģļu filoloģija </option>
            <option value="Finanšu pārvaldība">Finanšu pārvaldība</option>
            <option value="Tūrisma vadība">Tūrisma vadība</option> <br>
        </select>



        
        <p>Otra macību programma:</p> 

        <select id="s_prog" name="s_prog">
            <option value="Matemātikas zinātne">Matemātikas zinātne</option>
            <option value="Anģļu filoloģija">Anģļu filoloģija </option>
            <option value="Finanšu pārvaldība">Finanšu pārvaldība</option>
            <option value="Tūrisma vadība">Tūrisma vadība</option> <br>

        </select>
        
        <p>Ievadi savus CE rezultātus:</p>

            
        <input   type="number" id="a_mat" name="a_mat" placeholder="CE Matemātikā"> <br> <br>
        <input   type="number" id="a_eng" name="a_eng" placeholder="CE Angļu valodā"> <br> <br>
        <input   type="number" id="a_vid" name="a_vid" placeholder="Vidējā atzīme vidusskolā"> <br> <br>

        <button type="submit">Atsūtīt</button>

    </form>

   <br>  <a href="Login.php">Log In </a> 

   <br>  <a href="F-page.php">Doties sakumlapā </a> 

</body>

</html>