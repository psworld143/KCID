<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal Dashboard - School Management System</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/users.css">
    <link rel="stylesheet" href="../../css/Admin_header.css">
    <link rel="stylesheet" href="../../css/Admin_sidebar.css">
    <link rel="stylesheet" href="../../css/principal_dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 
</head>
<body>
    <div class="container">
        <?php include 'includes/sidebar.php'; ?>
        <main class="main-content">
             <?php include '../header/header.php'; ?>
            <div class="dashboard-header">
                <h1>Welcome, Principal!</h1>
                <div class="school-name">School: Esperanza ES</div>
            </div>
            <div class="dashboard-stats">
                <div class="stat-card">
                    <span class="stat-icon"><i class="fas fa-users"></i></span>
                    <span class="stat-label">Total Subjects</span>
                    <span class="stat-value">18</span>
                </div>
               
             
            </div>
            <div class="dashboard-shortcuts">
                <a href="mps_encoding.php" class="shortcut-card">
                    <i class="fas fa-table"></i> MPS Encoding
                </a>
                <a href="reports.php" class="shortcut-card">
                    <i class="fas fa-file-alt"></i> Reports
                </a>
              
            </div>
         
        </main>
    </div>
    <script src="../../js/sidebar.js"></script>
</body>
</html> 