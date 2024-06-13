<?php 
    $title = "Applied Policies";
    session_start();
    function get_content() {
      require_once '../../controllers/connection.php';
      $user_id = $_SESSION['user_info']['id'];
      $query = "SELECT user_policies.id AS user_policyid, policy_id, cert_num, start_date, status_id, statuses.name as status_name, users.name, policies.policy_name, premiums.premium_name, premiums.premium, premiums.sum_insured, premiums.tenure 
      FROM user_policies 
      JOIN users on user_policies.user_id = users.id 
      JOIN policies on user_policies.policy_id = policies.id
      JOIN premiums on policies.premium_id = premiums.id
      JOIN statuses on user_policies.status_id = statuses.id
      WHERE user_id = '$user_id';";
      // echo "$query";
      // die();
      $result = mysqli_query($cn, $query);
      $userpolicies = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // echo "<pre>";.
        // var_dump($orders);
        // echo "</pre>";
        // die();

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Applied Policies</h1>
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
            <?php foreach($userpolicies as $userpolicy): ?>
            <div class="col-md-6">
              <form action="checkout.php" method="POST">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <div>
                      <h3 class=""><?php echo $userpolicy['policy_name']; ?></h3>
                      <h5>Policy/Certificate no: <?php echo $userpolicy['cert_num']; ?></h5>
                      <input type="hidden" name="cert_num" value="<?php echo $userpolicy['cert_num']; ?>">
                      <input type="hidden" name="policy_id" value="<?php echo $userpolicy['policy_id']; ?>">
                    </div>
                    <?php if($userpolicy['status_id']==1):?>
                      <div class="text-info">Pending</div>
                    <?php elseif($userpolicy['status_id']==2):?>
                      <button type="submit" class="btn btn-primary" style="height:50px;width:150px">Make Payment</button>
                    <?php elseif($userpolicy['status_id']==3):?>
                      <div class="font-italic text-success">Active</div>
                    <?php elseif($userpolicy['status_id']==4):?>
                        <div class="font-italic text-danger">Rejected</div>
                    <?php endif; ?>
                  </div>
                  <!-- /.card-header-->
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="name" class="m-0">Person covered</label>
                            <h5 id="name" name="name"><?php echo $userpolicy['name']; ?></h5>
                            <input type="hidden" name="name" value="<?php echo $userpolicy['name']; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="premium" class="m-0">Premium</label>
                              <h5 id="premium" name="premium">$<?php echo number_format($userpolicy['premium'], 2, '.', ','); ?></h5>
                              <input type="hidden" name="premium" value="<?php echo $userpolicy['premium'] ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="sum_insured" class="m-0">Sum Insured</label>
                              <h5 id="sum_insured" name="sum_insured">$<?php echo number_format($userpolicy['sum_insured'], 2, '.', ','); ?></h5>
                              <input type="hidden" name="sum_insured">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="start_date" class="m-0">Start Date</label>
                              <h5 id="start_date" name="start_date"><?php echo $userpolicy['start_date']; ?></h5>
                              <input type="hidden" name="start_date">
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </form> 
            </div>
            <?php endforeach; ?>
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