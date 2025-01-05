<?php
include "../server/db_connect.php";

// Fetch the hours_id from the URL
$hours_id = $_GET['hours_id'];

// Delete the log from the database
$sql = "DELETE FROM hours WHERE hours_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $hours_id);
if ($stmt->execute()) {
    echo "<p>Log deleted successfully.</p>";
    // Redirect to the main page or logs page
    header("Location: student_home.php");
    exit;
} else {
    echo "<p>Error deleting log. Please try again.</p>";
}
?>
