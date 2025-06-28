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
    
    // Segmentation tabs
    const segTabs = document.querySelectorAll('.seg-tab');
    const segContents = document.querySelectorAll('.segmentation-content');
    
    segTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active class from all segmentation tabs
            segTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            tab.classList.add('active');
            
            // Hide all segmentation contents
            segContents.forEach(content => content.classList.remove('active'));
            
            // Show the corresponding segmentation content
            const segId = tab.getAttribute('data-seg');
            document.getElementById(segId).classList.add('active');
        });
    });
    
    // Add hover effect to sections
    const sections = document.querySelectorAll('.section');
    
    sections.forEach(section => {
        section.addEventListener('mouseenter', () => {
            section.style.backgroundColor = '#e9ecef';
        });
        
        section.addEventListener('mouseleave', () => {
            section.style.backgroundColor = '#f8f9fa';
        });
    });
    
    // Add hover effect to segment cards
    const segmentCards = document.querySelectorAll('.segment-card');
    
    segmentCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.borderTopWidth = '8px';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.borderTopWidth = '5px';
        });
    });
});
