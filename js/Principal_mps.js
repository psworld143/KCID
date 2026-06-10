
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
    document.getElementById('editGradingPeriod').value = row.cells[0].textContent;
    document.getElementById('editSchoolYear').value = row.cells[1].textContent;
    document.getElementById('editGradeLevel').value = row.cells[2].textContent;
    document.getElementById('editLearningArea').value = row.cells[3].textContent;
    document.getElementById('editMpsScore').value = row.cells[4].textContent;
    document.getElementById('editRemarks').value = row.cells[5].textContent;
    
    document.getElementById('editMpsModal').style.display = 'flex';
}

function closeEditModal() {
    document.getElementById('editMpsModal').style.display = 'none';
    document.getElementById('editMpsForm').reset();
}

function openViewModal(row) {
    document.getElementById('viewGradingPeriod').textContent = row.cells[0].textContent;
    document.getElementById('viewSchoolYear').textContent = row.cells[1].textContent;
    document.getElementById('viewGradeLevel').textContent = row.cells[2].textContent;
    document.getElementById('viewLearningArea').textContent = row.cells[3].textContent;
    document.getElementById('viewMpsScore').textContent = row.cells[4].textContent;
    document.getElementById('viewDateEncoded').textContent = row.cells[5].textContent;
    document.getElementById('viewRemarks').textContent = row.cells[6].textContent;
    
    document.getElementById('viewMpsModal').style.display = 'flex';
}

function closeViewModal() {
    document.getElementById('viewMpsModal').style.display = 'none';
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target == modal) {
            if (modal.id === 'addModal') closeAddModal();
            if (modal.id === 'editMpsModal') closeEditModal();
            if (modal.id === 'viewMpsModal') closeViewModal();
        }
    });
}

document.getElementById('addMPSForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('MPS record added successfully!');
    closeAddModal();
});

document.getElementById('editMpsForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('MPS record updated successfully!');
    closeEditModal();
});

function openRemarksModal() {
    document.getElementById('editRemarksModal').style.display = 'flex';
    document.getElementById('quarterRemarks').value = document.querySelector('.remarks-text').textContent.trim();
}

function closeRemarksModal() {
    document.getElementById('editRemarksModal').style.display = 'none';
    document.getElementById('editRemarksForm').reset();
}

document.getElementById('editRemarksForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const remarks = document.getElementById('quarterRemarks').value;
    document.querySelector('.remarks-text').textContent = remarks;
    closeRemarksModal();
    alert('Quarter remarks updated successfully!');
});

document.getElementById('remarksQuarter').addEventListener('change', updateQuarterLabel);
document.getElementById('remarksSchoolYear').addEventListener('change', updateQuarterLabel);

function updateQuarterLabel() {
    const quarter = document.getElementById('remarksQuarter').value;
    const schoolYear = document.getElementById('remarksSchoolYear').value;
    const quarterText = {
        '1': 'First Quarter',
        '2': 'Second Quarter',
        '3': 'Third Quarter',
        '4': 'Fourth Quarter'
    }[quarter];
    document.querySelector('.quarter-label').textContent = `${quarterText} ${schoolYear}`;
}

// Function to open the add modal
function openAddModal() {
    const modal = document.getElementById('addModal');
    if (modal) {
        modal.style.display = 'flex';
        document.getElementById('addMPSForm').reset();
    } else {
        console.error('Add modal not found');
    }
}

function closeAddModal() {
    const modal = document.getElementById('addModal');
    if (modal) {
        modal.style.display = 'none';
    }
}