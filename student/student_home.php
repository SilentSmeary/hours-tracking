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

// Display welcome message and course details
echo "<h2>👋🏼 Welcome back, " . htmlspecialchars($_SESSION["s_first_name"]) . "</h2>";
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
echo "<button class='create_log'><a class='create_log_a' href=''>Generate a Report</a></button>";
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
        // Format the date to include the day abbreviation and full date
        $formattedDate = (new DateTime($row['date']))->format('D F j Y'); // Output: Mon, January 5, 2025
        echo "<tr>";
        echo "<td class='date-column'>" . htmlspecialchars($formattedDate) . "</td>";
        echo "<td>" . htmlspecialchars($row['log']) . "</td>";
        echo "<td>" . htmlspecialchars($row['hours_completed']) . " Hours</td>";
        echo "<td>" . htmlspecialchars($row['verified']) . "</td>";

        // Edit and Delete links with hours_id
        echo "<td class='hours-column'>";

        // Edit link - Redirects to an edit page with hours_id
        echo "<button class='create_log'><a class='create_log_a' href='edit_log.php?hours_id=" . htmlspecialchars($row['hours_id']) . "' class='edit-btn'>Edit</a></button>";

        // Delete link - Redirects to a delete page with hours_id
        echo "<button class='create_log'><a class='create_log_a' href='delete_log.php?hours_id=" . htmlspecialchars($row['hours_id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this log entry?\");'>Delete</a></button>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No results found.</p>";
}

echo "</body>";
?>
