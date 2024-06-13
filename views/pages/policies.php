<?php 
    $title = "Policies";
    session_start();
    function get_content() {
        require_once '../../controllers/connection.php';  

        $query = "SELECT * FROM categories;";
        $cat_result = mysqli_query($cn, $query);
        $categories = mysqli_fetch_all($cat_result, MYSQLI_ASSOC); 

        $query = "SELECT * FROM premiums;";
        $premium_result = mysqli_query($cn, $query);
        $premiums = mysqli_fetch_all($premium_result, MYSQLI_ASSOC); 
        

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Policies Table</h1>
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
                <button id="addNewPolicy" class="btn btn-primary mb-3">Add New Policy</button>
                  <table id="policyTable" class="table table-bordered table-striped" style="width:100%">
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

      <!-- Modal for adding new Premium -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="addModalLabel">Add New Policy</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form id="addForm">
                          <div class="form-group">
                              <label for="name">Policy Name</label>
                              <input type="text" class="form-control" name="policy_name" id="addPolicy_Name" required>
                          </div>
                          <div class="form-group">
                                <label class="form-label">Category</label>
                                <select class="form-select form-control" name="category_id">
                                    <option selected disabled>Choose a category</option>
                                    <?php foreach($categories as $category): ?>
                                        <option value="<?php echo $category['id'] ?>">
                                            <?php echo $category['category_name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                          </div>
                          <div class="form-group">
                              <label for="email">Premium</label>
                              <select class="form-select form-control" name="premium_id">
                                    <option selected disabled>Choose a premium</option>
                                    <?php foreach($premiums as $premium): ?>
                                        <option value="<?php echo $premium['id'] ?>">
                                            <?php echo $premium['premium_name'] ?> - premium:$<?php echo $premium['premium'] ?> - sum insured:$<?php echo $premium['sum_insured'] ?> - tenure:<?php echo $premium['tenure'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Add Policy</button>
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
                            <label for="name">Policy Name</label>
                            <input type="text" class="form-control" name="policy_name" id="editPolicy_Name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <input type="hidden" id="editCategory_ID">
                            <select class="form-select form-control" name="editCategory_ID">

                                <!-- <option selected disabled>Choose a category</option> -->
                                <?php foreach($categories as $category): ?>
                                    <option class="categories" value="<?php echo $category['id'] ?>">
                                        <?php echo $category['category_name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Premium</label>
                            <input type="hidden" id="editPremium_ID">
                            <select class="form-select form-control" name="editPremium_ID">
                                <option selected disabled>Choose a premium</option>
                                <?php foreach($premiums as $premium): ?>
                                    <option class="premiums" value="<?php echo $premium['id'] ?>">
                                        <?php echo $premium['premium_name'] ?> - premium:$<?php echo $premium['premium'] ?> - sum insured:$<?php echo $premium['sum_insured'] ?> - tenure:<?php echo $premium['tenure'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
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

<script src="../../dist/js/policies.js"></script>
<script>

    document.addEventListener('click', (e) => {
        // console.log(e.target.getAttribute('class'))
        if(e.target.classList.contains('edit')) {
            let catID = document.getElementById('editCategory_ID');
            let categories = document.querySelectorAll('.categories')
            let premID = document.getElementById('editPremium_ID');
            let premiums = document.querySelectorAll('.premiums')
            
            categories.forEach((category, i) => {
                // console.log(catID[i])
                if(category.value == catID.value) {
                    category.selected = true
                }
            })

            premiums.forEach((premium, i) => {
                // console.log(catID[i])
                if(premium.value == premID.value) {
                    premium.selected = true
                }
            })
        }
    })
</script>