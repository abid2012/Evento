// User

const em = document.getElementById("em");
const pass = document.getElementById("pass");

function loginvalid(){

    if(em.value=="" || pass.value==""){
        em.placeholder="Email is requied";
        pass.placeholder="Password is requied";
        return false;
    }

    if(em.value==""){
        em.placeholder="Email is requied";
        return false;
    }

    if(pass.value==""){
        pass.placeholder="Password is requied";
        return false;
    }


   
}

const ema = document.getElementById("ema");
const passa = document.getElementById("passa");

// Admin 

function adminverify(){

    if(ema.value=="" || passa.value==""){
        ema.placeholder="Username is requied";
        passa.placeholder="Password is requied";
        return false;
    }

    if(ema.value==""){
        ema.placeholder="Username is requied";
        return false;
    }

    if(passa.value==""){
        passa.placeholder="Password is requied";
        return false;
    }


   
}


