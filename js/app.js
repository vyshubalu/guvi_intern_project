const API = "php/";

function register(){
    $.ajax({
        url: API + "register.php",
        type: "POST",
        data: {
            name: $("#name").val(),
            email: $("#email").val(),
            password: $("#password").val()
        },
        success: function(res){
            alert(res);
            window.location.href = "index.html";
        }
    });
}

function login(){
    $.ajax({
        url: API + "login.php",
        type: "POST",
        data: {
            email: $("#email").val(),
            password: $("#password").val()
        },
        success: function(res){
            let data = JSON.parse(res);
            if(data.token){
                localStorage.setItem("token", data.token);
                window.location.href = "profile.html";
            }else{
                alert("Invalid login");
            }
        }
    });
}

function updateProfile(){
    $.ajax({
        url: API + "update.php",
        type: "POST",
        data: {
            token: localStorage.getItem("token"),
            age: $("#age").val(),
            dob: $("#dob").val(),
            contact: $("#contact").val()
        },
        success: function(res){
            alert(res);
        }
    });
}

function logout(){
    localStorage.removeItem("token");
    window.location.href = "index.html";
}