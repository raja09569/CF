$(document).ready(function() {
setTimeout(popup, 3000);
function popup() {
$("#logindiv").css("display", "block");
}
$("#login #cancel").click(function() {
$(this).parent().parent().hide();
});
$("#onclick").click(function() {
    $("#contactdiv").css("display", "block");
});
});