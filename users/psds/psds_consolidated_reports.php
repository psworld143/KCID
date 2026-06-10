<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolidated Reports - PSDS Dashboard</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/users.css">
    <link rel="stylesheet" href="../../css/Admin_header.css">
    <link rel="stylesheet" href="../../css/Admin_sidebar.css">
    <link rel="stylesheet" href="../../css/psds_reports.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
    <div class="container">
        <?php include 'includes/sidebar.php'; ?>
        <main class="main-content">
            <?php include '../header/header.php'; ?>
            
            <div class="page-header">
                <h1>Consolidated MPS Reports</h1>
            </div>

            <?php
            // Set static district data for demonstration
            $assigned_district = 1; // Default to District 1
            echo "<div class='district-info'>Viewing Schools for District " . $assigned_district . "</div>";
            ?>

            <div class="filter-section">
                <form id="schoolForm" method="get">
                    <label for="school">Select School:</label>
                    <select id="school" name="school" class="filter-select">
                        <option value="">Select a school...</option>
                    </select>
                </form>
            </div>

            <div id="school-table-container"></div>
        </main>
    </div>
    <script src="../../js/sidebar.js"></script>
    <script>
    const districtSchools = {
        1: [
            {
                name: 'KCES 1 ES',
                mps: [
                    [64.27, 66.98, 63.07, 65.77, 73.57, 61.56, 65.87, 68.92, 65.89],
                    [64.08, 60.00, 61.14, 67.54, 58.10, 72.60, 63.70, 63.88, 63.83],
                    [70.04, 59.95, 54.02, 57.66, 56.33, 74.04, 61.61, 63.59, 62.16],
                    [58.47, 46.30, 54.93, 69.83, 59.40, 60.83, 61.07, 51.77, 57.83],
                    [70.53, 74.41, 65.25, 66.25, 62.20, 73.67, 64.90, 77.80, 69.37],
                ],
                enrollment: [50, 47, 43, 41, 39, 45],
                avg: [65.478, 61.528, 59.668, 65.32, 60.36, 70.942, 62.527, 63.684, 63.688]
            },
            {
                name: 'Esperanza ES',
                mps: [
                    [62.10, 65.20, 60.30, 61.50, 63.20, 70.10, 62.50, 60.70, 63.07],
                    [63.50, 62.80, 61.20, 62.30, 61.70, 69.80, 63.10, 62.20, 64.07],
                    [65.70, 66.10, 62.40, 63.80, 64.20, 71.20, 64.30, 63.50, 65.15],
                    [67.20, 68.50, 64.10, 65.70, 66.10, 72.50, 65.80, 65.10, 67.00],
                    [68.90, 70.30, 65.90, 67.20, 67.80, 73.90, 67.20, 66.70, 68.98],
                ],
                enrollment: [45, 42, 40, 38, 36, 41],
                avg: [65.48, 66.38, 62.78, 64.10, 64.60, 71.50, 64.58, 63.64, 65.65]
            },
            {
                name: 'San Jose ES',
                mps: [
                    [66.20, 68.10, 62.70, 64.30, 67.10, 72.30, 65.90, 62.80, 66.05],
                    [67.50, 69.40, 63.80, 65.20, 68.30, 73.50, 67.20, 64.10, 67.75],
                    [69.10, 71.20, 65.40, 66.70, 70.20, 75.10, 68.80, 65.70, 69.15],
                    [70.80, 73.50, 67.10, 68.90, 72.40, 77.20, 70.50, 67.30, 70.96],
                    [72.30, 75.80, 68.90, 71.10, 74.60, 79.30, 72.10, 69.20, 72.91],
                ],
                enrollment: [48, 45, 42, 40, 38, 43],
                avg: [69.18, 71.60, 65.58, 67.24, 70.52, 75.48, 68.90, 65.82, 69.36]
            }
        ]
    };
    const subjects = ['Filipino', 'English', 'Math', 'Science', 'AP', 'GMRC', 'EPP', 'MAPEH', 'Average'];
    const gradeLevels = [1, 2, 3, 4, 5, 6];
    const assignedDistrict = <?php echo $assigned_district; ?>;
    let currentDistrict = assignedDistrict;
    function populateSchoolDropdown() {
        const schoolSelect = document.getElementById('school');
        const schools = districtSchools[currentDistrict] || [];
        
        while (schoolSelect.options.length > 1) {
            schoolSelect.remove(1);
        }
        schools.forEach((school, index) => {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = school.name;
            schoolSelect.appendChild(option);
        });
        if (schools.length === 0) {
            const option = document.createElement('option');
            option.value = "";
            option.textContent = "No schools available";
            option.disabled = true;
            schoolSelect.appendChild(option);
        }
    }
    document.getElementById('school').addEventListener('change', function() {
        const schoolIndex = parseInt(this.value);
        if (!isNaN(schoolIndex)) {
            renderSchoolTable(schoolIndex);
        } else {
            document.getElementById('school-table-container').innerHTML = '';
        }
    });

    function renderSchoolTable(schoolIndex) {
        const schools = districtSchools[currentDistrict] || [];
        const school = schools[schoolIndex];
        let html = '';

        if (school) {
            html += `<div style="margin-bottom:10px;font-weight:bold;font-size:1.1rem;">School: ${school.name}</div>`;
            html += `<table style="width:100%;border-collapse:separate;border-spacing:0;text-align:right;background:#f7fafc;box-shadow:0 2px 8px rgba(52,152,219,0.07);margin-bottom:10px;">`;
            html += `<tr style="background:#3498db;"><th rowspan=2 style='border:2px solid #d1d5db;background:#3498db;color:#fff;font-weight:bold;padding:10px 14px;text-align:center;'>Grade Level</th>`;
            html += `<th rowspan=2 style='border:2px solid #d1d5db;background:#3498db;color:#fff;font-weight:bold;padding:10px 14px;text-align:center;'>Enrollment</th>`;
            for (let sub = 0; sub < subjects.length; sub++) {
                html += `<th style='border:2px solid #d1d5db;background:#3498db;color:#fff;font-weight:bold;padding:10px 14px;text-align:center;'>${subjects[sub]}</th>`;
            }
            html += `</tr>`;
            html += `<tr style="background:#eaf4fb;">`;
            for (let j = 0; j < subjects.length; j++) {
                html += `<td style='border:2px solid #d1d5db;background:#eaf4fb;height:8px;'></td>`;
            }
            html += `</tr>`;
          
            for (let i = 0; i < school.mps.length; i++) {
                html += `<tr style='background:#fff;transition:background 0.2s;' onmouseover="this.style.background='#e3f2fd'" onmouseout="this.style.background='#fff'">`;
                html += `<td style='border:2px solid #d1d5db;background:#eaf4fb;color:#2c3e50;font-weight:bold;text-align:center;'>${gradeLevels[i]}</td>`;
                html += `<td style='border:2px solid #d1d5db;background:#f8f9fa;color:#27ae60;font-weight:600;text-align:center;'>${school.enrollment[i]}</td>`;
                for (let j = 0; j < subjects.length; j++) {
                    let val = school.mps[i][j];
                    if (val === null || typeof val === 'undefined') {
                        html += `<td style='border:1.5px solid #d1d5db;background:#eaf4fb;'>-</td>`;
                    } else {
                        html += `<td style='border:1.5px solid #d1d5db;padding:8px 12px;color:#2c3e50;'>${val.toFixed(2)}</td>`;
                    }
                }
                html += `</tr>`;
            }

            const totalEnrollment = school.enrollment.reduce((sum, enrollment) => sum + enrollment, 0);
            html += `<tr style='font-weight:bold;background:#e3f2fd;'>`;
            html += `<td style='border:2px solid #d1d5db;color:#e74c3c;font-weight:bold;background:#e3f2fd;text-align:center;'>Total/Average</td>`;
            html += `<td style='border:2px solid #d1d5db;color:#27ae60;font-weight:bold;background:#e3f2fd;text-align:center;'>${totalEnrollment}</td>`;
            for (let j = 0; j < subjects.length; j++) {
                html += `<td style='border:2px solid #d1d5db;color:#e74c3c;font-weight:bold;background:#e3f2fd;'>${school.avg[j].toFixed(3)}</td>`;
            }
            html += `</tr>`;
            html += `</table>`;
            html += `<div style='margin-bottom:40px;margin-top:20px;padding:10px 0 0 0;'><strong>Remarks:</strong><br><span style='color:#7f8c8d;'>Sample Remarks.</span></div>`;
        } else {
            html = '<div style="color:#e74c3c;font-weight:bold;">No schools found for this district.</div>';
        }

        document.getElementById('school-table-container').innerHTML = html;
    }

    // Initialize
    populateSchoolDropdown();
    </script>
</body>
</html> 