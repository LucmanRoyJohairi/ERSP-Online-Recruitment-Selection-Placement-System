// const dashboardLink = document.querySelector("#dashboard");
// const applicantsLink = document.querySelector("#poolOfApplicants");
// const jobListLink = document.querySelector("#joblist");
// const newJobLink = document.querySelector("#new-job-post");
// const manageJobsLink = document.querySelector("#manage-jobs");
// const jobOffersLink = document.querySelector("#job-offers");
// const sendIssuanceLink = document.querySelector("#send-issuance");

// dashboardLink.addEventListener("click", function () {
//     window.location.href = "/admin/dashboard";
//     return false;
// });

// applicantsLink.addEventListener("click", function () {
//     window.location.href = "/admin/dashboard/applicants";
//     return false;
// });

$("#dashboard").click(function (e) {
    window.location.href = "/admin/dashboard";
    return false;
});
$("#poolOfApplicants").click(function (e) {
    window.location.href = "/admin/dashboard/applicants";
    return false;
});

$("#joblist").click(function (e) {
    window.location.href = "/admin/dashboard/jobs";
    return false;
});
$("#new-job-post").click(function (e) {
    window.location.href = "/admin/dashboard/jobs/new";
    return false;
});
$("#manage-jobs").click(function (e) {
    window.location.href = "/admin/dashboard/jobs/manage";
    return false;
});
$("#job-offers").click(function (e) {
    window.location.href = "/admin/dashboard/job-offers";
    return false;
});

$("#send-issuance").click(function (e) {
    window.location.href = "/admin/dashboard/issuance";
    return false;
});
