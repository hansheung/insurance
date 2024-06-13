<?php 
    $title = "Dashboard";

    session_start();
    // var_dump($_SESSION['user_info']);
    // echo "<br>";
    // echo ("{$_SESSION['user_info']['isAdmin']}");
    // if(isset($_SESSION['user_info']) && $_SESSION['user_info']['isAdmin']){
    //   echo " did it come in here";
    // }
    // die();

    if(isset($_SESSION['user_info']) && $_SESSION['user_info']['isAdmin']){
        if (isset($_SESSION['message'])) {
          echo '<script language="javascript">';
          echo 'alert("' . $_SESSION['message'] . '");';
          echo '</script>';
          unset($_SESSION['message']); // Clear the message after displaying it
      }
    function get_content() {
        require_once '../../controllers/connection.php';

        $query = "SELECT * FROM users";
        $result = mysqli_query($cn, $query);
        $num_users = mysqli_num_rows($result);

        $query = "SELECT * FROM categories";
        $result = mysqli_query($cn, $query);
        $num_categories = mysqli_num_rows($result);

        $query = "SELECT * FROM premiums";
        $result = mysqli_query($cn, $query);
        $num_premiums = mysqli_num_rows($result);

        $query = "SELECT * FROM policies";
        $result = mysqli_query($cn, $query);
        $num_policy = mysqli_num_rows($result);

        $query = "SELECT * FROM user_policies";
        $result = mysqli_query($cn, $query);
        $num_total_policies = mysqli_num_rows($result);

        $query = "SELECT * FROM payments";
        $result = mysqli_query($cn, $query);
        $num_payments = mysqli_num_rows($result);
        
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
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $num_users ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $num_categories ?></h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              
                <div class="inner">
                    <h3><?php echo $num_premiums ?></h3>

                    <p>Premiums</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document"></i>
                </div>
                    <a href="premiums.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              
            </div>
             
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $num_policy ?></h3>

                <p>Policies</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
              <a href="policies.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $num_total_policies ?></h3>

                <p>Total Policies</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="totalpolicies.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo $num_payments ?></h3>

                <p>Total Payments</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="payments.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <!-- <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div> -->
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
          <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <!-- <div class="card-tools">
                  <span title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->
              </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="direct-chat-messages bg-black">
                  <ul class="contacts-list">
                    <?php 
                      $user_id = $_SESSION['user_info']['id'];

                      $query = "SELECT users.id, users.name, users.image, COUNT(messages.id) as unread_messages, messages.message, messages.timestamp FROM users LEFT JOIN messages ON users.id = messages.sender_id AND messages.receiver_id = '$user_id' AND messages.read_status = FALSE WHERE users.isAdmin = 0 GROUP BY users.id, users.name;";
                      $results = mysqli_query($cn, $query);
                      $rows = mysqli_fetch_all($results, MYSQLI_ASSOC);

                      foreach($rows as $row){
                    ?>
                    <li class="border-bottom">
                      <a href="<?php echo 'admin_chat.php?user_id=' . $row['id']; ?>">
                        <img class="contacts-list-img" src="<?php echo '../../dist/img/' . $row['image']; ?>" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            <?php echo $row['name'] ?>
                            <small class="contacts-list-date float-right"><?php echo $row['timestamp'] ?></small>
                          </span>
                          <span class="contacts-list-msg"><?php echo $row['message'] ?>
                          <!-- <span class="badge badge-info right">6</span> -->
                             <small class="badge badge-success float-right"><?php echo $row['unread_messages'] ?></small>
                          </span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <?php }?>

                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
          </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
    }
    require_once '../templates/layout.php';

  }
?>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '../../controllers/sales/get_sales_data.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const ctx = document.getElementById('revenue-chart-canvas').getContext('2d');
                new Chart(ctx, {
                    type: 'line', // or 'bar', 'pie', etc.
                    data: data,
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: {
                          display: false
                        },
                        scales: {
                          xAxes: [{
                            gridLines: {
                              display: false
                            }
                          }],
                          yAxes: [{
                            gridLines: {
                              display: false
                            }
                          }]
                        }
                    }
                });
            },
            error: function(error) {
                console.log("Error fetching data", error);
            }
        });
    });
    
</script>