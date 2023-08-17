<?php
// Check if the note title and description are set
if (isset($_POST['noteTitle']) && isset($_POST['noteDesc'])){

  // Get the note title and description from the POST request
	$title = $_POST['noteTitle']; 
	$desc = $_POST['noteDesc'];
  
  // Display an error message if the note title and description are empty
	if (empty($title) || empty($desc))
    echo '<div class="bg-red-200 my-2 p-1 border border-black rounded-md">
            <p class="text-red-900 font-semibold">Note submission could not be completed as title and description were left blank.</p>
          </div>';
  else{
    // Insert the note into the database
		$sql = "INSERT INTO `notes` (Title, Description) VALUES ('$title', '$desc')";
		$db_result = mysqli_query($conn, $sql);
	
		if(!$db_result) // Display an error message if the note was not inserted into the database
  		echo '<div class="bg-red-200 my-2 p-1 border border-black rounded-md">
		        <p class="text-red-900 font-semibold">Note submission failed because : '.mysqli_error($conn).'</p>
      			</div>';
		else // Display a success message if the note was inserted into the database
  		echo '<div class="bg-green-200 my-2 p-1 border border-black rounded-md">
        		<p class="text-green-900 font-semibold">Note submitted successfully!</p>
        		</div>';
  }
}
?>