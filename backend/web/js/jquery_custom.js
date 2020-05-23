$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
 //Ghi đè hộp thoại xác định mặc định của rails
    $.rails.allowAction = function (link) {
        if (link.data("confirm") == undefined) {
            return true;
        }
        $.rails.showConfirmationDialog(link);
        return false;
    };
//Event khi người dùng click confirm link
    $.rails.confirmed = function (link) {
        link.data("confirm", null);
        link.trigger("click.rails");
    };
//Hiển thị hộp thoại xác nhận
    $.rails.showConfirmationDialog = function (link) {
        var message = link.data("confirm");
        $.fn.SimpleModal({
            model: "modal",
            title: "Please confirm",
            contents: message
        }).addButton("Confirm", "button alert", function () {
            $.rails.confirmed(link);
            this.hideModal();
        }).addButton("Cancel", "button secondary").showModal();
    };
