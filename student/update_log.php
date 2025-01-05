<?php
session_start();
include "../server/db_connect.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $hours_id = $_POST['hours_id'];
    $log = $_POST['log'];
    $hours_completed = $_POST['hours_completed'];

    // Prepare the SQL query to update the log entry
    $sql = "UPDATE hours SET log = ?, hours_completed = ? WHERE hours_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(1, $log);
    $stmt->bindParam(2, $hours_completed);
    $stmt->bindParam(3, $hours_id);

    // Execute the query
    if ($stmt->execute()) {
        // If the update is successful, redirect to the student home page or show a success message
        echo "<p>Log updated successfully.</p>";
        header("Location: student_home.php"); // Redirect to home or log page
        exit;
    } else {
        // If the update fails, show an error message
        echo "<p>Error updating log. Please try again.</p>";
    }
} else {
    // If the form is not submitted, redirect to the student home page
    header("Location: student_home.php");
    exit;
}
?>
