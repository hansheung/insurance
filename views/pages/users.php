<?php 
    $title = "Users";
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
            <h1 class="m-0">User Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                  <h3 class="card-title">Users table</h3>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                <button id="addNewUser" class="btn btn-primary mb-3">Add New User</button>
                  <table id="userTable" class="table table-bordered table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>DOB</th>
                              <th>Admin</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>

      <!-- Modal for adding new user -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="addModalLabel">Add New User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form id="addForm">
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" id="addName" required>
                          </div>
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="email" id="addEmail" required>
                          </div>
                          <div class="form-group">
                              <label for="email">Password</label>
                              <input type="password" class="form-control" name="password" id="addPassword" required>
                          </div>
                          <div class="form-group">
                                <label for="name">Date of birth</label>
                                <input type="date" class="form-control" name="DOB" id="DOB" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Tel</label>
                                <input type="text" class="form-control" name="tel" id="tel">
                            </div>
                            <div class="form-group">
                                <label for="name">Address</label>
                                <input type="text" class="form-control" name="add" id="add">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">State</label>
                                        <input type="text" class="form-control" name="state" id="state">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Country</label>
                                        <input type="text" class="form-control" name="country" id="country">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Postal Code</label>
                                        <input type="text" class="form-control" name="post" id="post">
                                    </div>
                                </div>
                            </div>
                          <div class="form-group">
                              <label for="isAdmin">Admin</label>
                              <select class="form-control" name="isAdmin" id="addIsAdmin" required>
                                  <option value="0">No</option>
                                  <option value="1">Yes</option>
                              </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Add User</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal for editing user -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" name="id" id="editId">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="editName" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="editEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" class="form-control" name="password" id="editPassword">
                        </div>
                        <div class="form-group">
                                <label for="name">Date of birth</label>
                                <input type="date" class="form-control" name="DOB" id="editDOB" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Tel</label>
                                <input type="text" class="form-control" name="tel" id="editTel">
                            </div>
                            <div class="form-group">
                                <label for="name">Address</label>
                                <input type="text" class="form-control" name="add" id="editAdd">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">State</label>
                                        <input type="text" class="form-control" name="state" id="editState">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Country</label>
                                        <input type="text" class="form-control" name="country" id="editCountry">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Postal Code</label>
                                        <input type="text" class="form-control" name="post" id="editPost">
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                                <label for="isAdmin">Admin</label>
                                <select class="form-control" name="isAdmin" id="editIsAdmin">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
      </div>

      <!-- Modal for deleting user -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <p>Are you sure you want to delete <strong id="deleteUserName"></strong>?</p>
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

<script src="../../dist/js/users.js"></script>