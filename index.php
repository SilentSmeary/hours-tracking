<?php
session_start();

include "server/db_connect.php";
include "server/audit.php";

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

## REFACTOR: Make function that is reuseable with only needing to change the $role

if ($role == "student") {
    $sql = "SELECT students.student_id, students.first_name, students.last_name, students.email, students.password, students.course_id, courses.course_name, courses.hours
            FROM students
            INNER JOIN courses ON students.course_id = courses.course_id
            WHERE students.email = ?";
    $stmt = $conn->prepare($sql); //prepares
    $stmt->bindParam(1,$email);  //binds the parameters to execute
    $stmt->execute(); //run the sql code
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results

    if($result) {  // if there is a result returned
        $_SESSION["s_email"] = $_POST['email'];
        $_SESSION["s_first_name"] = $result["first_name"];
        $_SESSION["s_student_id"] = $result["student_id"];
        $_SESSION["course_id"] = $result["course_id"];
        $_SESSION["course_name"] = $result["course_name"];
        $_SESSION["course_hours"] = $result["hours"];
        if (password_verify($password, $result["password"])) { // verifies the password is matched
            $_SESSION["ssnlogin"] = true;  // sets up the session variables
            auditor($role, $result["student_id"],"Logged in successfully");
            header("location:student/student_home.php");  //redirect on success
            exit();
        }
    }
} else($role == "teacher"); {
    $sql = "SELECT * FROM students WHERE email = ?"; //set up the sql statement
    $stmt = $conn->prepare($sql); //prepares
    $stmt->bindParam(1,$email);  //binds the parameters to execute
    $stmt->execute(); //run the sql code
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results

    if($result) {  // if there is a result returned
        $_SESSION["s_email"] = $_POST['email'];
        $_SESSION["s_fname"] = $result["first_name"];
        $_SESSION["s_student_id"] = $result["student_id"];
        if (password_verify($password, $result["password"])) { // verifies the password is matched
            $_SESSION["ssnlogin"] = true;  // sets up the session variables
            auditor($role, $result["student_id"],"Logged in successfully");
            header("location:list.php");  //redirect on success
            exit();
        }
    }
}