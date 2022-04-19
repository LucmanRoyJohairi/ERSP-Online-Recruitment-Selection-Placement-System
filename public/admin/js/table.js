// $(document).ready(function() {
//     $('#user-table').DataTable();
// } );

$(document).ready(function () {
    console.log("ger");
    $("#user-table").DataTable({
        bPaginate: true,
        bLengthChange: true,
        bFilter: true,
        bInfo: false,
        bAutoWidth: true,
    });

    $("#manage-table").DataTable({
        bPaginate: true,
        bLengthChange: true,
        bFilter: true,
        bInfo: false,
        bAutoWidth: true,
    });

    $("#job-offer-tbl").DataTable({
        bPaginate: true,
        bLengthChange: true,
        bFilter: true,
        bInfo: false,
        bAutoWidth: true,
    });

    $("#applications-tbl").DataTable({
        bPaginate: true,
        bLengthChange: true,
        bFilter: true,
        bInfo: false,
        bAutoWidth: true,
    });

    $("#issuance-tbl").DataTable({
        bPaginate: true,
        bLengthChange: true,
        bFilter: true,
        bInfo: false,
        bAutoWidth: true,
    });
});
