<?php

echo"<link rel='stylesheet' type='text/css' href='../assets/style/style.css'>";

session_start();

echo "<p>👋🏼 Welcome " . $_SESSION["s_first_name"] . "</p>";
echo "<b>" . $_SESSION["course_name"] . "</b> with <b>"  . $_SESSION["course_hours"] . " </b> hours to complete!";
echo "<hr>";
echo "<p>Hours left to Complete <b>" . $_SESSION["s_first_name"] . "</b></p>";

echo "<button><a href='create_log.php'>Create a Entry</a></button>";
echo "<br>";