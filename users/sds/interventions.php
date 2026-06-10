<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interventions - SDS Dashboard</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/users.css">
    <link rel="stylesheet" href="../../css/Admin_header.css">
    <link rel="stylesheet" href="../../css/Admin_sidebar.css">
    <link rel="stylesheet" href="../../css/districts.css">
    <link rel="stylesheet" href="../../css/psdes_interventions.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </style>
</head>
<body>
    <div class="container">
        <?php include 'includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include '../header/header.php'; ?>
            <div class="districts-content">
                <div class="content-header">
                    <h1>Remedation Overview</h1>
                </div>
                <div class="filter-section">
                    <div class="filter-grid">
                        <div class="filter-group">
                            <label for="district">District</label>
                            <select id="district" class="filter-select">
                                <option value="">All Districts</option>
                                <option value="1">District 1</option>
                                <option value="2">District 2</option>
                                <option value="3">District 3</option>
                                <option value="4">District 4</option>
                                <option value="5">District 5</option>
                                <option value="6">District 6</option>
                                <option value="7">District 7</option>
                                <option value="8">District 8</option>
                                <option value="9">District 9</option>
                                <option value="10">District 10</option>
                            </select>
                        </div>
                        <div class="filter-group">
                         
                        </div>
                    </div>
                </div>
                <div class="table-container">
                    <table class="districts-table">
                        <thead>
                            <tr>
                                <th>District</th>
                                <th>School</th>
                                <th>Grade</th>
                                <th>Subject</th>
                                <th>Avg. MPS</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Proposed By</th>
                                <th>Date Proposed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Marbel 5 CES</td>
                                <td>6</td>
                                <td>Math</td>
                                <td>68.3</td>
                                <td><span class="status inactive">Needs Remediation</span></td>
                                <td>Weak in problem-solving</td>
                                <td>PSDS John Doe</td>
                                <td>2024-03-15</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Esperanza ES</td>
                                <td>5</td>
                                <td>English</td>
                                <td>84.2</td>
                                <td><span class="status active">Good</span></td>
                                <td>N/A</td>
                                <td>PSDS Jane Smith</td>
                                <td>2024-03-14</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>San Jose ES</td>
                                <td>4</td>
                                <td>Science</td>
                                <td>72.1</td>
                                <td><span class="status" style="background:#fff3cd;color:#856404;">Monitor</span></td>
                                <td>Needs more lab activities</td>
                                <td>PSDS Mike Johnson</td>
                                <td>2024-03-13</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="../../js/sidebar.js"></script>
</body>
</html> 