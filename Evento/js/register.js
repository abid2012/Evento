const fn = document.getElementById("fn");
const email = document.getElementById("email");
const passw = document.getElementById("passw");


function registervalid(){
    if(fn.value == "" || email.value == "" || passw.value == ""){
        fn.placeholder="Full Name required";
        email.placeholder="Email required";
        passw.placeholder="Password required";
        return false;
    }

    if(fn.value == ""){
        fn.placeholder="Full Name required";
        return false;
    }

    if(email.value == ""){
        email.placeholder="Email required";
        return false;
    }

    if(passw.value == ""){
        passw.placeholder="Password required";
        return false;
    }
}