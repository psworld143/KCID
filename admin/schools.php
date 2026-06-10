<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schools Management - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/admin_theme.css">
    <link rel="stylesheet" href="../css/schools.css">
    <link rel="stylesheet" href="../css/Admin_header.css">
    <link rel="stylesheet" href="../css/Admin_sidebar.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
      <?php include 'includes/sidebar.php'; ?>
        <main class="main-content">
         <?php include 'includes/header.php'; ?>

            <!-- Schools Content -->
            <div class="schools-content">
                <div class="content-header">
                    <h1>Schools Management</h1>
                    <button class="add-school-btn" onclick="openModal()">
                        <i class="fas fa-plus"></i> Add New School
                    </button>
                </div>

                <!-- Schools Table -->
                <div class="table-container">
                    <table class="schools-table">
                        <thead>
                            <tr>
                                <th>School Name</th>
                                <th>District</th>
                                <th>Type</th>
                                <th>Principal</th>
                                <th>Contact</th>
                             
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-id="1">
                                <td>Central High School</td>
                                <td>District 1</td>
                                <td>Secondary</td>
                                <td>John Smith</td>
                                <td>+1234567890</td>
                                <td class="actions">
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr data-id="2">
                                <td>East Primary School</td>
                                <td>District 2</td>
                                <td>Primary</td>
                                <td>Sarah Johnson</td>
                                <td>+1234567891</td>
                                <td class="actions">
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
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

    <!-- Add School Modal -->
    <div id="addSchoolModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-school"></i>
                    <h2>Add New School</h2>
                </div>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <form id="addSchoolForm">
                <div class="form-grid">
                 
                    <div class="form-group">
                        <label><i class="fas fa-school"></i> School Name</label>
                        <input type="text" id="schoolName" name="schoolName" placeholder="Enter school name" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-map"></i> District</label>
                        <select id="district" name="district" required>
                            <option value="">Select District</option>
                            <option value="D001">District 1</option>
                            <option value="D002">District 2</option>
                            <option value="D003">District 3</option>
                            <option value="D004">District 4</option>
                            <option value="D005">District 5</option>
                            <option value="D006">District 6</option>
                            <option value="D007">District 7</option>
                            <option value="D008">District 8</option>
                            <option value="D009">District 9-JHS</option>
                            <option value="D010">District 10-JHS</option>
                            <option value="D011">District 9-SHS</option>
                            <option value="D012">District 10-SHS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-map-marker-alt"></i> Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter school address" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-phone"></i> Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group district-field">
                    <label><i class="fas fa-user-tie"></i> Principal Name</label>
                        <select id="principal" name="principal">
                            <option value="">Select Principal</option>
                            <option value="John Smith">John Smith</option>
                            
                        </select>
                    </div>
                   
                </div>
                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="closeModal()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-plus"></i> Add School
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit School Modal -->
    <div id="editSchoolModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-edit"></i>
                    <h2>Edit School</h2>
                </div>
                <span class="close" onclick="closeEditModal()">&times;</span>
            </div>
            <form id="editSchoolForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-school"></i> School Name</label>
                        <input type="text" id="editSchoolName" name="schoolName" placeholder="Enter school name" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-map"></i> District</label>
                        <select id="editDistrict" name="district" required>
                            <option value="">Select District</option>
                            <option value="D001">District 1</option>
                            <option value="D002">District 2</option>
                            <option value="D003">District 3</option>
                            <option value="D004">District 4</option>
                            <option value="D005">District 5</option>
                            <option value="D006">District 6</option>
                            <option value="D007">District 7</option>
                            <option value="D008">District 8</option>
                            <option value="D009">District 9-JHS</option>
                            <option value="D010">District 10-JHS</option>
                            <option value="D011">District 9-SHS</option>
                            <option value="D012">District 10-SHS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-map-marker-alt"></i> Address</label>
                        <input type="text" id="editAddress" name="address" placeholder="Enter school address" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-phone"></i> Phone Number</label>
                        <input type="tel" id="editPhone" name="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" id="editEmail" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group district-field">
                        <label><i class="fas fa-user-tie"></i> Principal Name</label>
                        <select id="editPrincipal" name="principal">
                            <option value="">Select Principal</option>
                            <option value="John Smith">John Smith</option>
                        </select>
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

    <!-- View School Modal -->
    <div id="viewSchoolModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-eye"></i>
                    <h2>School Details</h2>
                </div>
                <span class="close" onclick="closeViewModal()">&times;</span>
            </div>
            <div class="view-content">
                <div class="detail-group">
                    <label><i class="fas fa-school"></i> School Name</label>
                    <p id="viewSchoolName"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-map"></i> District</label>
                    <p id="viewDistrict"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-map-marker-alt"></i> Address</label>
                    <p id="viewAddress"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-phone"></i> Phone Number</label>
                    <p id="viewPhone"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-envelope"></i> Email</label>
                    <p id="viewEmail"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-user-tie"></i> Principal</label>
                    <p id="viewPrincipal"></p>
                </div>
            </div>
            <div class="form-actions">
                <button type="button" class="cancel-btn" onclick="closeViewModal()">
                    <i class="fas fa-times"></i> Close
                </button>
            </div>
        </div>
    </div>

    <style>
        .view-content {
            padding: 20px;
        }

        .detail-group {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #e9ecef;
        }

        .detail-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .detail-group label i {
            color: #3498db;
            width: 20px;
        }

        .detail-group p {
            margin: 0;
            padding-left: 28px;
            color: #34495e;
            font-size: 1.1em;
        }
    </style>

    <script>
        // Sample data for schools
        const sampleSchools = [
            {
                id: 1,
                name: "Central High School",
                district: "D001",
                type: "Secondary",
                principal: "John Smith",
                phone: "+1234567890",
                email: "central.high@school.edu",
                address: "123 Education St, Koronadal City"
            },
            {
                id: 2,
                name: "East Primary School",
                district: "D002",
                type: "Primary",
                principal: "Sarah Johnson",
                phone: "+1234567891",
                email: "east.primary@school.edu",
                address: "456 Learning Ave, Tacurong City"
            }
        ];

        function openModal() {
            document.getElementById('addSchoolModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('addSchoolModal').style.display = 'none';
            document.getElementById('addSchoolForm').reset();
        }

        function openEditModal(schoolId) {
            const school = sampleSchools.find(s => s.id === schoolId);
            if (school) {
                document.getElementById('editSchoolName').value = school.name;
                document.getElementById('editDistrict').value = school.district;
                document.getElementById('editAddress').value = school.address;
                document.getElementById('editPhone').value = school.phone;
                document.getElementById('editEmail').value = school.email;
                document.getElementById('editPrincipal').value = school.principal;
                document.getElementById('editSchoolModal').style.display = 'flex';
            }
        }

        function closeEditModal() {
            document.getElementById('editSchoolModal').style.display = 'none';
            document.getElementById('editSchoolForm').reset();
        }

        function openViewModal(schoolId) {
            const school = sampleSchools.find(s => s.id === schoolId);
            if (school) {
                document.getElementById('viewSchoolName').textContent = school.name;
                document.getElementById('viewDistrict').textContent = school.district;
                document.getElementById('viewAddress').textContent = school.address;
                document.getElementById('viewPhone').textContent = school.phone;
                document.getElementById('viewEmail').textContent = school.email;
                document.getElementById('viewPrincipal').textContent = school.principal;
                document.getElementById('viewSchoolModal').style.display = 'flex';
            }
        }

        function closeViewModal() {
            document.getElementById('viewSchoolModal').style.display = 'none';
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            const addModal = document.getElementById('addSchoolModal');
            const editModal = document.getElementById('editSchoolModal');
            const viewModal = document.getElementById('viewSchoolModal');
            
            if (event.target == addModal) {
                closeModal();
            }
            if (event.target == editModal) {
                closeEditModal();
            }
            if (event.target == viewModal) {
                closeViewModal();
            }
        }

        // Add event listeners to action buttons
        document.addEventListener('DOMContentLoaded', function() {
            const actionButtons = document.querySelectorAll('.action-btn');
            actionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    if (!row) return;

                    const schoolId = parseInt(row.getAttribute('data-id'));
                    
                    if (this.classList.contains('edit')) {
                        openEditModal(schoolId);
                    } else if (this.classList.contains('delete')) {
                        if (confirm('Are you sure you want to delete this school?')) {
                            // Add your delete logic here
                        }
                    }
                });
            });
        });

        document.getElementById('addSchoolForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            alert('School added successfully!');
            closeModal();
        });

        document.getElementById('editSchoolForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            alert('School updated successfully!');
            closeEditModal();
        });
    </script>
</body>
</html> 