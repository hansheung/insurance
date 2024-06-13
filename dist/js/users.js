$(document).ready(function() {
    var table = $('#userTable').DataTable({
        ajax: '../../controllers/users/all_users.php',
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'DOB' },
            { 
                data: 'isAdmin',
                render: function(data, type, row) {
                    return data == 1 ? 'Yes' : 'No';
                }
            },
            { data: 'actions' }
        ],
        responsive: true,
        columnDefs: [
            {   targets: 4, //to target more than 1 column [0,4]               
                searchable: false,
                orderable: false  
            }
        ]
    });

    $('#userTable').on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '../../controllers/users/edit.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                var data = JSON.parse(response);
                $('#editId').val(data.id);
                $('#editName').val(data.name);
                $('#editEmail').val(data.email);
                $('#editDOB').val(data.DOB);
                $('#editTel').val(data.tel);
                $('#editAdd').val(data.address);
                $('#editState').val(data.state);
                $('#editCountry').val(data.country);
                $('#editPost').val(data.postal_code);
                $('#editIsAdmin').val(data.isAdmin);
                $('#editModal').modal('show');
            }
        });
    });

    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../../controllers/users/update.php',
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
            url: '../../controllers/users/add.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#addModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    // Delete user functionality
    $('#userTable').on('click', '.delete', function() {
        var id = $(this).data('id');
        var name = $(this).data('name'); // Get the name of the user
        $('#deleteId').val(id);
        $('#deleteUserName').text(name); // Set the name in the modal
        $('#deleteModal').modal('show');
    });

    $('#confirmDelete').on('click', function() {
        var id = $('#deleteId').val();
        $.ajax({
            url: '../../controllers/users/delete.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                $('#deleteModal').modal('hide');
                table.ajax.reload();
            }
        });
    });
});
