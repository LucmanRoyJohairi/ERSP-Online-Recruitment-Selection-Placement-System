$(window).load(function () {
    $(".material-icons").css("opacity", "1");
    $(".sidebar-text")
        .css({ visibility: "visible", opacity: 0.0 })
        .animate({ opacity: 1.0 }, 1100);
});
