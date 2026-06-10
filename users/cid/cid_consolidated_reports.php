<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolidated Reports - CID Dashboard</title>
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
            <div class="filter-section">
                <form id="districtForm" method="get">
                    <label for="district">Select District:</label>
                    <select id="district" name="district" class="filter-select">
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
                name: 'Marbel 5 CES',
                mps: [
                    [64.27, 66.98, 63.07, null, 65.77, 73.57, null, 61.56, 65.87],
                    [64.08, 60, 61.14, 67.54, 58.1, 72.6, null, 63.7, 63.88],
                    [70.04, 59.95, 54.02, 57.66, 56.33, 74.04, 61.61, 63.59, 62.16],
                    [58.47, 46.3, 54.93, 69.83, 59.4, 60.83, 61.07, 51.77, 57.83],
                    [70.53, 74.41, 65.25, 66.25, 62.2, 73.67, 64.9, 77.8, 69.37],
                ],
                enrollment: [45, 52, 48, 41, 39, 47],
                avg: [65.478, 61.528, 59.668, 65.32, 60.36, 70.942, 62.527, 63.684, 63.6883]
            },
            {
                name: 'Esperanza ES',
                mps: [
                    [62.1, 65.2, 60.3, 61.5, 63.2, 70.1, 62.5, 60.7, 63.07],
                    [63.5, 62.8, 61.2, 62.3, 61.7, 69.8, 63.1, 62.2, 64.07],
                    [65.7, 66.1, 62.4, 63.8, 64.2, 71.2, 64.3, 63.5, 65.15],
                    [67.2, 68.5, 64.1, 65.7, 66.1, 72.5, 65.8, 65.1, 67.0],
                    [68.9, 70.3, 65.9, 67.2, 67.8, 73.9, 67.2, 66.7, 68.98],
                ],
                enrollment: [38, 42, 35, 40, 36, 44],
                avg: [65.08, 66.18, 62.78, 64.5, 64.2, 71.5, 64.58, 63.64, 65.17]
            }
        ],
        2: [
            {
                name: 'San Jose ES',
                mps: [
                    [66.2, 68.1, 62.7, 64.3, 67.1, 72.3, 65.9, 62.8, 66.05],
                    [67.5, 69.4, 63.8, 65.2, 68.3, 73.5, 67.2, 64.1, 67.75],
                    [69.1, 71.2, 65.4, 66.7, 70.2, 75.1, 68.8, 65.7, 69.15],
                    [70.8, 73.5, 67.1, 68.9, 72.4, 77.2, 70.5, 67.3, 70.96],
                    [72.3, 75.8, 68.9, 71.1, 74.6, 79.3, 72.1, 69.2, 72.91],
                ],
                enrollment: [50, 47, 43, 41, 39, 45],
                avg: [69.18, 71.6, 65.58, 67.64, 70.52, 75.48, 68.9, 65.82, 69.09]
            }
        ]
    };
    const subjects = ['Filipino', 'English', 'Math', 'Science', 'AP', 'GMRC', 'EPP', 'MAPEH', 'Average'];
    const gradeLevels = [1, 2, 3, 4, 5, 6];

    let currentDistrict = 1;

    document.getElementById('district').addEventListener('change', function() {
        currentDistrict = parseInt(this.value);
        renderAllSchoolTables();
    });

    function renderAllSchoolTables() {
        const schools = districtSchools[currentDistrict] || [];
        let html = '';
        for (let s = 0; s < schools.length; s++) {
            const school = schools[s];
            html += `<div style=\"margin-bottom:10px;font-weight:bold;font-size:1.1rem;\">School: ${school.name}</div>`;
            html += `<table style=\"width:100%;border-collapse:separate;border-spacing:0;text-align:right;background:#f7fafc;box-shadow:0 2px 8px rgba(52,152,219,0.07);margin-bottom:10px;\">`;
            html += `<tr style=\"background:#3498db;\"><th rowspan=2 style='border:2px solid #d1d5db;background:#3498db;color:#fff;font-weight:bold;padding:10px 14px;text-align:center;'>Grade Level</th>`;
            html += `<th rowspan=2 style='border:2px solid #d1d5db;background:#3498db;color:#fff;font-weight:bold;padding:10px 14px;text-align:center;'>Enrollment</th>`;
            for (let sub = 0; sub < subjects.length; sub++) {
                html += `<th style='border:2px solid #d1d5db;background:#3498db;color:#fff;font-weight:bold;padding:10px 14px;text-align:center;'>${subjects[sub]}</th>`;
            }
            html += `</tr>`;
            html += `<tr style=\"background:#eaf4fb;\">`;
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
                        html += `<td style='border:1.5px solid #d1d5db;background:#eaf4fb;'></td>`;
                    } else {
                        html += `<td style='border:1.5px solid #d1d5db;padding:8px 12px;color:#2c3e50;'>${val.toFixed(2)}</td>`;
                    }
                }
                html += `</tr>`;
            }
            // Total/Average row
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
        }
        if (schools.length === 0) {
            html = '<div style="color:#e74c3c;font-weight:bold;">No schools found for this district.</div>';
        }
        document.getElementById('school-table-container').innerHTML = html;
    }
    // Initial render
    renderAllSchoolTables();
    </script>
</body>
</html>