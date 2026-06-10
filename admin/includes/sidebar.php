<?php
// Get the current page filename
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="sidebar">
    <div class="logo">
        <h2>Admin Panel</h2>
    </div>
    <ul class="nav-links">
        <li class="<?php echo ($current_page == 'admin.php') ? 'active' : ''; ?>">
            <a href="admin.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="<?php echo ($current_page == 'districts.php') ? 'active' : ''; ?>">
            <a href="districts.php">
                <i class="fas fa-map-marked-alt"></i>
                <span>Districts</span>
            </a>
        </li>
        <li class="<?php echo ($current_page == 'schools.php') ? 'active' : ''; ?>">
            <a href="schools.php">
                <i class="fas fa-school"></i>
                <span>Schools</span>
            </a>
        </li>
        <li class="<?php echo ($current_page == 'users.php') ? 'active' : ''; ?>">
            <a href="users.php">
                <i class="fas fa-users-cog"></i>
                <span>Users</span>
            </a>
        </li>
      
       
    </ul>
</nav>
<script src="../js/sidebar.js"></script>