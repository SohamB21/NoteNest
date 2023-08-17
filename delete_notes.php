<?php
include_once 'db_connection.php';

// Check if the deleteSNo POST variable is set
if (isset($_POST['deleteSNo'])){
    $deleteSNo = $_POST['deleteSNo'];
    
    // Creating and executing delete query
    $deleteQuery = "DELETE FROM notes WHERE SNo = '$deleteSNo'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult)
        echo "Note deleted successfully";
    else
        echo "Error deleting note: " . mysqli_error($conn);
}
?>