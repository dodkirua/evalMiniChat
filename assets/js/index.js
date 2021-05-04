
const xhr = new XMLHttpRequest();

xhr.onload = function () {
    let contenu = JSON.parse(xhr.responseText);
    const area = document.getElementById("area");
    area.innerHTML = contenu;
}

xhr.open("GET","/Controller/chatRoom-get.php");
xhr.send();