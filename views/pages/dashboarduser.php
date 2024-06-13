<?php 
    $title = "Dashboard";
    session_start();

    if (isset($_SESSION['message'])) {
          echo '<script language="javascript">';
          echo 'alert("' . $_SESSION['message'] . '");';
          echo '</script>';
          unset($_SESSION['message']); // Clear the message after displaying it
      }
    function get_content() {
        
        require_once '../../controllers/connection.php';
        
        $user_id = $_SESSION['user_info']['id'];

        $query = "SELECT * FROM policies";
        $result = mysqli_query($cn, $query);
        $num_policy = mysqli_num_rows($result);
                        
        $query = "SELECT * FROM user_policies where user_id = '$user_id'";
        $result = mysqli_query($cn, $query);
        $num_user_policies = mysqli_num_rows($result);
        
        $query = "SELECT * FROM payments where user_id = '$user_id'";
        $result = mysqli_query($cn, $query);
        $num_payments = mysqli_num_rows($result);

        $query = "SELECT COUNT(messages.id) AS unread_messages, messages.message FROM messages WHERE sender_id = '$user_id' AND read_status = FALSE GROUP BY sender_id";
        $results = mysqli_query($cn, $query);
        $num_unread = mysqli_fetch_assoc($results);
        
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $num_policy ?></h3>

                <p>Policies</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="policiesuser.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $num_user_policies ?></h3>

                <p>Applied policy</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="appliedpolicies.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              
                <div class="inner">
                    <h3><?php echo $num_payments ?></h3>

                    <p>Payment History</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                    <a href="paymentsuser.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              
            </div>
             
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
<?php
// var_dump($num_unread['unread_messages']);
if(empty($num_unread['unread_messages'])) {
  echo"<h3>0</h3>";
} else {
  echo "<h3>".$num_unread['unread_messages']."</h3>";
}
?>

                <p>Question</p>
              </div>
              <div class="icon">
                <i class="ion ion-chatbubble-working"></i>
              </div>
              <a href="user_chat.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
    }
    require_once '../templates/layout.php';
?>