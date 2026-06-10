<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Principal Dashboard</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/users.css">
    <link rel="stylesheet" href="../../css/Admin_header.css">
    <link rel="stylesheet" href="../../css/Admin_sidebar.css">
    <link rel="stylesheet" href="../../css/modal.css">
    <link rel="stylesheet" href="../../css/principal_reports.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <?php include 'includes/sidebar.php'; ?>
        <main class="main-content">
           <?php include '../header/header.php'; ?>
            <div class="users-content">
                <div class="content-header">
                    <h1>School Reports</h1>
                    <button class="add-user-btn" onclick="openGenerateModal()">
                        <i class="fas fa-file-export"></i> Generate Report
                    </button>
                </div>
                <div class="section">
                    <div class="section-title"><i class="fas fa-table"></i> Quarter MPS Report</div>
                    <div class="filter-bar">
                        <select>
                            <option value="">All Quarter</option>
                            <option value="1">First Quarter</option>
                            <option value="2">Second Quarter</option>
                            <option value="3">Third Quarter</option>
                            <option value="4">Fourth Quarter</option>
                        </select>
                       
                    </div>
                    <div class="table-container">
                        <table class="users-table mps-table">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="row-label">Grade Level</th>
                                    <th rowspan="2" class="row-label">Enrollment</th>
                                    <th colspan="8">Learning Areas</th>
                                    <th rowspan="2" class="row-label">Average</th>
                                </tr>
                                <tr>
                                    <th class="learning-area">Filipino</th>
                                    <th class="learning-area">English</th>
                                    <th class="learning-area">Math</th>
                                    <th class="learning-area">Science</th>
                                    <th class="learning-area">AP</th>
                                    <th class="learning-area">GMRC</th>
                                    <th class="learning-area">EPP</th>
                                    <th class="learning-area">MAPEH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="row-label">1</td>
                                    <td></td>
                                    <td>70.04</td>
                                    <td>69.62</td>
                                    <td>61.68</td>
                                    <td></td>
                                    <td>73.00</td>
                                    <td>71.48</td>
                                    <td></td>
                                    <td>65.58</td>
                                    <td class="average-cell">68.57</td>
                                </tr>
                                <tr>
                                    <td class="row-label">2</td>
                                    <td></td>
                                    <td>60.90</td>
                                    <td>49.97</td>
                                    <td>56.19</td>
                                    <td>66.30</td>
                                    <td>51.69</td>
                                    <td>70.36</td>
                                    <td></td>
                                    <td>59.98</td>
                                    <td class="average-cell">59.21</td>
                                </tr>
                                <tr>
                                    <td class="row-label">3</td>
                                    <td></td>
                                    <td>67.10</td>
                                    <td>66.90</td>
                                    <td>65.10</td>
                                    <td>63.90</td>
                                    <td>66.80</td>
                                    <td>78.50</td>
                                    <td>69.50</td>
                                    <td>66.00</td>
                                    <td class="average-cell">67.98</td>
                                </tr>
                                <tr>
                                    <td class="row-label">4</td>
                                    <td></td>
                                    <td>74.18</td>
                                    <td>68.53</td>
                                    <td>62.26</td>
                                    <td>60.30</td>
                                    <td>60.30</td>
                                    <td>80.33</td>
                                    <td>67.60</td>
                                    <td>74.71</td>
                                    <td class="average-cell">69.35</td>
                                </tr>
                                <tr>
                                    <td class="row-label">5</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="average-cell"></td>
                                </tr>
                                <tr>
                                    <td class="row-label">6</td>
                                    <td></td>
                                    <td>80.33</td>
                                    <td>59.38</td>
                                    <td>64.35</td>
                                    <td>62.90</td>
                                    <td>62.26</td>
                                    <td>52.20</td>
                                    <td>64.30</td>
                                    <td>61.90</td>
                                    <td class="average-cell">64.70</td>
                                </tr>
                                <tr>
                                    <td class="total-label">Total/Average</td>
                                    <td></td>
                                    <td class="average-cell">70.51</td>
                                    <td class="average-cell">64.70</td>
                                    <td class="average-cell">61.92</td>
                                    <td class="average-cell">63.35</td>
                                    <td class="average-cell">64.13</td>
                                    <td class="average-cell">78.62</td>
                                    <td class="average-cell">67.13</td>
                                    <td class="average-cell">65.63</td>
                                    <td class="average-cell">67.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="remarks-container">
                        <div class="remarks-content">
                            <p><strong>Remarks</strong></p>
                            <p>Sample Remarks</p>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="section-title"><i class="fas fa-chart-bar"></i> Comparative Performance</div>
                    <div style="background: #f8f9fa; border-radius: 8px; padding: 24px;">
                        <canvas id="mpsComparativeChart" height="100"></canvas>
                    </div>
                </div>   
            </div>
        </main>
    </div>
    <!-- Generate Report Modal -->
    <div id="generateReportModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-file-export"></i>
                    <h2>Generate Report</h2>
                </div>
                <span class="close" onclick="closeGenerateModal()">&times;</span>
            </div>
            <form id="generateReportForm">
                <div class="form-group">
                    <label for="report_type">Report Type</label>
                    <select id="report_type" name="report_type" required>
                        <option value="">Select Report Type</option>
                        <option value="mps_summary">MPS Summary</option>
                        <option value="lowest_performing">Lowest Performing Areas</option>
                        <option value="submission_status">Submission Status</option>
                        <option value="comparative_performance">Comparative Performance</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="grading_period">Grading Period</label>
                    <select id="grading_period" name="grading_period" required>
                        <option value="">Select Grading Period</option>
                        <option value="1">First Quarter</option>
                        <option value="2">Second Quarter</option>
                        <option value="3">Third Quarter</option>
                        <option value="4">Fourth Quarter</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file_format">File Format</label>
                    <select id="file_format" name="file_format" required>
                        <option value="">Select Format</option>
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="closeGenerateModal()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-download"></i> Generate
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../js/Principal_reports.js"></script>
</body>
</html> 