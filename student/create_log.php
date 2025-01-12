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
    echo "<li class='navbar_li'><a href='student_home.php'>Student Home</a></li>";
    echo "<li class='navbar_li'><a href='#about'>About</a></li>";
echo "</ul>";

echo "<h1 class='form_heading'>Create a Log</h1>";

echo "<form method='post' action='insert_log.php' class='log_form'>";
    echo "<div>";
        echo "<div class='text-element'>What date did you work?</div>";
        echo "<div class='text-element-faded'>Example, 27 03 2025</div>";
        echo "</div>";
            echo "<div class='date-container'>";
            echo "<div>";
                echo "<label class='date_item' for='day'>Day</label>";
                echo "<input type='text' class='date-container-input' name='day' maxlength='2' required>";
                echo "</div>";
                echo "<div>";
                echo "<label class='date_item' for='month'>Month</label>";
                echo "<input type='text' class='date-container-input' name='month' maxlength='2' required>";
                echo "</div>";
                echo "<div>";
                echo "<label class='' for='year'>Year</label>";
                echo "<input class='date-item-year' type='text' id='' name='year' maxlength='4'  required>";
            echo "</div>";
        echo "</div>";
        echo "<br>";
    echo "<div class='text-element'>Provide a detailed response of the work you did on that day</div>";
    echo "<div class='text-element-faded'>This is not required</div>";
    echo "<textarea name='log' class='log_textarea' required></textarea>";
    echo "<br><br>";
    echo "<div class='text-element'>How many hours did you work?</div>";
    echo "<div class='text-element-faded'>A number is required, the max is 8</div>";
    echo "<input type='text' name='hours' class='log_hours' required maxlength='1'>";
    echo "<br><br>";
    echo "<input type='submit' name='submit' value='Submit' class='submit'>";
echo "</form>";

echo "</body>";
?>
