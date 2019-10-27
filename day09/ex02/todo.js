var last_id = 0;

function createTodo()
{
    var todoName = prompt("write the name of the new  todo");
    if(todoName !== "" && todoName.trim() !== "")
        addTodo(++last_id,todoName,true);
}

function deleteCookie(todo)
{
    if(confirm("do you really want to remove this todo"))
    {
        setCookie(todo.dataset.id,  "" , -1);
        todo.remove();
    }
}

function setCookie(cname, cvalue, exdays) 
{
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    cvalue = encodeURIComponent(cvalue);
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookies() {
    var decodedCookie = document.cookie;
    var ca = decodedCookie.split(';').filter(function (el) {return el !== '';});
    for(var i = 0; i < ca.length ; i++)
        addTodo(ca[i].substring(0,ca[i].search("=")), decodeURIComponent(ca[i].substring(ca[i].search("=") + 1), 0));
    var divs = document.getElementById("ft_list").getElementsByTagName("div");
    if(divs.length > 0)
        last_id = Number(divs[0].dataset.id);
}

function addTodo(id,value,Cookie)
{
    var container = document.getElementById("ft_list");
    var divs = container.getElementsByTagName("div");
    var todo = document.createElement("div");
    todo.setAttribute("onclick", "deleteCookie(this)");
    todo.setAttribute("data-id",id);
    todo.innerText = value;
    container.insertBefore(todo,divs[0]);
    if(Cookie == true)
        setCookie(id, value, 1);
}