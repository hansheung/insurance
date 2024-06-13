$(document).ready(function() {
    var table = $('#totalPoliciesTable').DataTable({
        ajax: '../../controllers/total_policies/total_policies.php',
        columns: [
            { data: 'user_policies_id' },
            { data: 'name' },
            { data: 'DOB' },
            { data: 'policy_name' },
            { data: 'cert_num' },
            { data: 'start_date' },
            { data: 'sum_insured', 
                render: function(data, type, row) {
                return '$' + data; // Add dollar sign in front of the sum_insured
                }
            },
            { data: 'tenure' },
            { data: 'total',
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

    // Approve
    $('#totalPoliciesTable').on('click', '.approve', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '../../controllers/total_policies/approve.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                alert("Successfully Approved!")
                table.ajax.reload();
            }
            
        });
    });

    // Reject
    $('#totalPoliciesTable').on('click', '.reject', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '../../controllers/total_policies/reject.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                alert("Reject Approved!")
                table.ajax.reload();
            }
        });
    });
});