<?php
include "../server/db_connect.php";

// Fetch the hours_id from the URL
$hours_id = $_GET['hours_id'];

// Query to fetch the log details based on hours_id
$sql = "SELECT * FROM hours WHERE hours_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $hours_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    // Display a form with the current log data
    echo "<form method='POST' action='update_log.php'>";
    echo "<input type='hidden' name='hours_id' value='" . htmlspecialchars($row['hours_id']) . "'>";
    echo "<label for='log'>Log:</label>";
    echo "<textarea name='log'>" . htmlspecialchars($row['log']) . "</textarea>";
    echo "<label for='hours_completed'>Hours Completed:</label>";
    echo "<input type='text' name='hours_completed' value='" . htmlspecialchars($row['hours_completed']) . "'>";
    echo "<input type='submit' value='Save Changes'>";
    echo "</form>";
} else {
    echo "<p>Log not found.</p>";
}
?>
