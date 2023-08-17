<!DOCTYPE html>
<html>
<head>
	<title>ToDoPHP</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body >
<?php include_once 'db_connection.php'; ?>

<!-- Header section -->
<header class="flex flex-col justify-center text-center bg-blue-200 w-2/3 m-auto my-4 p-1 border border-blue-500 rounded">
    <h1 class="text-2xl font-semibold font-serif">To Do List</h1>
    <p class="italic">"Enhance Your Productivity: Create, Update and Conquer with My Dynamic To-Do List!"</p>
</header>

<div class="grid grid-cols-4 gap-1 justify-between mb-1 mx-3">

    <!-- Add New Note section -->
    <div class="col-span-1 p-2 bg-gray-200 border border-blue-500 rounded">
        <h2 class="text-xl font-semibold mb-3">Add a New Note</h2>
        <form action="index.php" method="post">
            <div class="flex flex-row mb-1">
                <label for="noteTitle" class="text-sm font-medium">Title of Note:</label>
                <input type="text" name="noteTitle" placeholder="Note title" class="p-1 w-full border rounded">
            </div>
            <div class="flex flex-row mb-2">
                <label for="noteDesc" class="text-sm font-medium">Description of Note:</label>
                <textarea name="noteDesc" placeholder="Note description" rows="8" cols="6" class="mt-1 p-2 w-full border rounded"></textarea>
            </div>
            <button type="submit" class="flex justify-center m-auto p-1.5 bg-blue-500 text-white rounded hover:bg-blue-400">Add Note</button>
        </form>
        <?php include_once 'create_notes.php'; ?>
    </div>

    <!-- Notes Display section -->
    <div class="col-span-3 p-2 bg-gray-200 border border-blue-500 rounded">
        <div class="flex flex-row justify-between items-center">
            <h2 class="text-xl font-semibold mb-2 w-1/3">Notes</h2>
            <form action="index.php" method="get">
                <div class="flex mb-2 w-auto">
                    <input type="text" name="search" placeholder="Search" class="p-1 border rounded">
                    <button type="submit" class="bg-blue-500 text-white p-1 ml-2 rounded hover:bg-blue-300 focus:outline-none focus:ring focus:ring-blue-200">Search</button>
                </div>
            </form>
        </div>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left font-medium" width="5%">SNo</th>
                    <th class="text-left font-medium">Title</th>
                    <th class="text-left font-medium">Description</th>
                    <th class="text-left font-medium" width="19%">TimeStamp</th>
                    <th class="text-left font-medium" width="7.5%">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php include_once 'read_notes.php'; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Note Modal -->
<div id="editModal" class="fixed inset-0 flex items-center justify-center z-10 hidden">
    <div class="bg-white p-2 rounded-md shadow-2xl shadow-black">

        <h2 class="text-xl font-semibold mb-1">Edit Note</h2>

        <form action="index.php" method="post">
            <div class="flex flex-row mb-1">
                <label for="editNoteTitle" class="text-sm font-medium">Title of Note:</label>
                <input type="text" id="editNoteTitle" class="p-1 w-full border rounded">
            </div>
            <div class="flex flex-row mb-2">
                <label for="editNoteDesc" class="text-sm font-medium">Description of Note:</label>
                <textarea name="noteDesc" id="editNoteDesc" rows="6" class="mt-1 p-2 w-full border rounded"></textarea>
            </div>
            <div class="flex flex-row justify-center space-x-8 mb-1">
                <button type="button" id="closeEditModal" class="p-1 bg-red-500 text-white rounded hover:bg-red-300">Close</button>
                <button type="submit" id="updateNoteBtn" class="p-1 bg-green-500 text-white rounded hover:bg-green-300">Update Note</button>
            </div>
        </form>

        <?php include_once 'update_notes.php'; ?>
    </div>
</div>

<!-- Including my JavaScript file -->
<script src="edit_delete.js"></script>

</body>
</html>