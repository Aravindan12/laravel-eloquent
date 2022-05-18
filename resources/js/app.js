require('./bootstrap');

const message_element = document.getElementById('messages');
const message_input = document.getElementById('message_input');
const message_form = document.getElementById('message_form');

message_form.addEventListener('submit',function(e){
    e.preventDefault();

    const options = {
        method : "post",
        url : '/sender',
        data : {
            message : message_input.value,
        }
    }

    axios(options);
});

window.Echo.channel('my-channel').listen('.listener',(e)=>{
    console.log(e);
    message_element.innerHTML += '<div class= "message"><strong>'+e.text+'</div>';
});