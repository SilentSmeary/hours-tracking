<?php
session_start();

include "../server/db_connect.php";

$student_id = $_SESSION["s_student_id"];
$date = $_POST['date'];
$log = $_POST['log'];
$hours = $_POST['hours'];
$false = "false";


$sql = "INSERT INTO hours (student_id, date, log, hours_completed, verified) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1,$student_id);
$stmt->bindParam(2,$date);
$stmt->bindParam(3,$log);
$stmt->bindParam(4,$hours);
$stmt->bindParam(5,$false);
$stmt->execute(); //run the sql code
$result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results

header("location:student_home.php");  //redirect on success