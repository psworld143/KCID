<?php
// Get the current page filename
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="sidebar">
    <div class="logo">
        <h2>PSDS Panel</h2>
    </div>
    <ul class="nav-links">
        <li class="<?php echo ($currentPage == 'dashboard.php') ? 'active' : ''; ?>">
            <a href="dashboard.php">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'psds_consolidated_reports.php') ? 'active' : ''; ?>">
            <a href="psds_consolidated_reports.php">
                <i class="fas fa-file-alt"></i>
                <span>Consolidated Reports</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'school_performance.php') ? 'active' : ''; ?>">
            <a href="school_performance.php">
                <i class="fas fa-chart-bar"></i>
                <span>Analysis</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'interventions.php') ? 'active' : ''; ?>">
            <a href="interventions.php">
                <i class="fas fa-hands-helping"></i>
                <span>Remedation</span>
            </a>
        </li>
      
    </ul>
</nav>
<script src="../../js/sidebar.js"></script> 