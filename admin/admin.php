<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/admin_theme.css">
    <link rel="stylesheet" href="../css/Admin_header.css">
    <link rel="stylesheet" href="../css/Admin_sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
       <?php include 'includes/sidebar.php'; ?>
        <main class="main-content">
           <?php include 'includes/header.php'; ?>
            <div class="dashboard">
                <h1>Dashboard Overview</h1>
                
                <!-- Stats Cards -->
                <div class="stats-cards">
                    <div class="card">
                        <div class="card-icon blue">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="card-info">
                            <h3>Total Schools</h3>
                            <p>24</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-icon green">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div class="card-info">
                            <h3>Districts</h3>
                            <p>12</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-icon orange">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <div class="card-info">
                            <h3>Active Users</h3>
                            <p>156</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-icon red">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="card-info">
                            <h3>Pending Reports</h3>
                            <p>8</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="quick-actions">
                    <h2>Quick Actions</h2>
                    <div class="action-buttons">
                        <a href="districts.php" class="action-button">
                            <i class="fas fa-plus"></i>
                            <span>Add District</span>
                        </a>
                        <a href="schools.php" class="action-button">
                            <i class="fas fa-plus"></i>
                            <span>Add School</span>
                        </a>
                        <a href="users.php" class="action-button">
                            <i class="fas fa-user-plus"></i>
                            <span>Add User</span>
                        </a>
                        <a href="#" class="action-button">
                            <i class="fas fa-file-export"></i>
                            <span>Generate Report</span>
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="recent-activity">
                    <h2>Recent Activity</h2>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-school"></i>
                            </div>
                            <div class="activity-details">
                                <h4>New School Added</h4>
                                <p>Central High School has been registered</p>
                                <span class="time">2 minutes ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-details">
                                <h4>New User Registration</h4>
                                <p>Sarah Johnson registered as School Principal</p>
                                <span class="time">15 minutes ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="activity-details">
                                <h4>District Update</h4>
                                <p>District 9-JHS information has been updated</p>
                                <span class="time">1 hour ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="activity-details">
                                <h4>Report Generated</h4>
                                <p>Monthly school performance report has been generated</p>
                                <span class="time">2 hours ago</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Status -->
                <div class="system-status">
                    <h2>System Status</h2>
                    <div class="status-grid">
                        <div class="status-item">
                            <div class="status-icon green">
                                <i class="fas fa-server"></i>
                            </div>
                            <div class="status-info">
                                <h4>Server Status</h4>
                                <p>All Systems Operational</p>
                            </div>
                        </div>
                        <div class="status-item">
                            <div class="status-icon blue">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="status-info">
                                <h4>Database</h4>
                                <p>Connected</p>
                            </div>
                        </div>
                        <div class="status-item">
                            <div class="status-icon orange">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="status-info">
                                <h4>Security</h4>
                                <p>Protected</p>
                            </div>
                        </div>
                        <div class="status-item">
                            <div class="status-icon green">
                                <i class="fas fa-sync"></i>
                            </div>
                            <div class="status-info">
                                <h4>Last Backup</h4>
                                <p>2 hours ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 