<?php
// Include the database connection file
include_once 'db_connection.php';

if(isset($_POST['editSNo']) && isset($_POST['editNoteTitle']) && isset($_POST['editNoteDesc'])){
	
    // Get the values of the editSNo, editNoteTitle, and editNoteDesc POST variables
	$editSNo = $_POST['editSNo'];
	$editNoteTitle = $_POST['editNoteTitle'];
	$editNoteDesc = $_POST['editNoteDesc'];

	$updateQuery = "UPDATE notes SET Title='$editNoteTitle', Description='$editNoteDesc' WHERE SNo='$editSNo'";
	$updateResult = mysqli_query($conn, $updateQuery);

	if ($updateResult)
        echo "Note updated successfully";
    else
        echo "Error updating note: " . mysqli_error($conn);
}

// Include the read_notes.php file to read the notes from the database
include_once 'read_notes.php';
?>