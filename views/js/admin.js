document.addEventListener('DOMContentLoaded', function () {
    console.log('Combination search script loaded');
    var searchInput = document.getElementById('combination_search');
    if (!searchInput) return;

    searchInput.addEventListener('keyup', function () {
        var filter = searchInput.value.toLowerCase();
        var rows = document.querySelectorAll('#combination_form table tbody tr');

        rows.forEach(function (row) {
            var text = row.innerText.toLowerCase();
            if (text.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
