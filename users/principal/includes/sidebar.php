<?php
// Get the current page filename
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="sidebar">
    <div class="logo">
        <h2>Principal Panel</h2>
    </div>
    <ul class="nav-links">
        <li class="<?php echo ($currentPage == 'dashboard.php') ? 'active' : ''; ?>">
            <a href="dashboard.php">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'mps_encoding.php') ? 'active' : ''; ?>">
            <a href="mps_encoding.php">
                <i class="fas fa-table"></i>
                <span>MPS Encoding</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'reports.php') ? 'active' : ''; ?>">
            <a href="reports.php">
                <i class="fas fa-file-alt"></i>
                <span>Reports</span>
            </a>
        </li>
       
    </ul>
</nav>
<script src="../../js/sidebar.js"></script> 