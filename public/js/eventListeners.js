$(document).ready(function () {

    //Modals initialize
    $('.modal').modal({
        complete: function () {
            location.reload();
        } // Callback for Modal close
    });

    //BackButton Listener
    $('#back').click(function () {
        document.location.href = "index.php";
    });

    //ADD LIST MODAL MANAGE
    $('#addList').click(function () {
        $('#addListModal').modal('open');
    });

    $('#addListModalOK').click(function () {
        $.post("index.php",
            {"addCategory": {"name": $('#addListModalInput').val()}}, function (data) {
                console.log(data);
            }
        );
        $('#addListModalInput').val("");
        $('#addListModal').modal('close');
    });

    $('#addListModalCancel').click(function () {
        $('#addListModalInput').val("");
        $('#addListModal').modal('close');
    });

    //REMOVE LIST MODAL MANAGE
    $('#deleteListModal').modal({
        complete: function () {
            window.location.replace("index.php");
        } // Callback for Modal close
    });

    $('#deleteList').click(function () {
        $('#deleteListModal').modal('open');
    });

    $('#deleteListModalOK').click(function () {

        var id = parseInt($('.collection-header')[0].id);

        $.post("index.php", {"deleteCategory": {"id": id}}, function (data) {
            $('#deleteListModal').modal('close');
        });
    });

    //ADD ITEM MODAL MANAGE
    $('#addItem').click(function () {
        $('#addItemModal').modal('open');
    });

    $('#addItemModalOK').click(function () {

        var id = parseInt($('.collection-header')[0].id);
        var content = $('#addItemModalInput').val();

        $.post("index.php", {"addItem": {"content": content, "categoryId": id}}, function (data) {
            console.log(data);
            $('#addItemModalInput').val("");
            $('#addItemModal').modal('close');
        });
    });

    $('#addItemModalCancel').click(function () {
        $('#addItemModalInput').val("");
        $('#addItemModal').modal('close');
    });

    //REMOVE ITEM MODAL MANAGE
    $('.collection-item a').click(function (e) {
        e.stopPropagation();
        var id = parseInt($(this)[0].id);

        $('#removeItemModal').modal('open');
        $('#removeItemModalOK').click(function () {
            $.post("index.php", {"deleteItem": {"id": id}}, function (data) {
                $('#removeItemModal').modal('close');
            });
        });
    });
});			
