$(document).ready(function() {
    var table = $('#premiumTable').DataTable({
        ajax: '../../controllers/premiums/all_premiums.php',
        columns: [
            { data: 'id' },
            { data: 'premium_name' },
            { data: 'sum_insured', 
                render: function(data, type, row) {
                return '$' + data; // Add dollar sign in front of the sum_insured
                }
            },
            { data: 'tenure' },
            { data: 'premium',
                render: function(data, type, row) {
                return '$' + data; // Add dollar sign in front of the sum_insured
                }
             },
            { data: 'actions' }
        ],
        responsive: true,
        columnDefs: [
            {   targets: 5, //to target more than 1 column [0,4]               
                searchable: false,
                orderable: false  
            }
        ]
    });

    $('#premiumTable').on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '../../controllers/premiums/edit.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                var data = JSON.parse(response);
                $('#editId').val(data.id);
                $('#editPremium_Name').val(data.premium_name);
                $('#editPremium').val(data.premium);
                $('#editSum_Insured').val(data.sum_insured);
                $('#editTenure').val(data.tenure);
                $('#editModal').modal('show');
            }
        });
    });

    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../../controllers/premiums/update.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    // Add new user functionality
    $('#addNewPremium').on('click', function() {
        $('#addForm')[0].reset();
        $('#addModal').modal('show');
    });

    $('#addForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../../controllers/premiums/add.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#addModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    // Delete user functionality
    $('#premiumTable').on('click', '.delete', function() {
        var id = $(this).data('id');
        var premium_name = $(this).data('premium_name'); // Get the name of the user
        $('#deleteId').val(id);
        $('#deletePremiumName').text(premium_name); // Set the name in the modal
        $('#deleteModal').modal('show');
    });

    $('#confirmDelete').on('click', function() {
        var id = $('#deleteId').val();
        $.ajax({
            url: '../../controllers/premiums/delete.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                $('#deleteModal').modal('hide');
                table.ajax.reload();
            }
        });
    });
});
