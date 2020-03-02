
{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>--}}

<!------ Include the above in your HEAD tag ---------->

{{--"Simple Chat By Gilson"--}}
{{--Bootstrap 4.0.0 Snippet by gilsongilbert--}}

<!DOCTYPE html>
<html>
<body>
<div class="col-sm-3 col-sm-offset-4 frame">
    <style>
        .container {
            width: 500px; /* Ширина блока */
            height: 350px; /* Высота блока */
            padding: 5px; /* Поля вокруг текста */
            overflow: hidden;
            overflow-y: visible;
            border: 1px solid red;
            position: relative;
        }

        .wrap {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }
    </style>

    <div class="container">
        <ul id="messages" class="wrap" >
            <li>
                <div class="msj macro">
                    <div class="text text-l"><p>Hello Tom...</p>
                        <p><small>10:04 PM</small></p></div>
                </div>
            </li>
        </ul>
    </div>


    <input id="user_name" placeholder="your name" value="vasya" hidden/>
    <div>
        <div class="msj-rta macro" style="margin:auto">
            <div class="text text-r" style="background:whitesmoke !important">
                <input id="msg" class="msg" placeholder="Type a message" required/>
            </div>
        </div>
        <button id="s">submit</button>
    </div>
</div>

<script>
    function postMsg() {
        const payload = {
            msg: document.getElementById('msg').value,
            user_name: document.getElementById('user_name').value
        };
        return fetch('http://chat/messages', {
            method: "POST",
            body: JSON.stringify(payload),
            headers: new Headers({
                'Accept': 'application/json',
                'Content-type': 'application/json'
            })
        })
            .then(r => r.json());
    }

    document.getElementById('s').addEventListener("click", function(){
        postMsg()
            .then(success => {
                resultA = success;
                console.log(success[0].users);
                let obj = success[0].users;

                let count = Object.keys(obj).length;
                count = parseInt(count);
                let i = 0;
                for (var prop in obj) {
                    i++;
                    append(obj[count-i]);
                }
                return resultA;
            });
    });
    function append(obj){
        let newMessage = document.createElement('li');
        newMessage.innerHTML = '<li style="width:100%;">' +
            '<div class="msj-rta macro">' +
            '<div class="text text-r">' +
            '<p>'+obj.msg+'</p>' +
            '<p><small>'+obj.created_at+'</small></p>' +
            '</div>' +
            '<div class="avatar"></div>' +
            '</li>';
        document.getElementById('messages').appendChild(newMessage);
    }
</script>

</body>
</html>
