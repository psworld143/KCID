<?php
// Get the current page filename
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="sidebar">
    <div class="logo">
        <h2>SDS Panel</h2>
    </div>
    <ul class="nav-links">
        <li class="<?php echo ($currentPage == 'sds_consolidated_reports.php') ? 'active' : ''; ?>">
            <a href="sds_consolidated_reports.php">
                <i class="fas fa-file-alt"></i>
                <span>Consolidated Reports</span>
            </a>
        </li>
         <li class="<?php echo ($currentPage == 'interventions.php') ? 'active' : ''; ?>">
            <a href="interventions.php">
                <i class="fas fa-file-alt"></i>
                <span>Remediation Reports</span>
            </a>
        </li>
       
    </ul>
</nav>
<script src="../../js/sidebar.js"></script> 