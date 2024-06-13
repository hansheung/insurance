<?php 
    $title = "Policies";
    session_start();
    function get_content() {
        // session_start();
        $user_id = $_SESSION['user_info']['id'];
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Apply Policy Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboarduser.php">Home</a></li>
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
                  <table id="applyTable" class="table table-bordered table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Policy Name</th>
                              <th>Category Name</th>
                              <th>Premium Name</th>
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

      <!-- Modal for apply Modal -->
      <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apply Policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="applyForm">
                        <input type="hidden" name="user_id" id="user_Id" value="<?php echo $user_id ?>">
                        <input type="hidden" name="policy_id" id="applyPolicy_ID">
                        <input type="hidden" name="premium" id="applyPremium">
                        <div class="form-group">
                            <label for="name">Policy Name</label>
                            <input disabled class="form-control" name="policy_name" id="applyPolicyName">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Please enter Start Date</label>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
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

<script src="../../dist/js/user_policies.js"></script>
