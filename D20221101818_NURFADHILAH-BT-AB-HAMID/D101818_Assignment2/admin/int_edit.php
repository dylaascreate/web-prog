<?php
include 'connect.php';

if (isset($_POST['edit'])) {
    $interestId = $_POST['interestId'];
    $newInterestName = $_POST['newInterestName'];
    $interestDesc = $_POST['interestDesc'];

    $sql = "UPDATE interest SET interest_name = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $newInterestName, $interestDesc, $interestId);

    if ($stmt->execute()) {
        header('Location: interest.php?edit=success');
    } else {
        echo "Error updating record: " . $conn->error;
        header("location:interest.php?edit=failed");
    }

    $stmt->close();
}

$conn->close();
?>
