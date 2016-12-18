var btn_loading_page = function () {
    $('#disablingPage').css( "display", "block");
    $('#spinner_gt').show(300);
};
$('.btn_loading_page').click(function () {
    btn_loading_page();
});


