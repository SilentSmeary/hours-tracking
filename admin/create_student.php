<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php

include "../server/db_connect.php";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$school_name = $_POST['school_name'];
$course_id = $_POST['course_id'];
$signupdate = date("U");


if($password!=$confirm_password){
    header("refresh:5; url=index.html");
    echo '<br>';
    echo"Your passwords do not match";
}else {
    try {
        $sql = "SELECT email FROM students WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$usnm);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result){
            header("refresh:5; url=index.html");
            echo '<br>';
            echo "Someone is already using this email please try again!";

        } else {
            try {
                $hpswd = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO students (first_name, last_name, email, password, school_name, course_id, sign_up_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1,$first_name);
                $stmt->bindParam(2,$last_name);
                $stmt->bindParam(3,$email);
                $stmt->bindParam(4,$hpswd);
                $stmt->bindParam(5,$school_name);
                $stmt->bindParam(6,$course_id);
                $stmt->bindParam(7,$signupdate);

                $stmt->execute();
                header("refresh:5; url=../index.php");
                echo '<br>';
                echo "Student Created!";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


}
?>
</body>
</html>
