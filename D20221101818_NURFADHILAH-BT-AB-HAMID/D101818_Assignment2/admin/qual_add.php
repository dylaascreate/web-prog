<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $degree = $_POST["degree"];
    $year = $_POST["year"];
    $abbreviation = $_POST["abbreviation"];
    $university = $_POST["university"];

    $sql = "INSERT INTO qualification (degree, year, abbreviation, university) VALUES ('$degree', '$year', '$abbreviation', '$university')";

    if ($conn->query($sql) === TRUE) {
        $message = "New qualification added successfully.";
        header("location:qualification.php?add=success");
    } else {
        $message = "Error: ". $conn->error;
        header("location:qualification.php?add=failed");
    }

}
?>
