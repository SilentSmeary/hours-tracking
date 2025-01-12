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

echo "<ul class='nav_bar'>";
echo "<li class='navbar_li'><a href='#get-started'>Get started</a></li>";
echo "<li class='navbar_li'><a href='#get-started'>Get started</a></li>";
echo "</ul>";

// Display welcome message and course details
echo "<h1>👋🏼 Welcome back, " . htmlspecialchars($_SESSION["s_first_name"]) . "</h1>";
echo "<b>" . htmlspecialchars($_SESSION["course_name"]) . "</b> with <b>" . htmlspecialchars($_SESSION["course_hours"]) . " </b> hours to complete!";
echo "<hr>";

$student_id = $_SESSION['s_student_id']; // Retrieve student ID from the session
$totalHoursWorked = 0; // Initialize the total hours worked

// Fetch hours logs from the database
$sql = "SELECT * FROM hours WHERE student_id = ? ORDER BY date DESC";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $student_id);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results

// Calculate total hours worked
if ($result && is_array($result)) {
    foreach ($result as $row) {
        if (isset($row['hours_completed']) && is_numeric($row['hours_completed'])) {
            $totalHoursWorked += $row['hours_completed']; // Sum up hours worked
        }
    }
}

// Calculate remaining hours
$remainingHours = $_SESSION["course_hours"] - $totalHoursWorked;

// Display remaining hours
echo "<p>Hours left to Complete: <b>" . htmlspecialchars($remainingHours) . "</b></p>";

// Button for creating a new log entry
echo "<button class='create_log'><a class='create_log_a' href='create_log.php'>Create an Entry</a></button>";
echo "<br>";

// Display logs as a table
if ($result && is_array($result)) {
    echo "<table class='logs-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Date</th>";
    echo "<th>Log Book</th>";
    echo "<th>Hours Completed</th>";
    echo "<th>Verified</th>";
    echo "<th>Actions</th>";  // Added a column for actions
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($result as $row) {
        $formattedDate = (new DateTime($row['date']))->format('D F j Y');
        echo "<tr>";
        echo "<td class='date-column'><b>" . htmlspecialchars($formattedDate) . "</b></td>";
        echo "<td class='log-column'>" . htmlspecialchars($row['log']) . "</td>";
        echo "<td>" . htmlspecialchars($row['hours_completed']) . " Hours</td>";
        echo "<td>" . htmlspecialchars($row['verified']) . "</td>";
        echo "<td class='hours-column'>";
        echo "<button class='create_log'><a class='create_log_a' href='edit_log.php?hours_id=" . htmlspecialchars($row['hours_id']) . "' class='edit-btn'>Edit</a></button>";
        echo "<button class='create_log2'><a class='create_log_a' href='delete_log.php?hours_id=" . htmlspecialchars($row['hours_id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this log entry?\");'>Delete</a></button>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>You have no data recorded in the system.</p>";
    echo "<p>Create a log first then try again!</p>";
}

echo "</body>";
