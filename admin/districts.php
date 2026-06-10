<?php
session_start();
// Database connection
require_once '../connection/db_connection.php';
$records_per_page = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;
$total_records_query = "SELECT COUNT(*) as count FROM districts";
$total_records_result = mysqli_query($conn, $total_records_query);
$total_records = mysqli_fetch_assoc($total_records_result)['count'];
$total_pages = ceil($total_records / $records_per_page);
$query = "SELECT * FROM districts LIMIT $offset, $records_per_page";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Districts Management - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/admin_theme.css">
    <link rel="stylesheet" href="../css/districts.css">
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
            <div class="districts-content">
                <div class="content-header">
                    <h1>Districts Management</h1>
                    <button class="add-district-btn" onclick="openModal()">
                        <i class="fas fa-plus"></i> Add New District
                    </button>
                </div>

             

                <!-- Districts Table -->
                <div class="table-container">
                    <table class="districts-table">
                        <thead>
                            <tr>
                                <th>District Name</th>
                                <th>Address</th>
                                <th>Number of Schools</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr data-id='" . htmlspecialchars($row['district_id']) . "'>";
                                 
                                    echo "<td>" . htmlspecialchars($row['district_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['number_of_schools']) . "</td>";
                              
                                    echo "<td class='actions'>
                                            <button class='action-btn edit'><i class='fas fa-edit'></i></button>
                                            <button class='action-btn view'><i class='fas fa-eye'></i></button>
                                            <button class='action-btn delete'><i class='fas fa-trash'></i></button>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='no-records'>No districts found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>" class="pagination-btn">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php endif; ?>

                    <?php
                    $start_page = max(1, $page - 2);
                    $end_page = min($total_pages, $page + 2);

                    for ($i = $start_page; $i <= $end_page; $i++) {
                        $active_class = ($i == $page) ? 'active' : '';
                        echo "<a href='?page=$i' class='pagination-btn $active_class'>$i</a>";
                    }
                    ?>

                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>" class="pagination-btn">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

    <!-- Add District Modal -->
    <div id="addDistrictModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-plus-circle"></i>
                    <h2>Add New District</h2>
                </div>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <form id="addDistrictForm">
                <div class="form-grid">
                   
                    <div class="form-group">
                        <label><i class="fas fa-school"></i> District Name</label>
                        <input type="text" id="districtName" name="districtName" placeholder="Enter district name" required>
                    </div>
                    <div class="form-group full-width">
                        <label><i class="fas fa-map-marker-alt"></i> Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter district address" required>
                    </div>
                   
                   
                </div>
                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="closeModal()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-plus"></i> Add District
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="editDistrictModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-edit"></i>
                    <h2>Edit District</h2>
                </div>
                <span class="close" onclick="closeEditModal()">&times;</span>
            </div>
            <form id="editDistrictForm">
                <input type="hidden" id="editDistrictId" name="districtId">
                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-school"></i> District Name</label>
                        <input type="text" id="editDistrictName" name="districtName" placeholder="Enter district name" required>
                    </div>
                    <div class="form-group full-width">
                        <label><i class="fas fa-map-marker-alt"></i> Address</label>
                        <input type="text" id="editAddress" name="address" placeholder="Enter district address" required>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-building"></i> Number of Schools</label>
                        <input type="number" id="editNumSchools" name="numSchools" min="0" placeholder="Enter number of schools" required>
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

        .schools-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .schools-section h3 {
            color: #333;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .schools-list {
            display: grid;
            gap: 15px;
            max-height: 300px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .school-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            border: 1px solid #e9ecef;
        }

        .school-card h4 {
            color: #2c3e50;
            margin: 0 0 10px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .school-info {
            display: grid;
            gap: 8px;
            font-size: 0.9em;
            color: #666;
        }

        .school-info span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .school-info i {
            width: 16px;
            color: #6c757d;
        }
    </style>

    <!-- View District Modal -->
    <div id="viewDistrictModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header-content">
                    <i class="fas fa-eye"></i>
                    <h2>District Details</h2>
                </div>
                <span class="close" onclick="closeViewModal()">&times;</span>
            </div>
            <div class="view-content">
                <div class="detail-group">
                    <label><i class="fas fa-school"></i> District Name</label>
                    <p id="viewDistrictName"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-map-marker-alt"></i> Address</label>
                    <p id="viewAddress"></p>
                </div>
                <div class="detail-group">
                    <label><i class="fas fa-building"></i> Number of Schools</label>
                    <p id="viewNumSchools"></p>
                </div>
                
                <div class="schools-section">
                    <h3><i class="fas fa-graduation-cap"></i> Schools in District</h3>
                    <div class="schools-list" id="schoolsList">
                        <!-- Sample schools will be populated here -->
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="button" class="cancel-btn" onclick="closeViewModal()">
                    <i class="fas fa-times"></i> Close
                </button>
            </div>
        </div>
    </div>

    <script>
        // Sample data for districts
        const sampleDistricts = [
            {
                id: 1,
                name: "District 1",
                address: "Koronadal City",
                numSchools: 15,
                schools: [
                    {
                        name: "Central High School",
                        principal: "Dr. Sarah Johnson",
                   
                    },
                    {
                        name: "Riverside Elementary",
                        principal: "Mrs. Emily Brown",
                      
                    },
                    {
                        name: "St. Mary's Academy",
                        principal: "Mr. Robert Wilson",
                     
                    }
                ]
            },
            {
                id: 2,
                name: "District 2",
                address: "Tacurong City",
                numSchools: 12,
                schools: [
                    {
                        name: "Tacurong National High School",
                        principal: "Dr. Maria Santos",
                    
                    },
                    {
                        name: "St. Joseph Elementary",
                        principal: "Mrs. Lisa Garcia",
                      
                    }
                ]
            },
            {
                id: 3,
                name: "District 3",
                address: "Isulan City",
                numSchools: 10,
                schools: [
                    {
                        name: "Isulan Central School",
                        principal: "Mr. John Dela Cruz",
                     
                    },
                    {
                        name: "Holy Cross Academy",
                        principal: "Sister Mary Grace",
                     
                    }
                ]
            }
        ];
        function populateTable() {
            const tbody = document.querySelector('.districts-table tbody');
            if (!tbody) return;

            tbody.innerHTML = sampleDistricts.map(district => `
                <tr data-id="${district.id}">
                    <td>${district.name}</td>
                    <td>${district.address}</td>
                    <td>${district.numSchools}</td>
                    <td class='actions'>
                        <button class='action-btn edit'><i class='fas fa-edit'></i></button>
                        <button class='action-btn view'><i class='fas fa-eye'></i></button>
                        <button class='action-btn delete'><i class='fas fa-trash'></i></button>
                    </td>
                </tr>
            `).join('');

            // Reattach event listeners
            attachEventListeners();
        }

        // Function to populate schools list in view modal
        function populateSchoolsList(districtId) {
            const district = sampleDistricts.find(d => d.id === parseInt(districtId));
            const schoolsList = document.getElementById('schoolsList');
            
            if (district && schoolsList) {
                schoolsList.innerHTML = district.schools.map(school => `
                    <div class="school-card">
                        <h4><i class="fas fa-school"></i> ${school.name}</h4>
                        <div class="school-info">
                            <span><i class="fas fa-user-tie"></i> Principal: ${school.principal}</span>
                          
                        </div>
                    </div>
                `).join('');
            }
        }

        // Function to attach event listeners
        function attachEventListeners() {
            const actionButtons = document.querySelectorAll('.action-btn');
            actionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    if (!row) return;

                    const cells = row.cells;
                    if (cells.length < 3) return;

                    const districtName = cells[0].textContent;
                    const address = cells[1].textContent;
                    const numSchools = cells[2].textContent;
                    const districtId = row.getAttribute('data-id');
                    
                    if (this.classList.contains('edit')) {
                        openEditModal(districtId, districtName, address, numSchools);
                    } else if (this.classList.contains('view')) {
                        openViewModal(districtName, address, numSchools);
                        populateSchoolsList(districtId);
                    } else if (this.classList.contains('delete')) {
                        if (confirm('Are you sure you want to delete this district?')) {
                            // Add your delete logic here
                        }
                    }
                });
            });
        }

        // Initialize the table when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            populateTable();
        });

        function openModal() {
            document.getElementById('addDistrictModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('addDistrictModal').style.display = 'none';
            document.getElementById('addDistrictForm').reset();
        }

        // Edit modal functions
        function openEditModal(districtId, districtName, address, numSchools) {
            const editModal = document.getElementById('editDistrictModal');
            const editDistrictId = document.getElementById('editDistrictId');
            const editDistrictName = document.getElementById('editDistrictName');
            const editAddress = document.getElementById('editAddress');
            const editNumSchools = document.getElementById('editNumSchools');

            if (editModal && editDistrictId && editDistrictName && editAddress && editNumSchools) {
                editDistrictId.value = districtId;
                editDistrictName.value = districtName;
                editAddress.value = address;
                editNumSchools.value = numSchools;
                editModal.style.display = 'flex';
            } else {
                console.error('Edit modal elements not found');
            }
        }

        function closeEditModal() {
            const editModal = document.getElementById('editDistrictModal');
            const editForm = document.getElementById('editDistrictForm');
            if (editModal && editForm) {
                editModal.style.display = 'none';
                editForm.reset();
            }
        }

        // View modal functions
        function openViewModal(districtName, address, numSchools) {
            document.getElementById('viewDistrictName').textContent = districtName;
            document.getElementById('viewAddress').textContent = address;
            document.getElementById('viewNumSchools').textContent = numSchools;
            document.getElementById('viewDistrictModal').style.display = 'flex';
        }

        function closeViewModal() {
            document.getElementById('viewDistrictModal').style.display = 'none';
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            const addModal = document.getElementById('addDistrictModal');
            const editModal = document.getElementById('editDistrictModal');
            const viewModal = document.getElementById('viewDistrictModal');
            
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
    </script>
</body>
</html>