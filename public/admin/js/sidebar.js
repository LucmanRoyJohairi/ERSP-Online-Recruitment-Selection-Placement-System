$("#dashboard").on("click", function () {
    window.location.href = "/admin/dashboard";
    return false;
});
$("#poolOfApplicants").on("click", function () {
    window.location.href = "/admin/dashboard/applicants";
    return false;
});

$("#joblist").on("click", function () {
    window.location.href = "/admin/dashboard/jobs";
    return false;
});
$("#new-job-post").on("click", function () {
    window.location.href = "/admin/dashboard/jobs/new";
    return false;
});
$("#manage-jobs").on("click", function () {
    window.location.href = "/admin/dashboard/jobs/manage";
    return false;
});
$("#job-offers").on("click", function () {
    window.location.href = "/admin/dashboard/job-offers";
    return false;
});

$("#send-issuance").on("click", function () {
    window.location.href = "/admin/dashboard/issuance";
    return false;
});
