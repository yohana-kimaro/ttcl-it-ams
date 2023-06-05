$(document).ready(function() {
    $('#datable_asset').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "drawCallback": function () {
            $('.dt-buttons > .btn').addClass('btn-outline-light btn-sm');
        },
        language: { search: "",searchPlaceholder: "Search" }
    });
});