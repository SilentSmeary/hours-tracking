<?php
function auditor($role, $id, $action) {
    include "db_connect.php";

    try{
        $log_time = date("U");
        $sql = "INSERT INTO audit (user_type, id, action, date_time) VALUES (?, ?, ?, ?)";  //prepare the sql to be sent
        $stmt = $conn->prepare($sql); //prepare to sql
        $stmt->bindParam(1, $role);  //bind parameters for security
        $stmt->bindParam(2, $id);
        $stmt->bindParam(3, $action);
        $stmt->bindParam(4, $log_time);
        $stmt->execute();  //run the query to insert
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}