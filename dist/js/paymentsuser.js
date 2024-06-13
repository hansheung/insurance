$(document).ready(function() {
    var table = $('#paymentsUserTable').DataTable({
        ajax: '../../controllers/payments/payments_user.php',
        columns: [
            { data: 'payments_id' },
            { data: 'policy_name' },
            { data: 'cert_num' },
            { data: 'start_date' },
            { data: 'sum_insured', 
                render: function(data, type, row) {
                return '$' + data; // Add dollar sign in front of the sum_insured
                }
            },
            { data: 'paid',
                render: function(data, type, row) {
                return '$' + data; // Add dollar sign in front of the sum_insured
                }
             },
           
        ],
        responsive: true
        // columnDefs: [
        //     {   targets: 7, //to target more than 1 column [0,4]               
        //         searchable: false,
        //         orderable: false  
        //     }
        // ]
    });

});