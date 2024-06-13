<?php 
    $title = "Premiums";
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
            <h1 class="m-0">Premiums Table</h1>
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
                <button id="addNewPremium" class="btn btn-primary mb-3">Add New Premiums</button>
                  <table id="premiumTable" class="table table-bordered table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Premium Name</th>
                              <th>Sum_Insured</th>
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

      <!-- Modal for adding new Premium -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="addModalLabel">Add New Premium</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form id="addForm">
                          <div class="form-group">
                              <label for="name">Premium Name</label>
                              <input type="text" class="form-control" name="premium_name" id="addPremium_Name" required>
                          </div>
                          
                          <div class="form-group">
                              <label for="email">Sum Insured</label>
                              <input type="text" class="form-control" name="sum_insured" id="addSum_Insured" required>
                          </div>
                          <div class="form-group">
                              <label for="email">Tenure</label>
                              <input type="text" class="form-control" name="tenure" id="addTenure" required>
                          </div>
                          <div class="form-group">
                              <label for="email">Premium</label>
                              <input type="text" class="form-control" name="premium" id="addPremium" required>
                          </div>
                          <button type="submit" class="btn btn-primary">Add Premium</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal for editing Premium -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Premium</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" name="id" id="editId">
                        <div class="form-group">
                            <label for="name">Premium Name</label>
                            <input type="text" class="form-control" name="premium_name" id="editPremium_Name" required>
                        </div>
                        <div class="form-group">
                            <label for="sum_insured">Sum Insured</label>
                            <input type="number" class="form-control" name="sum_insured" id="editSum_Insured" required>
                        </div>
                        <div class="form-group">
                            <label for="tenure">Tenure</label>
                            <input type="number" class="form-control" name="tenure" id="editTenure" required>
                        </div>
                        <div class="form-group">
                            <label for="premium">Premium</label>
                            <input type="number" class="form-control" name="premium" id="editPremium" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
      </div>

      <!-- Modal for deleting Premium -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="deleteModalLabel">Delete Premium</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <p>Are you sure you want to delete <strong id="deletePremiumName"></strong>?</p>
                      <input type="hidden" id="deleteId">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="button" id="confirmDelete" class="btn btn-danger">Delete</button>
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

<script src="../../dist/js/premiums.js"></script>