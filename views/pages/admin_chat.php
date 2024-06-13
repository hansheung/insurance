<?php 
    $title = "Direct Chats";
    session_start();
    ob_start();
    function get_content() {
      require_once '../../controllers/connection.php';
      $user_id = $_GET['user_id'];
      $admin_id = $_SESSION['user_info']['id'];
      echo $user_id;
      echo $admin_id;

      $query = "SELECT * FROM users WHERE id = '$user_id'";
      $user = mysqli_fetch_assoc(mysqli_query($cn, $query));

      $query = "SELECT messages.*, users.name, users.isAdmin, users.image FROM messages JOIN users ON messages.sender_id = users.id WHERE (sender_id = '$user_id' AND receiver_id = '$admin_id') OR (sender_id = '$admin_id' AND receiver_id = '$user_id') ORDER BY timestamp";

      $result = mysqli_query($cn, $query);
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
      
      $query = "UPDATE messages SET read_status = 1 WHERE sender_id = '$user_id'";
      $result = mysqli_query($cn, $query);
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $message = $_POST['message'];
   
        $query="INSERT INTO messages (sender_id, receiver_id, message) VALUES ('$admin_id', '$user_id', '$message')";
        mysqli_query($cn, $query);
        header('Location: admin_chat.php?user_id='.$user_id); // Refresh page
    }
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Direct Chats with <b><?php echo $user['name'];?></b></h1>
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
    <section class="container">
    <div class="card direct-chat direct-chat-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
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
                </div>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height:500px;">
                  <!-- Message. Default to the left -->
                    <?php 
                        foreach($rows as $row): 
                            if($row['isAdmin']):
                    ?>
                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right"><?php echo $row['name']?></span>
                                        <span class="direct-chat-timestamp float-left"><?php echo $row['timestamp']?></span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="<?php echo '../../dist/img/' . $row['image']; ?>" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        <?php echo $row['message']?>
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                            <?php else: ?>                    
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left"><?php echo $row['name']?></span>
                                        <span class="direct-chat-timestamp float-right"><?php echo $row['timestamp']?></span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="<?php echo '../../dist/img/' . $row['image']; ?>" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        <?php echo $row['message']?>
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                    <?php 
                            endif;
                        endforeach; 
                    ?>
                </div>
                <div class="card-footer">
                <form action="<?php echo 'admin_chat.php?user_id='. $user_id ?>" method="POST">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <!-- <input type="hidden" name="user_id" value="<?php echo $user_id?>"> -->
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
                <!--/.direct-chat-messages-->
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
