document.addEventListener("DOMContentLoaded", function () {
    const iqacLinks = document.querySelectorAll('.iqac-link');

    // Attach click event listeners to each IQAC link
    iqacLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();  // Prevent default link behavior
            const pageUrl = this.getAttribute('href');  // Get the href value (the page URL)

            // Fetch the content from the corresponding HTML file
            fetch(pageUrl)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('iqac-content').innerHTML = data;  // Load content into #main-content
                })
                .catch(error => {
                    console.error('Error loading content:', error);
                    document.getElementById('iqac-content').innerHTML = "<p>Sorry, the content could not be loaded.</p>";
                });
        });
    });
});

