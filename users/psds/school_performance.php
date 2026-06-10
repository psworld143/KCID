<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Performance - PSDS Dashboard</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/users.css">
    <link rel="stylesheet" href="../../css/Admin_header.css">
    <link rel="stylesheet" href="../../css/Admin_sidebar.css">
    <link rel="stylesheet" href="../../css/psds_analysis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
</head>
<body>
    <div class="container">
        <?php include 'includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include '../header/header.php'; ?>
            
            <div class="page-header">
                <h1>School Performance Analysis</h1>
            </div>

            <div class="filter-section">
                <div class="filter-grid">
                    <div class="filter-group">
                        <label for="school">School</label>
                        <select id="school" class="filter-select">
                            <option value="">All Schools</option>
                            <option value="1">KCES 1 ES</option>
                            <option value="2">San Jose ES</option>
                            <option value="3">Sta. Maria ES</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="year">School Year</label>
                        <select id="year" class="filter-select">
                            <option value="2023-2024">2023-2024</option>
                            <option value="2022-2023">2022-2023</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="level">Grade Level</label>
                        <select id="level" class="filter-select">
                            <option value="">All Levels</option>
                            <option value="1">Grade 1</option>
                            <option value="2">Grade 2</option>
                            <option value="3">Grade 3</option>
                            <option value="4">Grade 4</option>
                            <option value="5">Grade 5</option>
                            <option value="6">Grade 6</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="performance-summary">
                <div class="summary-grid">
                    <div class="summary-card">
                        <h3>Average MPS</h3>
                        <div class="value">75.8%</div>
                        <div class="trend trend-up">+2.3% from last quarter</div>
                    </div>
                    <div class="summary-card">
                        <h3>Highest Performing Area</h3>
                        <div class="value">English</div>
                        <div class="trend">82.1% Average MPS</div>
                    </div>
                    <div class="summary-card">
                        <h3>Lowest Performing Area</h3>
                        <div class="value">Mathematics</div>
                        <div class="trend trend-down">65.2% Average MPS</div>
                    </div>
                    <div class="summary-card">
                        <h3>Schools Above Target</h3>
                        <div class="value">8/12</div>
                        <div class="trend trend-up">+2 from last quarter</div>
                    </div>
                </div>
            </div>

            <div class="chart-section">
                <div class="chart-card">
                    <h2><i class="fas fa-chart-line"></i> MPS Trend by Quarter</h2>
                    <div class="chart-container">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>
                <div class="chart-card">
                    <h2><i class="fas fa-chart-bar"></i> Performance by Learning Area</h2>
                    <div class="chart-container">
                        <canvas id="subjectChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="chart-section">
                
                <div class="chart-card">
                    <h2><i class="fas fa-chart-area"></i> Grade Level Comparison</h2>
                    <div class="chart-container">
                        <canvas id="gradeChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../js/sidebar.js"></script>
    <script>
        // MPS Trend Chart
        const trendCtx = document.getElementById('trendChart').getContext('2d');
        new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                datasets: [{
                    label: 'Average MPS',
                    data: [72.5, 74.2, 75.8, 77.3],
                    borderColor: '#3498db',
                    backgroundColor: 'rgba(52, 152, 219, 0.1)',
                    tension: 0.4,
                    fill: true
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
                }
            }
        });

        // Subject Performance Chart
        const subjectCtx = document.getElementById('subjectChart').getContext('2d');
        new Chart(subjectCtx, {
            type: 'bar',
            data: {
                labels: ['Mathematics', 'Science', 'English', 'Filipino', 'AP'],
                datasets: [{
                    label: 'Average MPS',
                    data: [65.2, 70.5, 82.1, 78.3, 75.8],
                    backgroundColor: [
                        'rgba(231, 76, 60, 0.8)',
                        'rgba(230, 126, 34, 0.8)',
                        'rgba(46, 204, 113, 0.8)',
                        'rgba(52, 152, 219, 0.8)',
                        'rgba(155, 89, 182, 0.8)'
                    ]
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
                }
            }
        });

        // Grade Level Comparison Chart
        const gradeCtx = document.getElementById('gradeChart').getContext('2d');
        new Chart(gradeCtx, {
            type: 'radar',
            data: {
                labels: ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6'],
                datasets: [{
                    label: 'Average MPS',
                    data: [78.5, 76.2, 75.8, 74.3, 73.1, 72.5],
                    backgroundColor: 'rgba(52, 152, 219, 0.2)',
                    borderColor: '#3498db',
                    pointBackgroundColor: '#3498db'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        beginAtZero: false,
                        min: 60,
                        max: 100
                    }
                }
            }
        });
    </script>
</body>
</html> 