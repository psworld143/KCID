function openGenerateModal() {
    document.getElementById('generateReportModal').style.display = 'flex';
}
function closeGenerateModal() {
    document.getElementById('generateReportModal').style.display = 'none';
    document.getElementById('generateReportForm').reset();
}
window.onclick = function(event) {
    const modal = document.getElementById('generateReportModal');
    if (event.target == modal) {
        closeGenerateModal();
    }
}
document.getElementById('generateReportForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Report generated! (This is a placeholder action.)');
    closeGenerateModal();
});

const ctx = document.getElementById('mpsComparativeChart').getContext('2d');
const mpsComparativeChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Filipino', 'English', 'Math', 'Science', 'AP', 'GMRC', 'EPP', 'MAPEH'],
        datasets: [
            {
                label: 'Current Quarter',
                data: [70.51, 64.70, 61.92, 63.35, 64.13, 78.62, 67.13, 65.63],
                backgroundColor: 'rgba(52, 152, 219, 0.7)'
            },
            {
                label: 'Previous Quarter',
                data: [68.00, 62.50, 60.00, 61.00, 62.00, 75.00, 65.00, 63.00],
                backgroundColor: 'rgba(46, 204, 113, 0.7)'
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'MPS by Learning Area: Current vs Previous Quarter'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100,
                title: {
                    display: true,
                    text: 'MPS Score (%)'
                }
            }
        }
    }
});