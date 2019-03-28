var app = app || {};

app.Util = app.Util || {};

app.Util.Regex = app.Util.Regex || {};

(function (w) {

    app.Util.Regex.email = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;

    app.Util.getSignInFormData = function () {
        const email = document.getElementById('inputEmail').value;
        const password = document.getElementById('inputPassword').value;

        const emailRegex = email.match(app.Util.Regex.email);
        if (!emailRegex) {
            throw new Error("Must be a valid email");
        }
        return {
            "email": email,
            "password": password
        };
    }

    app.sendAjax = function (method, url, payload) {
        if (!method && !url)
            throw new Error("Paramaters missing");
        const httpRequest = new XMLHttpRequest();
        httpRequest.open(method, url);
        httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        httpRequest.onreadystatechange = function (event) {
            if (httpRequest.readyState === 4 &&
                httpRequest.status === 200) {
                app.Util.processResponse(JSON.parse(httpRequest.responseText));
            }
        }
        httpRequest.send(payload);
    }

    app.Util.processResponse = function (data) {
        if (data && data.success) {
            const user = data.body;
            document.cookie = "user=" + user.nombre;
            document.cookie = "kind=" + user.tipoUsuario;
            app.processHtmlAfterSuccess();
        } else
            throw new Error(data.error.message);
    }

    app.processHtmlAfterSuccess = function () {
        const navbarDropdown2 = document.getElementById('navbarDropdown2');
        const ariaNavbarDropdown2 = document.querySelector('[aria-labelledby=navbarDropdown2]');
        navbarDropdown2.innerHTML = "Usuario";
        const aFirstSibling = ariaNavbarDropdown2.firstElementChild;
        aFirstSibling.innerHTML = "Cerrar Sesión";
        aFirstSibling.href = "controllers/logout.php";
        const aSecondSibling = aFirstSibling.nextElementSibling;
        aSecondSibling.innerHTML = "Configuración";
        aSecondSibling.href = "configuracion.php";
        window.location.replace("index.php");
        // aSecondSibling.innerHTML = "Configuracion"
        // aSecondSibling.href = "#";
    }

    app.processSend = function (event) {
        event.preventDefault();
        const formData = app.Util.getSignInFormData();
        if (!formData) {
            throw new Error('False in validation');
        }
        const sQuery = "email=" + formData.email + "&password=" + formData.password;
        if (formData.email && formData.password)
            app.sendAjax('POST', 'controllers/login.php', sQuery);
    }

    w.onload = function () {
        const buttonSend = document.getElementById('inputSend');
        buttonSend.onclick = app.processSend;
    }

}(window))


