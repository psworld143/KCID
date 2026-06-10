<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interventions - PSDS Dashboard</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/users.css">
    <link rel="stylesheet" href="../../css/Admin_header.css">
    <link rel="stylesheet" href="../../css/Admin_sidebar.css">
    <link rel="stylesheet" href="../../css/districts.css">
    <link rel="stylesheet" href=".././/css/psds_interventions.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/modal.css">
</head>
<body>
    <div class="container">
        <?php include 'includes/sidebar.php'; ?>
        <main class="main-content">
          <?php include '../header/header.php'; ?>
            <div class="districts-content">
                <div class="content-header">
                    <h1>Remedation</h1>
                    <button class="add-district-btn" onclick="openInterventionModal()">
                        <i class="fas fa-plus"></i> Add 
                    </button>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>KCES 1 ES</td>
                                <td>6</td>
                                <td>Math</td>
                                <td>68.3</td>
                                <td><span class="status inactive">Needs Remedation</span></td>
                                <td>Weak in problem-solving</td>
                                <td class="actions">
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>San Jose ES</td>
                                <td>5</td>
                                <td>English</td>
                                <td>84.2</td>
                                <td><span class="status active">Good</span></td>
                                <td>N/A</td>
                                <td class="actions">
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                 
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Sta. Maria ES</td>
                                <td>4</td>
                                <td>Science</td>
                                <td>72.1</td>
                                <td><span class="status" style="background:#fff3cd;color:#856404;">Monitor</span></td>
                                <td>Needs more lab activities</td>
                                <td class="actions">
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                             
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <!-- Add Intervention Modal -->
    <div id="addInterventionModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-plus-circle"></i>
                    <h2>Add New Intervention</h2>
                </div>
                <span class="close" onclick="closeInterventionModal()">&times;</span>
            </div>
            <form id="addInterventionForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-map"></i> District</label>
                        <select name="district" required>
                            <option value="">Select District</option>
                            <option value="1">District 1</option>
                            <option value="2">District 2</option>
                            <option value="3">District 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-school"></i> School</label>
                        <select name="school" required>
                            <option value="">Select School</option>
                            <option value="1">KCES 1 ES</option>
                            <option value="2">San Jose ES</option>
                            <option value="3">Sta. Maria ES</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-layer-group"></i> Grade Level</label>
                        <select name="grade" required>
                            <option value="">Select Grade</option>
                            <option value="4">Grade 4</option>
                            <option value="5">Grade 5</option>
                            <option value="6">Grade 6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-book"></i> Learning Area</label>
                        <select name="subject" required>
                            <option value="">Select Subject</option>
                            <option value="Math">Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="English">English</option>
                            <option value="Filipino">Filipino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-calendar"></i> Quarter</label>
                        <select name="quarter" required>
                            <option value="">Select Quarter</option>
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
                        <label><i class="fas fa-percentage"></i> MPS Score</label>
                        <input type="number" name="mps" min="0" max="100" step="0.01" placeholder="Enter MPS score" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-flag"></i> Status</label>
                        <select name="status" required>
                            <option value="">Select Status</option>
                            <option value="Good">Good</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Needs Intervention">Needs Intervention</option>
                        </select>
                    </div>
                    <div class="form-group full-width">
                        <label><i class="fas fa-comment"></i> Remarks</label>
                        <textarea name="remarks" rows="4" placeholder="Enter remarks about the intervention"></textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="closeInterventionModal()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-save"></i> Save Intervention
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Intervention Modal -->
    <div id="editInterventionModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-edit"></i>
                    <h2>Edit Intervention</h2>
                </div>
                <span class="close" onclick="closeEditModal()">&times;</span>
            </div>
            <form id="editInterventionForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-map"></i> District</label>
                        <select name="district" id="editDistrict" required>
                            <option value="">Select District</option>
                            <option value="1">District 1</option>
                            <option value="2">District 2</option>
                            <option value="3">District 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-school"></i> School</label>
                        <select name="school" id="editSchool" required>
                            <option value="">Select School</option>
                            <option value="1">KCES 1 ES</option>
                            <option value="2">San Jose ES</option>
                            <option value="3">Sta. Maria ES</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-layer-group"></i> Grade Level</label>
                        <select name="grade" id="editGrade" required>
                            <option value="">Select Grade</option>
                            <option value="4">Grade 4</option>
                            <option value="5">Grade 5</option>
                            <option value="6">Grade 6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-book"></i> Learning Area</label>
                        <select name="subject" id="editSubject" required>
                            <option value="">Select Subject</option>
                            <option value="Math">Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="English">English</option>
                            <option value="Filipino">Filipino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-calendar"></i> Quarter</label>
                        <select name="quarter" id="editQuarter" required>
                            <option value="">Select Quarter</option>
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
                        <label><i class="fas fa-percentage"></i> MPS Score</label>
                        <input type="number" name="mps" id="editMps" min="0" max="100" step="0.01" placeholder="Enter MPS score" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-flag"></i> Status</label>
                        <select name="status" id="editStatus" required>
                            <option value="">Select Status</option>
                            <option value="Good">Good</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Needs Intervention">Needs Intervention</option>
                        </select>
                    </div>
                    <div class="form-group full-width">
                        <label><i class="fas fa-comment"></i> Remarks</label>
                        <textarea name="remarks" id="editRemarks" rows="4" placeholder="Enter remarks about the intervention"></textarea>
                    </div>
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
    <script src="../../js/sidebar.js"></script>
    <script>
        function openInterventionModal() {
            document.getElementById('addInterventionModal').style.display = 'flex';
        }

        function closeInterventionModal() {
            document.getElementById('addInterventionModal').style.display = 'none';
            document.getElementById('addInterventionForm').reset();
        }

        function openEditModal(row) {
            const modal = document.getElementById('editInterventionModal');
            const cells = row.cells;
            document.getElementById('editDistrict').value = cells[0].textContent;
            document.getElementById('editSchool').value = cells[1].textContent;
            document.getElementById('editGrade').value = cells[2].textContent;
            document.getElementById('editSubject').value = cells[3].textContent;
            document.getElementById('editMps').value = cells[4].textContent;
            document.getElementById('editStatus').value = cells[5].querySelector('.status').textContent;
            document.getElementById('editRemarks').value = cells[6].textContent;

            modal.style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editInterventionModal').style.display = 'none';
            document.getElementById('editInterventionForm').reset();
        }
        document.addEventListener('DOMContentLoaded', function() {
           
            const editButtons = document.querySelectorAll('.action-btn.edit');
            editButtons.forEach(button => {
                button.onclick = function() {
                    const row = this.closest('tr');
                    openEditModal(row);
                };
            });

           
            const editForm = document.getElementById('editInterventionForm');
            if (editForm) {
                editForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Intervention record updated successfully!');
                    closeEditModal();
                });
            }
        });

       
        window.onclick = function(event) {
            const addModal = document.getElementById('addInterventionModal');
            const editModal = document.getElementById('editInterventionModal');
            if (event.target == addModal) {
                closeInterventionModal();
            }
            if (event.target == editModal) {
                closeEditModal();
            }
        }
    </script>
</body>
</html> 