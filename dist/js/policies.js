$(document).ready(function() {
    var table = $('#policyTable').DataTable({
        ajax: '../../controllers/policies/all_policies.php',
        columns: [
            { data: 'policy_id' },
            { data: 'policy_name' },
            { data: 'category_name' },
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
            {   targets: 7, //to target more than 1 column [0,4]               
                searchable: false,
                orderable: false  
            }
        ]
    });

    $('#policyTable').on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            async: false,
            url: '../../controllers/policies/edit.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                var data = JSON.parse(response);
                $('#editId').val(data.id);
                $('#editPolicy_Name').val(data.policy_name);
                $('#editCategory_ID').val(data.category_id);
                // $('.editCategory_ID').attr('data-cat-id' ,data.category_id);
                $('#editPremium_ID').val(data.premium_id);
                $('#editModal').modal('show');
                
            }
        });
    });

    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../../controllers/policies/update.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    // Add new user functionality
    $('#addNewPolicy').on('click', function() {
        $('#addForm')[0].reset();
        $('#addModal').modal('show');
    });

    $('#addForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../../controllers/policies/add.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#addModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    // Delete user functionality
    $('#policyTable').on('click', '.delete', function() {
        var id = $(this).data('id');
        var premium_name = $(this).data('premium_name'); // Get the name of the user
        $('#deleteId').val(id);
        $('#deletePremiumName').text(premium_name); // Set the name in the modal
        $('#deleteModal').modal('show');
    });

    $('#confirmDelete').on('click', function() {
        var id = $('#deleteId').val();
        $.ajax({
            url: '../../controllers/policies/delete.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                $('#deleteModal').modal('hide');
                table.ajax.reload();
            }
        });
    });
});
