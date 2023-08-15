document.addEventListener('DOMContentLoaded', function() {
    var categoryTerms = document.querySelectorAll('.category-term');
    var thumbnailContainers = document.querySelectorAll('.thumbnail-container');

    categoryTerms.forEach(function(term) {
        term.addEventListener('click', function() {
            var selectedCategory = this.getAttribute('data-category');

            thumbnailContainers.forEach(function(container) {
                if (selectedCategory === 'all') {
                    container.style.display = 'block';
                    return;
                }

                var isMatch = false;
                var categoryLabels = container.querySelectorAll('.category-label');

                categoryLabels.forEach(function(label) {
                    if (label.textContent === selectedCategory) {
                        isMatch = true;
                    }
                });

                // Show or hide based on category match
                container.style.display = isMatch ? 'block' : 'none';
            });
        });
    });
});