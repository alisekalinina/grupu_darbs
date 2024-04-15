<?php

$dbhost="localhost";

$dbname="student_login_db";

$dbuser= "root";

$dbpass= "";


if (!$con= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){

die("failed to connect!");

}


