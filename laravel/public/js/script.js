function check_software_house(){

    nome = $("#nome");
    nome_msg = $("#invalid_name");
    var error = false;

    if(nome.val().trim() === ""){

        nome_msg.html("The name is required");
        nome.focus()
        error = true;
    }

    if(!error){
        // se tutto va bene punto alla form e invoco il metodo submit
            // uso ajax per vedere se il nome è valido
            $.ajax({
                type: 'GET',
                url:"/ajaxSoftwareHouse",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                dataType: 'json',
                data: {nome: nome.val().trim()},

                //funzione di callback
                success: function (response){
                    if(response.found){
                        error=true
                        nome_msg.html("You already entered this name");
                    }
                    else{
                        $('form[name=software_house]').submit();
                    }
                }
            });
    }
}

function checkJoin(){

    username = $("#username");
    password = $("#password");
    confirm_password = $("#confirm-password");
    email = $("#email");

    form = new FormData();
    form.append('username', username);
    form.append('password', password);
    form.append('confirm_password', confirm_password);
    form.append('email', email);

    username_msg = $("#invalid_username");
    password_msg = $("#invalid_password");
    confirm_password_msg = $("#invalid_password_confirm");
    email_msg = $("#invalid_email");


    var error = false;

    if(username.val().trim() === ""){

        username_msg.html("Username is required");
        username.focus()
        error = true;
    }

    if(password.val().trim() === ""){

        password_msg.html("Password is required");
        password.focus()
        error = true;
    }

    if(confirm_password.val().trim() === ""){

        confirm_password_msg.html("The password confirm is required");
        confirm_password.focus()
        error = true;
    }

    if(email.val().trim() === ""){

        email_msg.html("Email is required");
        email.focus()
        error = true;
    }

    const toCheckFor = ["@", "."] // Array of all characters to check for
    const text = email.val().trim() // text you want to check in
    let flag = true // flipped to false if one character in the array not found

    toCheckFor.forEach(e => {
        flag &= text.includes(e)
    })

    if(!flag){
        email_msg.html("Email is not valid");
        email.focus()
        error = true;
    }

    if(!(username.val().trim() === "")){

        username_msg.html("");
    }

    if(!(password.val().trim() === "")){

        password_msg.html("");
    }

    if(!(confirm_password.val().trim() === "")){

        confirm_password_msg.html("");
    }

    if(!(email.val().trim() === "") && flag){

        email_msg.html("");
    }

    if(!(confirm_password.val().trim() === password.val().trim())){

        confirm_password_msg.html("The password confirm is not correct");
        confirm_password.focus()
        error = true;
    }

    /* if(!error) {
        $.ajax({
            url: "/user/ajaxCheckJoin",
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',

            success:function(response) {
                if(response.fieldUsername){
                    console.error("username already exists");

                    error=true
                    username.focus()
                    username_msg.html("This username is already used");
                }
                else if(response.fieldEmail){
                    console.error("mail already exists");
                    error = true
                    email.focus()
                    email_msg.html("This email is already used");
                }
                else{
                    console.log("tutto ok");
                    console.log(response);
                    //$('form[name=join]').submit();
                }
            }
        });
    } */

    if(!error){
        $('form[name=join]').submit();
    }
}

function checkDiscuss(){
    titolo = $("#titolo");
    titolo_msg = $("#invalid_title");

    topic = $("#topic");
    topic_msg = $("#invalid_topic");

    var error = false;

    if(titolo.val().trim() === ""){

        titolo_msg.html("Title is required");
        titolo.focus()
        error = true;
    }

    if(topic.val().trim() === ""){

        topic_msg.html("The name is required");
        topic.focus()
        error = true;
    }

    if(!error){
        // se tutto va bene punto alla form e invoco il metodo submit
        // uso ajax per vedere se il nome è valido
        $.ajax({
            type: 'GET',
            url:"/ajaxDiscuss",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            dataType: 'json',
            data: {titolo: titolo.val().trim()},

            //funzione di callback
            success: function (response){
                if(response.found){
                    error=true
                    titolo_msg.html("There's already a discussion with this title");
                }
                else{
                    $('form[name=discuss-form]').submit();
                }
            }
        });
    }

}

function checkPost(){
    content = $("#content");
    content_msg = $("#invalid_content");

    var error = false;

    if(content.val().trim() === ""){

        content_msg.html("Content is required");
        content.focus()
        error = true;
    }

    if(!error){
        $('form[name=content-form]').submit();
    }

}

function checkGame(){

    titolo = $("#titolo");
    titolo_msg = $("#invalid_title");

    anno = $("#anno");
    anno_msg = $("#invalid_year");

    playtime = $("#Playtime");
    playtime_msg = $("#invalid_playtime");

    cover = $("#cover");
    cover_msg = $("#invalid_cover");

    var error = false;

    if(titolo.val().trim() === ""){

        titolo_msg.html("Title is required");
        titolo.focus()
        error = true;
    }

    if(anno.val().trim() === ""){

        anno_msg.html("Year is required");
        anno.focus()
        error = true;
    }

    if(playtime.val().trim() === ""){

        playtime_msg.html("Playtime is required");
        playtime.focus()
        error = true;
    }

    if(cover.val().trim() === ""){

        cover_msg.html("The cover is required");
        cover.focus()
        error = true;
    }

    if(isNaN(anno.val())){
        anno_msg.html("The year must be a number");
        anno.focus()
        error = true;
    }

    if(isNaN(playtime.val())){
        playtime_msg.html("The playtime must be a number");
        playtime.focus()
        error = true;
    }

    if(!(titolo.val().trim() === "")){

        titolo_msg.html("");
    }

    if(!(anno.val().trim() === "") && !(isNaN(anno.val()))){

        anno_msg.html("");
    }

    if(!(playtime.val().trim() === "") && (!isNaN(playtime.val()))){

        playtime_msg.html("");
    }

    if(!(cover.val().trim() === "")){

        cover_msg.html("");
    }

    if(!error){
        $('form[name=gioco]').submit();
    }

}

function checkLogin(){

    username = $("#username");
    username_msg = $("#invalid_username");

    password = $("#password");
    password_msg = $("#invalid_password");

    login_msg = $("#invalid_login");


    var error = false;

    if(username.val().trim() === ""){

        username_msg.html("Username is required");
        username.focus()
        error = true;
    }

    if(password.val().trim() === ""){

        password_msg.html("password is required");
        password.focus()
        error = true;
    }

    if(!(username.val().trim() === "")){

        username_msg.html("");
    }

    if(!(password.val().trim() === "")){

        password_msg.html("");
    }

    /* if(!error){
        $.ajax({
            url: "/user/ajaxCheckJoin",
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            data: {username: username.val().trim(),
                password: password.val().trim()},

            success: function (response){
                if(!response.found){
                    console.error(response)

                    error=true
                    login_msg.html("Login failed, check your username and password");
                }
                else{
                    $('form[name=discuss-form]').submit();
                }
            }
        });
    } */

    if(!error){

        $('form[name=login-form]').submit();
    }

}
