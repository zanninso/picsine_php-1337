var last_id = 0;

$("#new").click(function () {
    var todoName = prompt("write the name of the new  todo");
    if (todoName !== null && todoName.trim() !== "")
    {
        last_id++;
        $.post("insert.php", {
            id : last_id,
            value : encodeURIComponent(todoName)
        },
        function () {
            $("#ft_list").prepend($("<div></div>").text(todoName));
            $("#ft_list div:first-child").click(
                function () {
                    if (confirm("do you really want to remove this todo")) {
                        $.post("delete.php", {id : $(this).data("id")},function(){});
                        $(this).remove();
                    }
                });
            $("#ft_list div:first-child").data("id", last_id);
        });
    }
});

$(document).ready(function () {
    $.post("select.php", {},
        function (data) {
            for (var i = 0 ; i <  data.length ; i++)
                addTodo(data[i]["id"], decodeURIComponent(data[i]["value"]));
            var divs = $("#ft_list div");
            if (divs.length > 0)
                last_id = Number($(divs[0]).data("id"));
        });
});

function addTodo(id, value) {
    $("#ft_list").prepend($("<div></div>").text(value));
    $("#ft_list div:first-child").click(
        function () {
            if (confirm("do you really want to remove this todo")) {
                $.post("delete.php", {id : $(this).data("id")},function(){});
                $(this).remove();
            }
        });
    $("#ft_list div:first-child").data("id", id);
}