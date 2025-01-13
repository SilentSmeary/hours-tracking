<?php
session_start();
include "../server/db_connect.php";

echo "<link rel='stylesheet' type='text/css' href='../assets/style/style.css'>";
echo "<body class='student_home_body'>";

// Check if session data exists
if (!isset($_SESSION["s_first_name"], $_SESSION["course_name"], $_SESSION["course_hours"], $_SESSION["s_student_id"])) {
    echo "<p>Session data is incomplete. Please log in again.</p>";
    exit;
}

echo '<nav>
        <ul class="nav_bar">
            <div class="nav_left">
                <li class="navbar_li"><a href="student_home.php">Student Dashboard</a></li>
            </div>
            <div class="nav_right">
                <li class="navbar_li"><a href="../logout.php">Logout</a></li>
            </div>
        </ul>
    </nav>';
// Fetch the hours_id from the URL
$hours_id = $_GET['hours_id'];

// Query to fetch the log details based on hours_id
$sql = "SELECT * FROM hours WHERE hours_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $hours_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

echo "<h1 class='form_heading'>Edit a Log</h1>";

if ($row) {
    // Display a form with the current log data
    echo "<form method='POST' action='update_log.php'>";
    echo "<input type='hidden' name='hours_id' value='" . htmlspecialchars($row['hours_id']) . "'>";
    echo "<div class='text-element'>Provide a detailed response of the work you did on that day</div>";
    echo "<div class='text-element-faded'>This is not required</div>";
    echo "<textarea class='log_textarea' name='log'>" . htmlspecialchars($row['log']) . "</textarea>";
    echo "<br><br>";
    echo "<div class='text-element'>How many hours did you work?</div>";
    echo "<div class='text-element-faded'>A number is required, the max is 8</div>";
    echo "<input class='log_hours' type='text' name='hours_completed' max value='". htmlspecialchars($row['hours_completed']) . "'>";
    echo "<br><br>";
    echo "<input class='submit2' type='submit' value='Save Changes'>";
    echo "</form>";
} else {
    echo "<p>Log not found.</p>";
}
?>
