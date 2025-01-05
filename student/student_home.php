<?php
session_start();
include "../server/db_connect.php";

echo "<link rel='stylesheet' type='text/css' href='../assets/style/style.css'>";

// Display welcome message and course details
echo "<p>👋🏼 Welcome " . htmlspecialchars($_SESSION["s_first_name"]) . "</p>";
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
echo "<button><a href='create_log.php'>Create an Entry</a></button>";
echo "<br><br>";

// Display each log in a card
if ($result && is_array($result)) {
    foreach ($result as $row) {
        echo "<div class='card' style='border: 1px solid #ccc; padding-left: 10px; margin: 10px; width: 900px;'>";
            echo "<h3>Date: " . htmlspecialchars($row['date']) . "</h3>";
            echo "<p><strong>Log:</strong> " . htmlspecialchars($row['log']) . "</p>";
            echo "<p><strong>Hours Completed:</strong> " . htmlspecialchars($row['hours_completed']) . "</p>";
            echo "<p><strong>Verified:</strong> " . htmlspecialchars($row['verified']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No results found.</p>";
}
?>
