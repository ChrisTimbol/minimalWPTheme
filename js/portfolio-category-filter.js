// JavaScript to handle category filtering
document.addEventListener('DOMContentLoaded', function() {
    var categoryTerms = document.querySelectorAll('.category-term');
    var thumbnailContainers = document.querySelectorAll('.thumbnail-container');

    categoryTerms.forEach(function(term) {
        term.addEventListener('click', function() {
            var selectedCategory = this.getAttribute('data-category');

            thumbnailContainers.forEach(function(container) {
                var isMatch = false;

                /* Category label in a <span> that holds category label inbetween */
                var categoryLabels = container.querySelectorAll('.category-label');

                categoryLabels.forEach(function(label) {
                    if (label.textContent === selectedCategory || selectedCategory === 'all') {
                        isMatch = true;
                    }
                });

                // Show or hide based on category match
                container.style.display = isMatch ? 'grid' : 'none';
            });
        });
    });
});