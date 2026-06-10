<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSDS Dashboard - School Management System</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/users.css">
    <link rel="stylesheet" href="../../css/Admin_header.css">
    <link rel="stylesheet" href="../../css/Admin_sidebar.css">
    <link rel="stylesheet" href="../../css/psds_dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <div class="container">
        <?php include 'includes/sidebar.php'; ?>
        <main class="main-content">
          <?php include '../header/header.php'; ?>
            <div class="dashboard-header">
                <h1>Welcome, PSDS!</h1>
                <div class="district-name">District: Esperanza District</div>
            </div>
            <div class="dashboard-stats">
                <div class="stat-card">
                    <span class="stat-icon"><i class="fas fa-school"></i></span>
                    <span class="stat-label">Total Schools</span>
                    <span class="stat-value">12</span>
                </div>
                
            </div>
            <div class="dashboard-shortcuts">
                <a href="consolidated_reports.php" class="shortcut-card">
                    <i class="fas fa-file-alt"></i> Consolidated Reports
                </a>
                <a href="school_performance.php" class="shortcut-card">
                    <i class="fas fa-chart-bar"></i> School Performance
                </a>
                <a href="interventions.php" class="shortcut-card">
                    <i class="fas fa-hands-helping"></i> Interventions
                </a>
            </div>
            <div class="performance-section">
                <h2>District Performance Overview</h2>
                <div class="chart-container">
                    <canvas id="performanceChart"></canvas>
                </div>
            </div>
            <div class="performance-section">
                <h2>Recommended Interventions</h2>
                <ul class="intervention-list">
                    <li>
                        <span class="priority high">High Priority</span>
                        <div>
                            <strong>Esperanza ES - Mathematics</strong>
                            <p>MPS: 65.2% (Below Target)</p>
                            <p>Recommendation: Implement intensive math remediation program and teacher training</p>
                        </div>
                    </li>
                    <li>
                        <span class="priority medium">Medium Priority</span>
                        <div>
                            <strong>San Jose ES - Science</strong>
                            <p>MPS: 70.5% (Below Target)</p>
                            <p>Recommendation: Enhance laboratory activities and provide additional learning materials</p>
                        </div>
                    </li>
                    <li>
                        <span class="priority low">Low Priority</span>
                        <div>
                            <strong>Sta. Maria ES - English</strong>
                            <p>MPS: 78.3% (Near Target)</p>
                            <p>Recommendation: Continue current programs and monitor progress</p>
                        </div>
                    </li>
                </ul>
            </div>
        </main>
    </div>
    <script src="../../js/sidebar.js"></script>
    <script>
        // Sample data for the performance chart
        const ctx = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mathematics', 'Science', 'English', 'Filipino', 'Araling Panlipunan'],
                datasets: [{
                    label: 'Average MPS by Learning Area',
                    data: [75.2, 78.5, 82.1, 80.3, 77.8],
                    backgroundColor: [
                        'rgba(52, 152, 219, 0.8)',
                        'rgba(46, 204, 113, 0.8)',
                        'rgba(155, 89, 182, 0.8)',
                        'rgba(241, 196, 15, 0.8)',
                        'rgba(231, 76, 60, 0.8)'
                    ],
                    borderColor: [
                        'rgba(52, 152, 219, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(155, 89, 182, 1)',
                        'rgba(241, 196, 15, 1)',
                        'rgba(231, 76, 60, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 60,
                        max: 100,
                        title: {
                            display: true,
                            text: 'MPS Score'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html> 