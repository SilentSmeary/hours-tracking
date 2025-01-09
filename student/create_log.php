<?php
session_start();

echo "<link rel='stylesheet' type='text/css' href='../assets/style/style.css'>";
echo "<body class='student_home_body'>";

// Check if session data exists
if (!isset($_SESSION["s_first_name"], $_SESSION["course_name"], $_SESSION["course_hours"], $_SESSION["s_student_id"])) {
    echo "<p>Session data is incomplete. Please log in again.</p>";
    exit;
}

echo "<ul class='nav_bar'>";
echo "<li class='navbar_li'><a href='#get-started'>Get started</a></li>";
echo "<li class='navbar_li'><a href='#get-started'>Get started</a></li>";
echo "</ul>";

echo "<h1 class='form_heading'>Create a Log</h1>";

echo "<form method='post' action='insert_log.php'>";
echo "<div class='container'>";
    echo "<div class='text-element'>What date did you work?</div>";
    echo "<div class='text-element-faded'>Example, 27 03 2025</div>";
    echo'<div class="date-inputs">';
        echo "<table>";
        echo'<div class="input-group">';
            echo'<td><label class="date_item" for="day">Day</label></td>';
            echo'<td><input type="text" id="day" name="day" maxlength="2" placeholder="DD" required></td>';
        echo'</div>';
        echo'<div class="input-group">';
            echo'<tr><label for="month">Month</label></tr>';
            echo'<td><input type="text" id="month" name="month" maxlength="2" placeholder="MM" required></td>';
        echo'</div>';
        echo'<div class="input-group">';
            echo'<tr><label for="year">Year</label></tr>';
            echo'<td><input type="text" id="year" name="year" maxlength="4" placeholder="YYYY" required></td>';
        echo'</div>';
        echo'</table>';
    echo "<textarea name='log' id='' placeholder='Enter your logbook for the day'></textarea><br>";
    echo "<input type='text' name='hours' placeholder='Hours for the day' required><br>";
    echo "<input type='submit' name='submit' value='Submit'>";
echo "</form>";
echo "</div>";