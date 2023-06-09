function sortTableByNominal() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("order-table");
    switching = true;

    var sortDirection = this.getAttribute("data-sort");

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[3];
            y = rows[i + 1].getElementsByTagName("TD")[3];

            var xValue = parseFloat(x.innerHTML.replace("Rp", ""));
            var yValue = parseFloat(y.innerHTML.replace("Rp", ""));

            if (sortDirection === "ascending") {
                if (xValue > yValue) {
                    shouldSwitch = true;
                    break;
                }
            } else {
                if (xValue < yValue) {
                    shouldSwitch = true;
                    break;
                }
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }

    // Toggle sort direction
    if (sortDirection === "ascending") {
        this.setAttribute("data-sort", "descending");
        this.classList.remove("ascending-icon");
        this.classList.add("descending-icon");
    } else {
        this.setAttribute("data-sort", "ascending");
        this.classList.remove("descending-icon");
        this.classList.add("ascending-icon");
    }
}

window.onload = function () {
    var sortBtn = document.getElementById("sort-nominal-btn");
    sortBtn.addEventListener("click", sortTableByNominal);
};

$(document).ready(function () {
    $('#toggleFilterBtn').click(function () {
        $('#filterModal').modal('show');
    });

    $('#applyFilterBtn').click(function () {
        $('#filterModal').modal('hide');
        applyFilter();
    });

    $('#nameFilterInput, #dateFilterInput').keyup(function () {
        applyFilter();
    });

    function applyFilter() {
        var nameFilter = $('#nameFilterInput').val().toLowerCase();
        var dateFilter = $('#dateFilterInput').val().toLowerCase();

        $('table tbody tr').filter(function () {
            var nameMatch = $(this).find('td:nth-child(2)').text().toLowerCase().indexOf(nameFilter) > -1;
            var dateMatch = $(this).find('td:nth-child(3)').text().toLowerCase().indexOf(dateFilter) > -1;

            $(this).toggle(nameMatch && dateMatch);
        });
    }
});
