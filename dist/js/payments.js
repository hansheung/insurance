$(document).ready(function() {
    var table = $('#paymentsTable').DataTable({
        ajax: '../../controllers/payments/payments.php',
        columns: [
            { data: 'payments_id' },
            { data: 'user_name' },
            { data: 'DOB' },
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