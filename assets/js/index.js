// display message
const xhr = new XMLHttpRequest();
xhr.onload = function () {
    let contenu = JSON.parse(xhr.responseText);
    const area = document.getElementById("area");
   contenu.forEach(msg => {
       const line = document.createElement('p');
       line.innerHTML = msg.user + " : " +msg.content;
       area.append(line) ;
   });

}
xhr.open("GET","/Controller/chatRoom-get.php");
xhr.send();


//send message



const addInput = document.getElementById('add');
const addButton = document.getElementById('submit');

addButton.addEventListener("click",function (){
    send(addInput);
    addInput.value = "";
});

addInput.addEventListener("keyup",function (e){

    switch (e.key){
        case 'Enter' :
            send(addInput);
            addInput.value = "";
            break;
        default:
            break;
    }

});

function send(content){
    if (content.value !== ""){
        const xhrSend = new XMLHttpRequest();
        xhrSend.onload = function() {
            location.reload();
        };

        let body = {
            content: content.value,
            date: '',
            user: 1,
            chat_room :2
        }

        xhrSend.open("POST", "/Controller/chatRoom-send.php");
        xhrSend.send(JSON.stringify(body));
    }

}