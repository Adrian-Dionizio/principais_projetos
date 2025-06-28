document.addEventListener('DOMContentLoaded', function() {
    // Tab navigation
    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            tab.classList.add('active');
            
            // Hide all tab contents
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Show the corresponding tab content
            const tabId = tab.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });
    
    // Competitor tabs
    const compTabs = document.querySelectorAll('.comp-tab');
    const compContents = document.querySelectorAll('.competitor-content');
    
    compTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active class from all competitor tabs
            compTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            tab.classList.add('active');
            
            // Hide all competitor contents
            compContents.forEach(content => content.classList.remove('active'));
            
            // Show the corresponding competitor content
            const compId = tab.getAttribute('data-comp');
            document.getElementById(compId).classList.add('active');
        });
    });
    
    // Differentials tabs
    const diffTabs = document.querySelectorAll('.diff-tab');
    const diffContents = document.querySelectorAll('.differentials-content');
    
    diffTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active class from all differentials tabs
            diffTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            tab.classList.add('active');
            
            // Hide all differentials contents
            diffContents.forEach(content => content.classList.remove('active'));
            
            // Show the corresponding differentials content
            const diffId = tab.getAttribute('data-diff');
            document.getElementById(diffId).classList.add('active');
        });
    });
    
    // Empathy map tabs
    const empTabs = document.querySelectorAll('.emp-tab');
    const empContents = document.querySelectorAll('.empathy-content');
    
    empTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active class from all empathy tabs
            empTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            tab.classList.add('active');
            
            // Hide all empathy contents
            empContents.forEach(content => content.classList.remove('active'));
            
            // Show the corresponding empathy content
            const empId = tab.getAttribute('data-emp');
            document.getElementById(empId).classList.add('active');
        });
    });
    
    // Add hover effects to cards
    const cards = document.querySelectorAll('.differential-card, .trend-card, .element-card, .section');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px)';
            card.style.boxShadow = '0 10px 15px rgba(0, 0, 0, 0.1)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
        });
    });
});
