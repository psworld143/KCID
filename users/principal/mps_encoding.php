<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPS Encoding - School Management System</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/users.css">
    <link rel="stylesheet" href="../../css/Admin_header.css">
    <link rel="stylesheet" href="../../css/Admin_sidebar.css">
    <link rel="stylesheet" href="../../css/modal.css">
    <link rel="stylesheet" href="../../css/principal_mps.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 
</head>
<body>
    <div class="container">
        <?php include 'includes/sidebar.php'; ?>
        <main class="main-content">
       <?php include '../header/header.php'; ?>
            <div class="users-content">
                <div class="content-header">
                    <h1>MPS Encoding</h1>
                    <button class="add-user-btn" onclick="openAddModal()">
                        <i class="fas fa-plus"></i> Add New MPS Record
                    </button>
                </div>
                <div class="table-container">
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>Grading Period</th>
                                <th>School Year</th>
                                <th>Grade Level</th>
                                <th>Learning Area</th>
                                <th>MPS Score</th>
                                <th>Date Encoded</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>First Quarter</td>
                                <td>2023-2024</td>
                                <td>Grade 6</td>
                                <td>Math</td>
                                <td>85.50</td>
                                <td>2024-03-15</td>
                                <td class="actions">
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>First Quarter</td>
                                <td>2023-2024</td>
                                <td>Grade 5</td>
                                <td>Science</td>
                                <td>78.20</td>
                                <td>2024-03-14</td>
                                <td class="actions">
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>First Quarter</td>
                                <td>2023-2024</td>
                                <td>Grade 4</td>
                                <td>English</td>
                                <td>82.70</td>
                                <td>2024-03-13</td>
                                <td class="actions">
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="quarter-remarks">
                    <h3>Quarter Remarks</h3>
                    <div class="remarks-content">
                        <div class="remarks-header">
                            <span class="quarter-label">First Quarter 2023-2024</span>
                            <button class="edit-remarks-btn" onclick="openRemarksModal()">
                                <i class="fas fa-edit"></i> Edit Remarks
                            </button>
                        </div>
                        <div class="remarks-text">
                            Sample Remarks
                        </div>
                    </div>
                </div>
                <div class="pagination">
                    <button class="pagination-btn"><i class="fas fa-chevron-left"></i></button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </main>
    </div>
    <!-- Add MPS Modal -->
    <div id="addModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-plus-circle"></i>
                    <h2>Add New MPS Record</h2>
                </div>
                <span class="close" onclick="closeAddModal()">&times;</span>
            </div>
            <form id="addMPSForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-calendar"></i> Grading Period</label>
                        <select name="grading_period" required>
                            <option value="">Select Grading Period</option>
                            <option value="1">First Quarter</option>
                            <option value="2">Second Quarter</option>
                            <option value="3">Third Quarter</option>
                            <option value="4">Fourth Quarter</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-calendar-alt"></i> School Year</label>
                        <select name="school_year" required>
                            <option value="">Select School Year</option>
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026">2025-2026</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-users"></i> Grade Level</label>
                        <select name="grade_level" required>
                            <option value="">Select Grade Level</option>
                            <option value="1">Grade 1</option>
                            <option value="2">Grade 2</option>
                            <option value="3">Grade 3</option>
                            <option value="4">Grade 4</option>
                            <option value="5">Grade 5</option>
                            <option value="6">Grade 6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-book"></i> Learning Area</label>
                        <select name="learning_area" required>
                            <option value="">Select Learning Area</option>
                            <option value="Filipino">Filipino</option>
                            <option value="English">English</option>
                            <option value="Math">Math</option>
                            <option value="Science">Science</option>
                            <option value="AP">AP</option>
                            <option value="GMRC">GMRC</option>
                            <option value="EPP">EPP</option>
                            <option value="MAPEH">MAPEH</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-users"></i> Total Enrollees</label>
                        <input type="number" name="total_enrollees" min="0" max="100" step="0.01" required placeholder="Enter Total Enrollees">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-percentage"></i> MPS Score</label>
                        <input type="number" name="mps_score" min="0" max="100" step="0.01" required placeholder="Enter MPS score">
                    </div>
                  
                </div>
                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="closeAddModal()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editMpsModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-edit"></i>
                    <h2>Edit MPS Record</h2>
                </div>
                <span class="close" onclick="closeEditModal()">&times;</span>
            </div>
            <form id="editMpsForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-calendar"></i> Grading Period</label>
                        <select name="grading_period" id="editGradingPeriod" required>
                            <option value="">Select Grading Period</option>
                            <option value="1">First Quarter</option>
                            <option value="2">Second Quarter</option>
                            <option value="3">Third Quarter</option>
                            <option value="4">Fourth Quarter</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-calendar-alt"></i> School Year</label>
                        <select name="school_year" id="editSchoolYear" required>
                            <option value="">Select School Year</option>
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026">2025-2026</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-users"></i> Grade Level</label>
                        <select name="grade_level" id="editGradeLevel" required>
                            <option value="">Select Grade Level</option>
                            <option value="1">Grade 1</option>
                            <option value="2">Grade 2</option>
                            <option value="3">Grade 3</option>
                            <option value="4">Grade 4</option>
                            <option value="5">Grade 5</option>
                            <option value="6">Grade 6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-book"></i> Learning Area</label>
                        <select name="learning_area" id="editLearningArea" required>
                            <option value="">Select Learning Area</option>
                            <option value="Filipino">Filipino</option>
                            <option value="English">English</option>
                            <option value="Math">Math</option>
                            <option value="Science">Science</option>
                            <option value="AP">AP</option>
                            <option value="GMRC">GMRC</option>
                            <option value="EPP">EPP</option>
                            <option value="MAPEH">MAPEH</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-users"></i> Total Enrollees</label>
                        <input type="number" name="total_enrollees" id="editTotalEnrollees" min="0" max="100" step="0.01" required placeholder="Enter Total Enrollees">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-percentage"></i> MPS Score</label>
                        <input type="number" name="mps_score" id="editMpsScore" min="0" max="100" step="0.01" required placeholder="Enter MPS score">
                    </div>
                  x
                </div>
                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="closeEditModal()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- View Modal -->
    <div id="viewMpsModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-eye"></i>
                    <h2>MPS Record Details</h2>
                </div>
                <span class="close" onclick="closeViewModal()">&times;</span>
            </div>
            <div class="mps-details">
                <div class="detail-group">
                    <label><i class="fas fa-calendar"></i> Grading Period</label>
                    <p id="viewGradingPeriod"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-calendar-alt"></i> School Year</label>
                    <p id="viewSchoolYear"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-users"></i> Grade Level</label>
                    <p id="viewGradeLevel"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-book"></i> Learning Area</label>
                    <p id="viewLearningArea"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-users"></i> Total Enrollees</label>
                    <p id="viewTotalEnrollees"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-percentage"></i> MPS Score</label>
                    <p id="viewMpsScore"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-calendar"></i> Date Encoded</label>
                    <p id="viewDateEncoded"></p>
                </div>
             
            </div>
            <div class="form-actions">
                <button type="button" class="cancel-btn" onclick="closeViewModal()">
                    <i class="fas fa-times"></i> Close
                </button>
            </div>
        </div>
    </div>

    <!-- Edit remarks Modal -->
    <div id="editRemarksModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-comment"></i>
                    <h2>Edit Quarter Remarks</h2>
                </div>
                <span class="close" onclick="closeRemarksModal()">&times;</span>
            </div>
            <form id="editRemarksForm">
                <div class="form-group">
                    <label><i class="fas fa-calendar"></i> Quarter</label>
                    <select id="remarksQuarter" name="quarter" required>
                        <option value="1">First Quarter</option>
                        <option value="2">Second Quarter</option>
                        <option value="3">Third Quarter</option>
                        <option value="4">Fourth Quarter</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-calendar-alt"></i> School Year</label>
                    <select id="remarksSchoolYear" name="school_year" required>
                        <option value="2023-2024">2023-2024</option>
                        <option value="2024-2025">2024-2025</option>
                        <option value="2025-2026">2025-2026</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-comment"></i> Remarks</label>
                    <textarea id="quarterRemarks" name="remarks" rows="5" placeholder="Enter remarks for this quarter's performance" required></textarea>
                </div>
                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="closeRemarksModal()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-save"></i> Save Remarks
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../../js/sidebar.js"></script>
    <script src="../../js/Principal_mps.js"></script>
</body>
</html> 