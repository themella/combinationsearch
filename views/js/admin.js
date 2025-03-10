document.addEventListener('DOMContentLoaded', function () {
    console.log('Combination search script loaded');
    var searchInput = document.getElementById('combination_search');
    if (!searchInput) return;

    searchInput.addEventListener('keyup', function () {
        var filter = searchInput.value.toLowerCase();
        console.log('Filter:', filter);
        var rows = document.querySelectorAll('#combination_form table tbody tr');
        console.log('Rows found:', rows.length);

        rows.forEach(function (row) {
            var text = row.innerText.toLowerCase();
            console.log('Row text:', text);
            if (text.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
