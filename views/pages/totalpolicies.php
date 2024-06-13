<?php 
    $title = "Total Policies";
    session_start();
    function get_content() {
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Total Policies Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- <div class="card-header">
                  <h3 class="card-title">Premiums table</h3>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                <table id="totalPoliciesTable" class="table table-bordered table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Policy Holder</th>
                              <th>Date of birth</th>
                              <th>Policy Name</th>
                              <th>Certificate Number</th>
                              <th>Start Date</th>
                              <th>Sum Insured</th>
                              <th>Tenure</th>
                              <th>Premium</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php 
    }
    require_once '../templates/layout.php';
?>

<script src="../../dist/js/total_policies.js"></script>
