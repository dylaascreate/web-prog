<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

include 'connect.php';

if (isset($_POST['edit'])) {
    $degree = $_POST['degree'];
    $newQualificationName = $_POST['newQualificationName'];
    $newYear = $_POST['newQualificationYear'];
    $newAbbreviation = $_POST['newQualificationAbbreviation'];
    $newUniversity = $_POST['newQualificationInstitution'];

    // Prepare the update statement
    $sql = "UPDATE qualification SET degree = ?, year = ?, abbreviation = ?, university = ? WHERE degree = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssss", $newQualificationName, $newYear, $newAbbreviation, $newUniversity, $degree);

        // Execute the statement
        if ($stmt->execute()) {
            header('Location: qualification.php?edit=success');
        } else {
            echo "Error updating record: " . $stmt->error;
            header("location:qualification.php?edit=failed");
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
        header("location:qualification.php?edit=failed");
    }
}

$conn->close();
?>
