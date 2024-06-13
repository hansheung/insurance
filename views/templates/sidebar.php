  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../pages/dashboard.php" class="brand-link">
      <img src="../../dist/img/I-H-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">InsurHANS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo '../../dist/img/' . $_SESSION['user_info']['image']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../pages/userprofile.php" class="d-block"><?php echo $_SESSION['user_info']['name'] ?></a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../pages/dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/users.php" class="nav-link">
              <i class="nav-icon fa-solid fa-users"></i>
              <p>
                User Registrations
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/categories.php" class="nav-link">
              <i class="nav-icon fa-regular fa-folder-open"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/premiums.php" class="nav-link">
              <i class="nav-icon fa-regular fa-file"></i>
              <p>
                Premiums
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/policies.php" class="nav-link">
              <i class="nav-icon fa-solid fa-file-lines"></i>
              <p>
                Policies
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/totalpolicies.php" class="nav-link">
              <i class="nav-icon fa-solid fa-layer-group"></i>
              <p>
                Total Policies
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/payments.php" class="nav-link">
              <i class="nav-icon fa-regular fa-money-bill-1"></i>
              <p>
                Total Payments
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>