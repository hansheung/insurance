$(document).ready(function() {
    var table = $('#applyTable').DataTable({
        ajax: '../../controllers/policies/user_policies.php',
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
    
    // Apply user functionality
    $('#applyTable').on('click', '.apply', function() {
        var policy_id = $(this).data('policy_id'); // Get the name of the apply
        var policy_name = $(this).data('policy_name'); 
        var premium = $(this).data('premium'); 
        $('#applyPolicy_ID').val(policy_id); // Set the name in the modal
        $('#applyPolicyName').val(policy_name); 
        $('#applyPremium').val(premium);
        
        $('#applyModal').modal('show');
    });


    $('#applyForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../../controllers/policies/user_apply.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#applyModal').modal('hide');
                alert("Successfully Applied.");
                window.location.href = "../../views/pages/dashboarduser.php";
            }
        });
    });
});
