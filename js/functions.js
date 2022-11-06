function register_form_chck(method)
{
    var user_name = document.getElementById("user");
    var email_address = document.getElementById("email");
    var password = document.getElementById("pass");
    var password_repeate = document.getElementById("repass");

    var user_resp = document.getElementById("user_resp");
    var email_resp = document.getElementById("email_resp");
    var pass_resp = document.getElementById("pass_resp");
    var repass_resp = document.getElementById("repass_resp");

    var form = document.getElementById("register_form");

    var user_state = false;
    var email_state = false;
    var pass_state = false;
    var repass_state = false;

    //User name checks
    
    if(/^(?=.*[0-9])[a-zA-Z0-9]{5,}$/. test(user_name.value))
    {
        user_state = true;
        user_resp.innerHTML = "<img src='/img/tick.png' style='width :20 px; height : 20px'>";
        user_name.style.backgroundColor = "rgba(0, 255, 0, 0.5)";
    }
    else
    {   
        user_state = false;
        if(user_name.value != "")
        {
            user_name.style.backgroundColor = "rgba(255, 0, 0, 0.8)";
            user_resp.innerHTML = "Hiba";
        }
        else
        {
            user_name.style.backgroundColor = "white";
            user_resp.innerHTML = "";
        }
    }
    

    //E-mail address checks

    if(/^[a-z0-9]{1,}@[a-z]{1,}[.][a-z]{1,}$/.test(email_address.value))
    {
        email_state = true;
        email_resp.innerHTML = "<img src='/img/tick.png' style='width :20 px; height : 20px'>";
        email_address.style.backgroundColor = "rgba(0, 255, 0, 0.5)";
    }
    else
    {   
        email_state = false;
        if(email_address.value != "")
        {
            email_address.style.backgroundColor = "rgba(255, 0, 0, 0.8)";
            email_resp.innerHTML = "Hiba";
        }
        else
        {
            email_address.style.backgroundColor = "white";
            email_resp.innerHTML = "";
        }
    }
    //Password checks
    if(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/. test(password.value))
    {
        pass_state = true;
        pass_resp.innerHTML = "<img src='/img/tick.png' style='width :20 px; height : 20px'>";
        password.style.backgroundColor = "rgba(0, 255, 0, 0.5)";
    }
    else
    {   
        pass_state = false;
        if(password.value != "")
        {
            password.style.backgroundColor = "rgba(255, 0, 0, 0.8)";
            pass_resp.innerHTML = "Hiba";
        }
        else
        {
            password.style.backgroundColor = "white";
            pass_resp.innerHTML = "";
        }
    }

    //Password repeate check

    if(password_repeate.value === password.value && password_repeate.value != "")
    {
        repass_state = true;
        repass_resp.innerHTML = "<img src='/img/tick.png' style='width :20 px; height : 20px'>";
        password_repeate.style.backgroundColor = "rgba(0, 255, 0, 0.5)";
    }
    else
    {   
        repass_state = false;
        if(password_repeate.value != "")
        {
            password_repeate.style.backgroundColor = "rgba(255, 0, 0, 0.8)";
            repass_resp.innerHTML = "Hiba";
        }
        else
        {
            password_repeate.style.backgroundColor = "white";
            repass_resp.innerHTML = "";
        }
    }

    //Handle of submit button

    if(method == "submit" && (user_state && email_state && pass_state && repass_state))
    {
        form.submit();
    }

    //Handle of reset button

    if(method == "reset")
    {
        form.reset();

        user_name.style.backgroundColor = "white";
        user_resp.innerHTML = "";

        email_address.style.backgroundColor = "white";
        email_resp.innerHTML = "";

        password.style.backgroundColor = "white";
        pass_resp.innerHTML = "";

        password_repeate.style.backgroundColor = "white";
        repass_resp.innerHTML = "";
    }
}

function login_form_chck(method)
{
    var user_name = document.getElementById("login_user");

    var password = document.getElementById("login_pass");

    var form = document.getElementById("login_form");

    if(method == "submit")
    {
        if((/^(?=.*[0-9])[a-zA-Z0-9]{5,}$/. test(user_name.value)) && (/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/. test(password.value)))
        {
            var date = new Date();
            date.setTime(date.getTime()+(1*1000));
            var exp = date.toGMTString();
            document.cookie = "is_submitted = true; expires = "+exp+";";
            login_resp.style.display = 'none';
            form.submit();
        }
        else
        {   
            login_resp.style.display = 'block';
        } 
    }

    if(method == "error")
    {
        login_resp.style.display = 'block';
    }

    if(method == "redirect")
    {
        window.location = ".";
    }
}