<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/admin_theme.css">
    <link rel="stylesheet" href="../css/users.css">
    <link rel="stylesheet" href="../css/Admin_header.css">
    <link rel="stylesheet" href="../css/Admin_sidebar.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar Container -->
      <?php include 'includes/sidebar.php'; ?>
        <!-- Main Content -->
        <main class="main-content">
           <?php include 'includes/header.php'; ?>

            <!-- Users Content -->
            <div class="users-content">
                <div class="content-header">
                    <h1>Users Management</h1>
                    <button class="add-user-btn" onclick="openModal()">
                        <i class="fas fa-plus"></i> Add New User
                    </button>
                </div>

                <!-- Users Table -->
                <div class="table-container">
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>User Type</th>
                                <th>School</th>
                                <th>Contact</th>
                             
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Smith</td>
                                <td>School Principal</td>
                                <td>Central High School</td>
                                <td>john.smith@email.com</td>
                           
                                <td class="actions">
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn reset-password"><i class="fas fa-key"></i></button>
                                    <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Sarah Johnson</td>
                                <td>SGOD Chief</td>
                                <td>Central Elementary School</td>
                                <td>sarah.j@email.com</td>
                              
                                <td class="actions">
                                    <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn reset-password"><i class="fas fa-key"></i></button>
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

    <!-- Add User Modal -->
    <div id="addUserModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-user-plus"></i>
                    <h2>Add New User</h2>
                </div>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <form id="addUserForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-user-tag"></i> User Type</label>
                        <select id="userType" name="userType" required onchange="updateFormFields()">
                            <option value="">Select User Type</option>
                            <option value="principal">School Principal</option>
                            <option value="psds">Public Schools Division Superintendent</option>
                            <option value="sgod">SGOD Chief</option>
                            <option value="cid">CID Chief</option>
                            <option value="sds">Schools Division Superintendent</option>
                        </select>
                    </div>
                  
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> First Name</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Enter first name" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Last Name</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Enter last name" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-phone"></i> Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="form-group district-field">
                        <label><i class="fas fa-map"></i> District</label>
                        <select id="district" name="district">
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
                    <div class="form-group school-field" style="display: none;">
                        <label><i class="fas fa-school"></i> School</label>
                        <select id="school" name="school">
                            <option value="">Select School</option>
                            <option value="S001">Central High School</option>
                            <option value="S002">East Primary School</option>
                        </select>
                    </div>
                 
                  
                </div>
                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="closeModal()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-plus"></i> Add User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editUserModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-user-edit"></i>
                    <h2>Edit User</h2>
                </div>
                <span class="close" onclick="closeEditModal()">&times;</span>
            </div>
            <form id="editUserForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-user-tag"></i> User Type</label>
                        <select id="editUserType" name="userType" required onchange="updateEditFormFields()">
                            <option value="">Select User Type</option>
                            <option value="principal">School Principal</option>
                            <option value="psds">Public Schools Division Superintendent</option>
                            <option value="sgod">SGOD Chief</option>
                            <option value="cid">CID Chief</option>
                            <option value="sds">Schools Division Superintendent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> First Name</label>
                        <input type="text" id="editFirstName" name="firstName" placeholder="Enter first name" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Last Name</label>
                        <input type="text" id="editLastName" name="lastName" placeholder="Enter last name" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" id="editEmail" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-phone"></i> Phone Number</label>
                        <input type="tel" id="editPhone" name="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="form-group edit-district-field">
                        <label><i class="fas fa-map"></i> District</label>
                        <select id="editDistrict" name="district">
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
                    <div class="form-group edit-school-field" style="display: none;">
                        <label><i class="fas fa-school"></i> School</label>
                        <select id="editSchool" name="school">
                            <option value="">Select School</option>
                            <option value="S001">Central High School</option>
                            <option value="S002">East Primary School</option>
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

    <!-- View User Modal -->
    <div id="viewUserModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-user"></i>
                    <h2>User Details</h2>
                </div>
                <span class="close" onclick="closeViewModal()">&times;</span>
            </div>
            <div class="user-details">
                <div class="detail-group">
                    <label><i class="fas fa-user-tag"></i> User Type</label>
                    <p id="viewUserType"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-user"></i> Name</label>
                    <p id="viewName"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-envelope"></i> Email</label>
                    <p id="viewEmail"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-phone"></i> Phone Number</label>
                    <p id="viewPhone"></p>
                </div>
                <div class="detail-group" id="viewDistrictGroup">
                    <label><i class="fas fa-map"></i> District</label>
                    <p id="viewDistrict"></p>
                </div>
                <div class="detail-group" id="viewSchoolGroup" style="display: none;">
                    <label><i class="fas fa-school"></i> School</label>
                    <p id="viewSchool"></p>
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
        .user-details {
            padding: 20px;
        }

        .detail-group {
            margin-bottom: 15px;
        }

        .detail-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #666;
        }

        .detail-group p {
            margin: 0;
            padding: 8px;
            background-color: #f5f5f5;
            border-radius: 4px;
            color: #333;
        }

        .detail-group i {
            margin-right: 5px;
            color: #4CAF50;
        }
    </style>
    <script src="sidebar.js"></script>
    <script>
        // Load sidebar when the page loads
        document.addEventListener('DOMContentLoaded', loadSidebar);

        // Add event listeners for action buttons
        document.querySelectorAll('.action-btn.edit').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                openEditModal(row);
            });
        });

        document.querySelectorAll('.action-btn.view').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                openViewModal(row);
            });
        });

        function openEditModal(row) {
            // Populate form with user data
            document.getElementById('editUserType').value = row.cells[1].textContent.toLowerCase();
            const nameParts = row.cells[0].textContent.split(' ');
            document.getElementById('editFirstName').value = nameParts[0];
            document.getElementById('editLastName').value = nameParts[1];
            document.getElementById('editEmail').value = row.cells[3].textContent;
            // You might need to add phone number to your table or handle it differently
            document.getElementById('editPhone').value = '';
            
            // Show/hide appropriate fields based on user type
            updateEditFormFields();
            
            document.getElementById('editUserModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editUserModal').style.display = 'none';
            document.getElementById('editUserForm').reset();
        }

        function updateEditFormFields() {
            const userType = document.getElementById('editUserType').value;
            const districtField = document.querySelector('.edit-district-field');
            const schoolField = document.querySelector('.edit-school-field');

            if (userType === 'principal') {
                districtField.style.display = 'none';
                schoolField.style.display = 'flex';
            } else {
                districtField.style.display = 'flex';
                schoolField.style.display = 'none';
            }
        }

        function openViewModal(row) {
            // Populate view modal with user data
            document.getElementById('viewUserType').textContent = row.cells[1].textContent;
            document.getElementById('viewName').textContent = row.cells[0].textContent;
            document.getElementById('viewEmail').textContent = row.cells[3].textContent;
            // You might need to add phone number to your table or handle it differently
            document.getElementById('viewPhone').textContent = 'N/A';
            
            // Show/hide appropriate fields based on user type
            const userType = row.cells[1].textContent.toLowerCase();
            const districtGroup = document.getElementById('viewDistrictGroup');
            const schoolGroup = document.getElementById('viewSchoolGroup');
            
            if (userType === 'principal') {
                districtGroup.style.display = 'none';
                schoolGroup.style.display = 'block';
                document.getElementById('viewSchool').textContent = row.cells[2].textContent;
            } else {
                districtGroup.style.display = 'block';
                schoolGroup.style.display = 'none';
                document.getElementById('viewDistrict').textContent = 'N/A'; // You might want to add district to your table
            }
            
            document.getElementById('viewUserModal').style.display = 'flex';
        }

        function closeViewModal() {
            document.getElementById('viewUserModal').style.display = 'none';
        }

        // Handle edit form submission
        document.getElementById('editUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            alert('User updated successfully!');
            closeEditModal();
        });

        function openModal() {
            document.getElementById('addUserModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('addUserModal').style.display = 'none';
            document.getElementById('addUserForm').reset();
            // Reset form fields visibility
            document.querySelector('.district-field').style.display = 'flex';
            document.querySelector('.school-field').style.display = 'none';
        }

        function updateFormFields() {
            const userType = document.getElementById('userType').value;
            const districtField = document.querySelector('.district-field');
            const schoolField = document.querySelector('.school-field');

            // Show/hide fields based on user type
            if (userType === 'principal') {
                districtField.style.display = 'none';
                schoolField.style.display = 'flex';
            } else {
                districtField.style.display = 'flex';
                schoolField.style.display = 'none';
            }
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('addUserModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        document.getElementById('addUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            alert('User added successfully!');
            closeModal();
        });
    </script>
</body>
</html> 