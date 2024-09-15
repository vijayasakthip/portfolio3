<?php
include("connect.php");

// Check if POST request is set
if (isset($_POST["submit"])) {
    // Retrieve and sanitize POST data
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $taskname = mysqli_real_escape_string($conn, $_POST["taskname"]);
    $assignedto = mysqli_real_escape_string($conn, $_POST["assignto"]);
    $menu = isset($_POST["completed"]) ? mysqli_real_escape_string($conn, $_POST["completed"]) : "incompleted";

    // Determine the status based on menu value
    $status = ($menu === "completed") ? "completed" : "incompleted";

    // Prepare and execute the SQL update query
    $sql = "UPDATE task SET taskname='$taskname', assignedto='$assignedto', status='$status' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        // Redirect to the task list page after updating
        header("Location: todolist.php");
        exit();
    } else {
        // Display specific SQL error if the query fails
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Handle the case where the submit button is not set
    echo "Error: Submit button not pressed.";
}
?>
