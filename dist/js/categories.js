$(document).ready(function() {
    var table = $('#categoriesTable').DataTable({
        ajax: '../../controllers/categories/all_categories.php',
        columns: [
            { data: 'id' },
            { data: 'category_name' },
            { data: 'actions' }
        ],
        responsive: true,
        columnDefs: [
            {   targets: 2, //to target more than 1 column [0,4]               
                searchable: false,
                orderable: false  
            }
        ]
    });

    $('#categoriesTable').on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '../../controllers/categories/edit.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                var data = JSON.parse(response);
                $('#editId').val(data.id);
                $('#editName').val(data.category_name);
                $('#editModal').modal('show');
            }
        });
    });

    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../../controllers/categories/update.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    // Add new user functionality
    $('#addNewUser').on('click', function() {
        $('#addForm')[0].reset();
        $('#addModal').modal('show');
    });

    $('#addForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../../controllers/categories/add.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#addModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    // Delete user functionality
    $('#categoriesTable').on('click', '.delete', function() {
        var id = $(this).data('id');
        var category_name = $(this).data('category_name'); // Get the name of the user
        $('#deleteId').val(id);
        $('#deleteCatName').text(category_name); // Set the name in the modal
        $('#deleteModal').modal('show');
    });

    $('#confirmDelete').on('click', function() {
        var id = $('#deleteId').val();
        $.ajax({
            url: '../../controllers/categories/delete.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                $('#deleteModal').modal('hide');
                table.ajax.reload();
            }
        });
    });
});
