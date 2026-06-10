// Function to load the sidebar
async function loadSidebar() {
    try {
        const response = await fetch('sidebar.html');
        const html = await response.text();
        document.querySelector('.sidebar-container').innerHTML = html;
        
        // Set active state based on current page
        const currentPage = window.location.pathname.split('/').pop();
        const navLinks = document.querySelectorAll('.nav-links a');
        
        navLinks.forEach(link => {
            const linkPage = link.getAttribute('href');
            if (linkPage === currentPage) {
                link.parentElement.classList.add('active');
            }
        });
    } catch (error) {
        console.error('Error loading sidebar:', error);
    }
}

// Function to toggle sidebar
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const sidebarContainer = document.querySelector('.sidebar-container');
    const mainContent = document.querySelector('.main-content');
    
    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('expanded');
    
    if (sidebar.classList.contains('collapsed')) {
        sidebarContainer.style.width = '80px';
        sidebarContainer.style.minWidth = '80px';
    } else {
        sidebarContainer.style.width = '280px';
        sidebarContainer.style.minWidth = '280px';
    }
}

// Add event listener for menu toggle button
document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    if (menuToggle) {
        menuToggle.addEventListener('click', toggleSidebar);
    }
    
    // Handle window resize
    window.addEventListener('resize', () => {
        const sidebar = document.querySelector('.sidebar');
        const sidebarContainer = document.querySelector('.sidebar-container');
        const mainContent = document.querySelector('.main-content');
        
        if (window.innerWidth <= 768) {
            sidebar.classList.add('collapsed');
            mainContent.classList.add('expanded');
            sidebarContainer.style.width = '80px';
            sidebarContainer.style.minWidth = '80px';
        } else {
            sidebar.classList.remove('collapsed');
            mainContent.classList.remove('expanded');
            sidebarContainer.style.width = '280px';
            sidebarContainer.style.minWidth = '280px';
        }
    });
});