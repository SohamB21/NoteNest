<?php
// Get the notes from the database
$sql = "SELECT * FROM notes";

// If the search term is set, then filter the notes by the search term
if (isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM `notes` WHERE Title LIKE '%$searchTerm%' OR Description LIKE '%$searchTerm%'";
    $searchTerm = "";
}

$result = mysqli_query($conn, $sql);
// Initialize the counter for the SNo
$countSNo = 0;

// Iterate over the results and echo each note
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    $db_SNo = $row['SNo'];
	$countSNo = $countSNo + 1;

    echo "<td>{$countSNo}</td>";
    echo "<td>{$row['Title']}</td>";
    echo "<td>{$row['Description']}</td>";
    echo "<td>".date('jS M, y  H:i', strtotime($row['TimeStamp'])). "</td>";

    echo '<td class="actions-col">';
    echo '<div class="relative">';

    // Edit emoji button
    echo '<span class="hover:opacity-100 absolute top-[-25px] left-[-10px] opacity-0 transition delay-1000 duration-100">';
    echo '<div class="bg-blue-400 text-sm text-white p-0.5 rounded shadow-md cursor-pointer editEmoji">Edit</div>'; echo '</span>';
    echo '<button type="button" class="ml-0">&#9999;</button>';

    // Delete emoji button
    echo '<span class="hover:opacity-100 absolute top-[-25px] right-[-10px] opacity-0 transition delay-1000 duration-100">';
    echo '<div class="bg-blue-400 text-sm text-white p-0.5 rounded shadow-md cursor-pointer deleteEmoji">Delete</div>'; echo '</span>';
    echo '<button type="button" class="ml-6 mr-0">&#10062;</button>';

    // Add a comment to explain the SNo column
    echo "<td p-0 m-0 style='width: 0px; visibility: hidden;'>{$row['SNo']}</td>";

    echo '</div>';
    echo "</td>";
    echo "</tr>";
}

// Unset the search term and Close the connection
unset($_GET['search']);
mysqli_close($conn);
?>