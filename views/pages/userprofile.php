<?php 
    $title = "User Profile";
    session_start();
    function get_content() {
        $user_id = $_SESSION['user_info']['id'];
        require_once '../../controllers/connection.php';
        $query = "SELECT * FROM users WHERE id = '$user_id'";
        $user = mysqli_fetch_assoc(mysqli_query($cn, $query));
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Profile Table</h1>
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
                  <h3 class="card-title">Users table</h3>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="../../controllers/users/updateuserprofile.php" enctype="multipart/form-data">
                    <div class="row justify-content-center align-item-center">
                        <div class="col-6">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $user['id'] ?>">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $user['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email'] ?>" required>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Confirm Password</label>
                                        <input type="password" class="form-control" name="password2" id="password2" required>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="name">Date of birth</label>
                                <input type="date" class="form-control" name="DOB" id="DOB" required value="<?php echo $user['DOB'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Tel</label>
                                <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $user['tel'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Address</label>
                                <input type="text" class="form-control" name="add" id="add" value="<?php echo $user['address'] ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">State</label>
                                        <input type="text" class="form-control" name="state" id="state" value="<?php echo $user['state'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Country</label>
                                        <input type="text" class="form-control" name="country" id="country" value="<?php echo $user['country'] ?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Postal Code</label>
                                        <input type="text" class="form-control" name="post" id="post" value="<?php echo $user['postal_code'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Profile Pic</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        
                                    </div>
                                </div>
                                <img src="<?php echo '../../dist/img/' . $user['image']; ?>" class="img-fluid p-2 m-4 border" style="height: 150px;"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>
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

<script src="../../dist/js/categories.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>