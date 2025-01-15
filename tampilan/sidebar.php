<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
if ($_SESSION['username']) {
?>
  <style>
    .text-tebal {
      font-weight: bold;
      font-style: italic;
      font-family: 'Arial', sans-serif;
      font-size: 12pt;
    }
  </style>

  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <a href="logout.php" class="text-light nav-link nav-link-lg nav-link-user">
            <i class="fas fa-power-off" style="font-size: 1.4 em;"></i>
          </a>
          <li><a href="#" class="nav-link nav-link-lg nav-link-user">
              <img alt="image" src="img/avatar/avatar-1.png" class="rounded-circle mr-1">
              Halo <b><?php echo $_SESSION['username']; ?></a>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <!-- logo -->
          <div class="sidebar-brand">
            <img src="img/logo/logo_pfsoft.png" alt="logo" width="50">
            <p class="text-tebal text-dark"> PFSOFT</p>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <img src="img/logo/logo_pfsoft.png" alt="logo" width="40">
          </div>
          <ul class="sidebar-menu mt-2">
            <li class="<?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
              <a href="dashboard.php" class="nav-link">
                <i class="fas fa-fire"></i><span>DASHBOARD</span>
              </a>
            </li>
            <li class="menu-header">PERSONAL</li>
            <li class="<?php echo in_array($current_page, ['client-tampilan.php', 'client.php', 'edit-client.php']) ? 'active' : ''; ?>">
              <a class="nav-link" href="client-tampilan.php">
                <i class="fas fa-user-edit"></i> <span>CLIENT</span>
              </a>
            </li>
            <li class="<?php echo in_array($current_page, ['versi.php', 'edit-versi.php']) ? 'active' : ''; ?>">
              <a class="nav-link" href="versi.php">
                <i class="fas fa-code-branch"></i> <span>VERSI</span>
              </a>
            </li>
            <li class="<?php echo in_array($current_page, ['closing.php']) ? 'active' : ''; ?>">
              <a class="nav-link" href="closing.php">
                <i class="far fa-copy"></i><span>CLOSING</span>
              </a>
            </li>
            <!-- <li class="<?php echo in_array($current_page, ['pengingat.php']) ? 'active' : ''; ?>">
              <a class="nav-link" href="pengingat.php">
                <i class="far fa-bell"></i><span>PENGINGAT</span>
              </a>
            </li> -->
            <li class="<?php echo in_array($current_page, ['']) ? 'active' : ''; ?>">
              <a class="nav-link" href="https://pf-soft.com/admin/pfs/pro/pages/nav.php">
                <i class="fas fa-warehouse"></i><span>INPUT PROJECT</span>
              </a>
            </li>
            <li class="menu-header">DAFTAR</li>
            <li class="<?php echo in_array($current_page, ['master-tampilan.php', 'master-input.php', 'edit-tampilan.php']) ? 'active' : ''; ?>">
              <a class="nav-link" href="master-tampilan.php">
                <i class="fas fa-book"></i><span>CUSTOM PROGRAM</span>
              </a>
            </li>
            <li class="<?php echo in_array($current_page, ['support-tampilan.php', 'support.php', 'edit-support.php']) ? 'active' : ''; ?>">
              <a class="nav-link" href="support-tampilan.php">
                <i class="fas fa-window-restore"></i><span>SUPPORT</span>
              </a>
            </li>
            <li class="<?php echo in_array($current_page, ['update-tampilan.php', 'update.php', 'edit-update.php']) ? 'active' : ''; ?>">
              <a class="nav-link" href="update-tampilan.php">
                <i class="fas fa-tags"></i><span>UPDATE PROGRAM</span>
              </a>
            </li>
            <li class="<?php echo in_array($current_page, ['penambahan-tampilan.php', 'penambahan.php', 'edit-penambahan.php']) ? 'active' : ''; ?>">
              <a class="nav-link" href="penambahan-tampilan.php">
                <i class="fas fa-folder-plus"></i><span>PENAMBAHAN</span>
              </a>
            </li>
            <li class="<?php echo in_array($current_page, ['form-custom.php', 'invoice.php', 'invoice-show.php', 'edit-form-custom.php']) ? 'active' : ''; ?>">
              <a class="nav-link" href="form-custom.php">
                <i class="fas fa-clipboard-list"></i><span>FORM CUSTOM</span>
              </a>
            </li>
          </ul>
        </aside>
      </div>
    </div>
  </div>
<?php
} else {
  header("location:index.php?pesan=gagal");
}
?>