<?php
session_start();

include "../server/db_connect.php";

try {
    // Format day and month to ensure they are two digits
    $day = str_pad($_POST['day'], 2, '0', STR_PAD_LEFT);
    $month = str_pad($_POST['month'], 2, '0', STR_PAD_LEFT);
    $year = $_POST['year'];

    // Construct the SQL date
    $sqlDate = "$year-$month-$day";

    // Get student_id from the session
    $student_id = $_SESSION["s_student_id"];
    $log = $_POST['log'];
    $hours = $_POST['hours'];
    $false = false; // Use a boolean value for `verified`

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO hours (student_id, date, log, hours_completed, verified) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $student_id, PDO::PARAM_INT);
    $stmt->bindValue(2, $sqlDate, PDO::PARAM_STR);
    $stmt->bindValue(3, $log, PDO::PARAM_STR);
    $stmt->bindValue(4, $hours, PDO::PARAM_INT);
    $stmt->bindValue(5, $false, PDO::PARAM_BOOL);
    $stmt->execute(); // Run the SQL code

    // Redirect on success
    header("Location: student_home.php");
    exit();
} catch (PDOException $e) {
    // Handle and log database errors
    error_log("Database Error: " . $e->getMessage());
//    die("An error occurred while processing your request. Please try again later.");
    die($e);
}
