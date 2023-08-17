document.addEventListener("DOMContentLoaded", function () {
    // Get the edit and delete emoji buttons
    const editEmojiButtons = document.querySelectorAll(".editEmoji");
    const deleteEmojiButtons = document.querySelectorAll(".deleteEmoji");

    // Loop through the edit emoji buttons and perform a task when they are clicked
    editEmojiButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {

            // Get the current row and values of the note
            tr = event.target.parentNode.parentNode.parentNode.parentNode;
            sno = tr.getElementsByTagName("td")[0].innerText;
            title = tr.getElementsByTagName("td")[1].innerText;
            desc = tr.getElementsByTagName("td")[2].innerText;
            db_SNo = tr.getElementsByTagName("td")[5].innerHTML;

            // Set the values of the editNoteTitle and editNoteDesc inputs
            const editNoteTitle = document.getElementById("editNoteTitle");
            editNoteTitle.value = title;
            const editNoteDesc = document.getElementById("editNoteDesc");
            editNoteDesc.value = desc;

            // Show the editModal
            const editModal = document.getElementById("editModal");
            editModal.classList.remove("hidden");

            // Add an event listener to the closeEditModal button
            const closeEditModal = document.getElementById("closeEditModal");
            closeEditModal.addEventListener("click", function (event) {
                editModal.classList.add("hidden");
            });

            const updateNoteBtn = document.getElementById("updateNoteBtn");
            updateNoteBtn.addEventListener("click", function (event) {
                // Make a POST request to the update_notes.php file
                fetch('update_notes.php', {
                    method: 'POST',
                    body: new URLSearchParams({
                        editSNo: db_SNo,
                        editNoteTitle: editNoteTitle.value,
                        editNoteDesc: editNoteDesc.value
                    })
                })
                .then(response => response.text())
                .then(data => {
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    });

    // Loop through the delete emoji buttons and perform a task when they are clicked
    deleteEmojiButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {

            // Get the current row and values of the note
            tr = event.target.parentNode.parentNode.parentNode.parentNode;
            sno = tr.getElementsByTagName("td")[0].innerText;
            title = tr.getElementsByTagName("td")[1].innerText;
            desc = tr.getElementsByTagName("td")[2].innerText;
            db_SNo = tr.getElementsByTagName("td")[5].innerHTML;

            const confirmDelete = confirm("Are you sure you want to delete this note?");
            if (confirmDelete) {
                // Make a POST request to the delete_notes.php file using fetch API
                fetch('delete_notes.php', {
                    method: 'POST',
                    body: new URLSearchParams({
                        deleteSNo: db_SNo
                    })
                })
                .then(response => response.text())
                .then(data => {
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
});